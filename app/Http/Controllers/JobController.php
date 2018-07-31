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
        $jobs = Job::where('lang',$motto_locale)->orderBy('id','desc')->paginate(config('common.pagination.item_per_page'));
        return view('jobs.apply_form',['jobs'=>$jobs]);
    }
    public function apply_job(Request $request)
    {
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

        if(Auth::user()){
            $user_id = Auth::user()->id;
        } else {
            request()->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'first_name_hiragana' => $request->first_name_hiragana,
                'last_name_hiragana' => $request->last_name_hiragana,
                'phone_number' => $request->phone_number,
                'date_of_birth' => $request->date_of_birth,
                'nationality' => $request->nationality,
                'gender' => $request->gender,
                'living_in_japan' => $request->living_in_japan,
                'prefecture' => $request->prefecture,
                'visa' => $request->visa,
            ]);
            $user_id = $user->id;
        }

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
        $id = $request->id;

        $motto_locale = Session::get('motto_locale');
        $jobs = Job::where('lang',$motto_locale)->where('id','<',$id)->orderBy('id','desc')->paginate(2);
        
        if(!$jobs->isEmpty())
        {
            foreach($jobs as $job)
            {
                $url = $job->id;
                                                
                $output .= '<div class="col-md-6 col-sm-6">
                            <div class="job-list-box">
                                <h4>'.$job->title.'</h4>
                                <div class="job-list-thumb">
                                    <img src="{{ asset("images/blog-1.jpg") }}" alt="MottoJob" class="img-responsive">
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
                                    <a href="">Show Job Details</a>
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
