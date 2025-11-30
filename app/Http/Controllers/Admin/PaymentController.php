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
        DB::table('payments')
            ->where('id', $id)
            ->update(['status' => 'success']);

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi.');
    }

    public function failed($id)
    {
        DB::table('payments')
            ->where('id', $id)
            ->update(['status' => 'failed']);

        return back()->with('error', 'Pembayaran ditandai gagal.');
    }
}
