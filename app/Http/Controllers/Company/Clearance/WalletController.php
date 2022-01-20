<?php

namespace App\Http\Controllers\Company\Clearance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wallet;
use App\Models\UserWithdrawRequest;
	
class WalletController extends Controller
{
  public function index()
  {
    $wallet = Wallet::where('user_id', auth()->guard('clearance_user')->user()->id)->first();
   $Pendingrequests = UserWithdrawRequest::where('status', 0)->get();
    $Approvedrequests = UserWithdrawRequest::where('status', 1)->get();
    $Cancelledrequest = UserWithdrawRequest::where('status', 2)->get();
    $data = ['wallet' => 		$wallet,'Pendingrequests'=>$Pendingrequests,'Approvedrequests'=>$Approvedrequests,'Cancelledrequest'=>$Cancelledrequest];

    return view('company.clearance.wallet', $data);
  }
}
