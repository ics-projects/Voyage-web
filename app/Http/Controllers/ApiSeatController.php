<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seat;

class ApiSeatController extends Controller
{
    public function busId($busId)
    {
        $seats = Seat::where('bus', $busId)->get();

        return response()->json($seats, 200);
    }
}
