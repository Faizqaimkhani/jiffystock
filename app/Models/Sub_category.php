<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon' , 'category_id'];

    public function product_category()
    {
        return $this->hasOne('App\Models\Product_category', 'id', 'category_id');
    }
    public function products()
    {
        return $this->hasMany('App\Models\Products', 'sub_category_id');
    }

}
