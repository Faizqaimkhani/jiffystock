<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_add extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id', 'package', 'expire_at'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Products', 'id', 'product_id');
    }

    public function package()
    {
        return $this->hasOne('App\Models\AddPackagePrice', 'id', 'package');
    }
}
 