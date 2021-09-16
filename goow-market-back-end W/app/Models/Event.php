<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = ['title', 'description', 'slug', 'market_id', 'merchant_id', 'content'];
    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
