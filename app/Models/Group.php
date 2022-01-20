<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Carbon\Carbon;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name','product_id'];


    public function hasUser($user_id)
    {
      //
    }

    public function conversations()
    {
      return $this->hasMany(Conversation::class);
    }

    public function groups()
    {
      return $this->hasMany(GroupUser::class);
    }

    public function product()
    {
      return $this->belongsTo(Products::class);
    }

    public function getCreatedAtAttribute($value)
    {
      return Carbon::parse($value)->diffForHumans();
    }

}
