<?php

namespace App\Models;

use Illuminate\Database\Eloquent\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalAccessories extends Model
{
    use HasFactory;

    protected $table = 'additional_accessories';

    protected $fillable = [
        'accessory_name',
        'daily_price',
    ];
}
