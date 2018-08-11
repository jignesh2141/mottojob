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

class JobController extends Controller
{
    public function index()
    {
        $motto_locale = Session::get('motto_locale');
        $jobs = Job::where('lang',$motto_locale)->orderBy('id','desc')->paginate(2);
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
        }

        $user = User::find($user_id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->first_name_hiragana = $request->first_name_hiragana;
        $user->last_name_hiragana = $request->last_name_hiragana;
        $user->phone_number = $request->phone_number;
        $user->date_of_birth = $request->date_of_birth;
        $user->nationality = $request->nationality;
        $user->gender = $request->gender;
        $user->living_in_japan = $request->living_in_japan;
        $user->prefecture = $request->prefecture;
        $user->visa = $request->visa;
        $user->save();

        DB::table('job_applied')->insert(
            ['job_id' => $request->job_id, 'user_id' => $user_id, 'question' => $request->question, 'requirement' => $request->requirement, 'comment' => $request->comment]
        );

        return redirect()->route('applyCompleted');
    }
    public function apply_completed()
    {
        $motto_locale = Session::get('motto_locale');
        return view('jobs.apply_completed');
    }

    public function loadDataAjax(Request $request)
    {
        $output = '';

        $motto_locale = Session::get('motto_locale');
        $query = Job::where('lang',$motto_locale)->orderBy('id','desc');
        if($request->id > 0){
            $query->where('job_id','<',$request->id);
        }
        if($request->title != ""){
            $query->where("title","like","%".$request->title."%");
        }
        if($request->job_type != ""){
            $job_type = implode(",", $request->job_type);
            $query->whereIn('job_type', array($job_type));
        }
        if($request->prefecture != ""){
            $prefecture = implode(",", $request->prefecture);
            $query->whereIn('prefecture', array($prefecture));
        }
        if($request->japanese_lavel != ""){
            $japanese_lavel = implode(",", $request->japanese_lavel);
            $query->whereIn('japanese_lavel', array($japanese_lavel));
        }
        
        $query->limit(2);
        $jobs = $query->get();
    
        if(!$jobs->isEmpty())
        {
            foreach($jobs as $job)
            {
                $url = 'job/'.$job->job_id;
                $img_url = "images/job/".$job->image;
                                                
                $output .= '<div class="col-md-6 col-sm-6">
                            <div class="job-list-box">
                                <h4>'.$job->title.'</h4>
                                <div class="job-list-thumb">
                                    <img src="'.$img_url.'" alt="MottoJob" class="img-responsive">
                                </div>
                                <ul class="list-box-detail">
                                    <li>
                                        <label>Salary</label>
                                        <span>'.$job->salary.'</span>
                                    </li>
                                    <li>
                                        <label>Location</label>
                                        <span>
                                            <p>'.$job->location.'</p>
                                        </span>

                                    </li>
                                    <li>
                                        <label>Japanse</label>
                                        <span>'.$job->japanese_lavel.'</span>
                                    </li>
                                    <li>
                                        <label>Hours</label>
                                        <span>
                                            <p>'.$job->timing.'</p>
                                        </span>
                                    </li>
                                </ul>
                                <div class="show-job-detail">
                                    <a href="'.$url.'">Show Job Details</a>
                                </div>
                            </div>
                            <div class="ribbon">New!</div>
                        </div>';
            }
            
            $output .= '<div class="row" id="remove-row">
                        <div class="col-md-12 col-sm-12">
                            <div class="load-more">
                                <button id="btn-more" data-id="'.$job->job_id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent" > Load More </button>

                            </div>
                        </div>
                    </div>';
            
            echo $output;
        }
    }
}
