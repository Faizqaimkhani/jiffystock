<?php

namespace App\Http\Controllers;

use App\Models\CustomerWallet;
use App\Models\City;
use App\Models\Country;
use App\Models\PendingBids;
use App\Models\ProductOrder;

use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use App\Models\Product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerHomeController extends Controller
{
    
    public function index()
    {
       
        if (!isset(Auth::guard('customer')->user()->id)) {
            return redirect(route('login'));
        }
        $wallet = CustomerWallet::where("customer_id",auth("customer")->id())->first();
        $bids = PendingBids::where('customer_id', Auth::guard('customer')->user()->id)->get()->count();
        $ordertotal =ProductOrder::where("customer_id",Auth::guard('customer')->user()->id)->get()->count();
        $orders=ProductOrder::where("customer_id",Auth::guard('customer')->user()->id)->get();
        return view('customer.dashboard')->with(compact('wallet','bids','ordertotal','orders'));
    }
    public function setting(){
        if (!isset(Auth::guard('customer')->user()->id)) {
            return redirect(route('login'));
        }
        $item = Customers::find(auth('customer')->id());
        $cats = Product_category::all();
        $cons = Country::all();
        $citys = City::all();
        return view('customer.setting',compact('item','cats','cons','citys'));
    }
    public function settingSave(Request $request,$id){
        $item = Customers::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->company = $request->company;
        $item->category_id = $request->category;
        $item->country = $request->country;
        $item->city = $request->city;
        $item->save();
        return redirect()->back()->with("success",'Updated Successfully');
    }
    public function changepass(Request $request,$id){
        

        $validatedData = $request->validate([
            'old_password' => 'required|max:255',
            'password' => 'required|confirmed',
            
        ]);
        $user = Customers::find($id);
       
        $check_pass = Hash::check($request->old_password, $user->password);
    
        if($check_pass){
            $user->password = Hash::make($request->password);
            $user->save();
            
        }else{
            return redirect()->back()->with("successpass",'Old Password Does Not Match');
        }
        return redirect()->back()->with("successpass", 'Updated Successfully');

    }
}
