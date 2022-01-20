<?php

namespace App\Http\Controllers\ProductPurchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UserInfo;
use App\Models\User;
use App\Models\Group;
use App\Models\GroupUser;
use App\Models\Customers;
use App\Events\GroupMessage;
use App\Models\Conversation;
use App\Http\Requests\GroupAddMemberRequest;
use App\Http\Requests\RemoveGroupMember;
use App\Services\ChatService;

class ConversationController extends Controller
{
  public function __construct()
  {
    $this->middleware(function($request, $next){
      $user = UserInfo::getCurrentUser();
      if($user['user_type'] == 'customer' || $user['user_type'] == 'shipment' || $user['user_type'] == 'supplier'){
        return $next($request);
      }
      return abort(500);
    })->only('store');
  }

  public function store(Request $request)
  {
      $user = UserInfo::getCurrentUser();
      if ($user['user_type'] == 'customer') {
        $user = Customers::findOrFail($user['user_id']);
      }
      elseif (in_array($user['user_type'], ['shipment','supplier'])) {
        $user = User::findOrFail($user['user_id']);
      } else {
        return response()->json(['status' => false], 401);
      }

      $conversation = $user->conversations()->create([
           'message' => request('message'),
           'group_id' => request('group_id'),
       ]);

       broadcast(new GroupMessage($conversation))->toOthers();

       $newlySentMessage = Conversation::find($conversation->id);

       return response()->json(['status' => true, 'data' => $newlySentMessage],201);
  }

  public function addMember(GroupAddMemberRequest $request)
  {
    $user = User::findOrFail($request->id);

    if($user->usertype == 'shipment-user'){
      $company = 'shipment';
    }else{
      $company = 'clearence';
    }

    $currentShipmentAlreadyExistInGroup = $user->groups()->where('group_id', $request->group_id)->exists();

    if($currentShipmentAlreadyExistInGroup) {
      return response()->json([
        'status' => false,
        'company_type' => $company,
        'message' => ucfirst($company).' Already Exist In Group',
      ],200);
    }

    $groupAlreadyHasShipment = (GroupUser::where('group_id', $request->group_id)->count() == 4);

    if($groupAlreadyHasShipment) {
      return response()->json([
        'status' => false,
        'message' => 'Group is full',
      ],200);
    }

    $addToGroup = $user->groups()->create([
      'group_id' => $request->group_id,
    ]);

    return response()->json([
      'status' => true,
      'company_type' => $company,
      'message' => ucfirst($company).' Company Added Successfully',
    ],200);
  }

  public function removeMember(RemoveGroupMember $request)
  {
    $group_users = Group::with('groups')->where('id', $request->group_id)->get();
    // $groupAlreadyHasShipment = (GroupUser::where('group_id', $request->group_id)->count() == 4);

    // if(!$groupAlreadyHasShipment) {
    //   return response()->json([
    //     'status' => false,
    //     'message' => 'Shipment does not exist',
    //   ],200);
    // }

    $comapany_type = '';
    $company_user =  strtolower($request->company) . '-user';

    $group_users = GroupUser::where('group_id', $request->group_id)->get(['user_id']);

    foreach($group_users as $guser){
      $user = User::where('id',$guser->user_id)->where('usertype',$company_user)->first();
      if($user){
        $removeUserConversation = $user->conversations()->where('group_id', $request->group_id)->delete();
        $removeMemberFromGroup = $user->groups()->where('group_id', $request->group_id)->delete();
        $comapany_type = $user->usertype;
      }
    }

    if($comapany_type == 'shipment-user'){
      $comapany_type = 'shipment';
    }
    if($comapany_type == 'clearance-user'){
      $comapany_type = 'clearence';
    }

  
    return response()->json([
      'status' => true,
      'company_type' => $comapany_type,
      'message' => ucfirst($comapany_type).' Successfully Deleted',
    ],200);

  }

  public function getMembers(Request $request)
  {
    $members = ChatService::members($request->group_id);
    return response()->json(['status' => true, 'members' => $members]);
  }

}
