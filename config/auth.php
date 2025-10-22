<?php
// PASTIKAN SEMUA USE STATEMENT ADA DI SINI, DI BAWAH <?php
use App\Models\User; 
use App\Models\Admin;
return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    */

    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards (Tambahkan 'admin' guard di sini)
    |--------------------------------------------------------------------------
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        // Guard Baru untuk Admin
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers (Tambahkan 'admins' provider di sini)
    |--------------------------------------------------------------------------
    */

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            // Model App\Models\User yang sudah dimodifikasi (menunjuk ke tabel 'user')
            'model' => env('AUTH_MODEL', User::class), 
        ],
        
        // Provider Baru untuk Admin
        'admins' => [
            'driver' => 'eloquent',
            'model' => Admin::class, // Model App\Models\Admin (menunjuk ke tabel 'admin')
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords (Tambahkan broker 'admins' di sini)
    |--------------------------------------------------------------------------
    */

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
        
        // Broker Password Reset untuk Admin (opsional)
        'admins' => [
            'provider' => 'admins',
            'table' => env('AUTH_ADMIN_PASSWORD_RESET_TOKEN_TABLE', 'admin_password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Password Confirmation Timeout
    |--------------------------------------------------------------------------
    */

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];