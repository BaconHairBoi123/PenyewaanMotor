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
                // Map status 'success' (payment) to 'paid' (booking enum)
                $bookingStatus = $payment->status;
                if ($bookingStatus == 'success') {
                    $bookingStatus = 'paid';
                }
                $booking->payment_status = $bookingStatus;
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
                // Gunakan 'success' agar konsisten dengan logika di view booking history (success/pending/failed)
                // Enum di database mungkin 'paid'? Cek migration bookings: ['pending', 'paid', 'failed', 'cancelled']
                // Wait, view booking history expects 'success'??
                // <span class="badge {{ $paymentStatus == 'success' ? 'bg-success' ...
                // $paymentStatus diambil dari $payment->status.
                // $payment->status enum di payments table: ['pending', 'success', 'failed'].
                // Jadi $payment->status harus 'success'. 
                // $booking->payment_status enum: ['pending', 'paid', 'failed', 'cancelled'].
                // Tapi booking history list mengambil status dari PAYMENT table ($payment->status).
                
                // Masalahnya: Di clientCallback, $payment->status diset 'success' (Line 83).
                // $booking->payment_status diset 'paid' (Line 88).
                
                // Kenapa view masih pending?
                // View booking_history_list.blade.php Line 11: $paymentStatus = $payment ? $payment->status : 'pending';
                // Jadi kuncinya di $payment->status.
                
                // Jika $payment->status sudah di-save 'success' di line 84, harusnya view hijau.
                // Kecuali $payment yang diambil booking history itu 'pending'.
                
                // Cek apakah ada Payment ganda? Or race condition?
                
                // Namun, untuk konsistensi, mari kita ubah $booking->payment_status jadi 'paid' (sesuai enum booking)
                // Tapi pastikan $payment->status adalah 'success'.
                
                // Line 83: $payment->status = 'success'; $payment->save(); --> Ini sudah benar.
                
                // Apakah request JSON dari client mengirim 'transaction_status' yang benar?
                // Header JS: result.transaction_status || 'success'.
                // Jadi defaultnya 'success'.
                
                // Kenapa failure?
                // Mungkin karena logic di Step 2216 Line 82: if ($status === 'capture' || ... || $status === 'success')
                
                // Di JS Header (Step 2126), body: order_id, transaction_status.
                // Jika result.transaction_status undefined, dia kirim 'success'.
                
                // Jadi harusnya masuk block if.
                
                // Mari kita pastikan booking status juga konsisten.
                // Tapi masalah utama user adalah "status pesanan di keranjang".
                // Keranjang pakai $payment->status.
                
                // Mungkinkah BookingHistoryController mengambil data lama (cache)? Tidak, standard query.
                
                // Saya curiga $request->all() di clientCallback tidak menangkap JSON dengan benar jika tidak pakai $request->json()->all() atau content type header salah?
                // Header JS: Content-Type application/json. Laravel method injection handles JSON automatically? 
                // Yes usually.
                
                // Mari kita tambahkan Log untuk debugging jika perlu, tapi user minta fix.
                
                // Isu potensial: Enum Booking payment_status tidak punya 'success', tapi 'paid'.
                // Jadi line 88 $booking->payment_status = 'paid' itu BENAR.
                
                // TAPI line 52 di method notification: $booking->payment_status = $payment->status;
                // Jika $payment->status = 'success', maka $booking mau diisi 'success'. 
                // Padahal enum booking cuma ['pending', 'paid', ...]. 
                // Ini akan error "Data truncated" lagi di notification handler!
                
                // Fix 1: Notification handler (Line 52) harus mapping 'success' -> 'paid'.
                // Fix 2: Client handler tampaknya oke, tapi mari kita pastikan.
                
                // User bilang "masih bisa pay now". Kapan tombol pay now muncul?
                // View history: if($paymentStatus == 'pending' ...).
                // Artinya $payment->status masih pending.
                
                // Kesimpulan: $payment->save() di line 84 tidak tereksekusi atau gagal.
                
                // Kenapa gagal? Mungkin validasi $orderId?
                
                // Saya akan ubah Notification handler dulu agar tidak error "Data truncated" (success vs paid).
                // Dan di ClientCallback, saya akan tambahkan Log untuk memastikan terpanggil.
                
                // Wait, user says "pop up payment successful". 
                // So the JS execution flow reaches the end.
                
                $booking->payment_status = 'paid'; 
                $booking->save();
            }
        }

        return response()->json(['ok' => true]);
    }
}
