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
            'verification_type' => 'required|in:sim,course',
            'face_photo' => 'required_if:verification_type,sim|image|max:2048',
            'license_photo' => 'required_if:verification_type,sim|image|max:2048',
        ]);

        // 2. Pembuatan User: Kunci array harus sesuai 100% dengan KOLOM DATABASE
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'address' => $request->address, 
            'phone_number' => $request->phone, 
        ]);

        // 3. Handle Verification Data
        $verificationData = [
            'user_id' => $user->id,
            'verification_type' => $request->verification_type,
            'verification_date' => now(),
        ];

        if ($request->verification_type === 'sim') {
            // Handle File Uploads
            // Handle File Uploads
            if ($request->hasFile('face_photo')) {
                $path = $request->file('face_photo')->store('verifications/faces', 'public');
                $verificationData['face_photo_path'] = 'storage/' . $path;
            }
            if ($request->hasFile('license_photo')) {
                $path = $request->file('license_photo')->store('verifications/licenses', 'public');
                $verificationData['license_photo_path'] = 'storage/' . $path;
            }
            $verificationData['status'] = 'pending';
        } else {
            // Course path
            $verificationData['status'] = 'class_required';
        }

        // Insert into user_verifications table
        \Illuminate\Support\Facades\DB::table('user_verifications')->insert($verificationData);

        // Langsung loginkan user setelah register
        Auth::guard('web')->login($user); 

        return redirect()->route('welcome')->with('success', 'Registration successful! Please check your verification status.');
    }
}