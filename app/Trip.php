<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $table = 'trip';

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule');
    }

    public function getRouteAttribute($value)
    {
        return Route::find($value);
    }

    public function getScheduleAttribute($value)
    {
        return Schedule::find($value);
    }
}
