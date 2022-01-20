<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $table="advertisement";

    protected $dates = ['expire_at'];

    protected $appends = ['expired'];

    protected $fillable = ['user_id', 'text', 'expire_at', 'pacakge_id','image'];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function getExpiredAttribute($value)
    {
      dd($value);
    }

    public function package(){
        return $this->belongsTo('App\Models\AddPackagePrice', 'pacakge_id');
    }
}
