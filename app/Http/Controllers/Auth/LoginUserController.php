<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginUserController extends Controller
{
    /**
     * Tampilkan formulir login.
     */
    public function showLoginForm()
    {
        // Pastikan view login Anda bernama 'auth.login'
        return view('auth.login');
    }

    /**
     * Handle proses login.
     */
    public function login(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            // Input field yang digunakan untuk email atau username (misalnya: name="credential")
            'credential' => 'required|string', 
            'password' => 'required|string',
        ]);

        // 2. Tentukan field otentikasi (email atau username)
        // Kita berasumsi input field di form Anda bernama 'credential'
        $credential = $request->input('credential');
        
        // Cek apakah input terlihat seperti format email
        if (filter_var($credential, FILTER_VALIDATE_EMAIL)) {
            $field = 'email';
        } else {
            $field = 'username';
        }

        // 3. Persiapkan kredensial untuk percobaan Auth
        $attemptCredentials = [
            $field => $credential, // Menggunakan field yang dipilih
            'password' => $request->password,
        ];

        // 4. Coba login
        if (Auth::attempt($attemptCredentials, $request->boolean('remember'))) {
            
            // Login Berhasil
            $request->session()->regenerate();

            // Ganti '/user/dashboard' dengan rute dashboard Anda
            return redirect()->intended('/user/dashboard')->with('success', 'Login Berhasil!');
        }

        // 5. Login Gagal
        throw ValidationException::withMessages([
            'credential' => [trans('auth.failed')],
        ]);
    }

    /**
     * Proses logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}