<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use App\Models\CustomerWithdrawRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class CustomerWalletController extends Controller
{

    public function index()
    {
        $wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        if(!isset($wallet)){
            $wallet = new CustomerWallet();
            $wallet->customer_id = auth('customer')->id();
            $wallet->price = 0 ;
            $wallet->deposits = 0 ;
            $wallet->refunds = 0 ;
            $wallet->sell_products = 0 ;
            $wallet->buy_products = 0 ;
            $wallet->save();
                
    }
        $Pendingrequests = CustomerWithdrawRequests::where('status', 0)->get();
        $Approvedrequests = CustomerWithdrawRequests::where('status', 1)->get();
        $Cancelledrequest = CustomerWithdrawRequests::where('status', 2)->get();
        $data = ['wallet' => $wallet,'Pendingrequests'=>$Pendingrequests,'Approvedrequests'=>$Approvedrequests,'Cancelledrequest'=>$Cancelledrequest];
        return view('customer.wallet.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      
    }   
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function depositInWallet(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount" => 100 * $request->price,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        $customer_wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        $customer_wallet_price = $customer_wallet->price + $request->price;
        $customer_wallet_deposit = $customer_wallet->deposits + $request->price;

        CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->update([
            'price'          => $customer_wallet_price,
            'deposits'          => $customer_wallet_deposit,
        ]);

        return back()->with('message', 'Payment has been successfully processed.');
    }

    public function customerWithdrawRequest(Request $request)
    {
        $input = $request->all();
        $customer_wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        if ($customer_wallet->price < $input['price']) {
            return back()->with('message', 'Request Price can not greater than actual Price');
        }

        $request->validate([
            'email'            => 'required|email',
            'price'            => 'required|numeric'
        ]);

        CustomerWithdrawRequests::create([
            'customer_id'   => $request->input('customer_id'),
            'wallet_id'     => $request->input('wallet_id'),
            'stripe_email'         => $request->input('email'),
            'price'         => $request->input('price'),
        ]);

        $customer_wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        $customer_wallet_price = $customer_wallet->price - $request->price;
        $customer_wallet_withdraw = $customer_wallet->refunds + $request->price;

        CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->update([
            'price'          => $customer_wallet_price,
            'refunds'          => $customer_wallet_withdraw,
        ]);

        return redirect('/customer-wallet')->with('message', 'Request Inserted Successfully');
    }
}
