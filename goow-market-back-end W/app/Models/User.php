<?php

namespace App\Models;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\VerifyApiEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable  implements MustVerifyEmail
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'stripe_cus_id', 'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The appended attributes.
     *
     * @var array
     */
    protected $appends = [
        'is_market', 'is_merchant',
    ];

    /**
     * @var array
     */
    protected $with = [
        'liked_markets', 'liked_merchants',
    ];

    public function getIsMarketAttribute()
    {
        return $this->roles()->whereName('market')->exists();
    }


    public function getIsMerchantAttribute()
    {
        return $this->roles()->whereName('merchant')->exists();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function liked_markets()
    {
        return $this->belongsToMany(Market::class, 'market_user_likes');
    }

    public function liked_merchants()
    {
        return $this->belongsToMany(Merchant::class, 'merchant_user_likes');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function payment_cards()
    {
        return $this->hasMany(PaymentCard::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function market()
    {
        return $this->hasOne(Market::class);
    }

    public function merchant()
    {
        return $this->hasMany(Merchant::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    /* methods */
    public function isAdmin()
    {
        return $this->roles()->whereName('admin')->exists();
    }

    public function default_payment_card()
    {
        return $this->payment_cards()->whereDefault(true)->first();
    }
    /* end methods */
}
