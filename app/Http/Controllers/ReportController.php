<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Traits\UserInfo;
use App\Models\User;
use App\Models\Report;
use App\Models\ReportImage;
use App\Models\Products;
use App\Http\Requests\ReportRequest;

class ReportController extends Controller
{

    public function __construct()
    {
      $this->middleware(function ($request, $next)
      {
        $current_user = UserInfo::getCurrentUser();

        if(count($current_user) < 1)
        {
          return redirect('/login');
        }
        else
        {
          return $next($request);
        }
      });
    }

    public function store(ReportRequest $request)
    {
      $current_user = UserInfo::getCurrentUser();
      $product_report = Products::findOrFail($request->product_id);
      $check_if_already_reported = Report::where('product_id', $request->product_id)
                                          ->where('type', $request->type)
                                            ->where('user_id', $current_user['user_id'])
                                                ->exists();
      if($check_if_already_reported) {
        return redirect()->route('product-details',$request->product_id)->with(['message' => 'You have Already Reported this product']);
      }

      $report = Report::create([
        'title' => $request->title,
        'description' => $request->description,
        'type' => $request->type,
        'product_id' => $product_report->id,
        'user_id' => $current_user['user_id'],
      ]);


      foreach ($request->file('screenshots') as $imagefile) {
       $image = new ReportImage;
       $path = $imagefile->store('public/report/images/');
       $image->image = $path;
       $image->report_id = $report->id;
       $image->save();
      }
      return redirect()->route('product-details',$request->product_id)->with(['message' => 'Successfully Reported this product']);
    }


}
