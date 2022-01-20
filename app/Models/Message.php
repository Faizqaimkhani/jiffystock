<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Stripe\Customer;

class Message extends Model
{
 
  protected $table = "messages";
 
  public function fromUser()
  {
    return $this->belongsTo('App\Models\User','from_user');
  }
  public function toUser()
  {
    return $this->belongsTo('App\Models\User','to_user');
  }
  public function fromCustomer()
  {
    return $this->belongsTo('App\Models\Customers', 'from_user');
  }
  public function toCustomer()
  {
    
    return $this->belongsTo('App\Models\Customers', 'to_user');

  }
}
