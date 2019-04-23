<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trip';
    protected $primaryKey = 'trip_no';

    public function bus_route()
    {
        return $this->belongsTo(BusRoute::class, 'route_no', 'route_no');
    }
}
