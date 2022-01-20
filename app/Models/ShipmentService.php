<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class ShipmentService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['title','data','thumbnail','user_id'];

    public function user()
    {
      return $this->hasOne(User::class);
    }

    public function getThumbnailAttribute($value)
    {
      return url('/').Storage::url($value);
    }
}
