<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Trip;
use App\Seat;
use Illuminate\Support\Facades\Log;
use Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerBooking;
use Google_Client;

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
        $PartyA = request('countrycode') . request('mobile-no');
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

            $request->session()->forget([
                'trip_id', 'schedule',
                'pick-point', 'drop-point', 'seats', 'total-price'
            ]);

            Session::flash('status', 'Order was successful, please check your phone to pay for the order to be confirmed');
            return redirect('/');
        } else {
            Log::error('Mpesa error' . $CheckoutRequestID);
        }

        $request->session()->forget([
            'trip_id', 'schedule',
            'pick-point', 'drop-point', 'seats', 'total-price'
        ]);
        Session::flash('status', 'Oops, something went wrong, please try again');
        return redirect('/');
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

        // $mpesa = new \Safaricom\Mpesa\Mpesa();
        // $stkPushSimulation = $mpesa->STKPushSimulation(
        //     $this->BusinessShortCode,
        //     $this->LipaNaMpesaPasskey,
        //     $TransactionType,
        //     $Amount,
        //     $PartyA,
        //     $PartyB,
        //     $PhoneNumber,
        //     $CallBackURL,
        //     $AccountReference,
        //     $TransactionDesc,
        //     $Remarks
        // );

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

    public function stkPushCallback(Request $request)
    {
        $data = $request->json()->all();
        $result_code = $data["Body"]["stkCallback"]["ResultCode"];

        if ($result_code == 0) {
            $CheckoutRequestID = $data["Body"]["stkCallback"]["CheckoutRequestID"];
            $bookings = Booking::where('checkout_request_id', $CheckoutRequestID);
            $bookings->update(['confirmed' => true]);

            $user_email = $bookings->get()->first()->users->email;
            $fcm_token = $bookings->get()->first()->users->fcm_token;
            Mail::to($user_email)->queue(new CustomerBooking($bookings->get()));
            self::sendFcmNotification($fcm_token);

            return response(200);
        }
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

    private function sendFcmNotification($registrationToken)
    {
        $project = config('fcm.FCM_PROJECT_ID', '');
        $json_file_path = config('fcm.FCM_GOOGLE_SERVICES_JSON_FILE_PATH', '');
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . $json_file_path);

        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/firebase.messaging']);

        $http_client = $client->authorize();

        $message = array(
            "message" => array(
                "token" => $registrationToken,
                "notification" => array(
                    "title" => "Booking confirmed",
                    "body" => "Your booking has been confirmed"
                ),
                "data" => array(
                    "Booking" => "Confirmed booking"
                )
            )
        );

        $response = $http_client
            ->post(
                "https://fcm.googleapis.com/v1/projects/{$project}/messages:send",
                ['json' => $message]
            );

        $status_code = $response->getStatusCode();
        if ($status_code != 200) {
            Log::error('Fcm Error' . $response->getBody()->getContents());
        } else {
            return;
        }
    }
}
