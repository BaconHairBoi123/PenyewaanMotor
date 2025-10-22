<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAdminController extends Controller
{
    public function showLoginForm()
    {
        // View login khusus untuk admin
        return view('auth.admin-login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // PENTING: Menggunakan guard 'admin'
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect ke dashboard admin
            return redirect()->intended('/admin/dashboard'); 
        }

        return back()->withErrors([
            'username' => 'Username atau Password Admin salah.',
        ])->onlyInput('username');
    }
    
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login'); // Kembali ke halaman login admin
    }
}