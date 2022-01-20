<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'type', 'product_id', 'user_id'];

    public function product()
    {
      return $this->hasOne(Products::class);
    }

    public function user()
    {
      return $this->hasOne(User::class);
    }
}
