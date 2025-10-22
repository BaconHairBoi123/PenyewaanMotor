<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Import Facade Password untuk memanggil logika reset bawaan Laravel
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class PasswordController extends Controller
{
    /* |--------------------------------------------------------------------------
    | Manual Password Reset Implementation
    |--------------------------------------------------------------------------
    | Kita mengimplementasikan metode dari traits lama secara manual 
    | dengan memanggil Facade Password untuk menghindari error "Trait not found".
    */
    
    /**
     * Tentukan broker (provider) yang digunakan.
     * Harus sesuai dengan kunci di config/auth.passwords (yaitu 'users').
     */
    protected $broker = 'users';

    /**
     * Tentukan rute redirect setelah password berhasil direset.
     */
    protected $redirectTo = '/login'; 
    
    // --- Metode untuk Form Permintaan Link (Forgot Password) ---

    public function showLinkRequestForm()
    {
        return view('auth.forgot-password');
    }

    /**
     * Memproses permintaan link reset password (mengirim email).
     */
    public function sendResetLinkEmail(Request $request)
    {
        // 1. Validasi input email
        $request->validate(['email' => 'required|email']);

        // 2. Memanggil logika pengiriman link bawaan Laravel
        $response = Password::broker($this->broker)->sendResetLink(
            $request->only('email')
        );

        // 3. Mengarahkan kembali dengan pesan sukses atau error
        return $response == Password::RESET_LINK_SENT
            ? back()->with('status', trans($response))
            : back()->withErrors(['email' => trans($response)]);
    }
    
    // --- Metode untuk Form Reset Password ---

    public function showResetForm(Request $request)
    {
        return view('auth.reset-password')->with(
            ['token' => $request->route('token'), 'email' => $request->email]
        );
    }

    /**
     * Memproses reset password setelah link diklik.
     */
    public function reset(Request $request)
    {
        // 1. Validasi input: token, email, dan password baru
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);
        
        // 2. Memanggil logika reset password bawaan Laravel
        $response = Password::broker($this->broker)->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                // Closure ini akan dijalankan jika reset berhasil
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        // 3. Mengarahkan kembali dengan pesan sukses atau error
        return $response == Password::PASSWORD_RESET
            ? redirect($this->redirectTo)->with('status', trans($response))
            : back()->withInput($request->only('email'))->withErrors(['email' => trans($response)]);
    }
}
