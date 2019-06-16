<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seat';

    public function buses()
    {
        return $this->belongsTo(Bus::class, 'bus');
    }

    public function seatCategory()
    {
        return $this->belongsTo(SeatCategory::class, 'seat_category');
    }
}
