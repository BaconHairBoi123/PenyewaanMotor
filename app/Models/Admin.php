<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;
    
    // PENTING 1: Pastikan menunjuk ke tabel 'admin'
    protected $table = 'admin'; 
    
    protected $primaryKey = 'id_admin';

    // PENTING 2: Pastikan semua kolom yang Anda masukkan di seeder ada di sini
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed', // Laravel 10/11: Pastikan ini ada jika menggunakan Hash::make()
    ];
}