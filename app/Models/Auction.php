<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{

    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'quantity', 'min_bid', 'package', 'expire_at'];
    protected $dates = ['created_at','updated_at','expire_at'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function price_package()
    {
        return $this->hasOne('App\Models\AddPackagePrice', 'id', 'package');
    }
}
