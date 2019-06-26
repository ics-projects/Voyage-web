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
            $departure = $request->input('departure');
            $destination = $request->input('destination');
            $date = $request->input('date');

            $trips = Schedule::with('origins')
                ->with('destinations')
                ->with('trips')
                ->whereDate('dept_time', $date)
                ->whereHas('origins', function ($query) use ($departure) {
                    $query->where('name', $departure);
                })
                ->whereHas('destinations', function ($query) use ($destination) {
                    $query->where('name', $destination);
                })
                ->get();

            $trips->each(function ($key, $item) {
                $key->origin = $key->origins->name;
                $key->destination = $key->destinations->name;
                $key->prices = [
                    'First class' => $key->trips->seatPrice[0]->price,
                    'Second class' => $key->trips->seatPrice[1]->price,
                ];
            });
        } else {
            $trips = Trip::all();
        }

        return response()->json($trips, 200);
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
