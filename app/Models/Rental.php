<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $fillable = [
        'user_id',
        'motorcycle_id',
        'accessory_id',
        'location_id',
        'start_date',
        'return_date',
        'rental_proof_path',
        'delivery_type',
        'delivery_address'
    ];
    public function location()
    {
        return $this->belongsTo(Locations::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function returns()
    {
        return $this->hasOne(BikeReturn::class);
    }
}
