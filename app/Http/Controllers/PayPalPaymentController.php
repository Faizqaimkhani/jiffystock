<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalPaymentController extends Controller
{
    public function handlePayment(Request $request)
    {
       
        $config = [
            'mode'    => 'live',
            'live' => [
                'client_id'         => 'some-client-id',
                'client_secret'     => 'some-client-secret',
                'app_id'            => 'APP-80W284485P519543T',
            ],
        
            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => 'http://127.0.0.1:8000/payment-success',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        
        $provider = new PayPalClient;
        $provider =  \PayPal::setProvider();
        $provider->setApiCredentials($config);
        $product = [];
        $order = $provider->createOrder([
            "intent"=> "CAPTURE",
            "purchase_units"=> [
                0 => [
                    "amount"=> [
                        "currency_code"=> session()->get('currency')->code,
                        "value"=> $request->Amount,
                    ]
                ]
            ]
          ]);
          if($order['type'] == 'error'){
            return redirect()->back()->with("message",$order['message']);
          }else{
              dd($order);
          }
        
    }
   
    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        dd($request);
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }
  
        dd('Error occured!');
    }
}