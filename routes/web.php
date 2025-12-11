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


/*
|--------------------------------------------------------------------------
| A. AUTHENTICATION & HOME ROUTING
|--------------------------------------------------------------------------
| Menangani login/logout user, dan menentukan halaman utama (/).
*/

// Home Halaman Utama (Hanya SATU DEFINISI untuk '/')
Route::get('/', function () {
    if (Auth::check()) {
        // Jika user sudah login, arahkan ke dashboard user
        return redirect()->route('user.home'); 
    }
    // Jika user belum login, tampilkan halaman welcome (public)
    return view('welcome');
})->name('home');

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
| B. PUBLIC STATIC PAGES (Ditangani oleh PageController)
|--------------------------------------------------------------------------
| Semua menu navbar publik (menggantikan semua fungsi anonymous/closure di bagian bawah)
*/

// Halaman Umum
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/error-page', [PageController::class, 'errorPage'])->name('error-page');

// Halaman Cars
Route::get('/cars', [PageController::class, 'cars'])->name('cars.index');
Route::get('/car-list-v1', [PageController::class, 'carListV1'])->name('cars.list-v1');
Route::get('/listing-single', [PageController::class, 'listingSingle'])->name('cars.single');

// Halaman Shop
Route::get('/products', [PageController::class, 'products'])->name('products.index');
Route::get('/product-details', [PageController::class, 'productDetails'])->name('products.details');
Route::get('/cart', [PageController::class, 'cart'])->name('cart');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/wishlist', [PageController::class, 'wishlist'])->name('wishlist');

// Halaman Blog
Route::get('/blog', [PageController::class, 'blog'])->name('blog.index');
Route::get('/blog-standard', [PageController::class, 'blogStandard'])->name('blog.standard');
Route::get('/blog-left-sidebar', [PageController::class, 'blogLeftSidebar'])->name('blog.left-sidebar');
Route::get('/blog-right-sidebar', [PageController::class, 'blogRightSidebar'])->name('blog.right-sidebar');
Route::get('/blog-details', [PageController::class, 'blogDetails'])->name('blog.details');


/*
|--------------------------------------------------------------------------
| C. USER DASHBOARD (Protected)
|--------------------------------------------------------------------------
*/

Route::middleware('auth:web')
    ->prefix('user')
    ->name('user.')
    ->group(function () {
        
        // Pastikan PageController memiliki method 'dashboard' dan 'profile'
        Route::get('/home', [PageController::class, 'home'])->name('home'); 
        Route::get('/profile', [PageController::class, 'profile'])->name('profile'); 
        
        // Tambahkan rute user protected lainnya di sini
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

    // Transaksi
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi.index');
    
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
    Route::get('/service-types', [App\Http\Controllers\Admin\ServiceTypeController::class, 'index'])->name('service.types');
    Route::post('/service-types/store', [App\Http\Controllers\Admin\ServiceTypeController::class, 'store'])->name('service.types.store');
    Route::delete('/service-types/{id}', [App\Http\Controllers\Admin\ServiceTypeController::class, 'destroy'])->name('service.types.delete');
    
    // Delivery Pickup Today
    Route::get('/delivery-pickup-today', [App\Http\Controllers\Admin\DeliveryController::class, 'index'])->name('delivery.today');
    
    // Accessories
    Route::get('/accessories', [App\Http\Controllers\Admin\AccessoryController::class, 'index'])->name('accessories');
    Route::post('/accessories/store', [App\Http\Controllers\Admin\AccessoryController::class, 'store'])->name('accessories.store');
    Route::delete('/accessories/{id}', [App\Http\Controllers\Admin\AccessoryController::class, 'delete'])->name('accessories.delete');
});