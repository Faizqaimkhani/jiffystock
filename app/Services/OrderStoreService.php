<?php
namespace App\Services;


use App\Models\User;
use App\Models\Orders;
use App\Models\Products;
use App\Models\GroupUser;
use App\Models\Customers;
use Illuminate\Support\Str;
use App\Models\ProductOrder;
use App\Models\Order_products;

class OrderStoreService {

  public static function order($product, $total_price, $request)
  {
    $users = GroupUser::where('group_id', $request->group_id)
                        ->whereHasMorph('user', 'App\Models\User')
                            ->orWhereHasMorph('user', 'App\Models\Customers')
                              ->get();

    foreach ($users as $item) {
      if (Str::endsWith($item->user_type, 'User')) {
        $shipment = User::where('id', $item->user_id)->where('usertype','shipment-user')->first(['id']);
      }
      if (Str::endsWith($item->user_type, 'Customers')) {
        $customer = Customers::where('id', $item->user_id)->first(['id']);
      }
    }

    $order = Orders::create([
      'name' => $request->name,
      'email' => $request->email,
      'order_number' => substr(md5($request->email),0,6),
      'contact_no' => $request->contact_no,
      'country' => $request->country,
      'city' => $request->city,
      'zip_code' => $request->zip_code,
      'address' => $request->address,
      'product_quantity' => $request->product_quantity,
      'shipping_price' => $request->shipping_price,
      'total_price' => $total_price,
      'status' => 'pending',
      'user_id' => auth()->guard('web')->id(),
      'customer_id' => $customer->id,
    ]);

    $order_products = Order_products::create([
      'order_id' => $order->id,
      'product_id' => $product->product_id,
      'product_quantity' => $order->product_quantity,
      'product_price' => $product->product->price,
      'shipment_id' => $shipment->id,
    ]);

    $product_order = ProductOrder::create([
      'order_id' => $order->id,
      'product_id' => $product->product_id,
      'user_id' => auth()->guard('web')->id(),
      'product_price' => $product->product->price,
      'customer_id' => $customer->id,
      'shipment_id' => $shipment->id,
      'delivery' => 'door step',
      'payment' => 'cash on delivery',
      'quantity' => $order->product_quantity,
    ]);

    return true;
  }

}
