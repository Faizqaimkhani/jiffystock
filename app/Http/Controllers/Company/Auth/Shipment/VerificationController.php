<?php

namespace App\Http\Controllers\Company\Auth\Shipment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EmailVerificationNotification;
use App\Models\User;
use App\Events\EmailVerifiedEvent;

class VerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:shipment_user');
      $this->middleware('signed')->only('verify');
      $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
      return $this->user()->hasVerifiedEmail()
                         ? redirect()
                          ->route('shipment.index')
                         : view('company.default-dashboard', [
                             'route' => 'shipment.index',
                             'user' => 'shipment_user',
                             'resend' => 'shipment.verification.resend',
                          ]);
    }

    public function verify(Request $request)
    {
      $user = User::where('email', $request->email)->first();
      $hash = $request->route('hash');

      if( hash_equals(sha1($user->email),$hash) ){
        $user->email_verified_at = now();
        $user->save();
        event(new EmailVerifiedEvent($user));
      }
      // add what if the email does not verifies with message
      return redirect()->route('shipment.index');
    }


    public function resend(Request $request)
    {
      if ( $this->user()->hasVerifiedEmail()) {
          return redirect()->route('shipment.index');
      }
      $this->user()->notify(new EmailVerificationNotification('shipment.verification.verify'));
      return back()->with('resent', 'Verification link sent!');
    }

    private function user()
    {
      return auth()->guard('shipment_user')->user();
    }

}
