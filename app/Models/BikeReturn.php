<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BikeReturn extends Model
{
    use HasFactory;

    protected $table = 'returns';

    protected $fillable = [
        'rental_id',
        'motorcycle_id',
        'user_id',
        'return_date',
        'condition',
        'damage_fee',
        'notes'
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
