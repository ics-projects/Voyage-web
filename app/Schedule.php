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
        return $this->hasOne(Trip::class, 'schedule');
    }

    public function origins()
    {
        return $this->belongsTo(Stage::class, 'origin', 'id');
    }

    public function destinations()
    {
        return $this->belongsTo(Stage::class, 'destination', 'id');
    }

    protected $dates = [
        'created_at',
        'updated_at',
        'dept_time',
        'arrival_time'

    ];
}
