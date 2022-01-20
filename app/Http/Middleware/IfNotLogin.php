<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Traits\UserInfo;

class IfNotLogin
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
        $current_user = UserInfo::getCurrentUser();
        if(count($current_user) > 0) {
          return redirect($current_user['profile_url']);
        }
        return $next($request);
    }
}
