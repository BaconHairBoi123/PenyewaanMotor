<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    use HasFactory;

    // Sekarang timestamps diaktifkan untuk mencatat KAPAN koordinat dikirim
    public $timestamps = true;

    // Menentukan kolom mana saja yang boleh diisi secara massal
    protected $fillable = [
        'device_id',
        'latitude',
        'longitude'
    ];

    // Relasi balik ke Rental (opsional, tapi berguna untuk admin nanti)
    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    /**
     * Relasi: satu lokasi/koordinat dikirim oleh satu device
     */
    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }
}