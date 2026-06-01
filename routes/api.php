<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MotorcycleController;
use App\Http\Controllers\Api\AccessoryController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\BookingController;
use App\Http\Controllers\Api\GpsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// ==========================================
// PUBLIC ROUTES (TIDAK PERLU LOGIN / TOKEN)
// ==========================================

// Autentikasi
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/forgot-password', [AuthController::class, 'forgotPassword']);

// Master Data Katalog
Route::get('/motorcycles', [MotorcycleController::class, 'index']);
Route::get('/motorcycles/services', [MotorcycleController::class, 'services']);
Route::get('/motorcycles/{id}', [MotorcycleController::class, 'show']);
Route::get('/accessories', [AccessoryController::class, 'index']);
Route::get('/locations', [LocationController::class, 'index']);

// GPS API (dari ESP32) - PUBLIC karena ESP32 tidak ada token
Route::post('/gps/update', [GpsController::class, 'updateLocation']);
Route::get('/gps/latest/{device_id}', [GpsController::class, 'getLatestLocation']);
Route::get('/gps/history/{motorcycle_id}', [GpsController::class, 'getMotorcycleHistory']);
Route::post('/gps/pair', [GpsController::class, 'pairDeviceToMotorcycle']);
Route::post('/gps/unpair', [GpsController::class, 'unpairDeviceFromMotorcycle']);

// ==========================================
// PROTECTED ROUTES (WAJIB BAWA TOKEN)
// ==========================================

Route::middleware('auth:sanctum')->group(function () {
    
    // Profil & Logout
    Route::get('/user', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);

    // Transaksi / Pemesanan
    Route::post('/bookings', [BookingController::class, 'checkout']);
    Route::get('/bookings/history', [BookingController::class, 'history']);
    Route::post('/bookings/cancel', [BookingController::class, 'cancel']);

});
