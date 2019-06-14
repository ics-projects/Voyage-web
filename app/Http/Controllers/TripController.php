<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Seat;
use App\Schedule;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trips = NULL;
        $schedules = NULL;

        if ($request->filled(['departure', 'destination', 'date'])) {
            $departure = $request->query('departure');
            $destination = $request->query('destination');
            $date = $request->query('date');

            $schedules = Schedule::where('origin', $departure)
                ->where('destination', $destination)
                ->whereDate('dept_time', '>=', $date)
                ->get();

            return view('trips.index', compact('schedules'));
        }

        return;
    }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Trip $trip)
    {
        $stages = $trip->routes->stages;
        $bus = $trip->bus;

        if ($request->ajax()) {
            $seats = Seat::where('bus', $bus)->get();
            return response()->json(compact('trip', 'stages', 'seats'), 200);
        }
        return view('trips.show', compact('trip', 'stages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
