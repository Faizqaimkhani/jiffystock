<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_products extends Model
{
    use HasFactory;
    protected $fillable = ['order_id', 'product_id','shipment_id', 'product_quantity', 'product_price'];

    public function product(){
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function order(){
        return $this->hasOne('App\Models\Orders', 'id', 'order_id');
    }


}
