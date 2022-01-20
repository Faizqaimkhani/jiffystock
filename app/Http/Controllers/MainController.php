<?php

namespace App\Http\Controllers;

use App\Models\AddPackagePrice;

use App\Models\Advertisement;
use App\Models\Auction;
use App\Models\Color;
use App\Models\Sliders;
use App\Models\Product_category;

use App\Models\CustomerWallet;
use App\Models\Product_add;

use App\Models\Reviews;
use App\Models\Country;
use App\Models\Sub_category;
use App\Models\User;
use App\Models\Follower;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UserInfo;
use App\Models\Products;
use App\Services\ProductFilterSearch;

class MainController extends Controller
{


    public function __construct()
    {
      // app()->useStoragePath( env( 'APP_STORAGE', base_path() . '/storage' ) );
    }


    public function index()
    {
        // if(Auth::guard('customer')){
        //     dd(Auth::guard('customer')->user());
        // }
        $nav = Product_category::get();
        $sub_nav = Sub_category::get();
        $sliders = Sliders::get();
        $today = Carbon::now();
        $AddsModels = Advertisement::where('status', '1')->get();
        $features = Products::where('featured', 1)->get();
        $fast_deals = Products::where('fast_deals', 1)->get();
        $hurry_deals = Products::where('hurry_deals', 1)->get();
        $special_deals = Products::where('special_deals', 1)->get();
        $current_products = Product_add::where('expire_at',">=",$today)->groupBy('product_id')->get();
        $limited_time_products = Products::whereNotNull('limited_time')->where('limited_time','>', now())->limit(4)->latest()->get();
        $products = Products::latest()->get();
        $newArrivals =array();
		
		
        $auctions = Auction::with('product')->where('expire_at', '>=', $today)->whereNotNull('expire_at')->orderBy('id', 'DESC')->get();

        $current_user = UserInfo::getCurrentUser();
        if(count($current_user) < 1) {
          $current_user = array_merge($current_user,['user_id' => null]);
        }

		$approved_bids = [];

        if(Auth::guard('customer')->check()){
            $approved_bids = PendingBids::where('customer_id',Auth::guard('customer')->id)->get();
        }
		
        foreach($current_products as $item){
            if(count($newArrivals) <6){

                $newArrivals[]=Products::where(['id'=>$item->product_id])->first();
            }
        }
        $today = Carbon::now();
        // $featuredProducts = array();
        // foreach ($features as $feature) {

        //     foreach($feature->addvertise as $add){

        //         if (isset($add->expire_at) == true && $add->expire_at >= $today) {
        //            foreach($featuredProducts as $added){
        //                 if($added->id != $feature->id){
        //                     $featuredProducts[] = $feature;
        //                 }
        //            }

        //         }
        //     }

        // }
        $Adds = array();
        foreach ($AddsModels as $AddsModel) {
            if ($AddsModel->expire_at >= $today) {
                $Adds[] = $AddsModel;
            } else {
                $AddsModel->status = 3;
                $AddsModel->save();
            }
        }

        // return view('index', compact('nav', 'sub_nav', 'sliders', 'limited_time_products', 'Adds', 'features','newArrivals','auctions','fast_deals','hurry_deals','special_deals'));
        return view('new-layouts.pages.index', compact('nav', 'sub_nav', 'current_user', 'sliders', 'products', 'limited_time_products', 'Adds', 'features','newArrivals','auctions','fast_deals','hurry_deals','special_deals','approved_bids'));

        // $users = user::where('id', '!=', Auth::user()->id)->get();
        // return view('home', compact('users'));
    }

    public function contactUs()
    {
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        return view('contactUs', compact('nav', 'sub_nav'));
    }

    public function aboutUs()
    {
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        return view('aboutUs', compact('nav', 'sub_nav'));
    }

