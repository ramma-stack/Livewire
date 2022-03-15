<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\App;

class lang
{
   
    public function handle(Request $request, Closure $next)
    {
        App::setlocale(Cookie::get('lang')?:config('app.locale'));
        return $next($request);
    }
}
