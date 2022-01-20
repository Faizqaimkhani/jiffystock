<?php

namespace App\Http\Controllers\Company\Auth\Clearance;

use App\Notifications\EmailVerificationNotification;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Events\EmailVerifiedEvent;
use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth:clearance_user');
      $this->middleware('signed')->only('verify');
      $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
      return $this->user()->hasVerifiedEmail()
                         ? redirect()
                          ->route('clearance.index')
                         : view('company.default-dashboard', [
                             'route' => 'clearance.index',
                             'user' => 'clearance_user',
                             'resend' => 'clearance.verification.resend',
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
      return redirect()->route('clearance.index');
    }


    public function resend(Request $request)
    {
      if ( $this->user()->hasVerifiedEmail()) {
          return redirect()->route('clearance.index');
      }
      $this->user()->notify(new EmailVerificationNotification('clearance.verification.verify'));
      return back()->with('resent', 'Verification link sent!');
    }

    private function user()
    {
      return auth()->guard('clearance_user')->user();
    }

}
