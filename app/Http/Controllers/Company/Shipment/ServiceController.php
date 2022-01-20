<?php

namespace App\Http\Controllers\Company\Shipment;

use App\Http\Controllers\Controller;
use App\Models\ShipmentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateShipmentServiceRequest;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\UpdateShipmentServiceRequest;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->input('search');
      $services = ShipmentService::where('user_id', auth()->guard('shipment_user')->user()->id)
                                  ->when($search,function($q) use($search){
                                    $q->where('title','Like','%'.$search.'%');
                                  })
                                  ->paginate(10);
      return view('company.shipment.services.index',compact('services'));
    }

    public function create()
    {
      return view('company.shipment.services.create');
    }

    public function store(CreateShipmentServiceRequest $request)
    {
      $uploadFile = $request->thumbnail->store('public/shipment/images/');
      $service = ShipmentService::create([
        'title' => $request->title,
        'data' => $request->html_data,
        'thumbnail' => $uploadFile,
        'user_id' => auth()->guard('shipment_user')->user()->id,
      ]);
      return redirect()->route('shipment.service.index')->with(['message' => 'Service Added Successfully']);

    }
    public function show($id)
    {
      $shipment = ShipmentService::where("id",$id)->firstOrFail();
      return view('company.shipment.services.show',compact('shipment'));
    }

    public function update(UpdateShipmentServiceRequest $request)
    {
      if($request->hasFile('thumbnail')) {
        $uploadFile = $request->thumbnail->store('public/shipment/images/');
      }
      else {
        $file = ShipmentService::where('id',$request->id)->first(['thumbnail']) ;
        $uploadFile = $file->getRawOriginal("thumbnail");
      }
      $service = ShipmentService::where('id',$request->id)->update([
        'title' => $request->title,
        'data' => $request->html_data,
        'thumbnail' => $uploadFile,
        'user_id' => auth()->guard('shipment_user')->user()->id,
      ]);
      return redirect()->route('shipment.service.index')->with(['message' => 'Service Updated Successfully']);
    }

    public function delete(DeleteRequest $request)
    {
      $shipment = ShipmentService::where('id',$request->id);
      $deleteFile = Storage::delete($shipment->first()->getRawOriginal('thumbnail'));
      $shipment->delete();
      return redirect()->route('shipment.service.index')->with(['message' => 'Service Deleted Successfully']);
    }
}
