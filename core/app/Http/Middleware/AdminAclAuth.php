<?php

namespace App\Http\Middleware;

use Closure;
use App\AdminAcl;
use Session,Config;

class AdminAclAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
      // TO DO remove
      if(!Session::has('lang_locale')){
          $lang_locale = Config::get('app.locale');
          session(['lang_locale' => $lang_locale]);
      } else {
          $lang_locale = Session::get('lang_locale');
      }
      app()->setLocale(session()->get('lang_locale'));
      if($request->session()->has('user') && $request->session()->has('account_type') == 'Admin'){
        return $next($request);
      }
      // TO DO remove
      die('You can not access that page');
      return redirect()->back()->with('message',['danger'=>'You can not access that page.']);
    }

}
