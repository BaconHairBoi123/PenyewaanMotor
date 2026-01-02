<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MotorcycleService;
use App\Models\MotorcycleImage;

class Motorcycle extends Model
{
    protected $table = 'motorcycles';

    protected $fillable = [
        'category',
        'brand',
        'type',
        'cc',
        'fuel_configuration',
        'status',
        'description',
        'image_path',
        'last_service_date',
        'price',
        'license_plate',
        'transmission',
    ];

    /**
     * Relasi: satu motor punya banyak riwayat service.
     */
    public function services()
    {
        return $this->hasMany(MotorcycleService::class, 'motorcycle_id');
    }
    

    /**
     * Relasi: ambil riwayat service terakhir (kilometer terbaru).
     */
    public function lastService()
    {
        return $this->hasOne(MotorcycleService::class, 'motorcycle_id')->latest();
    }
    public function images()
    {
        return $this->hasMany(MotorcycleImage::class, 'motorcycle_id');
    }
   
}
