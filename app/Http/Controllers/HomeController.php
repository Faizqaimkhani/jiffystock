<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Product_add;
use App\Models\Advertisement;
use App\Models\Auction;
// use Illuminate\Foundation\Auth\User;
use App\Models\City;
use App\Models\Country;
use App\Models\Customers;
use App\Models\User;
use App\Models\CustomerWithdrawRequests;
use App\Models\Product_category;
use App\Models\ProductOrder;
use App\Models\Products;
use App\Models\UserWithdrawRequest;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->usertype == "admin"){
            $today = Carbon::now();
            $Total_Users = User::where('usertype','user')->get()->count();
            $Total_Customer = Customers::all()->count();
            $total_shipment_users = User::where('usertype', 'shipment-user')->count();
            $total_clearace_users = User::where('usertype', 'clearance-user')->count();
            $Total_products = Products::all()->count();
            $Total_Adds_Product =Product_add::where("expire_at",">=",$today)->count();
            $adverttisemnet=  Advertisement::where("expire_at",">=",$today)->count();
            $Total_Pacakges = AddPackagePrice::all()->count();
            $order = ProductOrder::all()->count();
            $customer_withdraw = CustomerWithdrawRequests::all()->count();
            $user_withdraw = UserWithdrawRequest::all()->count();

            // return view('admin.dashboard')->with(compact(
            return view('new-layouts.dashboard.home')->with(compact(
                                                        "Total_Users",
                                                        "Total_Customer",
                                                        "Total_products",
                                                        "Total_Adds_Product",
                                                        "adverttisemnet",
                                                        "Total_Pacakges",
                                                        "order",
                                                        "total_shipment_users",
                                                        "total_clearace_users",
                                                        "customer_withdraw",
                                                        "user_withdraw"));
        }else if(auth()->user()->usertype == "user"){
            $today = Carbon::now();
            $Total_products = Products::where("user_id",auth()->id())->count();
            $wallet = Wallet::where("user_id",auth()->id())->first();

            $Total_Adds_Product =Product_add::where("expire_at",">=",$today)->where("user_id",auth()->id())->count();
            $adverttisemnet=  Advertisement::where("expire_at",">=",$today)->where("user_id",auth()->id())->count();
            $auction = Auction::where("user_id",auth()->id())->count();
            $orderTotal = ProductOrder::where("user_id",auth()->id())->count();
            $orders =ProductOrder::where("user_id",auth()->id());
            return view('new-layouts.dashboard.home')->with(compact(
                                                          "Total_products",
                                                          "orders",
                                                          "wallet",
                                                          "Total_Adds_Product",
                                                          "adverttisemnet",
                                                          "auction",
                                                          "orderTotal"
                                                        ));
             //return view('admin.dashboardUser')->with(compact("Total_products","orders","wallet","Total_Adds_Product","adverttisemnet","auction","orderTotal"));
        }

    }
     public function suplliers(){
    if(auth()->user()->usertype == "admin"){
        $users = User::where("usertype","user")->orderByDesc('id')->get();
        return view('admin.suppliers.index')->with(compact("users"));

    }
   }
   public function buyyers(){
    if(auth()->user()->usertype == "admin"){
        $users = Customers::all();
        return view('admin.buyyers.index')->with(compact("users"));

    }
   }
    public function setting()
    {

        $item = User::find(auth('web')->id());
        $cats = Product_category::all();
        $cons = Country::all();
        $citys = City::all();
        return view('admin.setting', compact('item', 'cats', 'cons', 'citys'));
    }
    public function settingSave(Request $request, $id)
    {
        $item = User::find($id);
        $item->name = $request->name;
        $item->email = $request->email;
        $item->company = $request->company;
        $item->company_license = $request->company_license;
        $item->country = $request->country;
        $item->contact_number = $request->contact_number;

        $item->city = $request->city;
        $item->save();
        return redirect()->back()->with("success", 'Updated Successfully');
    }



    public function changepass(Request $request,$id){


        $validatedData = $request->validate([
            'old_password' => 'required|max:255',
            'password' => 'required|confirmed',

        ]);
        $user = User::find($id);

        $check_pass = Hash::check($request->old_password, $user->password);

        if($check_pass){
            $user->password = Hash::make($request->password);
            $user->save();

        }else{
            return redirect()->back()->with("successpass",'Old Password Does Not Match');
        }
        return redirect()->back()->with("successpass", 'Updated Successfully');

    }

    public function delete_supllier($id)
    {
        $supplier = User::where('id', $id)->where("usertype", "user")->firstOrFail();
        $supplier->delete();
        return redirect()->route('suppliers')->with('message', 'Supplier deleted Successfully');
    }

    public function delete_buyyer($id)
    {
        $buyyer = Customers::findOrFail($id);
        $buyyer->delete();
        return redirect()->route('buyers')->with('message', 'Buyyer deleted Successfully');
    }


    public function restrictedPage()
    {
      return view('restriction');
    }


}
