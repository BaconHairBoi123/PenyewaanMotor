<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    // Jika tabel `locations` tidak memiliki kolom `created_at`/`updated_at`,
    // matikan fitur timestamps Eloquent agar tidak mencoba mengisi keduanya.
    public $timestamps = false;

    // Menentukan kolom mana saja yang boleh diisi secara massal
    protected $fillable = [
        'latitude',
        'longitude'
    ];

    // Relasi balik ke Rental (opsional, tapi berguna untuk admin nanti)
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}