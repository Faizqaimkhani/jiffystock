<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckChatUser
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

      if (count($current_user) < 1) {
        return redirect('/');
      }
      if($current_user['user_type'] == 'supplier')
      {
        Auth::shouldUse('web');
      } elseif($current_user['user_type'] == 'shipment') {
        Auth::shouldUse('shipment_user');
      } else{
        Auth::shouldUse($current_user['user_type']);
      }

      return $next($request);
    }
}
