<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Advertisement;
use App\Models\Products;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Product;

class AdvertisementController extends Controller
{
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
        $adds= Advertisement::where('user_id', Auth::id())->get();
        
        return view('admin.Advertisement.index')->with(compact('adds'));
    }
    public function create()
    {
        $packages = AddPackagePrice::get();
        
        return view('admin.Advertisement.add', compact('packages'));
    }

    public function store(Request $request)
    {
     
        $request->validate([
            'text'=> 'required',
            'package' => 'required',
            'user_id' => 'required',
            'image' => 'mimes:jpg,png,jpeg,jpg|max:5048',
        ]);

        if ($request->image) {
            $image = uniqid() .  '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/uploads/Advertisement-Images'), $image);
        } else {
            $image = "";
        }

        
        $package = AddPackagePrice::where('id', $request->input('package'))->first();
        $wallet = Wallet::where('user_id', Auth::id())->first();
        if($wallet->price<$package->price){
            return back()->withErrors( 'Your Wallet Balance is Less');
        }
        $wallet_price = $wallet->price - $package->price;

        Wallet::where('user_id', Auth::id())->update([
            'price' => $wallet_price
        ]);
        Advertisement::create([
            'text' => $request->input('text'),
            'pacakge_id' => $request->input('package'),
            'user_id'=>auth()->id(),
            'image' => $image,      
            'status'=>0
        ]);

        return redirect('/Advertisement')->with('message', 'Add Inserted Successfully');
    }
    public function edit($id)
    {
        $add = Advertisement::find($id);
        $packages = AddPackagePrice::get();
        return view('admin.Advertisement.edit', compact('add', 'packages'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'text'            => 'required',
            'package_id'            => 'required',
            'image'        => 'mimes:jpg,png,jpeg|max:5048',
        ]);

       

        if (!$request->image) {
            $image = $request->old_image;
        } else {
            $image = uniqid() . '-' . $request->name . '.' . $request->image->extension();
            $request->image->move(storage_path('app/public/uploads/Advertisement-Images'), $image);
            $image = Advertisement::find($id);
            if ($image->image) {
                unlink(storage_path("app/public/uploads/Advertisement-Images/" . $image->image));
            }
        }

        
      
        Advertisement::where('id', $id)->update([
            'text' => $request->input('text'),
            'pacakge_id' => $request->input('package_id'),
            'image' => $image,
            
        ]);
        return redirect('/Advertisement')->with('message', 'Add Updated Successfully');
    }
    public function destroy($id)
    {
        $images = Advertisement::find($id);
       
        if ($images->image) {
            unlink(storage_path("app/public/uploads/Advertisement-Images/" . $images->image));
        }
       
        $product = Advertisement::where('id', $id);
        $product->delete();
        return redirect('/Advertisement')->with('message', 'Product Deleted Successfully');
    }
    
}
