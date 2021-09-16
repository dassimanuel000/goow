<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name', 'image', 'location',
    ];

    protected $casts = [
        'location' => 'array'
    ];

    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function markets()
    {
        return $this->hasMany(Market::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
