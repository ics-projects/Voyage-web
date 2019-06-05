<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatPrice extends Model
{
    protected $table = 'seat_price';

    public function bus()
    {
        return $this->belongsTo(Bus::class, 'bus');
    }

    public function category()
    {
        return $this->belongsTo(SeatCategory::class, 'seat_category');
    }
}
