<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    protected $table = 'motorcycles'; // nama tabel di database

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
    ];
}
