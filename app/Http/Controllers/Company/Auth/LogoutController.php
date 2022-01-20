<?php

namespace App\Http\Controllers\Company\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout()
    {
      Session::flush();
      $logout  = Auth::logout();
      return redirect()->route('company.login');
    }

}
