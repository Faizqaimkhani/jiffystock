<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedBids extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'auction_id', 'product_id', 'customer_id', 'price'];
}
