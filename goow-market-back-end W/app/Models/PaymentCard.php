<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentCard extends Model
{
    protected $fillable = ['default', 'stripe_card_id', 'user_id',];

    protected $casts = [
        'default' => 'bool'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
