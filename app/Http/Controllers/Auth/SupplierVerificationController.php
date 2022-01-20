<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Events\EmailVerifiedEvent;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class SupplierVerificationController extends Controller
{
  public function verify(EmailVerificationRequest $request) {
      $request->fulfill();
      event(new EmailVerifiedEvent($request->user()));

      return redirect('/home');
  }

  public function resend(Request $request)
  {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
  }
}
