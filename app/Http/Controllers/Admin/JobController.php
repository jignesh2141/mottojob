<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Job;
use App;
use DB;
use Session;
use Config;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Session::has('lang_locale')){
            $lang_locale = Config::get('app.locale');
            session(['lang_locale' => $lang_locale]);
        } else {
            $lang_locale = Session::get('lang_locale');
        }
        
        $jobs = Job::where('lang',$lang_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('admin.jobs.jobs',['jobs'=>$jobs]);
    }

    public function add_job($id = null)
    {
        if ($id == null) {
            $job = new Job();
            return view('admin.jobs.job')->with(compact('job'));
        } else {
            $en_job = Job::where('job_id',$id)->where('lang', 'en')->get();
            $ja_job = Job::where('job_id',$id)->where('lang', 'ja')->get();
            return view('admin.jobs.edit_job')->with(compact('en_job','ja_job'));
        }     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'en_title' => 'required',
            'en_corporate_name' => 'required',
            'en_job_type' => 'required',
            'en_prefecture' => 'required',
            'en_japanese_lavel' => 'required',
            'en_location' => 'required',
            'en_description' => 'required',
            'en_requirements' => 'required',
            'en_no_of_vacancy' => 'required',
            'ja_title' => 'required',
            'ja_corporate_name' => 'required',
            'ja_job_type' => 'required',
            'ja_prefecture' => 'required',
            'ja_japanese_lavel' => 'required',
            'ja_location' => 'required',
            'ja_description' => 'required',
            'ja_requirements' => 'required',
            'ja_no_of_vacancy' => 'required',
        ]);
        
        $id = DB::table('job')->insertGetId([]);
        /* EN JA */ 
        $lang = array("en","ja");
        foreach ($lang as $value) {
            $job = new Job();
            $job->job_id = $id;
            $job->lang = $value;
            $job->title = $request->{$value.'_title'};
            $job->corporate_name = $request->{$value.'_corporate_name'};
            $job->job_type = $request->{$value.'_job_type'};
            $job->prefecture = $request->{$value.'_prefecture'};
            $job->japanese_lavel = $request->{$value.'_japanese_lavel'};
            $job->location = $request->{$value.'_location'};
            $job->description = $request->{$value.'_description'};
            $job->requirements = $request->{$value.'_requirements'};
            $job->no_of_vacancy = $request->{$value.'_no_of_vacancy'};
            $job->save();
        }
        
        return redirect()->route('jobs')
                        ->with('success','Job created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'en_title' => 'required',
            'en_corporate_name' => 'required',
            'en_job_type' => 'required',
            'en_prefecture' => 'required',
            'en_japanese_lavel' => 'required',
            'en_location' => 'required',
            'en_description' => 'required',
            'en_requirements' => 'required',
            'en_no_of_vacancy' => 'required',
            'ja_title' => 'required',
            'ja_corporate_name' => 'required',
            'ja_job_type' => 'required',
            'ja_prefecture' => 'required',
            'ja_japanese_lavel' => 'required',
            'ja_location' => 'required',
            'ja_description' => 'required',
            'ja_requirements' => 'required',
            'ja_no_of_vacancy' => 'required',
        ]);

        if($request->en_id && $request->ja_id){
            $lang = array("en"=>$request->en_id,"ja"=>$request->ja_id);
            foreach ($lang as $key => $value) {
                $job = Job::find($value);
                $job->job_id = $id;
                $job->lang = $key;
                $job->title = $request->{$key.'_title'};
                $job->corporate_name = $request->{$key.'_corporate_name'};
                $job->job_type = $request->{$key.'_job_type'};
                $job->prefecture = $request->{$key.'_prefecture'};
                $job->japanese_lavel = $request->{$key.'_japanese_lavel'};
                $job->location = $request->{$key.'_location'};
                $job->description = $request->{$key.'_description'};
                $job->requirements = $request->{$key.'_requirements'};
                $job->no_of_vacancy = $request->{$key.'_no_of_vacancy'};
                $job->save();
            }
        }
        return redirect()->route('jobs')
                        ->with('success','Page created successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Job  $job
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        DB::table('job')->where('id', $id)->delete();
        return redirect()->route('jobs')
                        ->with('success','Page deleted successfully');
    }

    public function manage_session(Request $request) {
        if($request->lang_locale != ""){
            $lang_locale = session(['lang_locale' => $request->lang_locale]);
            return redirect()->route($request->route);
        }
    }
}
