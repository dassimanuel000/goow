<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketWorkingTime extends Model
{
    protected $fillable = ['day', 'hours_start', 'hours_end', 'market_id',];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }
}
