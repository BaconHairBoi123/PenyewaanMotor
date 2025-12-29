<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MotorcycleService extends Model
{
    protected $table = 'motorcycle_services';

    protected $fillable = [
        'motorcycle_id',
        'service_date',
        'kilometer',
    ];

    public function motorcycle()
    {
        return $this->belongsTo(Motorcycle::class, 'motorcycle_id');
    }
}
