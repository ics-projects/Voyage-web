<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stage;

class Schedule extends Model
{
    protected $table = 'schedule';

    public function origin()
    {
        return $this->belongsTo(Stage::class, 'origin');
    }

    public function destination()
    {
        return $this->belongsTo(Stage::class, 'destination');
    }

    public function getOriginAttribute($value)
    {
        return Stage::find($value);
    }

    public function getDestinationAttribute($value)
    {
        return Stage::find($value);
    }
}
