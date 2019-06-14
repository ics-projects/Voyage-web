<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stage';

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'origin', 'id');
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stage', 'route_id', 'stage_id')
            ->withPivot('stages_order');
    }
}
