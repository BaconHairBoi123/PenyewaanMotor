<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// --- Impor Controller ---
// 1. AUTH CONTROLLERS
use App\Http\Controllers\Auth\LoginUserController;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\LoginAdminController;

// 2. APLIKASI UTAMA (PageController menangani semua halaman statis user)
use App\Http\Controllers\PageController;

// 3. ADMIN CONTROLLERS
use App\Http\Controllers\Admin\ReturnController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\MotorcycleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminAccountController;
use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ImageManagementController;


/*
|--------------------------------------------------------------------------
| A. AUTHENTICATION & HOME ROUTING
|--------------------------------------------------------------------------
| Menangani login/logout user, dan menentukan halaman utama (/).
*/

// Home Halaman Utama (Hanya SATU DEFINISI untuk '/')
Route::get('/', [PageController::class, 'welcome'])->name('welcome');

// User Auth
Route::get('/login', [LoginUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginUserController::class, 'login']);

// Logout (Menggunakan closure Route modern)
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');

Route::get('/register', [RegisterUserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterUserController::class, 'register']);

// Password Reset
Route::middleware('guest')->group(function () {
    Route::get('forgot-password', [PasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forgot-password', [PasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('reset-password', [PasswordController::class, 'reset'])->name('password.update');
});





/*
|--------------------------------------------------------------------------
| C. USER DASHBOARD (Protected)
|--------------------------------------------------------------------------
*/

// Gunakan group dengan nama 'user.' agar otomatis menjadi user.home dan user.profile
Route::middleware('auth:web')->group(function () {
    // Dashboard & Profile
    Route::name('user.')->group(function () {
        Route::get('/home', [PageController::class, 'home'])->name('home');
        Route::get('/profile', [PageController::class, 'profile'])->name('profile');
    });

    // --- HALAMAN YANG SEBELUMNYA PUBLIK (SEKARANG WAJIB LOGIN) ---
    // Halaman Umum
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/services', [PageController::class, 'services'])->name('services');
    Route::get('/service-detail/{id}', [PageController::class, 'serviceDetail'])->name('service.detail');
    Route::get('/faq', [PageController::class, 'faq'])->name('faq');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');

    // Halaman Motorcycles
    Route::get('/motorcycles', [PageController::class, 'motorcycles'])->name('motorcycles.index');
    Route::get('/motorcycles/{id}-{slug?}', [PageController::class, 'showMotorcycle'])->name('motorcycles.show');

    // Booking & Payment
    Route::post('/booking/checkout', [App\Http\Controllers\BookingController::class, 'checkout'])->name('booking.checkout');
    Route::get('/booking/success', [App\Http\Controllers\BookingController::class, 'success'])->name('booking.success');
    Route::get('/booking/history', [App\Http\Controllers\BookingHistoryController::class, 'getHistory'])->name('booking.history');
    
    // Midtrans webhook (server-to-server) and client confirm endpoint
    Route::post('/midtrans/notification', [App\Http\Controllers\MidtransController::class, 'notification'])->name('midtrans.notification');
    Route::post('/payment/confirm-client', [App\Http\Controllers\MidtransController::class, 'clientCallback'])->name('payment.client_confirm');



});

// Group user lainnya (jika ada)    
Route::middleware('auth:web')
    ->prefix('user')
    ->name('user.')
    ->group(function () {

        // Tambahkan rute user protected lainnya di sini (selain home/profile)
    });


/*
|--------------------------------------------------------------------------
| D. ADMIN PANEL & AUTH (Protected)
|--------------------------------------------------------------------------
| Bagian ini dipertahankan sesuai dengan struktur Resource dan Grouping Anda
*/

// Admin Auth
Route::get('/admin/login', [LoginAdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginAdminController::class, 'login']);
Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');


Route::middleware('auth:admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Transactions
    Route::resource('transaksi', TransaksiController::class);

    // Motorcycle (utama)
    Route::resource('motorcycles', MotorcycleController::class);

    // Motorcycle Management (dipakai sidebar kamu)
    Route::resource('motorcycles_Management', MotorcycleController::class);

    // Users
    Route::resource('users', UserController::class);

    // Admin Accounts
    Route::resource('admins', AdminAccountController::class);

    // Personal Account
    Route::get('/account', [AccountController::class, 'index'])->name('account');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');

    // User Verification
    Route::get('/user-verification', [App\Http\Controllers\Admin\UserVerificationController::class, 'index'])->name('user.verification');
    Route::post('/user-verification/{id}/approve', [App\Http\Controllers\Admin\UserVerificationController::class, 'approve'])->name('user.verification.approve');
    Route::post('/user-verification/{id}/reject', [App\Http\Controllers\Admin\UserVerificationController::class, 'reject'])->name('user.verification.reject');

    // Payments
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::post('/payments/{id}/success', [PaymentController::class, 'success'])->name('payments.success');
    Route::post('/payments/{id}/failed', [PaymentController::class, 'failed'])->name('payments.failed');

    // Returns
    Route::get('/returns', [ReturnController::class, 'index'])->name('returns.index');
    Route::post('/returns/store', [ReturnController::class, 'store'])->name('returns.store');

    // Services
    Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
    Route::post('/services/store', [ServiceController::class, 'store'])->name('services.store');

    // Service Types
    // Service Types
    Route::get('/service-types', [App\Http\Controllers\Admin\ServiceTypeController::class, 'index'])
        ->name('service.types.index');

    Route::post('/service-types', [App\Http\Controllers\Admin\ServiceTypeController::class, 'store'])
        ->name('service.types.store');

    Route::delete('/service-types/{id}', [App\Http\Controllers\Admin\ServiceTypeController::class, 'destroy'])
        ->name('service.types.destroy');

    // Delivery Pickup Today
    Route::get('/delivery-pickup-today', [App\Http\Controllers\Admin\DeliveryController::class, 'index'])->name('delivery.today');

    // Accessories
    Route::get('/accessories', [App\Http\Controllers\Admin\AccessoryController::class, 'index'])->name('accessories');
    Route::post('/accessories/store', [App\Http\Controllers\Admin\AccessoryController::class, 'store'])->name('accessories.store');
    Route::put('/accessories/{id}', [App\Http\Controllers\Admin\AccessoryController::class, 'update'])->name('accessories.update');
    Route::delete('/accessories/{id}', [App\Http\Controllers\Admin\AccessoryController::class, 'delete'])->name('accessories.delete');

    // Images Management

    // CUKUP TULIS SEPERTI INI SAJA (Hapus tulisan 'admin/' dan 'admin.')
    Route::get('/images-management', [ImageManagementController::class, 'index'])
        ->name('images_management');
    // Halaman untuk kelola foto motor tertentu
    Route::get('/images-management/{id}', [ImageManagementController::class, 'manage'])
        ->name('images_management.manage');

    // Route untuk hapus foto (nantinya)
    Route::delete('/images-management/delete/{id}', [ImageManagementController::class, 'destroyImage'])
        ->name('images_management.delete');
    Route::post('/images-management/{id}/upload', [ImageManagementController::class, 'upload'])
        ->name('images_management.upload');
});
