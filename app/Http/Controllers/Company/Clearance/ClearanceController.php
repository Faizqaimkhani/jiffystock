<?php

namespace App\Http\Controllers\Company\Clearance;

use App\Http\Controllers\Controller;
use App\Models\ClearanceService;
use Illuminate\Http\Request;

class ClearanceController extends Controller
{
    public function index()
    {
      $total_services = ClearanceService::where('user_id', auth()->guard('clearance_user')->user()->id)->count();
      return view('company.clearance.dashboard',compact('total_services'));
    }
}
