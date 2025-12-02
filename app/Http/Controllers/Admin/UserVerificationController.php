<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserVerificationController extends Controller
{
    public function index()
    {
        $verifications = DB::table('user_verifications')
            ->join('users', 'user_verifications.user_id', '=', 'users.id')
            ->select(
                'user_verifications.*',
                'users.name',
                'users.username',
                'users.email'
            )
            ->orderBy('verification_date', 'desc')
            ->get();

        return view('admin.user_verification.index', compact('verifications'));
    }

    public function approve($id)
    {
        DB::table('user_verifications')
            ->where('id', $id)
            ->update([
                'status' => 'verified',
                'verification_date' => now()
            ]);

        DB::table('users')
            ->where('id', function ($query) use ($id) {
                $query->select('user_id')
                    ->from('user_verifications')
                    ->where('id', $id);
            })
            ->update(['verification_status' => 'verified']);

        return back()->with('success', 'User berhasil diverifikasi.');
    }

    public function reject($id)
    {
        DB::table('user_verifications')
            ->where('id', $id)
            ->update(['status' => 'unverified']);

        return back()->with('error', 'Verifikasi ditolak.');
    }
}
