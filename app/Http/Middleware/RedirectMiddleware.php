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

        if ($actualCity){

            $expire = Carbon::now()->addHours(24);

            $redirect = Cache::remember('redirect_' . $actualCity, $expire, function () use ($actualCity) {

                $redirect = Redirect::where('from', $actualCity)->first();

                if ($redirect) return $redirect;

                return false;

            });

            if ($redirect){

                $url = 'https://'.$redirect->to.'.'.env('DOMAIN').$_SERVER['REQUEST_URI'];

                header('Location: '.$url, true, 301);

                exit();

            }

            $city = preg_replace('/[0-9]+/', '', $actualCity) ;

            $request->route()->setParameter('city', $city);

        }

        $actualCity = preg_replace("/[0-9]/", '', $actualCity);

        $cityInfo = \Cache::get('city_info-' . $actualCity);

        if (!$cityInfo) {

            $cityInfo = City::where('url', $actualCity)
                ->first();

            \Cache::set('city_info-' . $actualCity , $cityInfo);

        }

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
