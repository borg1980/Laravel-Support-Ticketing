<?php

namespace App\Http\Middleware;

use Closure;

class SetLocale {


    public function handle($request, Closure $next)
    {
        if(\Auth::user()){
            app()->setLocale(\Auth::user()->locale);
        }

        return $next($request);
    }

}
