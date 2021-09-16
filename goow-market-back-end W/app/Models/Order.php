<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['total', 'scheduled', 'scheduled_at', 'status',];

    protected $with = ['products','merchants'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['price', 'quantity']);
    }

    public function merchants()
    {
        return $this->belongsToMany(Merchant::class)
            ->withPivot('status', 'amount');
    }
}
