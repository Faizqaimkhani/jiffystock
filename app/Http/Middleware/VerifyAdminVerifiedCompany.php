<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyAdminVerifiedCompany
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
      if($type == 'shipment')
      {
        if(auth()->guard('shipment_user')->user()->badge_verification_status === 2)
        {
            return $next($request);
        }
      }
      if($type == 'clearance')
      {
        if(auth()->guard('clearance_user')->user()->badge_verification_status === 2)
        {
          return $next($request);
        }
      }

      return redirect()->route($type.'.features.restriction');
    }
}
