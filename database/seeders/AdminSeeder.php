<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin; // Import Model Admin Anda
use Illuminate\Support\Facades\Hash; // Import Hash untuk mengenkripsi password

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Masukkan data Admin
        Admin::create([
            'name' => 'admin',
            'username' => 'adminutama', // Username yang akan digunakan untuk login
            'email' => 'admin@rental.com',
            'password' => Hash::make('adminutama'), // Ganti 'password123' dengan password kuat lainnya
        ]);
    }
}