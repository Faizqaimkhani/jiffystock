<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $fillable = ['group_id','user_id'];

    // protected $appends = ['shipment'];

    public function user()
    {
        return $this->morphTo();
    }

    public function group()
    {
      return $this->belongsTo(Group::class);
    }

    public function users()
    {
      return $this->belongsToMany(User::class);
    }
    //
    // public function getShipmentAttribute()
    // {
    //   $groupHasShipment = ($this->where('group_id',$this->id)->count() == 3);
    //   return $groupHasShipment;
    // }
}
