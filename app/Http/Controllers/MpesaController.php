<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Trip;
use App\Seat;

class MpesaController extends Controller
{
    private $BusinessShortCode = '174379';
    private $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';

    public function pay(Request $request)
    {
        $validated = request()->validate([
            'mobile-no' => ['required', 'integer']
        ]);

        $trip_id = $request->session()->get('trip_id');
        $trip = Trip::find($trip_id);

        $pick_point = $request->session()->get('pick-point');
        $total_price = $request->session()->get('total-price');
        $seats = $request->session()->get('seats');

        $Amount = request('amount');
        $PartyA = request('mobile-no');
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
            return redirect('/');
        }

        $request->session()->flush();
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

    public function stkPushCallback(Request $request)
    {
        $data = $request->json()->all();
        $result_code = $data["Body"]["stkCallback"]["ResultCode"];

        if ($result_code == 0) {
            $CheckoutRequestID = $data["Body"]["stkCallback"]["CheckoutRequestID"];
            Booking::where('checkout_request_id', $CheckoutRequestID)
                ->update(['confirmed' => true]);
        }
    }
}
