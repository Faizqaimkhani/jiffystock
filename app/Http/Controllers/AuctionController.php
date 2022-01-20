<?php

namespace App\Http\Controllers;

use App\Models\Auction;
use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product_category;
use App\Models\Products;
use App\Models\Colors;
use App\Models\Reviews;
use App\Models\Users;
use App\Models\Sub_category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AuctionController extends Controller
{
    public function index()
    {

        if (isset(Auth::guard('customer')->user()->id) || auth('web')->check()) {
            $today = Carbon::now();
            $nav = Product_category::get();
            $sub_nav = Sub_category::get();
            $categories = Product_category::get();
            $products = Auction::select('*')->where('expire_at', '>=', $today)->orderBy('id', 'DESC')->get();
            $category_name = 'All Products';
            // dd($products);
          
            return view('Auction.index', compact('nav', 'sub_nav', 'categories', 'products', 'category_name'));
        } else {
            return redirect(route('login'));
        }
    }

    public function category_products($id)
    {
        if (isset(Auth::guard('customer')->user()->id)) {
            $nav = Product_category::get();
            $sub_nav = Sub_category::get();
            $categories = Product_category::get();
            // $product_category = product_category::where('id', $id)->first();
            // $products = Auction::select('*')->where($product_category->id, $id)->orderBy('id', 'DESC')->get();
            $products = Auction::select('*', 'products.id as p_id', 'product_categories.id as cat_id', 'product_categories.name as cat_name', 'sub_categories.id as sub_cat_id')->leftjoin('products', 'auctions.product_id', '=', 'products.id')->leftjoin('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')->leftjoin('product_categories', 'sub_categories.category_id', '=', 'product_categories.id')->where('product_categories.id', '=', $id)->orderBy('auctions.id', 'DESC')->get();
            $category_name = $products[0]->cat_name;
            // dd($products);
            return view('Auction.index', compact('nav', 'sub_nav', 'categories', 'products', 'category_name'));
        } else {
            return redirect(route('login'));
        }
    }

    public function auctionDetails($id)
    {
        $product = Auction::select('*')->where('product_id', $id)->first();
        $colors = Color::get();
        $nav = Product_category::get();
        $sub_nav = Sub_category::get();
        $reviews = Reviews::where('product_id', $id)->get();
        $review_count = Reviews::where('product_id', $id)->count();
        $total_rating = Reviews::where('product_id', $id)->sum('rating');
        $total_rating = $review_count > 0 ?$total_rating / $review_count:0;
        $total_rating = round($total_rating);
        
        return view('Auction.auctionDetails', compact('nav', 'sub_nav', 'product', 'colors', 'reviews', 'review_count', 'total_rating'));
    }
}
