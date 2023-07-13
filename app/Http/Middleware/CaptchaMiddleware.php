<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CaptchaMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $key = env('RECAPTCHA');
        $query = $url.'?secret='.$key.'&response='.$_POST['g-recaptcha-response'].'&remoteip='.$_SERVER['REMOTE_ADDR'];

        $data = json_decode(file_get_contents($query));

        if ( $data->success == false) {

            return back()
                ->withErrors(['msg' => 'Нужно пройти капчу'])
                ->withInput();

        }

        return $next($request);
    }
}
