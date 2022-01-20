<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    use HasFactory;
    protected $fillable = ['image', 'heading', 'text', 'product_id'];

    public function product()
    {
        return $this->hasOne('App\Models\products', 'id', 'product_id');
    }

}
