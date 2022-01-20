<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectToCompanyDashboard
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
      if( auth()->guard("shipment_user")->check() ) {
        return redirect()->route('shipment.index');
      }
      if( auth()->guard("clearance_user")->check() ) {
        return redirect()->route('clearance.index');
      }
      return $next($request);
    }
}
