<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Product_add;
use App\Models\Products;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductAddController extends Controller
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
        // $adds = product_add::select('*')->where('product_adds.user_id', Auth::id())->orderBy('id', 'DESC')->get();
        // $adds->name =  products::select('name')->where('id', $adds->product_id)->first();
        // $adds->package = AddPackagePrice::select('name')->where('id', $adds->package);

        return view('admin.ProductAdd.index')->with('adds', Product_add::select('product_adds.*', 'add_package_prices.name as package_name')->leftjoin('add_package_prices', 'product_adds.package', '=', 'add_package_prices.id')->where('product_adds.user_id', Auth::id())->orderBy('product_adds.id', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Products::where('user_id', Auth::id())->get();
        $packages = AddPackagePrice::get();
        return view('admin.ProductAdd.add_product_add', compact('products', 'packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'            => 'required',
            'package'            => 'required',
        ]);

        $package = AddPackagePrice::where('id', $request->input('package'))->first();
        $wallet = Wallet::where('user_id', Auth::id())->first();
        if($wallet->price<$package->price){
            return back()->with('message', 'Your Wallet Amount is Less');
        }

        $today = Carbon::now();
        $today = $today->addDay($package->duration_in_days);
        $expire_at = $today;

        // die($expire_at);
        Product_add::create([
            'user_id'         => Auth::id(),
            'product_id'         => $request->input('product_id'),
            'package'         => $request->input('package'),
            'expire_at'         => $expire_at
        ]);



        $wallet_price = $wallet->price - $package->price;

        Wallet::where('user_id', Auth::id())->update([
            'price' => $wallet_price
        ]);

        return redirect('/product-add')->with('message', 'Add Inserted Successfully');
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
}
