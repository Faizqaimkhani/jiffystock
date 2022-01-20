<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfUserNotVerified
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
      if(auth()->check()) {
        if (auth()->user()->hasVerifiedEmail()) {
          return $next($request);
        }
        return redirect('/verify_email');
      }

      if (auth()->guard('customer')->check()) {
        return $next($request);
      }
      return redirect('/login');
    }
}
