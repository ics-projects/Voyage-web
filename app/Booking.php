<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking';

    protected $guarded = [];

    public function users()
    {
        return $this->belongsTo(User::class, 'user');
    }
}
