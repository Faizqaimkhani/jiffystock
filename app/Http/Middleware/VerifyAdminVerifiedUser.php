<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAdminVerifiedUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
      if (auth()->guard('customer')->check()) {
        return $next($request);
      }
      if (auth()->user()->usertype == 'admin') {
        return $next($request);
      }
      if (auth()->user()->hasVerifiedEmail()) {
        if(auth()->user()->badge_verification_status === 2)
        {
            return $next($request);
        }
        return redirect()->route('user.restriction');
      }
      return $next($request);
    }
}
