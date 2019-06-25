<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\Seat;
use App\Schedule;
use App\Bus;

class ApiTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $trips = NULL;

        if ($request->filled(['departure', 'destination', 'date'])) {
            $departure = $request->query('departure');
            $destination = $request->query('destination');
            $date = $request->query('date');

            $trips = Schedule::with('trips')->where('origins.name', $departure)
                ->where('destinations.name', $destination)->get();
        } else {
            $trips = Trip::all();
        }

        return response()->json([
            'success' => true,
            'data' => $trips
        ], 200);
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
    public function show($id)
    {
        $trip = Trip::find($id);

        if (!$trip) {
            return response()->json([
                'success' => false,
                'message' => 'No trips found'
            ], 404);
        }

        $stages = $trip->routes->stages;
        $bus = $trip->bus;
        $seats = Seat::where('bus', $bus)->get();
        return response()->json(compact('trip', 'stages', 'seats'), 200);
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
