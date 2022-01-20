<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClearanceUserAuthentication
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
      if(auth()->guard('clearance_user')->check()){
        return $next($request);
      }
      return redirect()->route('company.login');
    }
}
