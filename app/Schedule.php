<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stage;
use App\Trip;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function trips()
    {
        return $this->hasMany(Trip::class, 'schedule');
    }

    public function originID()
    {
        return $this->belongsTo(Stage::class, 'origin', 'id');
    }

    public function destinationID()
    {
        return $this->belongsTo(Stage::class, 'destination', 'id');
    }
}
