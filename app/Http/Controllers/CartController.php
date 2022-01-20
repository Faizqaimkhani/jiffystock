<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use App\Models\CustomerWallet;
use App\Models\Order_products;
use App\Models\Orders;
use App\Models\Product_category;
use App\Models\Product_images;
use App\Models\ProductOrder;
use App\Models\Products;
use App\Models\Sub_category;
use App\Models\Wallet;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function __construct()
    {
        // parent::__construct();
        //Do your magic here
        // session_start();
    }


    public function index()
    {
        $nav = Product_category::get();
        $sub_nav = Sub_category::get();
        return view('cart.index', compact('nav', 'sub_nav'));
    }

    public function checkout()
    {
        if (!isset(Auth::guard('customer')->user()->id)) {
            return redirect(route('login'));
        }

        $nav = Product_category::get();
        $sub_nav = Sub_category::get();
        $countries = Country::get();
        $wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        return view('cart.checkout', compact('nav', 'sub_nav', 'wallet', 'countries'));
    }

    public function cart()
    {
        return view('cart');
    }
    
    public function addToCart($id)
    {
        $product = Products::find($id);
        if (!$product) {
            abort(404);
        }

        $cart = session()->get('cart');
       
        // if cart not empty then check if this product exist then increment quantity
        if(!empty($cart)){
            foreach($cart as $key=>$value){
                $product_in_cart = Products::find( $value['product_id']);
                if($product->user_id == $product_in_cart->user_id){
                    if (isset($cart[$id])) {
           
                        $cart[$id]['quantity']++;
                        session()->put('cart', $cart);
                        return redirect()->back()->with('success', 'Product added to cart successfully!');
                    }else{
                        $cart[$id] = [
                            "product_id" => $id,
                            "name" => $product->name,
                            "quantity" => 1,
                            "price" => $product->price,
                            "image" => $product->image1
                        ];
                        session()->put('cart', $cart);

                        return redirect()->back()->with('success', 'Product added to cart successfully!');
                    }
                }else{
                   
                    session()->forget('cart');
                    $cart = session()->get('cart');
                    $cart[$id] = [
                        "product_id" => $id,
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image1
                    ];
                    session()->put('cart', $cart);
                   
                     return redirect()->back()->with('success', 'Product added to cart successfully!');
                }
               
            }
          
       
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "product_id" => $id,
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->image1
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function checkout_cities($id)
    {

        $data['status'] = 400;

        $cities = City::where('country_id', $id)->get();

        if ($cities) {
            $data['status'] = 200;
            $data['data'] = $cities;
        }

        return json_encode($data);
    }

    public function submit_order(Request $request)
    {
       
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'contact_no' => 'required',
            'country' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'address' => 'required',
            'total_price' => 'required',
        ]);

        $product = Products::find($request->product_id);

        $order = Orders::create([
            'user_id'           => $product[0]->user_id,
            'customer_id'       => Auth::guard('customer')->user()->id,
            'name'              => $request->full_name,
            'email'             => $request->email,
            'contact_no'        => $request->contact_no,
            'country'           => $request->country,
            'city'              => $request->city,
            'zip_code'          => $request->zip_code,
            'address'           => $request->address,
            'total_price'       => $request->total_price,
            'shipping_price'    => $request->shipping_price,
            'status'            => 'pending'
        ]);
        $products=sizeof($request->product_id);
        for ($i=0; $i <$products ; $i++) { 
            Order_products::create([
                'order_id'            => $order->id,
                'product_id'          => $request->product_id[$i],
                'product_quantity'    => $request->product_quantity[$i],
                'product_price'       => $request->product_price[$i],
            ]);
        }
       

        $customer_wallet = CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->first();
        $customer_wallet_price = $customer_wallet->price - $request->total_price;
        $customer_wallet_buy_products = $customer_wallet->buy_products + $request->total_price;

        CustomerWallet::where('customer_id', Auth::guard('customer')->user()->id)->update([
            'price'          => $customer_wallet_price,
            'buy_products'   => $customer_wallet_buy_products
        ]);

        $user_wallet = Wallet::where('user_id', $product[0]->user_id)->first();
        $user_wallet_price = $user_wallet->price + $request->total_price;
        $user_wallet_sell_products = $user_wallet->sell_products + $request->total_price;

        Wallet::where('user_id', $product[0]->user_id)->update([
            'price'          => $user_wallet_price,
            'sell_products'   => $user_wallet_sell_products
        ]);
        $request->session()->forget('cart');

        return redirect('/')->with('message', 'Order Submitted Successfully');
    }
    public function orderProduct(Request $request){
        $order = new ProductOrder();
        $order->customer_id = Auth::guard('customer')->user()->id;
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->payment= $request->payment ;
        $order->delivery=$request->delivery; 
        $order->quantity=$request->quantity ;
        $order->save();
        return redirect()->back()->with("message","Product Is Ordered");
    }
}
