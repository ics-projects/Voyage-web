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
        $user_id = auth()->id();

        if ($request->filled(['pick-point', 'drop-point', 'trip_id', 'seats'])) {
            $trip_id = $request->input('trip_id');
            $seatIds = $request->input('seats');
            $pick_point = $request->input('pick-point');
            $drop_point = $request->input('drop-point');

            $trip = Trip::find($trip_id);
            $schedule_id = $trip->scheduleID->id;

            $total_price = 0;
            $selected_seats = Seat::whereIn('id', $seatIds)
                ->where('available', true);

            $seats = $selected_seats->get();
            if ($seats->count() > 0) {
                $selected_seats->update(['available' => false]);

                $seat_categories = $seats->pluck('seat_category');

                $total_price = SeatPrice::where('trip', $trip_id)
                    ->whereIn('category', $seat_categories->all())->sum('price');

                $stages = Stage::find([$pick_point, $drop_point]);
                $time = $trip->time;

                $booking_time_period = now()->addMinutes(5);
                $pay_URL = url()->temporarySignedRoute('api.pay', $booking_time_period);

                ClearSeats::dispatch($user_id, $schedule_id, $pick_point, $seats->pluck('id'))
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
                return response()->json('Error: Seats unavailable', 400);
            }
        } else {
            return response()->json('Error', 400);
        }
    }
}
