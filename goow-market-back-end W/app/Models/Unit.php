<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
