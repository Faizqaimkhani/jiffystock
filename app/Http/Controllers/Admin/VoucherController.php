<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VoucherStoreRequest;
use App\Models\User;
use App\Models\Voucher;
use App\Notifications\SupplierVoucherEmail;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
    public function create()
    {
      return view('admin.suppliers.add-voucher');
    }

    public function store(VoucherStoreRequest $request)
    {
      $voucher = Voucher::create($request->validated());
      $user = User::where('id', $request->user_id)->first();
      if($voucher) {
        $user->notify(new SupplierVoucherEmail());
        return redirect()->route('suppliers')->with(["message" => "Voucher Sent to Supplier Successfully"]);
      }
      return redirect()->route('suppliers')->with(["error" => "Something Went Wrong, Please try again"]);
    }
}
