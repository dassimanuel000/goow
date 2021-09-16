<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $locale = $request->header('Content-Language') ?: 'en';

        if ($locale && in_array($locale, config('app.supported_languages')))
            App::setLocale($locale);

        return $next($request);
    }
}
