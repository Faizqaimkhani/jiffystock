<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use App\Models\Message;
use App\Models\Product_add;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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

    public function auctions()
    {
        return view('admin.auction')->with('auctions', Auction::select('*')->orderBy('auctions.id', 'DESC')->get());
    }

    public function product_adds()
    {
        return view('admin.product_add')->with('adds', Product_add::select('*')->leftjoin('add_package_prices', 'product_adds.package', '=', 'add_package_prices.id')->orderBy('product_adds.id', 'DESC')->get());
    }
    public function support(){

        $users = Message::wherehas('fromUser')->where('to_user', Auth()->id())->get()->unique('from_user');
        return view('admin.support', compact('users'));
    }
}
