<?php

namespace App\Http\Controllers\Company\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\ProductOrder;
use App\Events\OrderStatusChangedEvent;

class OrderController extends Controller
{
  public function index()
  {
    $orders = ProductOrder::where('shipment_id', auth()->guard('shipment_user')->id())->get();
    return view('company.shipment.orders.index', compact('orders'));
  }

  public function changeStatus(Request $request)
  {
    $order = Orders::findOrFail($request->order_id);
    $product_order = ProductOrder::where('order_id', $order->id)->firstOrFail();
    if($request->status == $order->status) {
      return redirect()->route('shipment.orders')->with(['message' => 'Order Status Successfully Changed']);
    }
    $updateOrder = $order->update(['status' => $request->status]);
    $user_ids = ['customer' => $product_order->customer_id, 'user' => $product_order->shipment_id, 'user' => $product_order->user_id];
    event(new OrderStatusChangedEvent($user_ids,$order->status, $request->status,$product_order->product->name));

    return redirect()->route('shipment.orders')->with(['message' => 'Order Status Successfully Changed']);
  }

  public function status($id)
  {
    $order = Orders::findOrFail($id);
    return view('company.shipment.orders.change-status', compact('order'));
  }
}
