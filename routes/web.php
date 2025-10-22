<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\Auth\RegisterUserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register']);

// Rute Login User
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginUserController::class, 'login']);
Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');

Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

// Dashboard USER (Hanya bisa diakses jika login sebagai user)
Route::middleware('auth:web')->prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    // Tambahkan rute user lainnya di sini
});

// Dashboard ADMIN (Hanya bisa diakses jika login sebagai admin)
Route::middleware('auth:admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    // Tambahkan rute admin lainnya di sini
});