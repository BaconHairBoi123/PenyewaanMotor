<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'devices';

    protected $fillable = [
        'device_code',
        'device_name',
        'status',
    ];

    /**
     * Relasi: satu device dipasang ke satu motor pada waktu tertentu
     */
    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class, 'device_id');
    }

    /**
     * Relasi: satu device bisa mengirim banyak koordinat/lokasi (log riwayat)
     */
    public function locations()
    {
        return $this->hasMany(Locations::class, 'device_id');
    }
}
