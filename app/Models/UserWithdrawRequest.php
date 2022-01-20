<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawRequest extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'wallet_id', 'stripe_email', 'price'];

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function wallet()
    {
        return $this->hasOne('App\Models\Wallet', 'id', 'wallet_id');
    }
}
