<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // PENTING: Tambahkan ini untuk enkripsi password

class DatabaseSeeder extends Seeder
{
    // Hapus 'use WithoutModelEvents' karena tidak selalu diperlukan

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Panggil Class Seeder untuk Admin
        $this->call([
            AdminSeeder::class,
        ]);
        
        
    }
}
