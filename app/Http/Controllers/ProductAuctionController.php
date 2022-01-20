<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;
use App\Models\Auction;
use App\Models\Products;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProductAuctionController extends Controller
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
        return view('admin.Auction.index')->with('auctions', Auction::select('auctions.*', 'add_package_prices.name as package_name')->leftjoin('add_package_prices', 'auctions.package', '=', 'add_package_prices.id')->where('auctions.user_id', Auth::id())->get());
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
        return view('admin.Auction.add_auction', compact('products', 'packages'));
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
            'quantity'            => 'required',
            'min_bid'            => 'required',
            'package'            => 'required',
        ]);

        $package = AddPackagePrice::where('id', $request->input('package'))->first();

        $today = Carbon::now();
        $today = $today->addDay($package->duration_in_days);
        $expire_at = $today;

        // die($expire_at);
        Auction::create([
            'user_id'         => Auth::id(),
            'product_id'         => $request->input('product_id'),
            'quantity'         => $request->input('quantity'),
            'min_bid'         => $request->input('min_bid'),
            'package'         => $request->input('package'),
            'expire_at'         => $expire_at
        ]);

        $wallet = Wallet::where('user_id', Auth::id())->first();

        $wallet_price = $wallet->price - $package->price;
        
        Wallet::where('user_id', Auth::id())->update([
            'price' => $wallet_price
        ]);

        return redirect('/product-auction')->with('message', 'Auction Inserted Successfully');
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
