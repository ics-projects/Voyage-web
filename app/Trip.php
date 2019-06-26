<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trip';

    public function busID()
    {
        return $this->belongsTo(Bus::class, 'bus');
    }

    public function scheduleID()
    {
        return $this->belongsTo(Schedule::class, 'schedule');
    }

    public function routes()
    {
        return $this->belongsTo(Route::class, 'route');
    }

    public function seatPrice()
    {
        return $this->hasMany(SeatPrice::class, 'trip');
    }
}
