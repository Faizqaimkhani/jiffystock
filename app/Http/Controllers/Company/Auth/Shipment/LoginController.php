<?php

namespace App\Http\Controllers\Company\Auth\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ShipmentLoginRequest;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(ShipmentLoginRequest $request)
    {
      $user = User::where('email',$request->shipment_email)->firstOrFail();
      if($user->usertype == 'shipment-user'){
        if(Auth::guard('shipment_user')->attempt(["email" => $request->shipment_email,"password" => $request->shipment_password])) {
          $request->session()->regenerate();
          return redirect()->route('shipment.index');
        }
      }
      return redirect()->route('company.login')->with(['shipment-error' => 'Login failed, Creadential does not match!']);
    }
}
