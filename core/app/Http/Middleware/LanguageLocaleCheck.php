<?php

namespace App\Http\Middleware;

use Closure;
use Session,Config;

class LanguageLocaleCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next){
        if(!Session::has('motto_locale')){
            $motto_locale = Config::get('app.locale');
            session(['motto_locale' => $motto_locale]);
        } else {
            $motto_locale = Session::get('motto_locale');
        }
        app()->setLocale(session()->get('motto_locale'));
        return $next($request);
    }
}
