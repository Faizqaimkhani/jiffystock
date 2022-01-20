<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UserInfo;
use App\Models\User;
use App\Models\Follower;
use App\Http\Requests\FollowRequest;

class FollowerController extends Controller
{


  public function __construct()
  {

    $this->middleware(function ($request, $next)
    {
      $current_user = UserInfo::getCurrentUser();

      if(count($current_user) < 1)
      {
        return redirect('/login');
      }
      else
      {
        if ($current_user['user_type'] == 'customer') {
          return $next($request);
        }
        return redirect()->back()->with(['danger' => 'You Cannot Follow Sellers']);
      }
    });
  }

  public function store(FollowRequest $request)
  {
    $current_user = UserInfo::getCurrentUser();
    $user = User::where('id', $request->id)->where('usertype', 'user')->firstOrFail();

    $check_if_followed_previously = Follower::where('user_id', $current_user['user_id'])->where('seller_id', $request->id)->exists();
    if ($check_if_followed_previously) {
      return redirect()->back()->with(['message' => 'You have Followed This Seller Already']);
    }
    if($current_user['user_id'] == $request->id){
      return redirect()->back()->with(['message' => 'You Cannot Follow Yourself']);
    }

    $follow = Follower::create([
      'user_id' => $current_user['user_id'],
      'seller_id' => $request->id,
    ]);
    return redirect()->back()->with(['message' => 'Seller Followed Successfully']);
  }

  public function destroy(FollowRequest $request)
  {
    $current_user = UserInfo::getCurrentUser();
    $user = User::where('id', $request->id)->where('usertype', 'user')->firstOrFail();

    $check_if_is_followed = Follower::where('user_id', $current_user['user_id'])->where('seller_id', $request->id)->exists();
    if ($check_if_is_followed) {
      $unfollow = Follower::where('user_id', $current_user['user_id'])
                            ->where('seller_id', $request->id)
                            ->delete([
                                'user_id' => $current_user['user_id'],
                                'seller_id' => $request->id,
                              ]);
      return redirect()->back()->with(['message' => 'Seller Unfollowed Successfully']);
    }
    return redirect()->back()->with(['message' => 'You have to Follow This Seller to Unfollow']);
  }
}
