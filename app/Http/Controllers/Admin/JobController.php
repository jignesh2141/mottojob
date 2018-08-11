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
use Intervention\Image\ImageManagerStatic as Image;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang_locale = Session::get('lang_locale');
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
            'en_restaurant' => 'required',
            'en_designation' => 'required',
            'en_job_type' => 'required',
            'en_prefecture' => 'required',
            'en_japanese_lavel' => 'required',
            'en_location' => 'required',
            'latitude' => 'required',
            'longitute' => 'required',
            'en_description' => 'required',
            'en_requirements' => 'required',
            'en_no_of_vacancy' => 'required',
            'en_company_email' => 'required',
            'ja_title' => 'required',
            'ja_corporate_name' => 'required',
            'ja_restaurant' => 'required',
            'ja_designation' => 'required',
            'ja_location' => 'required',
            'ja_description' => 'required',
            'ja_requirements' => 'required',
            'ja_no_of_vacancy' => 'required',
        ]);
        
        $id = DB::table('job')->insertGetId([]);

        $filename = "";
        if($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(350, 300);
            $image_resize->save(public_path('images/job/' .$filename));

        }
        /* EN JA */ 
        $lang = array("en","ja");
        foreach ($lang as $value) {
            $job = new Job();
            $job->job_id = $id;
            $job->lang = $value;
            $job->title = $request->{$value.'_title'};
            $job->corporate_name = $request->{$value.'_corporate_name'};
            $job->restaurant = $request->{$value.'_restaurant'};
            $job->designation = $request->{$value.'_designation'};
            $job->job_type = $request->en_job_type;
            $job->prefecture = $request->en_prefecture;
            $job->japanese_lavel = $request->en_japanese_lavel;
            $job->location = $request->{$value.'_location'};
            $job->latitude = $request->latitude;
            $job->longitute = $request->longitute;
            $job->description = $request->{$value.'_description'};
            $job->requirements = $request->{$value.'_requirements'};
            $job->no_of_vacancy = $request->{$value.'_no_of_vacancy'};
            $job->minimum_working_days_per_week = $request->{$value.'_minimum_working_days_per_week'};
            $job->minimum_working_hours_per_day = $request->{$value.'_minimum_working_hours_per_day'};
            $job->community_expenses = $request->{$value.'_community_expenses'};
            $job->benefits = $request->{$value.'_benefits'};
            $job->salary = $request->{$value.'_salary'};
            $job->timing = $request->{$value.'_timing'};
            $job->company_email = $request->en_company_email;
            if($filename != ""){
                $job->image =$filename;
            }
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
            'en_restaurant' => 'required',
            'en_designation' => 'required',
            'en_job_type' => 'required',
            'en_prefecture' => 'required',
            'en_japanese_lavel' => 'required',
            'en_location' => 'required',
            'latitude' => 'required',
            'longitute' => 'required',
            'en_description' => 'required',
            'en_requirements' => 'required',
            'en_no_of_vacancy' => 'required',
            'en_company_email' => 'required',
            'ja_title' => 'required',
            'ja_corporate_name' => 'required',
            'ja_restaurant' => 'required',
            'ja_designation' => 'required',
            'ja_location' => 'required',
            'ja_description' => 'required',
            'ja_requirements' => 'required',
            'ja_no_of_vacancy' => 'required',
        ]);

        $filename = "";
        if($request->hasFile('image')) {

            $image       = $request->file('image');
            $filename    = $image->getClientOriginalName();

            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(350, 300);
            $image_resize->save(public_path('images/job/' .$filename));

        }

        if($request->en_id && $request->ja_id){
            $lang = array("en"=>$request->en_id,"ja"=>$request->ja_id);
            foreach ($lang as $key => $value) {
                $job = Job::find($value);
                $job->job_id = $id;
                $job->lang = $key;
                $job->title = $request->{$key.'_title'};
                $job->corporate_name = $request->{$key.'_corporate_name'};
                $job->restaurant = $request->{$key.'_restaurant'};
                $job->designation = $request->{$key.'_designation'};
                $job->job_type = $request->en_job_type;
                $job->prefecture = $request->en_prefecture;
                $job->japanese_lavel = $request->en_japanese_lavel;
                $job->location = $request->{$key.'_location'};
                $job->latitude = $request->latitude;
                $job->longitute = $request->longitute;
                $job->description = $request->{$key.'_description'};
                $job->requirements = $request->{$key.'_requirements'};
                $job->no_of_vacancy = $request->{$key.'_no_of_vacancy'};
                $job->minimum_working_days_per_week = $request->{$key.'_minimum_working_days_per_week'};
                $job->minimum_working_hours_per_day = $request->{$key.'_minimum_working_hours_per_day'};
                $job->community_expenses = $request->{$key.'_community_expenses'};
                $job->benefits = $request->{$key.'_benefits'};
                $job->salary = $request->{$key.'_salary'};
                $job->timing = $request->{$key.'_timing'};
                $job->company_email = $request->en_company_email;
                if($filename != ""){
                    $job->image =$filename;
                }
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

    public function applied_job() {
        $lang_locale = Session::get('lang_locale');
        $jobs = DB::table('job_applied')
            ->leftjoin('jobs', 'job_applied.job_id', '=', 'jobs.job_id')
            ->leftjoin('users', 'job_applied.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', 'jobs.title', 'jobs.location', 'job_applied.created_at')
            ->where('jobs.lang',$lang_locale)
            ->orderBy('job_applied.id','desc')
            ->get();
        return view('admin.jobs.applied_jobs',['jobs'=>$jobs]);
    }

    public function manage_session(Request $request) {
        
        if($request->lang_locale != ""){
            App::setLocale($request->lang_locale);
            $lang_locale = session(['lang_locale' => $request->lang_locale]);
            //return redirect()->route($request->route);
            return redirect()->back();
        }
    }
}
