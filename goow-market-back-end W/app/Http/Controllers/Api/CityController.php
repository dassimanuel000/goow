<?php

namespace App\Http\Controllers\Api;

use App\Models\City;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function index()
    {
        return [
            'cities' => City::with([
                'markets' => function ($q) {
                    $q->when(request('activity_id'), function ($q) {
                        $q->whereHas('merchants', function ($q) {
                            $q->where('activity_id', request('activity_id'));
                        });
                    });
                },
            ])->get(),
        ];
    }

    public function search()
    {
        $cities = City::where('name', 'LIKE', "%".request('search_string')."%")
            ->orWhere('postal_code', 'LIKE', "%".request('search_string')."%")
            ->get();

        return [
            'cities' => $cities,
        ];
    }

    public function getCity()
    {
        $city = City::where('slug', request('slug'))
            ->get();

        return [
            'city' => $city[0],
        ];
    }

    public function get(){
        $cityList = City::select('name')->get();
        $list = array();
        foreach($cityList as $city){
            $list[$city['name']] = $city['name'];
        }
        return [
            $list
        ];
    }
}
