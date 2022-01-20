<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Country;
use App\Models\ShipmentService;
use App\Models\ClearanceService;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function getShipmentCompanies(Request $request)
    {
      $shipment_companies = User::where('name', 'like', '%'.$request->get('search').'%')
                                ->where('usertype','shipment-user')
                                ->when($request->get('country'),function($q) use($request) {
                                  $q->whereHas('countries', function($c) use($request){
                                    $c->where('name',$request->get("country"));
                                  });
                                })
                                ->when($request->get('shipment') == 'most', function($q) {
                                  $q->withCount('shipment_services')
                                  ->orderByDesc('shipment_services_count');
                                })
                                ->latest()
                                ->paginate(9);
      $premium_shipment_companies = User::where('usertype','shipment-user')->whereHas('advertisements')->limit(3)->get();
      $countries = Country::get();
      return view('company.shipment.index', compact('shipment_companies', 'premium_shipment_companies','countries'));
    }

    public function getClearanceAgencies(Request $request)
    {
      $clearance_agencies = User::where('name', 'like', '%'.$request->get('search').'%')
                                  ->where('usertype','clearance-user')
                                  ->when($request->get('country'),function($q) use($request) {
                                    $q->whereHas('countries', function($c) use($request){
                                      $c->where('name',$request->get("country"));
                                    });
                                  })
                                  ->when($request->get('clearance') == 'most', function($q) {
                                    $q->withCount('clearance_services')
                                    ->orderByDesc('clearance_services_count');
                                  })
                                  ->latest()
                                  ->paginate(9);
      $premium_clearance_agencies = User::where('usertype','clearance-user')->whereHas('advertisements')->limit(3)->get();
      $countries = Country::get();
      return view('company.clearance.index', compact('clearance_agencies','premium_clearance_agencies','countries'));
    }

    public function getShipmentServices($id,Request $request)
    {
      $shipment_services = ShipmentService::where('title', 'like', '%'.$request->get('search').'%')
                          ->where('user_id', $id)->latest()->paginate(9);
      return view('company.shipment.services',compact('shipment_services'));
    }

    public function getClearanceServices($id)
    {
      $clearance_services = ClearanceService::where('user_id', $id)->latest()->paginate(9);
      return view('company.clearance.services', compact('clearance_services'));
    }

    public function showClearanceService($clearance_id, $id)
    {
      $service = ClearanceService::where('user_id', $clearance_id)->where('id',$id)->first();
      return view('company.clearance.show-service', compact('service'));
    }

    public function showShipmentService($shipment_id, $id)
    {
      $service = ShipmentService::where('user_id', $shipment_id)->where('id', $id)->first();
      return view('company.shipment.show-service', compact('service'));
    }
}
