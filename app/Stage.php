<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stage';

    protected $fillable = ['name'];

    public function scheduleOrigins()
    {
        return $this->hasMany(Schedule::class, 'origin', 'id');
    }

    public function scheduleDestinations()
    {
        return $this->hasMany(Schedule::class, 'destination', 'id');
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stage', 'stage_id', 'route_id');
            // ->withPivot('stages_order');
    }
}
