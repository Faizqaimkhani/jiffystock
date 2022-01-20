<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Advertisement;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAddsController extends Controller
{
    public function __construct()
    {
        // parent::__construct();
        //Do your magic here
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();

            if (Auth::user()->usertype != "admin") {
                return redirect('home');
            }
            return $next($request);
        });
    }

    public function approve($id)
    {   
        $add = Advertisement::find($id);
        $package = AddPackagePrice::where('id', $add->pacakge_id)->first();
        $today = Carbon::now();
        $today = $today->addDay($package->duration_in_days);
        $expire_at = $today;
        Advertisement::where('id', $id)->update([
            'status' => 1,
            "expire_at"=>$expire_at
        ]);   
        return redirect(route('add-show'))->with('message', 'Add is Approved');
    }
    public function reject($id){
        $add = Advertisement::find($id);
        $userWallet=Wallet::find($add->user_id);
        $package = AddPackagePrice::find($add->pacakge_id);
        $userWallet->price +=$package->price;
        $userWallet->save();


        Advertisement::where('id', $id)->update([
            'status' => 2,
        ]);   
        return redirect(route('add-show'))->with('message', 'Add Is Reject');
    }
    public function Addvertisement()
    {
        $adds = Advertisement::all()->reverse();
      
        return view('admin.Frontend.Advertisement.index')->with('adds',$adds );
    }
}
