<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TripPassenger extends Model
{
    protected $table = 'trip_passenger';
    protected $guarded = [];

    // Temporary
    protected $attributes = [
        'seat_no' => 0,
    ];
}