    public function productDetails($id)
    {
        $product = Products::select('*')->where('id', $id)->whereHas('user')->firstOrFail();
        $colors = Color::get();
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        $reviews = Reviews::where('product_id', $id)->get();
        $review_count = Reviews::where('product_id', $id)->count();
        $total_rating = Reviews::where('product_id', $id)->sum('rating');
        $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
        $total_rating = round($total_rating);
        $other_products = $product->user->products()->where('id', '!==', $product->id)->limit(3)->get(['name']);
        $has_followed = false;
        $current_user = UserInfo::getCurrentUser();
        if(count($current_user) > 0 && $current_user['user_type'] == 'customer')
        {
            $has_followed = Follower::where('user_id', $current_user['user_id'])->where('seller_id', $product->user->id)->exists();
        }
        if(count($current_user) < 1) {
          $current_user = array_merge($current_user,['user_id' => null]);
        }
        if (isset(Auth::guard('customer')->user()->id)) {
            $wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        } else {
            $wallet = "";
        }
        // return view('products.productDetails', compact('nav', 'sub_nav', 'product', 'colors', 'reviews', 'review_count', 'total_rating', 'wallet'));
        return view('new-layouts.pages.product', compact('nav', 'sub_nav', 'product', 'has_followed', 'current_user', 'other_products', 'colors', 'reviews', 'review_count', 'total_rating', 'wallet'));
    }
    public function seller($id)
    {
      $seller = User::where('id', $id)->where('usertype', 'user')->firstOrFail();
      $products = $seller->products()->paginate(6);
      $other_sellers = User::inRandomOrder()->where('usertype','user')
                                ->latest()
                                ->take(8)
                                ->get();

      $current_user = UserInfo::getCurrentUser();
      $followers = Follower::where('seller_id', $seller->id)->count();
      $has_followed = false;
      if(count($current_user) > 0 && $current_user['user_type'] == 'customer')
      {
          $has_followed = Follower::where('user_id', $current_user['user_id'])->where('seller_id', $seller->id)->exists();
      }
      if(count($current_user) < 1) {
        $current_user = array_merge($current_user,['user_id' => null]);
      }
      return view('front.seller', compact('seller', 'current_user', 'products','other_sellers','has_followed','followers'));
    }
    public function auctionDetails($id)
    {
        $product = Auction::with('product')->whereHas('product')->where('id', $id)->firstOrFail();
        $colors = Color::get();
        $reviews = Reviews::where('product_id', $id)->get();
        $review_count = Reviews::where('product_id', $id)->count();
        $total_rating = Reviews::where('product_id', $id)->sum('rating');
        $total_rating = $review_count > 0 ? $total_rating / $review_count : $total_rating;
        $other_products = $product->user->products()->where('id', '!==', $product->id)->limit(3)->get(['name']);
        $total_rating = round($total_rating);
        if (isset(Auth::guard('customer')->user()->id)) {
            $wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        } else {
            $wallet = "";
        }

        $has_followed = false;
        $current_user = UserInfo::getCurrentUser();
        if(count($current_user) > 0 && $current_user['user_type'] == 'customer')
        {
            $has_followed = Follower::where('user_id', $current_user['user_id'])->where('seller_id', $product->user->id)->exists();
        }
        if(count($current_user) < 1) {
          $current_user = array_merge($current_user,['user_id' => null]);
        }
        if (isset(Auth::guard('customer')->user()->id)) {
            $wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        } else {
            $wallet = "";
        }
        // return view('products.productDetails', compact('nav', 'sub_nav', 'product', 'colors', 'reviews', 'review_count', 'total_rating', 'wallet'));
        return view('new-layouts.pages.auction-product', compact('product', 'other_products', 'current_user', 'has_followed', 'colors', 'reviews', 'review_count', 'total_rating', 'wallet'));
    }

    public function blogs()
    {
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        return view('blogs.index', compact('nav', 'sub_nav'));
    }

    public function categoryProducts($id)
    {
        $today = Carbon::now();
        $sub_category = Sub_category::select("*")->where('id', $id)->get();
        // $products = product_add::select('*', 'product_adds.id as add_id')->leftjoin('products', 'product_adds.product_id', '=', 'products.id')->where('sub_category_id', $id)->where('expire_at', '>=', $today)->get();
        $pro = Products::where('sub_category_id', $id)->get();
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        $headerTitle = $sub_category[0]->name;
        $packages =  AddPackagePrice::all();
        $data = array();
        //    foreach($pro as $p){
        //        foreach(){
        //     if(isset($p->addvertise->expire_at) == true && $p->addvertise->expire_at >= $today){
        //         $products[] =$p;
        //     }
        //     }
        // }

        foreach ($packages as $package) {
            foreach ($pro as $p) {
                foreach ($p->addvertise as $pro_adds) {

                    if ($pro_adds->package == $package->id  && isset($pro_adds->expire_at) == true && $pro_adds->expire_at >= $today) {
                        $data[$package->name . " (" . $package->duration_in_days . " Days)"][] = $p;
                    }
                }
            }
        }


        return view('products.index', compact('nav', 'sub_nav', 'sub_category', 'data', 'headerTitle', 'packages'));
    }
    public function SellerProducts($id)
    {
        $today = Carbon::now();
        $user = User::find($id);
        // $products = product_add::select('*', 'product_adds.id as add_id')->leftjoin('products', 'product_adds.product_id', '=', 'products.id')->where('sub_category_id', $id)->where('expire_at', '>=', $today)->get();
        $pro = Products::where('user_id', $id)->get();
        $nav = product_category::get();
        $sub_nav = Sub_category::get();
        $sub_category =  $sub_category = Sub_category::select("*")->where('id', $pro[0]->sub_category_id)->get();;
        $headerTitle = $user->name;
        foreach ($pro as $p) {
            if (isset($p->addvertise->expire_at) == true && $p->addvertise->expire_at >= $today) {
                $products[] = $p;
            }
        }
        return view('products.index', compact('nav', 'sub_nav', 'sub_category', 'products', 'headerTitle'));
    }
    public function search(Request $request)
    {
        $productsmodel = Products::where("name","LIKE","%{$request->search}%")->paginate(9)->withQueryString();
        if($productsmodel->count() == 0){
           $cat = product_category::where("name","LIKE","%{$request->search}%")->get();
           if($cat->count() == 0){

            $subcat = Sub_category::where("name","LIKE","%{$request->search}%")->get();

            if($subcat->count() == 0){
            $products=$productsmodel;
            }else{
                $products = $subcat[0]->products;
            }
           }else{

            $products = $cat[0]->subcategory->products;
           }
        }else{
            $products = $productsmodel;
        }
        $headerTitle = "SEARCH";
        $nav = product_category::get();
        $sub_nav = Sub_category::get();

        $countries = Country::get();

        $maxPrice = Products::max('price');
        $minPrice = Products::min('price');

        $search_results = ProductFilterSearch::search($request);

        $products = $search_results;




        // if(!empty($products)){
        //     $sub_category =  Sub_category::select("*")->where('id', $products[0] ?? $products[0]->sub_category_id)->get();
        //
        // }else{
        //     $sub_category= array();
        // }

       return view('new-layouts.pages.products',compact("products", 'minPrice', 'maxPrice', "headerTitle","nav",'sub_nav','countries'))->with("res");
       return view('products.search',compact("products","headerTitle","nav",'sub_nav','countries'))->with("res");
    }
}
