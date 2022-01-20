<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendingBids extends Model
{
    use HasFactory;
    protected $fillable = ['auction_id', 'product_id', 'user_id', 'customer_id', 'price', 'status'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customers', 'id', 'customer_id');
    }

    public function products()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function auction()
    {
        return $this->hasOne('App\Models\Auction', 'id', 'auction_id');
    }

}

