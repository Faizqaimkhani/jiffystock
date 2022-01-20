<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AdminCreateServiceRequest;
use App\Models\Services;

class ServiceController extends Controller
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
    return view('admin.suppliers.services.create');
  }

  public function store(AdminCreateServiceRequest $request)
  {
    $uploadFile = $request->thumbnail->store('public/sellers/images/');
    $services = Services::create([
      'title' => $request->title,
      'data' => $request->html_data,
      'thumbnail' => $uploadFile,
      'user_id' => $request->user_id,
    ]);
    return redirect()->route('suppliers')->with(['message' => 'Services Added Successfully']);

  }

}
