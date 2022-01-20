<?php

namespace App\Http\Controllers\Company\Clearance;

use App\Http\Controllers\Controller;
use App\Models\ClearanceService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CreateClearanceServiceRequest;
use App\Http\Requests\DeleteRequest;
use App\Http\Requests\UpdateClearanceServiceRequest;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
      $search = $request->input('search');
      $services = ClearanceService::where('user_id', auth()->guard('clearance_user')->user()->id)
                                  ->when($search,function($q) use($search){
                                    $q->where('title','Like','%'.$search.'%');
                                  })
                                  ->paginate(10);

      return view('company.clearance.services.index',compact('services'));
    }

    public function create()
    {
      return view('company.clearance.services.create');
    }

    public function store(CreateClearanceServiceRequest $request)
    {
      $uploadFile = $request->thumbnail->store('public/clearance/images/');
      $service = ClearanceService::create([
        'title' => $request->title,
        'data' => $request->html_data,
        'thumbnail' => $uploadFile,
        'user_id' => auth()->guard('clearance_user')->user()->id,
      ]);
      return redirect()->route('clearance.service.index')->with(['message' => 'Service Added Successfully']);

    }
    public function show($id)
    {
      $clearance = ClearanceService::where("id",$id)->firstOrFail();
      return view('company.clearance.services.show',compact('clearance'));
    }

    public function update(UpdateClearanceServiceRequest $request)
    {
      if($request->hasFile('thumbnail')) {
        $uploadFile = $request->thumbnail->store('public/clearance/images/');
      }
      else {
        $file = ClearanceService::where('id',$request->id)->first(['thumbnail']) ;
        $uploadFile = $file->getRawOriginal("thumbnail");
      }
      $service = ClearanceService::where('id',$request->id)->update([
        'title' => $request->title,
        'data' => $request->html_data,
        'thumbnail' => $uploadFile,
        'user_id' => auth()->guard('clearance_user')->user()->id,
      ]);
      return redirect()->route('clearance.service.index')->with(['message' => 'Service Updated Successfully']);
    }

    public function delete(DeleteRequest $request)
    {
      $clearance = ClearanceService::where('id',$request->id);
      $deleteFile = Storage::delete($clearance->first()->getRawOriginal('thumbnail'));
      $clearance->delete();
      return redirect()->route('clearance.service.index')->with(['message' => 'Service Deleted Successfully']);
    }
}
