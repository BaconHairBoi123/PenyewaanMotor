<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotorcycleImage extends Model
{
    use HasFactory;

    protected $fillable = ['motorcycle_id', 'image_path', 'is_primary'];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }
}