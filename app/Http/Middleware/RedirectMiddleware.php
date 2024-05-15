<?php

namespace App\Http\Middleware;

use App\Models\City;
use Cache;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use App\Models\Redirect;

class RedirectMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $actualCity =  $request->route('city');

        $actualCity = preg_replace("/[0-9]/", '', $actualCity);

        $request->route()->setParameter('city', $actualCity);

        $cityInfo = \Cache::get('city_info-' . $actualCity);

        if (!$cityInfo) {

            $cityInfo = City::where('url', $actualCity)
                ->first();

            \Cache::set('city_info-' . $actualCity , $cityInfo);

        }

        dd($cityInfo);

        if ($cityInfo) {

            $actualHost = $cityInfo->actual_city . '.' . $cityInfo->domain;

            if ($actualHost != $_SERVER['HTTP_HOST']) {

                $url = 'https://' . $actualHost . $_SERVER['REQUEST_URI'];

                header('Location: ' . $url, true, 301);

                exit();

            }

        }

        return $next($request);
    }
}
