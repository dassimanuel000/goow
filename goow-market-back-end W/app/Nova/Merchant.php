<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
class Merchant extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Merchant';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'slug',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            TextWithSlug::make('Title')
                ->rules('required')
                ->slug('slug'),

            BelongsTo::make('Activity')
                ->rules('required'),

            Slug::make('Slug')
                ->hideFromIndex()
                ->rules('required', 'unique:merchants,slug,{{resourceId}}'),

            Text::make('Stand N°', 'address')
                ->hideFromIndex(),

            Image::make('Image')
                ->hideWhenCreating()
                ->hideFromIndex()
                ->disk('public')
                ->path('images/merchant'),

            Text::make('Description')
                ->hideFromIndex(),

            Text::make('Email')
                ->hideFromIndex(),

            Number::make('Phone')
                ->hideFromIndex(),

            BelongsTo::make('Market')
                ->rules('required'),

            HasMany::make('Merchant Working Time'),

            HasMany::make('Product Categories'),

            HasMany::make('Products'),

//            BelongsTo::make('User')
//                ->searchable()
//                ->rules('required'),
            
            HasMany::make('Events'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [
            new Filters\merchantcities,
        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
