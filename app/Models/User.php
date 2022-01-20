<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

// class user extends Model
class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'company',
        'company_license',
        'contact_number',
        'country',
        'city',
        'terms_and_conditions',
        'usertype',
        'google_id',
        'badge_verification_status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute($value)
    {
      return ucwords($value);
    }

    public function products()
    {
        return $this->hasMany('App\Models\Products');
    }
    public function advertisements()
    {
        return $this->hasMany('App\Models\Advertisement');
    }
    public function countries()
    {
        return $this->hasOne('App\Models\Country', 'id', 'country');
    }

    public function cities()
    {
        return $this->hasOne('App\Models\City', 'id', 'city');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function company_details()
    {
      return $this->hasOne(Company::class);
    }

    public function services()
    {
      return $this->hasMany(Services::class);
    }

    public function shipment_services()
    {
      return $this->hasMany(ShipmentService::class);
    }

    public function clearance_services()
    {
      return $this->hasMany(ClearanceService::class);
    }

    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function vouchers()
    {
      return $this->hasMany(Voucher::class);
    }

    public function admin_wallet()
    {
      return $this->hasOne(AdminWallet::class);
    }
    // public function wallet()
    // {
    //     return $this->hasOne('App\Models\Wallet','user_id');
    // }

    public function reviews()
    {
        return $this->hasMany('App\Models\Reviews');
    }

    public function conversations()
    {
      return $this->morphMany(Conversation::class, "user");
    }

    public function groups()
    {
      return $this->morphMany(GroupUser::class, "user");
    }

    public function followers()
    {
      return $this->hasMany(Follower::class);
    }
    public function reports()
    {
      return $this->hasMany(Report::class);
    }
    public static function boot() {
      parent::boot();

      static::deleting(function($user) {
         $user->products()->delete();
      });
    }
}
