<?php

namespace App\Http\Controllers;

use App\Models\AdminWallet;
use App\Models\Wallet;
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

class UserWalletDepositController extends Controller
{
    public function __construct() {
    
        // $this->middleware('auth');

    }
    
    public function deposit(Request $request)
    {
        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);
        
        // $user_type = strtolower($request->input('user_type'));
        // $user = auth($user_type)->user();
        
        if(Auth::guard('shipment_user')->check()){
            $user = Auth::guard('shipment_user')->user();
        }
        elseif(Auth::guard('clearance_user')->check()){
            $user = Auth::guard('clearance_user')->user();
        }
		elseif (Auth::guard('web')->check()) {
            $user = Auth::guard('web')->user();
        }
        // else{
        //     // $user = Auth::guard('clearance_user')->user();
        // }
        // elseif(Auth::guard('clearance_user')->check()){
        //     $user = Auth::guard('clearance_user')->user();
        // }

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

            // dd($request->all());
            $transaction = $result->transaction;
            $amount = $transaction->amount;

            if($user->admin_wallet){

                $old_depoists = $user->admin_wallet->deposit;
                $old_price = $user->admin_wallet->price;

                $new_deposit = $amount + $old_depoists;
                $new_price = $amount + $old_price;
                

                AdminWallet::where('user_id',$user->id)->update(['deposit'=> $new_deposit,'price' => $new_price]);
                 //dd("updating");

            }else{

                AdminWallet::create(['user_id' => $user->id,'deposit' => $amount,'price' => $amount]);
                 //dd("creating new wallet");
            }

            return redirect()->back()->with('success','Deposit has been submited');

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
