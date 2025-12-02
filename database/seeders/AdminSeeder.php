<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Periksa apakah tabel 'admins' ada sebelum mencoba menyisipkan data
        if (!\Illuminate\Support\Facades\Schema::hasTable('admins')) {
            $this->command->error("Tabel 'admins' tidak ditemukan. Pastikan Anda sudah membuat migrasi untuk tabel admin.");
            return;
        }

        // Hapus akun admin lama (jika ada) untuk menghindari duplikasi
        // Ini juga memastikan password yang rusak dihapus.
        DB::table('admins')->where('username', 'admin')->delete();

        // Menyisipkan akun admin baru dengan password yang sudah di-hash (Bcrypt)
        DB::table('admins')->insert([
            'name' => 'admin1',
            'username' => 'admin',
            'email' => 'admin@ridenusa.com', // Ganti dengan email yang valid
            
            // Password yang akan di-hash adalah 'admin123'
            'password' => Hash::make('admin123'), 
            
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            
            // Jika Anda memiliki kolom lain di tabel 'admins' (seperti 'role', 'phone_number', dll.), 
            // pastikan untuk menambahkannya di sini.
        ]);

        $this->command->info('Admin user \'admin\' berhasil dibuat dengan password: admin123');
    }
}