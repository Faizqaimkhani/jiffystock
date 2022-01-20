<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Product_category;
use App\Models\Products;

class AdminProductController extends Controller
{

  public function __construct()
  {
      $this->middleware(function ($request, $next) {
          if (auth()->user()->usertype != "admin") {
              return redirect('home');
          }
          return $next($request);
      });
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      $categories = Product_category::get();
      $colors = Color::get();
      return view('admin.suppliers.add-product', compact('categories', 'colors'));
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
          'name'            => 'required',
          'category'            => 'required',
          'sub_category'            => 'required',
          'brand'            => 'required',
          'average_market_price'            => 'required',
          'price'            => 'required',
          'unit'            => 'required',
          'stock_quantity'            => 'required',
          'stock_location'            => 'required',
          'limited_time_only'            => 'sometimes',
          'limited_date' => 'required_if:limited_time_only,on',
          'limited_time' => 'required_if:limited_time_only,on',

          'delivery'=>'required',
          'payment'=>'required',
          'little_describe'            => 'required',
          'description'            => 'required',
          'video'        => 'mimes:mp4,flv,avi,wmv',
          'image1'        => 'mimes:jpg,png,jpeg|max:5048',
          'image2'        => 'mimes:jpg,png,jpeg|max:5048',
          'image3'        => 'mimes:jpg,png,jpeg|max:5048',
          'image4'        => 'mimes:jpg,png,jpeg|max:5048',
          'image5'        => 'mimes:jpg,png,jpeg|max:5048',
      ]);

      if ($request->has('limited_time_only') && !is_null($request->limited_time) || !is_null($request->limited_date)) {
        $dateTime = $request->limited_date .' '. $request->limited_time;
      }
      else {
        $dateTime = null;
      }


      if ($request->video) {
          $video = uniqid() . '-' . $request->name . '.' . $request->video->extension();
          $request->video->move(storage_path('app/public/uploads/Products-Videos'), $video);
      } else {
          $video = "";
      }

      if ($request->image1) {
          $image1 = uniqid() . '-' . $request->name . '.' . $request->image1->extension();
          $request->image1->move(storage_path('app/public/uploads/Products-Images'), $image1);
      } else {
          $image1 = "";
      }

      if ($request->image2) {
          $image2 = uniqid() . '-' . $request->name . '.' . $request->image2->extension();
          $request->image2->move(storage_path('app/public/uploads/Products-Images'), $image2);
      } else {
          $image2 = "";
      }

      if ($request->image3) {
          $image3 = uniqid() . '-' . $request->name . '.' . $request->image3->extension();
          $request->image3->move(storage_path('app/public/uploads/Products-Images'), $image3);
      } else {
          $image3 = "";
      }

      if ($request->image4) {
          $image4 = uniqid() . '-' . $request->name . '.' . $request->image4->extension();
          $request->image4->move(storage_path('app/public/uploads/Products-Images'), $image4);
      } else {
          $image4 = "";
      }

      if ($request->image5) {
          $image5 = uniqid() . '-' . $request->name . '.' . $request->image5->extension();
          $request->image5->move(storage_path('app/public/uploads/Products-Images'), $image5);
      } else {
          $image5 = "";
      }

      $payment = json_encode($request->payment);
      $delivery = json_encode($request->delivery);
      $color_array = "";
      if($request->input('color') !== null){
           $color = $request->input('color');
          $color_array = implode(',', $color);
      }

      Products::create([
          'name' => $request->input('name'),
          'sub_category_id' => $request->input('sub_category'),
          'brand' => $request->input('brand'),
          'color' => $color_array,
          'price' => $request->input('price'),
          'payment'=>$payment,
          'delivery'=>$delivery,
          'unit' => $request->input('unit'),
          'average_market_price' => $request->input('average_market_price'),
          'stock_quantity' => $request->input('stock_quantity'),
          'little_describe' => $request->input('little_describe'),
          'description' => $request->input('description'),
          'user_id' => $request->user_id,
          'stock_location' => $request->stock_location,
          'limited_time' => $dateTime,
          'video' => $video,
          'image1' => $image1,
          'image2' => $image2,
          'image3' => $image3,
          'image4' => $image4,
          'image5' => $image5
      ]);

      return redirect('/suppliers')->with('message', 'Product Added Successfully');
  }

}
