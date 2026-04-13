<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginAdminController extends Controller
{
    /**
     * Tampilkan formulir login admin.
     */
    public function showLoginForm()
    {
        // Jika admin sudah login, redirect ke admin dashboard
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }
        // Jika user biasa sudah login, redirect ke user home (bukan admin!)
        if (Auth::guard('web')->check()) {
            return redirect()->route('user.home');
        }
        return view('auth.admin-login'); 
    }

    /**
     * Handle proses login admin.
     */
    public function login(Request $request)
    {
        // 1. Validasi Input (menggunakan 'credential' untuk username/email)
        $request->validate([
            'credential' => 'required|string', 
            'password' => 'required|string',
        ]);

        $credential = $request->input('credential');
        
        // Cek apakah input adalah email atau username
        $field = filter_var($credential, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $attemptCredentials = [
            $field => $credential,
            'password' => $request->password,
        ];

        // 2. COBA LOGIN MENGGUNAKAN GUARD 'ADMIN'
        if (Auth::guard('admin')->attempt($attemptCredentials, $request->boolean('remember'))) {
            
            // Login Berhasil
            $request->session()->regenerate();

            // PENTING: Selalu paksa arahkan ke halaman utama Admin, jangan gunakan 'intended'
            return redirect()->route('admin.dashboard')->with('success', 'Login Admin Berhasil!');
        }

        // 3. Login Gagal
        throw ValidationException::withMessages([
            'credential' => ['Incorrect Username, Email, or Password. Please try again.'],
        ]);
    }

    /**
     * Proses logout admin.
     */
    public function logout(Request $request)
    {
        // LOGOUT MENGGUNAKAN GUARD 'ADMIN'
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}