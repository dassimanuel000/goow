<?php

namespace App\Nova\Filters;

use Illuminate\Http\Request;
use App\Models\City;
use Laravel\Nova\Filters\Filter;


class MarketCities extends Filter
{
    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query
        ->join('cities as c', 'markets.city_id', 'c.id')
        ->where('c.name', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $cityList = City::select('name')->get();
        $list = array();
        foreach($cityList as $city){
            $list[$city['name']] = $city['name'];
        }
        
        return $list; 
    }
}
