<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShipmentUserAuthentication
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
      if(auth()->guard('shipment_user')->check()){
        return $next($request);
      }
      return redirect('/company/register');
    }
}
