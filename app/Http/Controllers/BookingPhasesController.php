<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trip;
use App\Stage;
use App\Schedule;
use App\SeatPrice;

class BookingPhasesController extends Controller
{
    public function pickSeat(Request $request)
    {
        $total_price = 0;

        $validated = request()->validate([
            'pick-point' => ['required', 'integer'],
            'drop-point' => ['required', 'integer'],
            'seats' => ['required']
        ]);

        $trip_id = request('trip_id');
        $seats = request('seats');

        $trip = Trip::find($trip_id);

        $total_price = SeatPrice::join('seat', 'seat_price.category', '=', 'seat.seat_category')
            ->whereIn('seat.id', $seats)
            ->sum('price');

        $request->session()->put(
            [
                'trip_id' => $trip_id,
                'schedule' => $trip->scheduleID->id,
                'pick-point' => $validated['pick-point'],
                'drop-point' => $validated['drop-point'],
                'seats' => $seats,
                'total-price' => $total_price
            ]
        );

        $pay_URL = url()->temporarySignedRoute('pay', now()->addMinutes(5));

        return redirect($pay_URL);
    }

    public function pay(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        if (
            $request->session()->has('trip_id') &&
            $request->session()->has('schedule') &&
            $request->session()->has('pick-point') &&
            $request->session()->has('drop-point') &&
            $request->session()->has('seats') &&
            $request->session()->has('total-price')
        ) {
            $pick_point = $request->session()->get('pick-point');
            $drop_point = $request->session()->get('drop-point');
            $schedule = $request->session()->get('schedule');
            $total_price = $request->session()->get('total-price');

            $stages = Stage::find([$pick_point, $drop_point]);
            $departure_time = Schedule::find($schedule)->dept_time;

            return view('pages.pay-page', compact('stages', 'departure_time', 'total_price'));
        } else {
            return redirect('/');
        }
    }
}
