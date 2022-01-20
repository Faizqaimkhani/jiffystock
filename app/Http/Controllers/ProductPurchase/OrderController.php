<?php

namespace App\Http\Controllers\ProductPurchase;

use App\Http\Controllers\Controller;
use App\Services\OrderStoreService;
use App\Http\Requests\OrderStoreRequest;
use App\Models\Country;
use App\Models\GroupUser;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{
  public function create($id)
  {
    Group::findOrFail($id);
    $countries = Country::latest()->get();
    $users = GroupUser::where('group_id', $id)->whereHasMorph('user', 'App\Models\User')->get();

    foreach ($users as $item) {
      if (Str::endsWith($item->user_type, 'User')) {
        $shipment = User::where('id', $item->user_id)->where('usertype','shipment-user')->exists();
      }
    }
    if(!$shipment) {
      return redirect()->back()->with(['message' => "You first have to add shipment !"]);
    }
    return view('admin.orders.create', compact('countries'));
  }

  public function store(OrderStoreRequest $request)
  {
    $product = Group::with('product')->where('id', $request->group_id)->firstOrFail();

    $total_price = $request->shipping_price + ($product->product->price * $request->product_quantity);

    $placeOrder = OrderStoreService::order($product,$total_price,$request);
    if($placeOrder) {
      return redirect()->route('orders')->with(['message' => 'Order Placed Successfully']);
    }
    return redirect()->route('orders')->with(['danger' => 'Something went wrong']);
  }
}
