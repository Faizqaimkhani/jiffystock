<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    protected $guarded = ['id', 'customer'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'category_id',
        'contact_number',
        'country',
        'city',
        'vip',
        'google_id',
        'usertype'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
        return $this->password;
    }
    public function wallet()
    {
        return $this->hasOne('App\Models\CustomerWallet','customer_id');
    }
    public function messages()
    {
      return $this->hasMany(Message::class,'user_id');
    }

    public function conversations()
    {
      return $this->morphMany(Conversation::class, "user");
    }

    public function groups()
    {
      return $this->morphMany(GroupUser::class, "user");
    }
}
