<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['city', 'postal_code', 'address', 'user_id', 'latitude', 'longitude',];

    protected $appends = [
        'full_address',
    ];

    public function getFullAddressAttribute()
    {
        return $this->address . ' ' . $this->postal_code . ' ' . $this->city;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
