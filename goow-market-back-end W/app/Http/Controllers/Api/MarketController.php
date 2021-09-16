<?php

namespace App\Http\Controllers\Api;

use App\Models\Market;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use Carbon\Carbon;
use PhpParser\Builder;

class MarketController extends Controller
{
    public function index()
    {
        $markets = Market::when(request('city_slug'), function ($q) {
            $q->whereHas('city', function ($q) {
                $q->where('slug', request('city_slug'));
            });
        })->when(request('activity_id'), function ($q) {
            $q->whereHas('merchants', function ($q) {
                $q->where('activity_id', request('activity_id'));
            });
        })->when(request('market_working_time'), function ($q) {
            $q->whereTime('hours_start', '<=', Carbon::now()->format('H:i:s'))
            ->whereTime('hours_end', '>=', Carbon::now()->format('H:i:s'));
        })->get();

        return [
            'markets' => $markets,
        ];
    }

    public function show(Market $market)
    {   
        $market = $market->load('market_working_time', 'city', 'events', 'reviews.user')->load([
            'merchants' => function ($q) {
                $q->whereStatus('CONFIRMED')->when(request('activities'), function ($q2) {
                    $q2->whereIn('activity_id', explode(',', request('activities')))->get();
                })->get();
            },
        ]);
        
        $this->id = $market->id;

        $activities = Activity::whereHas('merchants', function ($q) {
            $q->where('market_id', $this->id);
            $q->where('status', 'CONFIRMED');
        })->get();
        
        return [
            'market' => $market,
            'activities' => $activities
        ];
    }

    public function myMarket()
    {
        return [
            'market' => Market::with(['merchants' =>
                fn ($q) => $q->with('user')->latest()->when(request('merchant-status'),
                    fn ($q) => $q->whereStatus(request('merchant-status')))
            ])
                ->whereUserId(auth()->id())
                ->first()
        ];
    }
}
