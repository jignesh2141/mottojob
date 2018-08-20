<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use DB, Auth;
use Session;

class PageController extends Controller
{
    public function getPages($slug = null){
      if($slug != null){
      	$motto_locale = Session::get('motto_locale');
        $page = Page::where('slug',$slug)->where('lang',$motto_locale)->get();
        return view('static_page',['page'=>$page[0]]);
      }
    }
}
