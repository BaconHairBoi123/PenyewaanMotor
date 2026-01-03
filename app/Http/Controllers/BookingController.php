<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\AdditionalAccessories;
// use App\Models\Rental; // We will assume a Rental model exists or create logic later
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\BookingAccessory;
use App\Models\Rental;
use App\Models\Payment;
use App\Models\BikeReturn;

class BookingController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = config('services.midtrans.is_sanitized');
        Config::$is3ds = config('services.midtrans.is_3ds');
    }

    public function checkout(Request $request)
    {
        // 1. Validasi Input (Tambahkan latitude & longitude)
        $request->validate([
            'motorcycle_id' => 'required|exists:motorcycles,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'delivery_type' => 'required|in:pickup,delivery',
            'distance_km' => 'nullable|numeric|min:0', // Pastikan namanya sesuai dengan input hidden di view
            'latitude' => 'required_if:delivery_type,delivery',
            'longitude' => 'required_if:delivery_type,delivery',
            'delivery_address' => 'required_if:delivery_type,delivery',
        ]);

        // 2. Cek apakah user punya rental aktif (Logika kamu sudah benar)
        $hasActiveRental = Rental::where('user_id', Auth::id())
            ->whereDoesntHave('returns')
            ->whereHas('payments', function ($q) {
                $q->whereIn('status', ['success', 'pending']);
            })
            ->exists();

        if ($hasActiveRental) {
            return response()->json([
                'error' => 'User memiliki peminjaman aktif! Harap kembalikan motor sebelumnya.'
            ], 400);
        }

        $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);

        // 3. Hitung Durasi & Harga
        $start = \Carbon\Carbon::parse($request->start_date);
        $end = \Carbon\Carbon::parse($request->end_date);
        $days = $start->diffInDays($end) + 1;

        $basePrice = $motorcycle->price * $days;

        // Hitung Aksesoris
        $accessoriesPrice = 0;
        if ($request->has('accessories')) {
            $accessories = AdditionalAccessories::whereIn('id', $request->accessories)->get();
            foreach ($accessories as $acc) {
                // Karena di View kamu pakai daily_price * days di JS, 
                // di sini kita samakan logikanya: (Harga per hari * jumlah hari)
                $accessoriesPrice += ($acc->daily_price * $days);
            }
        }

        // Hitung Ongkir (Ambil dari distance_km yang dikirim JS)
        $deliveryFee = 0;
        if ($request->delivery_type === 'delivery' && $request->distance_km > 0) {
            $deliveryFee = ceil($request->distance_km) * 5000;
        }

        $totalPrice = $basePrice + $accessoriesPrice + $deliveryFee;
        $orderId = 'RIDE-' . uniqid();

        try {
            DB::beginTransaction();

            // --- A. SIMPAN KE TABEL LOCATIONS ---
            $locationId = null;
            if ($request->delivery_type === 'delivery') {
                $location = \App\Models\Locations::create([
                    'latitude' => $request->latitude,
                    'longitude' => $request->longitude,
                ]);
                $locationId = $location->id;
            }

            // --- B. SIMPAN KE TABEL BOOKINGS ---
            $booking = new Booking();
            $booking->order_id = $orderId;
            $booking->user_id = Auth::id();
            $booking->motorcycle_id = $motorcycle->id;
            $booking->start_date = $start;
            $booking->end_date = $end;
            $booking->duration_days = $days;
            $booking->delivery_type = $request->delivery_type;
            $booking->delivery_fee = $deliveryFee;
            $booking->delivery_address = $request->delivery_address; // Pastikan kolom ini ada di DB
            $booking->base_price = $basePrice;
            $booking->total_price = $totalPrice;
            $booking->payment_status = 'pending';
            $booking->save();

            // Simpan Aksesoris
            if ($request->has('accessories')) {
                foreach ($accessories as $acc) {
                    $bookingAccessory = new BookingAccessory();
                    $bookingAccessory->booking_id = $booking->id;
                    $bookingAccessory->accessory_id = $acc->id;
                    $bookingAccessory->quantity = 1;
                    $bookingAccessory->price = $acc->daily_price;
                    $bookingAccessory->save();
                }
            }

            // --- C. INTEGRASI DENGAN TABEL LEGACY (Rentals & Payments) ---
            $rental = new Rental();
            $rental->user_id = $booking->user_id;
            $rental->motorcycle_id = $booking->motorcycle_id;
            $rental->location_id = $locationId; // MASUKKAN LOCATION_ID DI SINI
            $rental->start_date = $booking->start_date;
            $rental->return_date = $booking->end_date;
            $rental->delivery_type = $booking->delivery_type;

            if ($request->has('accessories') && is_array($request->accessories) && count($request->accessories) > 0) {
                $rental->accessory_id = $request->accessories[0]; // Ambil salah satu sesuai struktur tabel kamu
            }
            $rental->save();

            $payment = new Payment();
            $payment->user_id = $booking->user_id;
            $payment->rental_id = $rental->id;
            $payment->total_amount = $totalPrice;
            $payment->payment_method = 'midtrans';
            $payment->payment_date = now();
            $payment->invoice_number = $orderId;
            $payment->status = 'pending';
            $payment->save();

            // --- D. MIDTRANS CONFIG ---
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $totalPrice,
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email,
                ],
            ];

            $snapToken = Snap::getSnapToken($params);
            $booking->snap_token = $snapToken;
            $booking->save();

            DB::commit();

            return response()->json([
                'snap_token' => $snapToken,
                'total_price' => $totalPrice
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function success(Request $request)
    {
        return view('user.booking_success');
    }
}
