<?php

namespace App\Models; // <-- Hanya satu kali

use Illuminate\Database\Eloquent\Factories\HasFactory; // Jika Anda menggunakan factory
use Illuminate\Notifications\Notifiable; // Jika Anda menggunakan notifikasi
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // Tambahkan ini jika Anda ingin menggunakan Factory/Notifiable

    protected $table = 'user'; // Menunjuk ke tabel 'user'

    protected $primaryKey = 'id_user'; // Primary key Anda

    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'alamat',
        'no_tlpn',
        'verifikasi',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed', 
    ];
}