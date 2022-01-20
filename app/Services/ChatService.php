<?php
namespace App\Services;

use App\Models\Reviews;
use App\Models\Products;
use App\Models\User;
use App\Models\Customers;
use App\Models\GroupUser;
use Illuminate\Support\Str;

class ChatService {

  public static function customer($group_id, $user_id)
  {
    $user = Customers::findOrFail($user_id);
    return self::getConversation($group_id,$user);
  }

  public static function otherUsers($group_id, $user_id)
  {
    $user = User::findOrFail($user_id);
    return self::getConversation($group_id,$user);
  }

  public static function getConversation($group_id,$user)
  {
    $group = $user->groups()->where('group_id', $group_id)->firstOrFail();
    $members = self::members($group_id);
    $conversation = $group->group->conversations()->get();
    return $conversation;
  }

  public static function members($group_id)
  {
    $get_members = GroupUser::where('group_id', $group_id)
                            ->orWhereHasMorph('user', 'App\Models\Customers')
                              ->whereHasMorph('user', 'App\Models\User')
                                ->groupBy('user_id')
                                  ->get(['user_id','user_type']);
    $members = $get_members->transform(function($item, $key){
      if (Str::endsWith($item->user_type, 'User')) {
        $item = User::where('id', $item->user_id)->first(['name']);
      }
      if (Str::endsWith($item->user_type, 'Customers')) {
        $item = Customers::where('id', $item->user_id)->first(['name']);
      }
      return $item;
    });
    return $members;
  }

}
