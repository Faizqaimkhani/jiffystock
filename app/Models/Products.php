<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Products extends Model
{
    use HasFactory;
    protected $fillable = ['name',
                          'sub_category_id',
                          'brand',
                          'color',
                          'average_market_price',
                          'price',
                          'unit',
                          'delivery',
                          'payment',
                          'little_describe',
                          'description',
                          'stock_quantity',
                          'add_durations',
                          'user_id',
                          'video',
                          'image1',
                          'image2',
                          'image3',
                          'image4',
                          'image5',
                          'stock_location',
                          'limited_time'];

    protected $dates = ['created_at','updated_at','limited_time'];

    public function sub_category()
    {
        return $this->hasOne('App\Models\Sub_category', 'id', 'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function order_products(){
        return $this->hasMany('App\Models\Order_products', 'product_id', 'id');
    }

    public function addvertise(){
        return $this->hasMany("App\Models\Product_add", 'product_id');
    }

    public function reports(){
        return $this->belongsToMany(Report::class);
    }



}
