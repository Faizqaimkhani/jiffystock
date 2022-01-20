<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;

use App\Models\Wallet;

class CustomerWalletDepositController extends Controller
{
    public function __construct() {
    
        // $this->middleware('auth:customer');

    }
    //  with braintree
    public function deposit(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $user = auth('customer')->user();

        $nonce = $request->payment_method_nonce;
        $amount = (float) $request->input('amount');

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'customer' => [
                'firstName' => $user->name,
                'lastName' =>  $user->name,
                'email' =>  $user->email,
            ],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            $transaction = $result->transaction;
            $amount = $transaction->amount;

            if($user->wallet){

                $old_depoists = $user->wallet->deposits;
                $old_price = $user->wallet->price;

                $new_deposit = $amount + $old_depoists;
                $new_price = $amount + $old_price;  

                CustomerWallet::where('customer_id',$user->id)->update(['deposits'=> $new_deposit,'price' => $new_price]);
                // dd("updating");

            }else{

                CustomerWallet::create(['customer_id' => $user->id,'deposits' => $amount,'price' => $amount]);
                // dd("creating new wallet");
            }

            return redirect()->back()->with('message','Deposit has been submited');

        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An error occurred with the message: '.$result->message);
        }
    }
}
