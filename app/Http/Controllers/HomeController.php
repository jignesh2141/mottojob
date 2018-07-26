<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session, App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motto_locale = Session::get('motto_locale');
        return view('welcome');
    }

    public function manage_locale(Request $request)
    {
        if($request->motto_lang != ""){
            App::setLocale($request->motto_lang);
            $motto_lang = session(['motto_locale' => $request->motto_lang]);
            return redirect()->back();
        }
    }
}
