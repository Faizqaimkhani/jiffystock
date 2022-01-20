<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function restrictedPage()
    {
      if (auth()->guard('clearance_user')->check()) {
        $user = 'clearance_user';
        $route = 'clearance.index';
      }
      if (auth()->guard('shipment_user')->check()) {
        $user = 'shipment_user';
        $route = 'shipment.index';
      }
      return view('company.restricted-area',compact('user','route'));
    }
}
