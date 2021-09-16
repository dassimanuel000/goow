<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    public $timestamps = false;

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function product_suggestions()
    {
        return $this->hasMany(Shop::class);
    }
}
