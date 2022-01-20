<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Notifications\AccountVerificationEmail;
use App\Notifications\AccountRefuteNotification;

class CompanyController extends Controller
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

    public function index()
    {
      $companies = User::with(['countries','company_details'])->where('usertype', 'shipment-user')
                    ->orWhere('usertype', 'clearance-user')
                    ->latest()
                    ->paginate(10);
      return view('admin.companies.index', compact('companies'));
    }

    public function verify($id)
    {
      $user = User::findOrFail($id);
      if($user->badge_verification_status == 1)
      {
        $user->update(['badge_verification_status' => 2]);
        $user->notify(new AccountVerificationEmail);
        return redirect()->back()->with(['message'=> "Account Verified Successfully"]);
      }
      return redirect()->back()->with(['error'=> "Account Could not be Verified"]);
    }
    public function unverify($id)
    {
      $user = User::findOrFail($id);
      if($user->badge_verification_status == 2)
      {
        $user->update(['badge_verification_status' => 1]);
        $user->notify(new AccountRefuteNotification);
        return redirect()->back()->with(['message'=> "Account Unverified Successfully"]);
      }
      return redirect()->back()->with(['error'=> "Account Could not be Verified"]);

    }
}
