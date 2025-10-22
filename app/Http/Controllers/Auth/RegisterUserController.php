<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User; // Import Model User yang sudah dimodifikasi

class RegisterUserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register'); // View form register
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|unique:user|max:50', // Cek di tabel 'user'
            'email' => 'required|string|email|unique:user|max:100', // Cek di tabel 'user'
            'password' => 'required|string|min:8|confirmed',
            'alamat' => 'nullable|string',
            'no_tlpn' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi Password
            'alamat' => $request->alamat,
            'no_tlpn' => $request->no_tlpn,
            // 'verifikasi' akan default 'belum'
        ]);

        // Langsung loginkan user setelah register (opsional)
        Auth::guard('web')->login($user); 

        return redirect('/user/dashboard')->with('success', 'Pendaftaran berhasil!');
    }
}