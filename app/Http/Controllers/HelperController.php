<?php

namespace App\Http\Controllers;


use App\Models\Sub_category;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Models\City;



class HelperController extends Controller
{
    //
    public function all_products()
    {
        return view('admin.Products.all_products')->with('products', Products::select('*')->orderBy('id', 'DESC')->get());
    }
    public function featured(Request $request)
    {
        $product = Products::find($request->productid);
        $product->featured = $request->featured;
        $product->save();
        $data['status'] = 200;
        if ($request->featured == 1) {
            $data['message'] = "Product Added To Featured Products SuccessFully";
        } else {
            $data['message'] = "Product Removed From Featured Products SuccessFully";
        }

        return $data;
    }

    public function cities($id)
    {

        $data['status'] = 400;

        $cities = City::where('country_id', $id)->get();

        if ($cities) {
            $data['status'] = 200;
            $data['data'] = $cities;
        }

        return json_encode($data);
    }

    public function sub_categories($id)
    {

        $data['status'] = 400;

        $sub_categories = Sub_category::where('category_id', $id)->get();

        if ($sub_categories) {
            $data['status'] = 200;
            $data['data'] = $sub_categories;
        }

        return json_encode($data);
    }

    public function user_products($id)
    {

        $data['status'] = 400;

        $products = Products::where('user_id', $id)->get();

        if ($products) {
            $data['status'] = 200;
            $data['data'] = $products;
        }

        return json_encode($data);
    }

    public function regisMail()
    {
        $details = [
            'title' => 'Mail from Traders Ready Stock',
            'body' => 'This is for testing email using smtp'
        ];
        \Mail::to('omnixofttechagency@gmail.com')->send(new \App\Mail\MyTestMail($details));
        dd("Email is Sent.");
    }
}
