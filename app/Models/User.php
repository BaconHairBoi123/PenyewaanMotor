<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Tentukan nama tabel jika Eloquent tidak mengikuti konvensi jamak.
     * Hapus baris ini jika Anda tidak menentukannya. 
     * Jika ada, pastikan nilainya adalah 'users'.
     */
    protected $table = 'users';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     * HARUS mencakup semua kolom yang diisi dari form Register.
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        // Kolom sesuai skema tabel Anda
        'address', 
        'phone_number',
        'verification_status',
    ];

    /**
     * Atribut yang harus disembunyikan untuk array.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Atribut yang harus dikonversi ke tipe data asli.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}