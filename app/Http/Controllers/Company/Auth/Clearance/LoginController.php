<?php

namespace App\Http\Controllers\Company\Auth\Clearance;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClearanceLoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller
{
    public function login(ClearanceLoginRequest $request)
    {
      $user = User::where('email',$request->clearance_email)->firstOrFail();
      if($user->usertype == 'clearance-user'){
        if(Auth::guard('clearance_user')->attempt(["email" => $request->clearance_email,"password" => $request->clearance_password])) {
          $request->session()->regenerate();
          return redirect()->route('clearance.index');
        }
      }
      return redirect()->route('company.login')->with(['clearance-error' => 'Login failed, Creadential does not match!']);
    }
}
