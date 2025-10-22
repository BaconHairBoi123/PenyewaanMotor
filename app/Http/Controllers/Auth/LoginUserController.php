<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // Harus di-import
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    // Anda bisa tambahkan method untuk menampilkan form login di sini
    public function showLoginForm()
    {
        return view('auth.login'); // Asumsi view login user ada di resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string', // Sesuaikan validasi dengan kolom di DB Anda
            'password' => 'required|string',
        ]);

        // Menggunakan guard 'web' (default, yang kita set ke provider 'users')
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect ke dashboard user
            return redirect()->intended('/user/dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau Password salah.',
        ])->onlyInput('username'); // Menggunakan onlyInput agar field username tetap terisi
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/'); // Redirect ke halaman utama atau halaman login
    }
}