<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingAccessory extends Model
{
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function accessory()
    {
        return $this->belongsTo(AdditionalAccessories::class, 'accessory_id');
    }
}
