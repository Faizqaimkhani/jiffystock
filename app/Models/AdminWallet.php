<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminWallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'price', 'deposit', 'refunds', 'sell_products'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

}
