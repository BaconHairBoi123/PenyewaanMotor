<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorcycle;
use App\Models\AdditionalAccessories;
// use App\Models\Rental; // We will assume a Rental model exists or create logic later
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;
use Midtrans\Config;

class BookingController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = 'midtrans.server_key'; // Hardcoded as per user file, should be env
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
            foreach ($accessories as $acc) {
                // Assuming accessory price is per day? Or flat? default logic: per day
                $accessoriesPrice += $acc->daily_price * $days;
            }
        }

        // Calculate Delivery
        $deliveryFee = 0;
        if ($request->delivery_type === 'delivery' && $request->distance > 0) {
            // Simple logic: 5000 per km
            $deliveryFee = $request->distance * 5000;
        }

        $totalPrice = $basePrice + $accessoriesPrice + $deliveryFee;

        // Generate Transaction Token
        $params = [
            'transaction_details' => [
                'order_id' => 'RIDE-' . uniqid(),
                'gross_amount' => (int) $totalPrice, // Must be integer
            ],
            'customer_details' => [
                'first_name' => 'Customer', // In real app, take from Auth::user()
                'email' => 'customer@example.com',
            ],
            'item_details' => [
                [
                    'id' => $motorcycle->id,
                    'price' => (int) $motorcycle->price,
                    'quantity' => $days,
                    'name' => 'Rental: ' . $motorcycle->brand . ' ' . $motorcycle->type,
                ],
                // Add accessories and delivery as items if needed details in Midtrans
            ]
        ];
        
        // Add Delivery Item if exists
        if ($deliveryFee > 0) {
            $params['item_details'][] = [
                'id' => 'DELIVERY',
                'price' => (int) $deliveryFee,
                'quantity' => 1,
                'name' => 'Delivery Fee (' . $request->distance . 'km)',
            ];
        }

        try {
            $snapToken = Snap::getSnapToken($params);
            return response()->json([
                'snap_token' => $snapToken,
                'total_price' => $totalPrice
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
