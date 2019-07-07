<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Trip;
use App\SeatPrice;
use App\Booking;
use App\Seat;
use Illuminate\Support\Facades\Log;

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
        $seatIds = $request->input('seats');
        $pick_point = $request->input('pick-point');
        // $drop_point = $request->input('drop-point');
        $mobile_no = $request->input('mobile-no');

        $total_price = 0;
        $seats = Seat::whereIn('id', $seatIds)->get();

        $seat_categories = $seats->pluck('seat_category');

        $total_price = SeatPrice::where('trip', $trip_id)
            ->whereIn('category', $seat_categories->all())->sum('price');

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
                        'seat' => $seat->id,
                        'checkout_request_id' => $CheckoutRequestID
                    ]);
                }
            }
            return response()->json("success", 200);
        } else {
            Log::error('Mpesa error' . $CheckoutRequestID);
            return response()->json("Error: request cannot be completed", 400);
        }
    }

    private function stkPush($Amount, $PartyA)
    {
        $PartyB = $this->BusinessShortCode;
        $PhoneNumber = $PartyA;
        $CallBackURL = 'https://voyageweb.tk/api/mpesa/stkpushcallback';
        $AccountReference = 'Test';
        $TransactionDesc = 'This is a test';
        $Remarks = 'Remarks';
        $timestamp = '20' . date("ymdhis");
        $password = base64_encode($this->BusinessShortCode . $this->LipaNaMpesaPasskey . $timestamp);

        $TransactionType = 'CustomerPayBillOnline';
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $token = self::generateSandBoxToken();

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $token));

        $curl_post_data = array(
            'BusinessShortCode' => $this->BusinessShortCode,
            'Password' => $password,
            'Timestamp' => $timestamp,
            'TransactionType' => $TransactionType,
            'Amount' => $Amount,
            'PartyA' => $PartyA,
            'PartyB' => $PartyB,
            'PhoneNumber' => $PhoneNumber,
            'CallBackURL' => $CallBackURL,
            'AccountReference' => $AccountReference,
            'TransactionDesc' => $TransactionType
        );

        $data_string = json_encode($curl_post_data);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_HEADER, false);
        $curl_response = curl_exec($curl);

        $response = json_decode($curl_response, true);

        if ($response) {
            if (isset($response["ResponseCode"])) {
                if ($response["ResponseCode"] == 0) {
                    return $response["CheckoutRequestID"];
                } else {
                    Log::error('Mpesa Error' . $response);
                }
            }
        }

        return NULL;
    }

    /**
     * use this function to generate a sandbox token
     * @return mixed
     */
    private static function generateSandBoxToken()
    {
        $consumer_key = config('mpesa.MPESA_CONSUMER_KEY', '');
        $consumer_secret = config('mpesa.MPESA_CONSUMER_SECRET', '');

        if (!isset($consumer_key) || !isset($consumer_secret)) {
            die("please declare the consumer key and consumer secret as defined in the documentation");
        }
        $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $curl_response = curl_exec($curl);

        return json_decode($curl_response)->access_token;
    }
}
