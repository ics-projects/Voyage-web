<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\SeatPrice;
use App\Booking;
use App\Seat;

class ApiMpesaController extends Controller
{
    private $BusinessShortCode = '174379';
    private $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

    public function pay(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }

        $validated = request()->validate([
            'mobile-no' => ['required', 'integer']
        ]);

        $trip_id = $request->input('trip_id');
        $trip = Trip::find($trip_id);
        $seats = $request->input('seats');
        $pick_point = $request->input('pick-point');
        // $drop_point = $request->input('drop-point');
        $mobile_no = $request->input('mobile-no');
        $total_price = SeatPrice::join(
            'seat',
            'seat_price.category',
            '=',
            'seat.seat_category'
        )
            ->whereIn('seat.id', $seats)
            ->sum('price');

        $Amount = $total_price;
        $PartyA = $mobile_no;
        $CheckoutRequestID = $this->stkPush($Amount, $PartyA);

        if ($CheckoutRequestID) {
            $user = auth()->id();
            foreach ($seats as $seat) {
                if ($user) {
                    Booking::create([
                        'user' => $user,
                        'schedule' => $trip->scheduleID->id,
                        'pick_point' => $pick_point,
                        'amount' => $total_price,
                        'confirmed' => false,
                        'seat' => $seat,
                        'checkout_request_id' => $CheckoutRequestID
                    ]);
                    Seat::where('id', $seat)->update(['available' => false]);
                }
            }
            return response()->json("success", 200);
        }
    }

    private function stkPush($Amount, $PartyA)
    {
        $PartyB = $this->BusinessShortCode;
        $PhoneNumber = $PartyA;
        $CallBackURL = 'https://4cd97b8f.ngrok.io/api/mpesa/stkpushcallback';
        $AccountReference = 'Test';
        $TransactionDesc = 'This is a test';
        $Remarks = 'Remarks';

        $TransactionType = 'CustomerPayBillOnline';
        $mpesa = new \Safaricom\Mpesa\Mpesa();
        $stkPushSimulation = $mpesa->STKPushSimulation(
            $this->BusinessShortCode,
            $this->LipaNaMpesaPasskey,
            $TransactionType,
            $Amount,
            $PartyA,
            $PartyB,
            $PhoneNumber,
            $CallBackURL,
            $AccountReference,
            $TransactionDesc,
            $Remarks
        );

        $response = json_decode($stkPushSimulation, true);

        if ($response) {
            if (isset($response["ResponseCode"])) {
                if ($response["ResponseCode"] == 0) {
                    return $response["CheckoutRequestID"];
                }
            }
        }

        return NULL;
    }
}
