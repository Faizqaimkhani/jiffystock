<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use App\Models\Sub_category;


class PayWithWalletController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        //Do your magic here
        $this->middleware('auth');
        // $this->middleware(function ($request, $next) {
        //     $this->user = Auth::user();

        //     if (Auth::user()->usertype != "admin") {
        //         return redirect('home');
        //     }
        //     return $next($request);
        // });
    }

    public function checkout()
    {
        $nav = Product_category::get();
        $sub_nav = Sub_category::get();
        return view('cart.checkout', compact('nav', 'sub_nav'));
    }
}
