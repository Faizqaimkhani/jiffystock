<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'discounted_price', 'user_id', 'times_to_use'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
