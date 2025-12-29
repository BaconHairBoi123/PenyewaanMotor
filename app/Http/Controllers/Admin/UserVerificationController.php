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

        // Update User verification_status as well if column exists, or just rely on user_verifications table
        // Assuming 'verification_status' column exists in users table based on previous code
        DB::table('users')
            ->where('id', function ($query) use ($id) {
                $query->select('user_id')
                    ->from('user_verifications')
                    ->where('id', $id);
            })
            ->update(['verification_status' => 'verified']);

        return back()->with('success', 'User verification approved.');
    }

    public function reject($id)
    {
        DB::table('user_verifications')
            ->where('id', $id)
            ->update(['status' => 'rejected']);

        return back()->with('error', 'User verification rejected.');
    }
}
