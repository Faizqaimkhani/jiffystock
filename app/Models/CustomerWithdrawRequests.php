<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customerWithdrawRequests extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'wallet_id', 'stripe_email', 'price'];

    public function customer()
    {
        return $this->hasOne('App\Models\Customers', 'id', 'customer_id');
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\CustomerWallet', 'id', 'wallet_id');
    }
}
 