<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable = ['order_id','product_id', 'user_id', 'shipment_id', 'customer_id', 'payment', 'delivery', 'quantity'];

    public function product(){
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }
    public function order(){
        return $this->belongsTo(Orders::class);
    }
}
