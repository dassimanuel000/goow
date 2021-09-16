<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['title', 'description', 'price', 'image', 'unit_id', 'unit_quantity', 'merchant_id', 'product_category_id',];

    protected $with = ['product_category', 'unit',];

    public function product_category()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot(['price', 'quantity']);
    }
}
