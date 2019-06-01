<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class MpesaController extends Controller
{
    private $BusinessShortCode = '174379';
    private $LipaNaMpesaPasskey = 'bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
    private $checkoutRequestID;

    public function stkpush()
    {
        $Amount = request('amount');
        $PartyA = request('mobile-no');
        $PartyB = $this->BusinessShortCode;
        $PhoneNumber = $PartyA;
        $CallBackURL = 'https://5e5aac6e.ngrok.io/mpesa/stkpushcallback';
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
        $this->checkoutRequestID = $response['CheckoutRequestID'];
        // return $stkPushSimulation;
    }

    public function stkPushCallback()
    {
        // Booking::create();
        $mpesa = new \Safaricom\Mpesa\Mpesa();
        $callbackData = $mpesa->getDataFromCallback();
        $response_code = $callbackData['ResponseCode'];
        $result_code = $callbackData['ResultCode'];
        print_r($callbackData);

        if ($response_code == '0' and $result_code == '0') {
            dd($callbackData);
        }
    }
}
