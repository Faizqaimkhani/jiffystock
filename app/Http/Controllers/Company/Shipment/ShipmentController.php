<?php

namespace App\Http\Controllers\Company\Shipment;

use App\Http\Controllers\Controller;
use App\Models\ShipmentService;
use Illuminate\Http\Request;

class ShipmentController extends Controller
{
  public function index()
  {
    $total_services = ShipmentService::where('user_id', auth()->guard('shipment_user')->user()->id)->count();
    return view('company.shipment.dashboard', compact('total_services'));
  }


}
