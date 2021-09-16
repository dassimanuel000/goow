<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MerchantWorkingTime extends Model
{
    protected $fillable = ['day', 'hours_start', 'hours_end', 'merchant_id',];

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
