<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\PasswordController; // PENTING: Controller yang sudah kita buat

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| RUTE AUTENTIKASI PUBLIK (User & Admin)
|--------------------------------------------------------------------------
*/

// Rute Register User
Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register']);

// Rute Login & Logout User (Web Guard)
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginUserController::class, 'login']);
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

// Rute Login & Logout Admin (Admin Guard)
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');


/*
|--------------------------------------------------------------------------
| RUTE DASHBOARD (Dilindungi Middleware)
|--------------------------------------------------------------------------
*/

// Dashboard USER (Hanya bisa diakses jika login sebagai user)
Route::middleware('auth:web')->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// Dashboard ADMIN (Hanya bisa diakses jika login sebagai admin)
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


/*
|--------------------------------------------------------------------------
| RUTE PASSWORD RESET (Forgot Password)
|--------------------------------------------------------------------------
| Semua rute ini harus berada di bawah middleware 'guest' 
| agar hanya bisa diakses oleh pengguna yang BELUM login.
*/
Route::middleware('guest')->group(function () {
    
    // 1. Tampilkan formulir lupa password (Input Email)
    Route::get('forgot-password', [
        PasswordController::class, 'showLinkRequestForm'
    ])->name('password.request');

    // 2. Proses permintaan link reset (Mengirim Email)
    Route::post('forgot-password', [
        PasswordController::class, 'sendResetLinkEmail'
    ])->name('password.email');
    
    // 3. Tampilkan formulir reset password (Input Password Baru)
    Route::get('reset-password/{token}', [
        PasswordController::class, 'showResetForm'
    ])->name('password.reset');

    // 4. Proses reset password (Update Password ke DB)
    Route::post('reset-password', [
        PasswordController::class, 'reset'
    ])->name('password.update');
});
