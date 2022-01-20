<?php

namespace App\Http\Controllers\ProductPurchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\UserInfo;
use App\Services\ChatService;
use App\Models\User;
use App\Models\Customers;
use App\Models\GroupUser;

class ChatController extends Controller
{

    public function __construct()
    {
      $this->middleware(function($request, $next){
        $user = UserInfo::getCurrentUser();
        if($user['user_type'] == 'customer' || $user['user_type'] == 'shipment' || $user['user_type'] == 'supplier' || $user['user_type'] == 'clearance'){
          return $next($request);
			
        }
		  
        return abort(500);
      })->only('getConversationByGroup');

      if (count(UserInfo::getCurrentUser()) < 1) {
        return redirect('/');
      }
    }

    public function chat()
    {
      $chat = $this->data();
      return view('new-layouts.group-chat',
				  [
					  'groups' => $chat['groups'],
					  'user_type' => $chat['user_type'],
					  'shipments' => $chat['shipments'],
					  'clearences' => $chat['clearences']
				  ]);
    }

    public function shipmentChat($value='')
    {
      $chat = $this->data();
      return view('company.shipment.chat',
                  [
                    'groups' => $chat['groups'],
                    'user_type' => $chat['user_type'],
                    'shipments' => $chat['shipments']
                  ]);
    }
	
	public function clearanceChat($value='')
    {
      $chat = $this->data();
      return view('company.clearance.chat',
                  [
                    'groups' => $chat['groups'],
                    'user_type' => $chat['user_type'],
                    'clearences' => $chat['clearences']
                  ]);
    }

    private function data()
    {
      $current_user = UserInfo::getCurrentUser();
      if($current_user['user_type'] == 'customer')
      {
        $user = Customers::find($current_user['user_id']);
      }else {
        $user = User::find($current_user['user_id']);
      }

      $shipments = null;
      $clearences = null;


      if($current_user['user_type'] == 'customer') {
        $shipments = User::where('usertype', 'shipment-user')->latest()->get();
      }

      if($current_user['user_type'] == 'customer') {
        $clearences = User::where('usertype', 'clearance-user')->latest()->get();
      }

      $groups = $user->groups()->with(['group.conversations' => function($q) {
                                    $q->latest()->get(['message']);
                                }])
                                ->groupBy('group_id')
                                ->latest()
                                ->get(['group_id','user_id','created_at']);
      return ['groups' => $groups, 'user_type' => $current_user['user_type'],'shipments' => $shipments,'clearences'=> $clearences];
    }

    public function getConversationByGroup($group_id)
    {
      $user = UserInfo::getCurrentUser();
      $members = ChatService::members($group_id);
      $group_users = GroupUser::where('group_id', $group_id)->get();

      $groupAlreadyHasShipment = ($group_users->count() == 4);

      $groupHasClearence = false;
      $groupAlreadyHasShipment = false;

      foreach ($group_users as $group_user) {
        if($group_user->user->usertype == 'clearance-user'){
         $groupHasClearence = true;
        }
        if($group_user->user->usertype == 'shipment-user'){
          $groupAlreadyHasShipment = true;
        }
      }

      if($user['user_type'] == 'customer') {
        $conversation = ChatService::customer($group_id, $user['user_id']);
        return response()->json(['status' => true, 'data' => $conversation, 'members' => $members, 'groupHasShipment' => $groupAlreadyHasShipment, 'groupHasClearence' => $groupHasClearence]);
      }

      elseif(in_array($user['user_type'], ['shipment','clearance','supplier'])){
        $conversation = ChatService::otherUsers($group_id, $user['user_id']);
        return response()->json(['status' => true, 'data' => $conversation, 'members' => $members, 'groupHasShipment' => $groupAlreadyHasShipment, 'groupHasClearence' => $groupHasClearence ]);
      }

      return response()->json(['status' => false]);
    }
}
