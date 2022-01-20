<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    protected $fillable = ['name','icon'];
    public function subcategory()
    {
        return $this->hasOne('App\Models\Sub_category',  'category_id');
    }
}
