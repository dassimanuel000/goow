<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $fillable = ['market_id', 'title', 'slug', 'activity_id', 'status', 'description', 'stripe_acc_id', 'stripe_ba_id',];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $appends = ['today'];

    protected $with = ['activity', 'market', 'product_categories'];

    protected $casts = [
        'time_open' => 'date',
        'time_close' => 'date',
    ];

    public function getTodayAttribute()
    {
        return [
            'is_open' => (boolean) $this->merchant_working_time()
                ->where(
                    fn ($q) => $q->where(['day' => Carbon::now()->dayName])
                        ->whereTime('hours_start', '<=', Carbon::now()->format('H:i:s'))
                        ->whereTime('hours_end', '>=', Carbon::now()->format('H:i:s'))
                )->first(),
            'merchant_working_time' => $this->merchant_working_time()->where(['day' => Carbon::now()->dayName])->first()
        ];
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function market()
    {
        return $this->belongsTo(Market::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function product_categories()
    {
        return $this->hasMany(ProductCategory::class)->orderBy('sort_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merchant_working_time()
    {
        return $this->hasMany(MerchantWorkingTime::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('status', 'amount');
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function merchant_user_likes()
    {
        return $this->hasMany(MerchantUserLikes::class);
    }
}
