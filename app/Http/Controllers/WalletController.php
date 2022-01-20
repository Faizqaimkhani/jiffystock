<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\UserWithdrawRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        // parent::__construct();
        //Do your magic here
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (Auth::user()->usertype != "user") {
                return redirect('home');
            }
            return $next($request);
        });
    }

    public function index()
    {
        $wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $Pendingrequests = userWithdrawRequest::where('status', 0)->get();
        $Approvedrequests = userWithdrawRequest::where('status', 1)->get();
        $Cancelledrequest = userWithdrawRequest::where('status', 2)->get();
        $data = ['wallet' => $wallet,'Pendingrequests'=>$Pendingrequests,'Approvedrequests'=>$Approvedrequests,'Cancelledrequest'=>$Cancelledrequest];

        return view('admin.wallet.index', $data);
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
        //
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

        $user_wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $user_wallet_price = $user_wallet->price + $request->price;
        $user_wallet_deposit = $user_wallet->deposits + $request->price;

        Wallet::where('user_id', Auth::user()->id)->update([
            'price'          => $user_wallet_price,
            'deposits'          => $user_wallet_deposit,
        ]);

        return back();
    }

    public function userWithdrawRequest(Request $request)
    {
        $input = $request->all();
        $user_wallet = Wallet::where('user_id', Auth::user()->id)->first();
        if ($user_wallet->price < $input['price']) {
            return back()->with('message', 'Request Price can not greater than actual Price');
        }

        $request->validate([
            'email'            => 'required|email',
            'price'            => 'required|numeric'
        ]);

        userWithdrawRequest::create([
            'user_id'   => $request->input('user_id'),
            'wallet_id'     => $request->input('wallet_id'),
            'stripe_email'         => $request->input('email'),
            'price'         => $request->input('price'),
        ]);

        $user_wallet = Wallet::where('user_id', Auth::user()->id)->first();
        $user_wallet_price = $user_wallet->price - $request->price;
        $user_wallet_withdraw = $user_wallet->refunds + $request->price;

        Wallet::where('user_id', Auth::user()->id)->update([
            'price'          => $user_wallet_price,
            'refunds'          => $user_wallet_withdraw,
        ]);

        return redirect('/wallet')->with('message', 'Request Inserted Successfully');
    }
}
