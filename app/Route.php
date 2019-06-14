<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $table = 'route';

    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'route_stage', 'stage_id', 'stage_id')
            ->withPivot('stages_order');
    }
}
