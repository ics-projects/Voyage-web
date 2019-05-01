<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    protected $table = 'stage';

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'route_stage', 'route', 'stage');
    }
}
