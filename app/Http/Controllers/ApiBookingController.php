<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class ApiBookingController extends Controller
{
    public function index()
    {
        $user = auth()->user()->id;

        $bookings = Booking::with('schedules')
            ->with('pick_points')
            ->where('user', $user)
            ->get();

        $bookings->each(function ($key, $item) {
            $key->destination = $key->schedules->destinations->name;
            $key->origin = $key->pick_points->name;
        });

        return response()->json($bookings, 200);
    }
}
