<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'customer_id','order_number', 'name', 'email', 'contact_no', 'country', 'city', 'zip_code', 'address', 'total_price', 'product_quantity', 'shipping_price', 'status'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function customer()
    {
        return $this->hasOne('App\Models\Customers', 'id', 'customer_id');
    }

    public function order_product()
    {
        return $this->hasMany('App\Models\Order_products', 'order_id', 'id');
    }
}
