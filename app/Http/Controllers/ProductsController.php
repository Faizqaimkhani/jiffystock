<?php

namespace App\Http\Controllers;

use App\Models\Product_category;
use App\Models\Products;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
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
        return view('admin.Products.index')->with('products', Products::select('*')->orderBy('id', 'DESC')->where('user_id', Auth::id())->get());
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
        return view('admin.Products.add_product', compact('categories', 'colors'));
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
            $request->video->move(storage_path('uploads/Products-Videos'), $video);
        } else {
            $video = "";
        }

        if ($request->image1) {
            $image1 = uniqid() . '-' . $request->name . '.' . $request->image1->extension();
            $request->image1->move(storage_path('uploads/Products-Images'), $image1);
        } else {
            $image1 = "";
        }

        if ($request->image2) {
            $image2 = uniqid() . '-' . $request->name . '.' . $request->image2->extension();
            $request->image2->move(storage_path('uploads/Products-Images'), $image2);
        } else {
            $image2 = "";
        }

        if ($request->image3) {
            $image3 = uniqid() . '-' . $request->name . '.' . $request->image3->extension();
            $request->image3->move(storage_path('uploads/Products-Images'), $image3);
        } else {
            $image3 = "";
        }

        if ($request->image4) {
            $image4 = uniqid() . '-' . $request->name . '.' . $request->image4->extension();
            $request->image4->move(storage_path('uploads/Products-Images'), $image4);
        } else {
            $image4 = "";
        }

        if ($request->image5) {
            $image5 = uniqid() . '-' . $request->name . '.' . $request->image5->extension();
            $request->image5->move(storage_path('uploads/Products-Images'), $image5);
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
        $createProduct =Products::create([
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
            'user_id' => Auth::id(),
            'stock_location' => $request->stock_location,
            'limited_time' => $dateTime,
            'user_id' => Auth::id(),
            'video' => $video,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5
        ]);

        return redirect('/products/share/'.$createProduct->id)->with('message', 'Product Inserted Successfully');
    }

    public function shareProduct($id)
    {
      $product = Products::findOrFail($id);
      return view('admin.Products.share', compact('product'));
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
        $product = Products::select('*')->where('products.id', $id)->first();

        $colors = Color::get();
        $user_all_products = Products::select('*')->where('user_id', Auth::id())->get();
        // dd($user_all_products);

        // foreach ($user_all_products as $key => $value) {
        //     dd($product->id);
        //     $check = "";
        //     if ($value->id == $product->id) {
        //         $check = 1;
        //     }
        // }
        // if ($check == "") {
        //     return redirect('/products');
        // }
        $categories = Product_category::get();

        return view('admin.Products.edit_product', compact('product', 'categories', 'colors'));
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
        $request->validate([
            'name'            => 'required',
            'category'            => 'required',
            'sub_category'            => 'required',
            'brand'            => 'required',
            'average_market_price'            => 'required',
            'price'            => 'required',
            'unit'            => 'required',

            'delivery'=>'required',
            'payment'=>'required',
            'stock_quantity'            => 'required',
            'little_describe'            => 'required',
            'description'            => 'required',
            'video'        => 'mimes:mp4,flv,avi,wmv',
            'image1'        => 'mimes:jpg,png,jpeg|max:5048',
            'image2'        => 'mimes:jpg,png,jpeg|max:5048',
            'image3'        => 'mimes:jpg,png,jpeg|max:5048',
            'image4'        => 'mimes:jpg,png,jpeg|max:5048',
            'image5'        => 'mimes:jpg,png,jpeg|max:5048',
        ]);

        if (!$request->video) {
            $video = $request->old_video;
        } else {
            $video = uniqid() . '-' . $request->name . '.' . $request->video->extension();
            $request->video->move(storage_path('uploads/Products-Videos'), $video);
            $unlink_video = Products::find($id);
            if ($unlink_video->video) {
                @unlink(storage_path("uploads/Products-Videos/" . $unlink_video->video));
            }
        }

        if (!$request->image1) {
            $image1 = $request->old_image1;
        } else {
            $image1 = uniqid() . '-' . $request->name . '.' . $request->image1->extension();
            $request->image1->move(storage_path('uploads/Products-Images'), $image1);
            $image = Products::find($id);
            if ($image->image1) {
                @unlink(storage_path("uploads/Products-Images/" . $image->image1));
            }
        }

        if (!$request->image2) {
            $image2 = $request->old_image2;
        } else {
            $image2 = uniqid() . '-' . $request->name . '.' . $request->image2->extension();
            $request->image2->move(storage_path('uploads/Products-Images'), $image2);
            $image = Products::find($id);
            if ($image->image2) {
                @unlink(storage_path("uploads/Products-Images/" . $image->image2));
            }
        }

        if (!$request->image3) {
            $image3 = $request->old_image3;
        } else {
            $image3 = uniqid() . '-' . $request->name . '.' . $request->image3->extension();
            $request->image3->move(storage_path('uploads/Products-Images'), $image3);
            $image = Products::find($id);
            if ($image->image3) {
                @unlink(storage_path("uploads/Products-Images/" . $image->image3));
            }
        }

        if (!$request->image4) {
            $image4 = $request->old_image4;
        } else {
            $image4 = uniqid() . '-' . $request->name . '.' . $request->image4->extension();
            $request->image4->move(storage_path('uploads/Products-Images'), $image4);
            $image = Products::find($id);
            if ($image->image4) {
                @unlink(storage_path("uploads/Products-Images/" . $image->image4));
            }
        }

        if (!$request->image5) {
            $image5 = $request->old_image5;
        } else {
            $image5 = uniqid() . '-' . $request->name . '.' . $request->image5->extension();
            $request->image5->move(storage_path('uploads/Products-Images'), $image5);
            $image = Products::find($id);
            if ($image->image5) {
                unlink(storage_path("uploads/Products-Images/" . $image->image5));
            }
        }

        $color_array = "";
        if($request->input('color') !== null){
             $color = $request->input('color');
            $color_array = implode(',', $color);
        }
        $payment = json_encode($request->payment);
        $delivery = json_encode($request->delivery);

        Products::where('id', $id)->update([
            'name' => $request->input('name'),
            'sub_category_id' => $request->input('sub_category'),
            'brand' => $request->input('brand'),
            'color' => $color_array,
            'price' => $request->input('price'),
            'unit' => $request->input('unit'),
            'payment'=>$payment,
            'delivery'=>$delivery,
            'average_market_price' => $request->input('average_market_price'),
            'stock_quantity' => $request->input('stock_quantity'),
            'add_durations' => $request->input('add_duration'),
            'little_describe' => $request->input('little_describe'),
            'description' => $request->input('description'),
            'video' => $video,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5
        ]);
        session()->put('product_id', $id);
        session()->put('product_add_duration', $request->input('add_duration'));
        // dd('check');
        return redirect('/products')->with('message', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images = Products::find($id);
        if ($images->video) {
            @unlink(storage_path("uploads/Products-Videos/" . $images->video));
        }
        if ($images->image1) {
            @unlink(storage_path("uploads/Products-Images/" . $images->image1));
        }
        if ($images->image2) {
            @unlink(storage_path("uploads/Products-Images/" . $images->image2));
        }
        if ($images->image3) {
            @unlink(storage_path("uploads/Products-Images/" . $images->image3));
        }
        if ($images->image4) {
            @unlink(storage_path("uploads/Products-Images/" . $images->image4));
        }
        if ($images->image5) {
            @unlink(storage_path("uploads/Products-Images/" . $images->image5));
        }
        $product = Products::where('id', $id);
        $product->delete();
        return redirect('/products')->with('message', 'Product Deleted Successfully');
    }
}
