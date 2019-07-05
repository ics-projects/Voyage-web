<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\SeatPrice;
use App\Stage;
use App\Seat;
use App\Jobs\ClearSeats;

class ApiBookingPhasesController extends Controller
{
    public function pickSeat(Request $request)
    {
        $total_price = 0;

        // dd($request->input());
        if ($request->filled(['pick-point', 'drop-point', 'trip_id', 'seats'])) {
            $trip_id = $request->input('trip_id');
            $trip = Trip::find($trip_id);
            $seatIds = $request->input('seats');
            // $schedule = $trip->scheduleID->id;
            $pick_point = $request->input('pick-point');
            $drop_point = $request->input('drop-point');

            $total_price = SeatPrice::join(
                'seat',
                'seat_price.category',
                '=',
                'seat.seat_category'
            )
                ->whereIn('seat.id', $seatIds)
                ->sum('price');

            $stages = Stage::find([$pick_point, $drop_point]);
            $time = $trip->time;
            Seat::whereIn('id', $seatIds)
                ->update(['available' => false]);

            $seats = Seat::find($seatIds);

            $booking_time_period = now()->addMinutes(5);
            $pay_URL = url()->temporarySignedRoute('api.pay', $booking_time_period);
            ClearSeats::dispatch($seatIds)
                ->delay($booking_time_period);

            return response()->json(compact(
                'trip_id',
                'time',
                'stages',
                'seats',
                'total_price',
                'pay_URL'
            ), 200);
        } else {
            return response()->json('Error', 400);
        }
    }

    // public function pay(Request $request)
    // {
    //     if (!$request->hasValidSignature()) {
    //         abort(401);
    //     }

    //     redirect()->route();
    // }
}
