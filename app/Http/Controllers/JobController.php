<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Job;
use DB;
use Session;

class JobController extends Controller
{
    public function index()
    {
        $lang_locale = Session::get('lang_locale');
        $jobs = Job::where('lang',$lang_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('jobs.jobs',['jobs'=>$jobs]);
    }

    public function get_job()
    {
        $lang_locale = Session::get('lang_locale');
        $jobs = Job::where('lang',$lang_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('jobs.job_details',['jobs'=>$jobs]);
    }
    public function apply_form()
    {
        $lang_locale = Session::get('lang_locale');
        $jobs = Job::where('lang',$lang_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('jobs.apply_form',['jobs'=>$jobs]);
    }

}
