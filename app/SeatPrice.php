<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatPrice extends Model
{
    protected $table = 'seat_price';

    public function buses()
    {
        return $this->belongsTo(Bus::class, 'bus');
    }

    public function trips()
    {
        return $this->belongsTo(Trip::class, 'trip');
    }

    public function category()
    {
        return $this->belongsTo(SeatCategory::class, 'seat_category');
    }
}
