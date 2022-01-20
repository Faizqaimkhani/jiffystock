<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auction;
use App\Models\Products;

class AuctionProductController extends Controller
{
    public function index(Request $request)
    {
      $products = Auction::when($request->search, function($q) use($request){
                              $q->whereHas('product', function($query) use($request){
                                $query->where('name', 'like', '%'.$request->get('search').'%');
                              });
                            })
                        ->has('user')
                        ->has('product')
                        ->when($request->get('product') == 'less_time', function($q) use($request) {
                          $q->orderBy('expire_at','asc');
                        })
                        ->latest()
                        ->paginate(9)
                        ->withQueryString();
      return view('front.auction-products', compact('products'));
    }
}
