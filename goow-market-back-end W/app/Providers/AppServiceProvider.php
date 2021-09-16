<?php

namespace App\Providers;

use App\Models\Market;
use App\Observers\MarketObserver;
use Laravel\Nova\Nova;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Nova::serving(function () {

        });
    }
}
