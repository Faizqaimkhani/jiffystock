<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $type)
    {
      if ($type == 'clearance' )
      {
        if(auth()->guard('clearance_user')->user()->hasVerifiedEmail())
        {
          return $next($request);
        }
      }
      // add buyer and supplier email verification
      if ($type == 'shipment' )
      {
        if(auth()->guard('shipment_user')->user()->hasVerifiedEmail())
        {
          return $next($request);
        }
      }

      return redirect()->route($type.'.verification.notice');

    }
}
