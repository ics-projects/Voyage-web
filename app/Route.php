<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'route_stage', 'route_id', 'stage_id');
            // ->withPivot('stages_order');
    }
}
