<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UserInfo;
use App\Models\User;
use App\Notifications\SendNotificationEmail;
use App\Http\Requests\SendEmailRequest;

class SendEmailController extends Controller
{

  public function __construct()
  {
    $this->middleware(function($request,$next) {
      $current_user = UserInfo::getCurrentUser();
      if(in_array($current_user['user_type'],['shipment', 'clearance','supplier']))
      {
        return $next($request);
      }
      return abort(404);
    });
  }
    public function index()
    {
      return view('new-layouts.dashboard.send-mail');
    }
    public function shipment_index()
    {
      return view('company.shipment-send-mail');
    }
    public function clearance_index()
    {
      return view('company.clearance-send-mail');
    }

    public function send(SendEmailRequest $request)
    {
      $user = User::where('email', $request->email)->first();
      if(!$user)
      {
        return redirect()->back()->with(["error" => "Customer with this email does not Exist !"]);
      }

      $user->notify(new SendNotificationEmail($request->validated()));

      return redirect()->back()->with(["message" => "Email Notification Successfully Sent !"]);
    }
}
