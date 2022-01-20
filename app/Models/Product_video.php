<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_video extends Model
{
    use HasFactory;
    protected $fillable = ['video_path', 'product_id'];
}
