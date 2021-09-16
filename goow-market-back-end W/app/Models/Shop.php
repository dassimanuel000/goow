<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $appends = ['is_open'];

    protected $with = ['activity'];

    protected $casts = [
        'time_open' => 'date',
        'time_close' => 'date',
    ];

    public function getIsOpenAttribute()
    {
        return (!$this->only_work_hours || Carbon::now()->between(
                Carbon::parse($this->time_open),
                Carbon::parse($this->time_close), true)
        );
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
