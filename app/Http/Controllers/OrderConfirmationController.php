<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use App\Models\Orders;
use App\Models\Wallet;

use Illuminate\Support\Facades\Auth;

class OrderConfirmationController extends Controller
{
    public function approve($id)
    {   
        if (Auth::user() && Auth::user()->usertype == "user") {
            Orders::where('id', $id)->update([
                'status' => "Accepted",
            ]);   
            $details = [
                'title' => 'Mail from tradersReady.com',
                'body' => 'This is for Confirmation email '
            ];
           
            \Mail::to('mnq.nabeel13@gmail.com')->send(new \App\Mail\OrderMail($details));
            return back()->with('message', 'Order is Approved');
        } 
        return back()->with('message','Your Are Not Authorised');
    }
    public function reject($id){
       
        if (Auth::user() && Auth::user()->usertype == "user") {
            Orders::where('id', $id)->update([
                'status' => "Reject",
            ]);
            $order =Orders::find($id); 
           
            $wallet=Wallet::where('user_id',$order->user_id)->first();
           
            $customerwallet=CustomerWallet::where('customer_id',$order->customer_id)->first();
            $wallet->price -=$order->total_price;
            $wallet->save();
            $customerwallet->price +=$order->total_price;
            $customerwallet->save();
            return back()->with('message', 'Order is Rejected');
        } 
        return back()->with('message','Your Are Not Authorised');
    }
}
