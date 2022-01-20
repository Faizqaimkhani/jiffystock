<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;

class OrderNotificationController extends Controller
{

    public function __construct()
    {
      $this->middleware(function ($request, $next) {
          if (auth()->user()->usertype != "user") {
              return redirect('home');
          }
          return $next($request);
      });
    }

    public function index(Request $request)
    {
      $order = Orders::where('id', $request->id)->firstOrFail();
      return view('admin.suppliers.order-notification', compact('order'));
    }

    public function sendNotification(Request $request)
    {
      $request->validate([
        'status' => 'numeric|digits_between:1,3'
      ]);
    }
}
