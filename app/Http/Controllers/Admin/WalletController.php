<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Models\AdminWallet;
use App\Models\UserWithdrawRequest;
use Illuminate\Http\Request;

class WalletController extends Controller
{
  public function __construct()
  {
    $this->middleware(function ($request, $next) {
        if (auth()->user()->usertype == "user") {
            return redirect('home');
        }
        return $next($request);
    });
  }

  public function index()
  {
    $wallet = AdminWallet::first();

    $Pendingrequests = UserWithdrawRequest::where('status', 0)->get();
    $Approvedrequests = UserWithdrawRequest::where('status', 1)->get();
    $Cancelledrequest = UserWithdrawRequest::where('status', 2)->get();
    $data = ['wallet' => $wallet,
            'Pendingrequests'=>$Pendingrequests,
            'Approvedrequests'=>$Approvedrequests,
            'Cancelledrequest'=>$Cancelledrequest];

    return view('admin.admin-wallet.index', $data);
  }

  public function create()
  {
    return view('admin.admin-wallet.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'price' => 'required|numeric|min:1',
    ]);
    $wallet = AdminWallet::where('user_id',auth()->id());

    if($wallet->exists()){
      $wallet->update([
        'price' => ($wallet->first()->price + $request->price)
      ]);
    } else {
      $add_wallet = AdminWallet::where('user_id',auth()->id())->create([
        'price' => $request->price,
        'user_id' => auth()->id(),
      ]);
    }
    return redirect()->route('admin.wallet')->with(["message" => "Money Added to Admin's Wallet"]);
  }
}
