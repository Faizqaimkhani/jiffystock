<?php
namespace App\Traits;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customers;

class UserInfo
{
    public static function getCurrentUser() {
      if (Auth::guard('customer')->check()) {
        return ['user_id' => Auth::guard('customer')->id(), 'user_type' => 'customer', 'profile_url' => '/customer-home'];
      }
      if (Auth::guard('shipment_user')->check()) {
        return ['user_id' => Auth::guard('shipment_user')->id(), 'user_type' => 'shipment', 'profile_url' => '/company/shipment/dashboard'];
      }
      if (Auth::guard('clearance_user')->check()) {
        return ['user_id' => Auth::guard('clearance_user')->id(), 'user_type' =>'clearance', 'profile_url' => '/company/clearance/dashboard'];
      }
      if (Auth::guard('web')->check()) {
        return ['user_id' => Auth::guard('web')->id(), 'user_type' =>'supplier', 'profile_url' => '/home'];
      }
      return [];
    }

    public static function hasReported($user_id, $product_id)
    {
      $check_if_already_reported = Report::where('product_id', $product_id)->where('user_id', $user_id)->exists();
      return $check_if_already_reported;
    }

}
