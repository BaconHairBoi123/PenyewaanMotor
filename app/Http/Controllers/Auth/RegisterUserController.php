<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RegisterUserController extends Controller
{
    /**
     * Tampilkan formulir registrasi.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Proses data registrasi dan buat user baru.
     */
    public function register(Request $request)
    {
        // 1. Validasi: Menggunakan nama input dari FORM (address, phone)
        $request->validate([
            'name' => 'required|string|max:100',
            'username' => 'required|string|unique:users|max:50', 
            'email' => 'required|string|email|unique:users|max:100', 
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string', 
            'phone' => 'required|string|max:20', // Input dari form adalah 'phone'
        ]);

        // 2. Pembuatan User: Kunci array harus sesuai 100% dengan KOLOM DATABASE
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            
            // Kolom DB: 'address' <-- mengambil dari Form Input: $request->address
            'address' => $request->address, 
            
            // Kolom DB: 'phone_number' <-- mengambil dari Form Input: $request->phone
            'phone_number' => $request->phone, 
        ]);

        // Langsung loginkan user setelah register
        Auth::guard('web')->login($user); 

        return redirect('/user/dashboard')->with('success', 'Pendaftaran berhasil!');
    }
}