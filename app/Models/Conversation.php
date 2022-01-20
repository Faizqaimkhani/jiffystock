<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UserInfo;
use Carbon\Carbon;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'user_id', 'group_id'];

    protected $hidden = ['user_type','updated_at','user_id'];

    protected $appends = ['self','account'];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->morphTo();
    }

    public function getCreatedAtAttribute($value)
    {
      return Carbon::parse($value)->diffForHumans();
    }

    public function getAccountAttribute()
    {
      return $this->user()->first('name');
    }
    public function getSelfAttribute()
    {
      $user = UserInfo::getCurrentUser();
      if($this->attributes['user_id'] == $user['user_id']) {
        return true;
      } else {
        return false;
      }
    }
}
