<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use App\Models\CustomerWithdrawRequests;
use App\Models\UserWithdrawRequest;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\ElseIf_;

class WithdrawRequestController extends Controller
{
    //
    function showCustomerRequest()
    {
        if (Auth::user() && Auth::user()->usertype == "admin") {
            $Pendingrequests = CustomerWithdrawRequests::where('status', 0)->get();
            $Approvedrequests = CustomerWithdrawRequests::where('status', 1)->get();
            $Cancelledrequest = CustomerWithdrawRequests::where('status', 2)->get();
            return view('admin.withdrawrequest.customer')->with(compact('Pendingrequests', 'Approvedrequests','Cancelledrequest'));
        } else {
            return redirect()->back();
        }
    }
    function showSellerRequest()
    {
        if (Auth::user() && Auth::user()->usertype == "admin") {
            $Pendingrequests = UserWithdrawRequest::where('status', 0)->get();
            $Approvedrequests = UserWithdrawRequest::where('status', 1)->get();
            $Cancelledrequest = UserWithdrawRequest::where('status', 2)->get();
            return view('admin.withdrawrequest.seller')->with(compact('Pendingrequests', 'Approvedrequests','Cancelledrequest'));
        } else {
            return redirect()->back();
        }
    }
    function request_approve($role, $id)
    {

        if (Auth::user() && Auth::user()->usertype == "admin") {
            if ($role == "sell") {
                $idd =  base64_decode($id);
                $update = UserWithdrawRequest::where('id', $idd)->update([
                    'status'  => '1'
                ]);
                if ($update) {
                    return back()->with('message', 'Request Approved');
                } else {
                    return back()->withErrors('Something Went Wrong');
                }
            } elseif ($role == "cus") {
                $idd =  base64_decode($id);
                $update = CustomerWithdrawRequests::where('id', $idd)->update([
                    'status'  => '1'
                ]);
                if ($update) {
                    return back()->with('message', 'Request Approved');
                } else {
                    return back()->withErrors('Something Went Wrong');
                }
            } else {
                return back()->with('message', 'Something Went Wrong');
            }
        } else {
            return redirect()->back();
        }
    }
    function request_cancel($role, $id)
    {
        if (Auth::user() && Auth::user()->usertype == "admin") {
            if ($role == "sell") {
                $id =  base64_decode($id);
                $requestTable = UserWithdrawRequest::find($id);
               
                $updateWallet=Wallet::where('user_id',$requestTable->user_id)->first();
                $updateWallet->price +=$requestTable->price;
                $updateWallet->refunds -=$requestTable->price;
                $updateconfirm = $updateWallet->save();
               
                if ($updateconfirm) {
                    $update = UserWithdrawRequest::where('id', $id)->update([
                        'status'  => '2'
                    ]);
                    return back()->with('message', 'Request Approved');
                } else {
                    return back()->withErrors('Something Went Wrong');
                }
            } elseif ($role == "cus") {
                $id =  base64_decode($id);
                $requestTable = CustomerWithdrawRequests::find($id);
               
                $updateWallet=CustomerWallet::where('customer_id',$requestTable->customer_id)->first();
                $updateWallet->price +=$requestTable->price;
                $updateWallet->refunds -=$requestTable->price;
                $updateconfirm = $updateWallet->save();
               
                if ($updateconfirm) {
                    $update = CustomerWithdrawRequests::where('id', $id)->update([
                        'status'  => '2'
                    ]);
                    return back()->with('message', 'Request Approved');
                } else {
                    return back()->withErrors('Something Went Wrong');
                }
                
               
            } else {
                return back()->withErrors('Something Went Wrong');
            }
        } else {
            return redirect()->back();
        }
    }
}
