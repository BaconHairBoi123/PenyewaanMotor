<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = DB::table('payments')
            ->join('users', 'payments.user_id', '=', 'users.id')
            ->join('rentals', 'payments.rental_id', '=', 'rentals.id')
            ->join('motorcycles', 'rentals.motorcycle_id', '=', 'motorcycles.id')
            ->select(
                'payments.*',
                'users.name as user_name',
                'motorcycles.brand',
                'motorcycles.type',
                'motorcycles.license_plate'
            )
            ->orderBy('payments.created_at', 'desc')
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function success($id)
    {
        $payment = \App\Models\Payment::find($id);
        if ($payment) {
            $payment->status = 'success';
            $payment->save();

            // Sync with Booking
            $booking = \App\Models\Booking::where('order_id', $payment->invoice_number)->first();
            if ($booking) {
                $booking->payment_status = 'paid';
                $booking->save();

                if ($booking->motorcycle) {
                    $booking->motorcycle->status = 'rented';
                    $booking->motorcycle->save();
                }
            }
        }

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function failed($id)
    {
        $payment = \App\Models\Payment::find($id);
        if ($payment) {
            $payment->status = 'failed';
            $payment->save();

            // Sync with Booking
            $booking = \App\Models\Booking::where('order_id', $payment->invoice_number)->first();
            if ($booking) {
                $booking->payment_status = 'failed';
                $booking->save();
            }
        }

        return back()->with('error', 'Pembayaran ditandai gagal.');
    }
}
