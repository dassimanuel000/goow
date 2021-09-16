<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Market extends Model
{
    protected $fillable = [
        'title', 'address', 'image', 'description', 'latitude', 'longitude', 'city_id', 'user_id',
    ];

    protected $with = ['city'];

    protected $casts = [
        'time_open' => 'date',
        'time_close' => 'date',
    ];
    
    protected $appends = ['today', 'review_score'];

    public function getTodayAttribute()
    {
        return [
            'is_open' => (boolean) $this->market_working_time()
                ->where(
                    fn ($q) => $q->where(['day' => Carbon::now()->dayName])
                        ->whereTime('hours_start', '<=', Carbon::now()->format('H:i:s'))
                        ->whereTime('hours_end', '>=', Carbon::now()->format('H:i:s'))
                )->first(),
            'market_working_time' => $this->market_working_time()->where(['day' => Carbon::now()->dayName])->first()
        ];
    }

    public function getReviewScoreAttribute()
    {
        if ($this->reviews->count()) {
            return number_format($this->reviews->pluck('score')->sum() / $this->reviews->count(), 2);
        }
        return number_format(0, 2);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function merchants()
    {
        return $this->hasMany(Merchant::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function market_working_time()
    {
        return $this->hasMany(MarketWorkingTime::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->latest();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function market_user_likes()
    {
        return $this->hasMany(MarketUserLikes::class);
    }
}
