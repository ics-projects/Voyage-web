<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';

    public function seats()
    {
        return $this->hasMany(Seat::class, 'bus');
    }
}
