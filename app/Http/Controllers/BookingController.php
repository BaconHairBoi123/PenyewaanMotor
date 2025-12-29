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
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function checkout(Request $request)
    {
        // Validate Inputs
        $request->validate([
            'motorcycle_id' => 'required|exists:motorcycles,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'delivery_type' => 'required|in:pickup,delivery',
            'distance' => 'nullable|numeric|min:0',
        ]);

        // CHECK: Prevent renting if user has active rental (not returned yet)
        // We check for rentals that have success/pending payment AND no entry in returns table
        $hasActiveRental = Rental::where('user_id', Auth::id())
            ->whereDoesntHave('returns')
            ->whereHas('payments', function($q) {
                $q->whereIn('status', ['success', 'pending']);
            })
            ->exists();

        if ($hasActiveRental) {
            return response()->json([
                'error' => 'User meminjamkan motor lebih dari 1! Harap kembalikan motor sebelumnya.'
            ], 400);
        }

        $motorcycle = Motorcycle::findOrFail($request->motorcycle_id);

        // Calculate Duration
        $start = \Carbon\Carbon::parse($request->start_date);
        $end = \Carbon\Carbon::parse($request->end_date);
        $days = $start->diffInDays($end) + 1; // Minimum 1 day

        // Calculate Base Price
        $basePrice = $motorcycle->price * $days;

        // Calculate Accessories
        $accessoriesPrice = 0;
        if ($request->has('accessories')) {
            $accessories = AdditionalAccessories::whereIn('id', $request->accessories)->get();
            $quantities = $request->input('accessory_qty', []);
            
            foreach ($accessories as $acc) {
                $qty = isset($quantities[$acc->id]) ? (int)$quantities[$acc->id] : 1;
                // Maximum 2 per item security check
                if($qty > 2) $qty = 2;
                if($qty < 1) $qty = 1;
                
                // Flat fee per rental (not daily)
                $accessoriesPrice += ($acc->daily_price * $qty);
            }
        }

        // Calculate Delivery
        $deliveryFee = 0;
        if ($request->delivery_type === 'delivery' && $request->distance > 0) {
            // Simple logic: 5000 per km
            $deliveryFee = $request->distance * 5000;
        }

        $totalPrice = $basePrice + $accessoriesPrice + $deliveryFee;

        // Generate Order ID
        $orderId = 'RIDE-' . uniqid();

        // Save Booking to Database
        try {
            DB::beginTransaction();

            $booking = new Booking();
            $booking->order_id = $orderId;
            $booking->user_id = Auth::id() ?? 1; // Fallback to 1 for dev if not logged in (should be guarded)
            $booking->motorcycle_id = $motorcycle->id;
            $booking->start_date = $start;
            $booking->end_date = $end;
            $booking->duration_days = $days;
            $booking->delivery_type = $request->delivery_type;
            $booking->delivery_fee = $deliveryFee;
            $booking->base_price = $basePrice;
            $booking->total_price = $totalPrice;
            $booking->payment_status = 'pending';
            $booking->save();

            // Save Accessories if any
            if ($request->has('accessories')) {
                foreach ($accessories as $acc) {
                    $qty = isset($quantities[$acc->id]) ? (int)$quantities[$acc->id] : 1;
                    if($qty > 2) $qty = 2;
                    if($qty < 1) $qty = 1;
                    
                    $bookingAccessory = new BookingAccessory();
                    $bookingAccessory->booking_id = $booking->id;
                    $bookingAccessory->accessory_id = $acc->id;
                    $bookingAccessory->quantity = $qty;
                    $bookingAccessory->price = $acc->daily_price; // storing unit price
                    $bookingAccessory->save();
                }
            }

            // Generate Transaction Token
            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => (int) $totalPrice, 
                ],
                'customer_details' => [
                    'first_name' => Auth::user()->name ?? 'Guest',
                    'email' => Auth::user()->email ?? 'guest@example.com',
                ],
                'item_details' => [
                    [
                        'id' => $motorcycle->id,
                        'price' => (int) $motorcycle->price,
                        'quantity' => $days,
                        'name' => mb_substr('Rental: ' . $motorcycle->brand . ' ' . $motorcycle->type, 0, 50),
                    ],
                ]
            ];
            
            // Add Delivery Item
            if ($deliveryFee > 0) {
                $params['item_details'][] = [
                    'id' => 'DELIVERY',
                    'price' => (int) $deliveryFee,
                    'quantity' => 1,
                    'name' => 'Delivery Fee',
                ];
            }

            // Get Snap Token from Midtrans
            $snapToken = Snap::getSnapToken($params);
            
            // Update booking with token
            $booking->snap_token = $snapToken;
            $booking->save();
            
            // --- INTEGRATION WITH LEGACY TABLES (Rentals & Payments) ---
            
            // 1. Create Rental Record
            $rental = new Rental();
            $rental->user_id = $booking->user_id;
            $rental->motorcycle_id = $booking->motorcycle_id;
            $rental->start_date = $booking->start_date;
            $rental->return_date = $booking->end_date;
            
            // Handle limitation: rentals table has single accessory_id. 
            // We use the first one if available, otherwise null.
            if (!empty($accessories) && $accessories->count() > 0) {
                 $rental->accessory_id = $accessories->first()->id;
            }
            
            $rental->delivery_type = $booking->delivery_type ?? 'pickup';
            $rental->save();
            
            // 2. Create Payment Record
            $payment = new Payment();
            $payment->user_id = $booking->user_id;
            $payment->rental_id = $rental->id;
            $payment->total_amount = $booking->total_price;
            $payment->payment_method = 'midtrans';
            $payment->payment_date = now();
            $payment->invoice_number = $booking->order_id;
            $payment->status = 'pending';
            $payment->save();
            
            // -------------------------------------------------------------
            
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
