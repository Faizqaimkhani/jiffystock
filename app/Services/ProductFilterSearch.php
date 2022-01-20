<?php
namespace App\Services;

use App\Models\Reviews;
use App\Models\Products;

class ProductFilterSearch {

  public static function search($request)
  {
    $products = Products::where("name","LIKE","%{$request->search}%");

      // if ($request->has('supplier') && $request->filled('supplier')) {
      //   if ($request->get('supplier') == 1) {
      //     // $products->user()->latest();
      //   }
      //   if ($request->get('supplier') == 0) {
      //     // $products->withCount('user.reviews')->orderByDesc('user_reviews_count');
      //   }
      // }

    if($request->has('country') && $request->filled('country')) {
      $products->with('user', function($query) use($request) {
          $query->whereHas('countries', function($q) use($request) {
             $q->where('name','LIKE', '%'.$request->input('country')."%");
          });
      });
    }
    if($request->has('type') && $request->filled('type') && $request->input('type') !== 'limited_time_products'){
      $products->where($request->type, 1);
    }

    $searchedResults = $products->whereHas('user')
                                              ->when($request->type == 'limited_time_products',function($q) {
                                                $q->whereNotNull('limited_time')->where('limited_time','>', now());
                                              })
                                              ->when($request->category, function($q) use($request) {
                                              $q->whereHas('sub_category.product_category', function($query) use($request){
                                                $query->where('name', "LIKE", '%'.$request->category.'%');
                                              });
                                              })->when($request->min_price, function($q) use($request){
                                                $q->where('price','>', $request->min_price);
                                              })->when($request->max_price, function($q) use($request){
                                                $q->where('price','<', $request->max_price);
                                              })
                                              ->paginate(9)
                                              ->withQueryString();

    return $searchedResults;

  }
}
