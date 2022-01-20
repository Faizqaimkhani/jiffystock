<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Report;
use App\Models\Products;
use App\Models\ReportImage;

class ReportController extends Controller
{

  public function __construct()
  {
    $this->middleware(function ($request, $next) {
        if (auth()->user()->usertype != "admin") {
            return redirect('/login');
        }
        return $next($request);
    });
  }
  public function index()
  {
    $reports = Report::latest()->paginate(10);
    return view('admin.reports.index', compact('reports'));
  }

  public function report_proof($id)
  {
    Report::findOrFail($id);
    $images = ReportImage::where('report_id',$id)->get();
    return view('admin.reports.proof', compact('images'));
  }

  public function terminate(Request $request)
  {
    $report = Report::findOrFail($request->id);
    if($report->type == 'product') {
      Products::where('id', $report->product_id)->delete();
    }
    if($report->type == 'supplier') {
      $product = Products::where('id', $report->product_id)->first();
      User::where('id', $product->user_id)->delete();
    }
    $report->delete();
    return redirect()->back()->with(['message' => 'Termination Successful']);
  }
}
