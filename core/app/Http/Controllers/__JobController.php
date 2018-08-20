<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Job;
use App\User;
use DB, Auth;
use Session;
use Mail;
use App\Mail\VerifyMail;
use App\VerifyUser;
use DateTime;

class JobController extends Controller
{
    var $paginate;

    public function index()
    {
        $motto_locale = Session::get('motto_locale');
        $jobs = Job::where('lang',$motto_locale)->orderBy('id','desc')->paginate(env('PAGINATE'));
        foreach ($jobs as $key => $job) {
            $fdate = date("Y-m-d");
            $tdate = date("Y-m-d",strtotime($job->created_at));
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $job->day_diff = $interval->format('%a');
        }
        return view('jobs.jobs',['jobs'=>$jobs]);
    }

    public function get_job($job_id)
    {
        $motto_locale = Session::get('motto_locale');
        $job = Job::where('lang',$motto_locale)->where('job_id',$job_id)->orderBy('id','desc')->get();
        return view('jobs.job_details',['job'=>$job]);
    }
    public function apply_form()
    {
        $motto_locale = Session::get('motto_locale');
        $old = array();
        if(Auth::user()){
            $user_id = Auth::user()->id;
            $jobs = User::where('id',$user_id)->get();
            $old = $jobs[0];
        }
        return view('jobs.apply_form',['old'=>$old]);
    }
    public function apply_job(Request $request)
    {
        if(Auth::user()){
            $user_id = Auth::user()->id;
            request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'date_of_birth' => 'required',
                'nationality' => 'required',
                'gender' => 'required',
                'living_in_japan' => 'required',
                'prefecture' => 'required',
                'visa' => 'required',
            ]);
        } else {
            request()->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'phone_number' => 'required',
                'date_of_birth' => 'required',
                'nationality' => 'required',
                'gender' => 'required',
                'living_in_japan' => 'required',
                'prefecture' => 'required',
                'visa' => 'required',
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'password_confirmation' => 'required|string|min:6',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $user_id = $user->id;
                $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
            ]);

            $template = "emails.verifyUser";
            $subject = "Verify Email";
            Mail::to($user->email)->send(new VerifyMail($user,$template,$subject));
        }

        $user = User::find($user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->first_name_hiragana = $request->first_name_hiragana;
        $user->last_name_hiragana = $request->last_name_hiragana;
        $user->phone_number = $request->phone_number;
        $user->date_of_birth = date('Y-m-d H:i:s',strtotime($request->date_of_birth));
        $user->nationality = $request->nationality;
        $user->gender = $request->gender;
        $user->living_in_japan = $request->living_in_japan;
        $user->prefecture = $request->prefecture;
        $user->visa = $request->visa;
        $user->save();

        $last_inser_id = DB::table('job_applied')->insertGetId(
            ['job_id' => $request->job_id, 'user_id' => $user_id, 'question' => $request->question, 'requirement' => $request->requirement, 'comment' => $request->comment]
        );

        if($request->job_id > 0){
            $motto_locale = Session::get('motto_locale');
            $company_email = $job[0]->company_email;
            if (filter_var($company_email, FILTER_VALIDATE_EMAIL)) {
                $jobs = DB::table('job_applied')
                ->leftjoin('jobs', 'job_applied.job_id', '=', 'jobs.job_id')
                ->leftjoin('users', 'job_applied.user_id', '=', 'users.id')
                ->select('users.*', 'jobs.title')
                ->where('jobs.lang','en')
                ->where('job_applied.id',$last_inser_id)
                ->get();

                
                $template = "emails.applyJob";
                $subject = "Applied for a Job";
                Mail::to($company_email)->cc(env('ADMIN_EMAIL'))->send(new VerifyMail($user,$template,$subject));
            }
        }

        return redirect()->route('applyCompleted');
    }
    public function apply_completed()
    {
        $motto_locale = Session::get('motto_locale');
        return view('jobs.apply_completed');
    }

    public function loadDataAjax(Request $request)
    {
      // dd($request->all());
        $output = '';
        $motto_locale = Session::get('motto_locale');

        $jobs = Job::query();

        if($request->id > 0){
            $jobs->where('job_id','<',$request->id);
        }
        if($request->title != ""){
            $jobs->where("title","like","%".$request->title."%");
        }
        if($request->job_type != ""){
            $job_type = implode(",", $request->job_type);
            $jobs->whereIn('job_type', array($job_type));
        }
        if($request->prefecture != ""){
            $prefecture = implode(",", $request->prefecture);
            $jobs->whereIn('prefecture', array($prefecture));
        }
        if($request->japanese_lavel != ""){
            $japanese_lavel = implode(",", $request->japanese_lavel);
            $jobs->whereIn('japanese_lavel', array($japanese_lavel));
        }

        $jobs->where('lang',$motto_locale);
        $jobs->orderBy('id','desc');
        $jobs = $jobs->paginate(env('PAGINATE'));
        foreach ($jobs as $key => $job) {
            $fdate = date("Y-m-d");
            $tdate = date("Y-m-d",strtotime($job->created_at));
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $job->day_diff = $interval->format('%a');
        }
        return $jobs;
    }
}
