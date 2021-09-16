<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        return [
            'shops' => Shop::when(request('city_slug'), function ($q) {
                $q->whereHas('city', function ($q) {
                    $q->where('slug', request('city_slug'));
                });
            })->when(request('activity_id'), function ($q) {
                $q->whereHas('activity', function ($q) {
                    $q->where('id', request('activity_id'));
                });
            })->get(),
            'cities' => City::whereHas('shops')->with('shops')->get(),
        ];
    }
}
