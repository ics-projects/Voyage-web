<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Trip;
use App\Seat;

class BookingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(request());
        // $validated = request()->validate([
        //     'pick-point' => ['required'],
        //     'drop-point' => ['required'],
        // ]);

        // $trip = Trip::find(request('trip_id'));
        // $seats = request('seats');

        // foreach ($seats as $seat) { 
        //     Seat::where('id', $seat)->update(['available' => 0]);
        // }

        // $values = [
        //     'user' => auth()->id(),
        //     'schedule' => $trip->schedule->id,
        //     'pick_point' => $validated['pick-point']
        // ];

        // Booking::create($values);

        // return redirect('/bookingPhase/pay');
    }
}
