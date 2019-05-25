<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trip;
use App\Stage;
use App\Schedule;

class BookingPhasesController extends Controller
{
    public function pickSeat(Request $request)
    {
        $validated = request()->validate([
            'pick-point' => ['required'],
            'drop-point' => ['required'],
        ]);

        $trip_id = request('trip_id');
        $trip = Trip::find($trip_id);

        $seats = request('seats');

        // foreach ($seats as $seat) {
        //     Seat::where('id', $seat)->update(['available' => 0]);
        // }

        $request->session()->put(
            [
                'trip_id' => $trip_id,
                'schedule' => $trip->schedule->id,
                'pick-point' => $validated['pick-point'],
                'drop-point' => $validated['drop-point'],
                'seats' => $seats
            ]
        );

        return redirect('/bookingPhase/pay');
    }

    public function pay(Request $request)
    {
        // dd(request()->session());
        if (
            $request->session()->has('trip_id') &&
            $request->session()->has('schedule') &&
            $request->session()->has('pick-point') &&
            $request->session()->has('drop-point') &&
            $request->session()->has('seats')
        ) {
            $pick_point = $request->session()->get('pick-point');
            $drop_point = $request->session()->get('drop-point');
            $schedule = $request->session()->get('schedule');

            $stages = Stage::find([$pick_point, $drop_point]);
            $departure_time = Schedule::find($schedule)->dept_time;

            return view('pages.pay-page', compact('stages', 'departure_time'));
        } else {
            return redirect('/home');
        }
    }
}
