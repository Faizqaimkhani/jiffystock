<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminNotificationReqeust;
use App\Models\User;
use App\Models\Customers;
use App\Notifications\AdminSendNotificationEmail;

class AdminNotificationController extends Controller
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

  public function create(Request $request)
  {
    return view('admin.notifications.send-notification');
  }

  public function sendNotification(AdminNotificationReqeust $request)
  {
    $user = User::findOrfail($request->user_id);

    $user->notify(new AdminSendNotificationEmail($request->validated()));

    return redirect('/home')->with(["message" => "Email Notification Successfully Sent !"]);
  }

  public function customerCreate()
  {
    return view('admin.notifications.send-customer-notification');
  }


  public function customerSendNotification(AdminNotificationReqeust $request)
  {
    $user = Customers::findOrfail($request->user_id);

    $user->notify(new AdminSendNotificationEmail($request->validated()));

    return redirect('/home')->with(["message" => "Email Notification Successfully Sent !"]);
  }
}
