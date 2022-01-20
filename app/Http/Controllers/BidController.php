<?php

namespace App\Http\Controllers;

use App\Models\AdminWallet;
use App\Models\CustomerWallet;
use App\Models\PendingBids;
use App\Models\Products;
use App\Models\User;
// use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submitBid(Request $request)
    {
        if ($request->input('min_bid') > $request->input('bid_price')) {
            $request->validate([
                'min_bid'            => 'required|alpha',
            ], [
                'min_bid.alpha' => 'Bid Price must be greater than Minimum Bid',
            ]);
        }

        $request->validate([
            'bid_price'            => 'required|numeric',
        ]);
		
		 $customer_wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
	
		 $bid_amount = $request->input('bid_price');
		
		 $bidAlreadyExits = PendingBids::where('customer_id', '=', Auth::guard('customer')->user()->id)->where('product_id', '=', $request->input('product_id'))->orderBy('id', 'DESC')->first();
		
        if ($bidAlreadyExits) {
			
			return redirect()->back()->with('danger', 'Your Bid already exits on this product');
			
			// $amountTobeMinusFromWallet =   $bid_amount - $bidAlreadyExits->price;
			
		 //	$customerNewWalletAmount = $customer_wallet->price - $amountTobeMinusFromWallet;
			
			//$bidAlreadyExits->update(['price'=> $bid_amount]);

			 //$customer_wallet_price = $customerNewWalletAmount;
			// $customer_wallet_buy_products = $customer_wallet->buy_products + $amountTobeMinusFromWallet;

			// CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->update([
			//	'price'          => $customer_wallet_price,
			//	'buy_products'   => $customer_wallet_buy_products
		  //	]);
        }
		else{
			
			PendingBids::create([
				'customer_id'    => Auth::guard('customer')->user()->id,
				'auction_id'     => $request->input('auction_id'),
				'product_id'     => $request->input('product_id'),
				'user_id'        => $request->input('user_id'),
				'price'          => $bid_amount,
				'status'         => 'pending'
			]);

			$customer_wallet_price = $customer_wallet->price - $request->bid_price;
			$customer_wallet_buy_products = $customer_wallet->buy_products + $request->bid_price;

			CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->update([
				'price'          => $customer_wallet_price,
				'buy_products'   => $customer_wallet_buy_products
			]);
		}

        return redirect('customer-home')->with('message', 'Your bid has been successfuly submited');
    }

    public function pending_bids()
    {
        if (isset(Auth::user()->usertype) == "user") {
            $pending_bids = pendingBids::where('status', 'pending')->get();
            return view('admin.Bids.pending_bids', compact('pending_bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function all_pending_bids($id)
    {
        if (isset(Auth::user()->usertype) == "user") {
            $pending_bids = pendingBids::where('status', 'pending')->where('auction_id', $id)->get();
            return view('admin.Bids.auction_pending_bids', compact('pending_bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function end_bid($id)
    {
        if (isset(Auth::user()->usertype) == "user") {

            $accept_bids = pendingBids::where('status', 'pending')->where('auction_id', $id)->orderBy('price', 'DESC')->first();

            $user_wallet = AdminWallet::where('user_id', $accept_bids->user_id)->first();
			

            if(!$user_wallet){
                $user_wallet = AdminWallet::create(['user_id'=>$accept_bids->user_id,'price'=>0,'deposit'=>0,'refund'=>0,'sell_product'=>0]);
            }

            $user_product = Products::where('id', $accept_bids->product_id)->first();

            $supplier_percent = 2.5;
            $customer_percent = 1.5;

			$customerWallet = CustomerWallet::where('customer_id',$accept_bids->customer_id)->first();
			
			$bid_price = $accept_bids->price;
            // webiste owner percentage subtracting from product amount
			
			$new_bid_price_forCustomer =  $bid_price * ((100 - $customer_percent) / 100);
			
			$bidPercentforAdminCustomerWallet = $bid_price - $new_bid_price_forCustomer;
			
			$customerWalletNewAmount =  $customerWallet->price - $bidPercentforAdminCustomerWallet;
			
			$customerWallet->update(['price'=>$customerWalletNewAmount]);
			
			// website owner percentage subtracting from customer wallet amount
			$new_bid_price = $bid_price * ((100 - $supplier_percent) / 100);
			
			$bidPercentforAdminSubpplierWallet = $bid_price - $new_bid_price;
			
			$user_wallet_price = $user_wallet->price + $new_bid_price;
           	$user_wallet_sell_products = $user_wallet->sell_products + $new_bid_price;
			
			$total_percentage_amount_for_admin = $bidPercentforAdminSubpplierWallet + $bidPercentforAdminCustomerWallet;
			
            //Add Price in user wallet
            AdminWallet::where('user_id', $accept_bids->user_id)->update([
                'price'             => $user_wallet_price,
                'sell_product'     => $user_wallet_sell_products,
            ]);
            
            PendingBids::where('id', $accept_bids->id)->update([
                'status'    => 'Approved'
            ]);

            $admin = User::where('usertype','=','admin')->first();
            
            $admin_wallet = AdminWallet::where('user_id',$admin->id)->first();


            if(!$admin_wallet){
                $admin_wallet = AdminWallet::create(['user_id'=>$admin->id,'price'=>0,'deposit'=>0,'refund'=>0,'sell_product'=>0]);
            }
 
            $new_admin_wallet_amount = $admin_wallet->price + $total_percentage_amount_for_admin;

            $admin_wallet->update(['price'=>$new_admin_wallet_amount]);

            $reject_bids = pendingBids::where('status', 'pending')->where('auction_id', $id)->where('id', '!=', $accept_bids->id);

            foreach ($reject_bids->get() as $customer) {
                $customer_wallet = CustomerWallet::where('customer_id', $customer->customer_id)->first();
                $customer_wallet_price = $customer_wallet->price + $customer->price;
                $customer_wallet_buy_products = $customer_wallet->buy_products - $customer->price;

                //Add price in rejected bidding customers
                CustomerWallet::where('customer_id', $customer->customer_id)->update([
                    'price'          => $customer_wallet_price,
                    'buy_products'   => $customer_wallet_buy_products
                ]);

                // echo"<pre>";
                // print_r($customer_wallet_price);
            }

            $reject_bids->update([
                'status'    => 'Rejected'
            ]);

            return redirect(route('pending-bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function accept_bid()
    {
        if (isset(Auth::user()->usertype) == "user") {
            $accept_bids = pendingBids::where('status', 'Approved')->get();
            return view('admin.Bids.accept_bids', compact('accept_bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function reject_bid()
    {
        if (isset(Auth::user()->usertype) == "user") {
            $reject_bids = PendingBids::where('status', 'Rejected')->get();
            return view('admin.Bids.reject_bids', compact('reject_bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function all_reject_bids($id)
    {
        if (isset(Auth::user()->usertype) == "user") {
            $rejected_bids = PendingBids::where('status', 'Rejected')->where('auction_id', $id)->get();
            return view('admin.Bids.auction_rejected_bids', compact('rejected_bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function customer_bids()
    {
        if (isset(Auth::guard('customer')->user()->id)) {
            $bids = PendingBids::where('customer_id', Auth::guard('customer')->user()->id)->get();
            return view('admin.Bids.customer_bids', compact('bids'));
        } else {
            return redirect(route('index'));
        }
    }

    public function admin_bids()
    {
        if (isset(Auth::user()->usertype) == "admin") {
            $bids = PendingBids::get();
            return view('admin.Bids.admin_bids', compact('bids'));
        } else {
            return redirect(route('index'));
        }
    }
}
