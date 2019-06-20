<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user');
    }

    public function schedules(){
        return $this->belongsTo(Schedule::class, 'schedule');
    }

    public function pick_points(){
        return $this->belongsTo(Stage::class, 'pick_point');
    }

    public function seats()
    {
        return $this->belongsTo(Seat::class, 'seat');
    }
}
