<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\BikeReturn;
use Illuminate\Support\Facades\Auth;

class BookingHistoryController extends Controller
{
    public function getHistory()
    {
        // Initialize Midtrans config
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

        $rentals = Rental::where('user_id', Auth::id())
            ->with(['motorcycle', 'payments', 'returns'])
            ->orderBy('created_at', 'desc')
            ->get();

        foreach ($rentals as $rental) {
            $payment = $rental->payments->first();
            if ($payment && $payment->status === 'pending') {
                try {
                    $statusResponse = \Midtrans\Transaction::status($payment->invoice_number);
                    $transactionStatus = $statusResponse->transaction_status ?? null;

                    if ($transactionStatus) {
                        $successStates = ['capture', 'settlement'];
                        $failedStates = ['deny', 'expire', 'cancel', 'failure'];

                        if (in_array($transactionStatus, $successStates)) {
                            \Illuminate\Support\Facades\DB::transaction(function () use ($rental, $payment) {
                                $payment->status = 'success';
                                $payment->save();

                                $booking = \App\Models\Booking::where('order_id', $payment->invoice_number)->first();
                                if ($booking) {
                                    $booking->payment_status = 'paid';
                                    $booking->save();
                                }

                                if ($rental->motorcycle) {
                                    $rental->motorcycle->status = 'rented';
                                    $rental->motorcycle->save();
                                }
                            });
                        } elseif (in_array($transactionStatus, $failedStates)) {
                            \Illuminate\Support\Facades\DB::transaction(function () use ($payment) {
                                $payment->status = 'failed';
                                $payment->save();

                                $booking = \App\Models\Booking::where('order_id', $payment->invoice_number)->first();
                                if ($booking) {
                                    $booking->payment_status = 'failed';
                                    $booking->save();
                                }
                            });
                        }
                    }
                } catch (\Exception $e) {
                    // Ignore error
                }
            }
        }

        // Re-query updated data for view rendering
        $rentals = Rental::where('user_id', Auth::id())
            ->with(['motorcycle', 'payments', 'returns'])
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json([
            'html' => view('user.components.booking_history_list', compact('rentals'))->render()
        ]);
    }
}
