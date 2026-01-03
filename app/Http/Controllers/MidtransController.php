<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Payment;
use App\Models\Booking;
use Midtrans\Notification as MidtransNotification;

class MidtransController extends Controller
{
    /**
     * Handle Midtrans server-to-server notification (webhook)
     */
    public function notification(Request $request)
    {
        try {
            $notif = new MidtransNotification();

            $orderId = $notif->order_id ?? ($notif->orderId ?? null);
            $transactionStatus = $notif->transaction_status ?? null;

            Log::info('Midtrans notification', ['order_id' => $orderId, 'status' => $transactionStatus, 'raw' => $notif]);

            if (!$orderId) {
                return response()->json(['error' => 'missing order id'], 400);
            }

            $payment = Payment::where('invoice_number', $orderId)->first();
            if (!$payment) {
                return response()->json(['error' => 'payment not found'], 404);
            }

            // Map midtrans statuses to our internal statuses
            $successStates = ['capture', 'settlement'];
            $pendingStates = ['pending'];
            $failedStates = ['deny', 'expire', 'cancel', 'failure'];

            if (in_array($transactionStatus, $successStates)) {
                $payment->status = 'success';
            } elseif (in_array($transactionStatus, $pendingStates)) {
                $payment->status = 'pending';
            } else {
                $payment->status = 'failed';
            }
            $payment->save();

            // Also update related booking payment_status if exists
            $booking = Booking::where('order_id', $payment->invoice_number)->first();
            if ($booking) {
                $booking->payment_status = $payment->status;
                $booking->save();
            }

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            Log::error('Midtrans notification error: ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Client-side callback after snap.onSuccess — mark payment as success (optimistic)
     */
    public function clientCallback(Request $request)
    {
        $data = $request->all();
        $orderId = $data['order_id'] ?? $data['invoice_number'] ?? null;
        $status = $data['transaction_status'] ?? $data['status'] ?? null;

        if (!$orderId) {
            return response()->json(['error' => 'missing order id'], 400);
        }

        $payment = Payment::where('invoice_number', $orderId)->first();
        if (!$payment) {
            return response()->json(['error' => 'payment not found'], 404);
        }

        // If client reports success, set to success. Otherwise leave as pending.
        if ($status === 'capture' || $status === 'settlement' || $status === 'success') {
            $payment->status = 'success';
            $payment->save();

            $booking = Booking::where('order_id', $payment->invoice_number)->first();
            if ($booking) {
                $booking->payment_status = 'paid';
                $booking->save();
            }
        }

        return response()->json(['ok' => true]);
    }
}
