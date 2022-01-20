<?php

namespace App\Http\Controllers\ProductPurchase;

use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Products;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  public function store(Request $request)
  {
    $product = Products::with('user')->where('id', $request->product_id)->firstOrFail();
    $group = Group::create(['name' => $product->name, 'product_id' => $request->product_id]);
    auth()->guard('customer')->user()->groups()->create(['group_id' => $group->id]);

    auth()->guard('customer')->user()->conversations()->create([
      'group_id' => $group->id,
      'message' => auth()->guard('customer')->user()->name.", Started this chat",
    ]);
    $product->user->groups()->create(['group_id' => $group->id]);
    return redirect()->route('customer.chat');
  }
}
