<?php

namespace App\Http\Controllers;

use App\Models\Order_products;
use App\Models\Order;
use App\Models\Group;
use App\Models\Orders;
use App\Models\ProductOrder;
use App\Models\Reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\OrderStoreRequest;

class OrderController extends Controller
{
    public function orders()
    {
        if (Auth::user() && Auth::user()->usertype == "admin") {
            $orders = ProductOrder::get();
            $layout = "dashboard";
            $data = ['orders' => $orders, 'dashboard' => $layout];
            return view('admin.orders.index', $data);
        } else if (Auth::user() && Auth::user()->usertype == "user") {
            $orders = ProductOrder::where('user_id', Auth::id())->latest()->get();
            $layout = "dashboard";
            $data = ['orders' => $orders, 'dashboard' => $layout];
            return view('admin.orders.index', $data);
        } else if (Auth::guard('customer')->user()) {
            $orders = ProductOrder::where('customer_id', Auth::guard('customer')->user()->id)->get();
            $layout = "customer-dashboard";

            $data = ['orders' => $orders, 'dashboard' => $layout];
            return view('admin.orders.index', $data);
        } else {
            return redirect('/');
        }
    }

    public function pending_orders()
    {
        if (isset(Auth::user()->usertype) == "admin") {
            $orders = Orders::where('status', 'pending')->get();
            return view('admin.orders.pending_orders', compact('orders'));
        } else {
            return redirect(route('index'));
        }
    }

    public function order_approve($id)
    {
        if (isset(Auth::user()->usertype) == "admin") {
            Orders::where('id', $id)->update([
                'status'  => 'Approved'
            ]);
            return redirect(route('pending-orders'));
        } else {
            return redirect(route('index'));
        }
    }

    public function order_cancel($id)
    {
        if (isset(Auth::user()->usertype) == "admin") {
            Orders::where('id', $id)->update([
                'status'  => 'Cancel'
            ]);
            return redirect(route('pending-orders'));
        } else {
            return redirect(route('index'));
        }
    }

    public function user_orders()
    {
        if (Auth::user()->usertype != "user") {
            return redirect('/home');
        }
        $orders = Orders::where('user_id', Auth::id())->get();
        $data = ['orders' => $orders];
        return view('admin.orders.index', $data);
    }

    public function customer_orders()
    {
        if (Auth::guard('customer')) {
            return redirect('/home');
        }
        $orders = Orders::where('customer_id', Auth::guard('customer')->user()->id)->get();
        $data = ['orders' => $orders];
        return view('customer.orders.index', $data);
    }

    public function admin_orders()
    {
        if (Auth::user()->usertype != "admin") {
            return redirect('/home');
        }
        $orders = Orders::get();
        $data = ['orders' => $orders];
        return view('admin.orders.index', $data);
    }

    public function check_review($id)
    {
        $order = Orders::where('id', $id)->first();
        $order_products = Order_products::where('order_id', $id)->get();
        $reviews = Reviews::where('order_id', $id)->get();
        if (isset(Auth::user()->usertype) == "admin" || isset(Auth::user()->usertype) == "user") {
            $layout = "dashboard";
            $data = ['reviews' => $reviews, 'order' => $order, 'order_products' => $order_products, 'dashboard' => $layout];
            return view('admin.Orders.Reviews.index', $data);
        }elseif(isset(Auth::guard('customer')->user()->id)){
            $layout = "customer-dashboard";
            $data = ['reviews' => $reviews, 'order' => $order, 'order_products' => $order_products, 'dashboard' => $layout];
            return view('admin.orders.Reviews.index', $data);
        } else {
            return redirect(route('index'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function submit_review(Request $request){
        $request->validate([
            'rating' => 'required',
            'review' => 'required'
        ]);

        Reviews::create([
            'email'       => $request->input('email'),
            'name'        => $request->input('name'),
            'customer_id'    => Auth::guard('customer')->user()->id,
            'product_id'     => $request->input('product_id'),
            'rating'         => $request->input('rating'),
            'review'         => $request->input('review'),
        ]);

        return redirect()->back();
    }


}
