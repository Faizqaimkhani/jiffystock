<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'user_id', 'customer_id', 'product_id', 'review', 'rating'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customers', 'id', 'customer_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Orders', 'id', 'order_id');
    }
}
