<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\AdditionalAccessories;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\BookingAccessory;
use App\Models\Rental;
use App\Models\Payment;
use App\Models\Locations;

class BookingController extends Controller
{
    public function __construct()
    {
        // Set Midtrans config
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    /**
     * Memproses pesanan dari mobile dan mengembalikan Snap Token Midtrans
     */
    public function checkout(Request $request)
    {
        $request->validate([
            'motorcycle_id' => 'required|exists:motorcycles,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'delivery_type' => 'required|in:pickup,delivery',
            'distance_km' => 'nullable|numeric|min:0',
            'latitude' => 'required_if:delivery_type,delivery',
            'longitude' => 'required_if:delivery_type,delivery',
            'delivery_address' => 'required_if:delivery_type,delivery',
            'accessories' => 'nullable|array',
            'accessories.*' => 'exists:additional_accessories,id',
        ]);

        $user = $request->user();

        // 1. Cek apakah user punya rental aktif
        $hasActiveRental = Rental::where('user_id', $user->id)
            ->whereDoesntHave('returns')
            ->whereHas('payments', function ($q) {
                $q->whereIn('status', ['success', 'pending']);
            })
            ->exists();

        if ($hasActiveRental) {
            return response()->json([
                'status' => 'error',
                'message' => 'You currently have an active motorcycle rental. Please return it before placing a new order.'
            ], 400);
        }

        $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);

        if ($motorcycle->status !== 'available') {
            return response()->json([
                'status' => 'error',
                'message' => 'This motorcycle is currently not available for booking.'
            ], 400);
        }

        // 2. Hitung Durasi & Harga
        $start = \Carbon\Carbon::parse($request->start_date);
        $end = \Carbon\Carbon::parse($request->end_date);
        $days = $start->diffInDays($end) + 1;

        $basePrice = $motorcycle->price * $days;

        // Hitung Aksesoris
        $accessoriesPrice = 0;
        $selectedAccessories = [];
        if ($request->has('accessories')) {
            $selectedAccessories = AdditionalAccessories::whereIn('id', $request->accessories)->get();
            foreach ($selectedAccessories as $acc) {
                $accessoriesPrice += ($acc->daily_price * $days);
            }
        }

        // Hitung Ongkir
        $deliveryFee = 0;
        if ($request->delivery_type === 'delivery' && $request->distance_km > 0) {
            $deliveryFee = ceil($request->distance_km) * 5000;
        }

        $totalPrice = $basePrice + $accessoriesPrice + $deliveryFee;
        $orderId = 'RIDE-' . uniqid();

        try {
            DB::beginTransaction();

            // A. Lokasi Pengiriman
            $locationId = null;
            if ($request->delivery_type === 'delivery') {
                $location = Locations::create([
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
                $locationId = $location->id;
            }

            // B. Booking
            $booking = new Booking();
            $booking->order_id = $orderId;
            $booking->user_id = $user->id;
            $booking->motorcycle_id = $motorcycle->id;
            $booking->start_date = $start;
            $booking->end_date = $end;
            $booking->duration_days = $days;
            $booking->delivery_type = $request->delivery_type;
            $booking->delivery_fee = $deliveryFee;
            $booking->delivery_address = $request->delivery_address;
            $booking->base_price = $basePrice;
            $booking->total_price = $totalPrice;
            $booking->payment_status = 'pending';
            $booking->save();

            // Aksesoris Booking
            if ($request->has('accessories')) {
                foreach ($selectedAccessories as $acc) {
                    $bookingAccessory = new BookingAccessory();
                    $bookingAccessory->booking_id = $booking->id;
                    $bookingAccessory->accessory_id = $acc->id;
                    $bookingAccessory->quantity = 1;
                    $bookingAccessory->price = $acc->daily_price;
                    $bookingAccessory->save();
                }
            }

            // C. Rental
            $rental = new Rental();
            $rental->user_id = $booking->user_id;
            $rental->motorcycle_id = $booking->motorcycle_id;
            $rental->location_id = $locationId;
            $rental->start_date = $booking->start_date;
            $rental->return_date = $booking->end_date;
            $rental->delivery_type = $booking->delivery_type;
            
            if ($request->has('accessories') && count($request->accessories) > 0) {
                $rental->accessory_id = $request->accessories[0];
            }
            $rental->save();

            // D. Payment
            $payment = new Payment();
            $payment->user_id = $booking->user_id;
            $payment->rental_id = $rental->id;
            $payment->total_amount = $totalPrice;
            $payment->payment_method = 'midtrans';
            $payment->payment_date = now();
            $payment->invoice_number = $orderId;
            $payment->status = 'pending';
            $payment->save();

            // E. Snap Token Midtrans
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
            ];

            if (empty(Config::$serverKey)) {
                throw new \Exception('MIDTRANS_SERVER_KEY is missing in .env configuration.');
            }
            
            $snapToken = Snap::getSnapToken($params);
            $booking->snap_token = $snapToken;
            $booking->save();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Booking created successfully',
                'data' => [
                    'order_id' => $orderId,
                    'snap_token' => $snapToken,
                    'total_price' => $totalPrice
                ]
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to process booking',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Tampilkan riwayat penyewaan user yang sedang login
     */
    public function history(Request $request)
    {
        $today = now()->toDateString();
        
        // Auto-expire pending bookings whose start_date is in the past
        Booking::where('user_id', $request->user()->id)
            ->where('payment_status', 'pending')
            ->where('start_date', '<', $today)
            ->update(['payment_status' => 'failed']);
            
        // Sync matching payments to failed
        $expiredBookings = Booking::where('user_id', $request->user()->id)
            ->where('payment_status', 'failed')
            ->get();
        foreach ($expiredBookings as $eb) {
            $payment = \App\Models\Payment::where('invoice_number', $eb->order_id)->first();
            if ($payment && $payment->status === 'pending') {
                $payment->status = 'failed';
                $payment->save();
            }
        }

        // Real-time Sync with Midtrans Status API for remaining pending bookings
        $pendingBookings = Booking::where('user_id', $request->user()->id)
            ->where('payment_status', 'pending')
            ->get();

        foreach ($pendingBookings as $pb) {
            try {
                $statusResponse = \Midtrans\Transaction::status($pb->order_id);
                $transactionStatus = $statusResponse->transaction_status ?? null;

                if ($transactionStatus) {
                    $successStates = ['capture', 'settlement'];
                    $failedStates = ['deny', 'expire', 'cancel', 'failure'];

                    if (in_array($transactionStatus, $successStates)) {
                        DB::transaction(function () use ($pb) {
                            $pb->payment_status = 'paid';
                            $pb->save();

                            $payment = \App\Models\Payment::where('invoice_number', $pb->order_id)->first();
                            if ($payment) {
                                $payment->status = 'success';
                                $payment->save();
                            }

                            if ($pb->motorcycle) {
                                $pb->motorcycle->status = 'rented';
                                $pb->motorcycle->save();
                            }
                        });
                    } elseif (in_array($transactionStatus, $failedStates)) {
                        DB::transaction(function () use ($pb) {
                            $pb->payment_status = 'failed';
                            $pb->save();

                            $payment = \App\Models\Payment::where('invoice_number', $pb->order_id)->first();
                            if ($payment) {
                                $payment->status = 'failed';
                                $payment->save();
                            }
                        });
                    }
                }
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::warning('Failed to sync Midtrans status for ' . $pb->order_id . ': ' . $e->getMessage());
            }
        }

        $bookings = Booking::with(['motorcycle' => function($q) {
            $q->select('id', 'brand', 'category', 'image_path', 'license_plate');
        }])
        ->where('user_id', $request->user()->id)
        ->latest()
        ->get()
        ->map(function ($booking) {
            if ($booking->motorcycle) {
                 $booking->motorcycle->image_url = $booking->motorcycle->image_path ? asset('storage/motorcycles/' . $booking->motorcycle->image_path) : null;
            }
            
            // Check return status of matching rental
            $payment = \App\Models\Payment::where('invoice_number', $booking->order_id)->first();
            $hasReturn = false;
            if ($payment && $payment->rental_id) {
                $rental = \App\Models\Rental::with('returns')->find($payment->rental_id);
                if ($rental && $rental->returns) {
                    $hasReturn = true;
                }
            }
            $booking->has_return = $hasReturn;
            
            return $booking;
        });

        return response()->json([
            'status' => 'success',
            'data' => $bookings
        ]);
    }

    /**
     * Batalkan penyewaan (Jika masih pending)
     */
    public function cancel(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string|exists:bookings,order_id',
        ]);

        $user = $request->user();
        $booking = Booking::where('order_id', $request->order_id)
                          ->where('user_id', $user->id)
                          ->firstOrFail();

        if ($booking->payment_status !== 'pending') {
             return response()->json([
                 'status' => 'error',
                 'message' => 'Cannot cancel order that is not pending.'
             ], 400);
        }

        DB::beginTransaction();
        try {
            $booking->payment_status = 'cancelled';
            $booking->save();

            // Set motorcycle status back to available
            if ($booking->motorcycle) {
                $booking->motorcycle->status = 'available';
                $booking->motorcycle->save();
            }

            $payment = Payment::where('invoice_number', $booking->order_id)->where('user_id', $user->id)->first();
            if ($payment) {
                $payment->status = 'cancelled';
                $payment->save();
            }

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Order has been canceled successfully.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to cancel order.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
