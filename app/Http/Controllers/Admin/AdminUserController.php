<?php

namespace App\Http\Controllers\Admin;

use Mail;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;
use Config;
use App;

class AdminUserController extends Controller
{
    use AuthenticatesUsers;

    public function login(){
      return view('admin.login');
    }

    public function validateLogin(Request $request){
      $this->validate($request, [
        'email'  => 'required|max:100|email',
        'password'  => 'required|string',
      ]);

      if ($this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);
          return $this->sendLockoutResponse($request);
      }

      $admin = new User();
      if($admin->validateCredentials($request)){
        return redirect(route('adminDashboard'));
      }
      $this->incrementLoginAttempts($request);
      return redirect()->route('adminLoginForm')->with('message',['danger'=>'Invalid credential.']);
    }

    public function adminDashboard(){
      if(!Session::has('lang_locale')){
          $lang_locale = Config::get('app.locale');
          session(['lang_locale' => $lang_locale]);
      } else {
          $lang_locale = Session::get('lang_locale');
      }
      App::setLocale($lang_locale);
      return view('admin.dashboard');
    }

    public function allUsernames(Request $request){
      $usernames = UsernameSuggestion::orderBy('username')->paginate(config('common.pagination.item_per_page'));
      return view('admin.usernames.all_usernames',['usernames'=>$usernames,'request'=>$request]);
    }

    public function deleteUsername(Request $request){
      $this->validate($request, [
        'id'             => 'required|exists:username_suggestions,id',
      ]);

      $username = UsernameSuggestion::find($request->id);
      $username->delete();
      session()->flash('message',['success'=>'Username has been successfully deleted.']);
      $page = "";
      if($request->page > 0){
        $page = "?page=".$request->page;
      }
      return redirect(route('allUsernames').$page);
    }

    public function saveUsername(Request $request){

      $check = User::where('username',$request->username)->count();
      if($check > 0){
        session()->flash('message',['warning'=>'Duplicate Username! Please choose different Username.']);
        return redirect()->back();
      }

      if(@$request->id > 0){
          die('no edit');
        // $check = UsernameSuggestion::where('username',$request->username)->where('id','!=',$request->id)->count();
        // if($check > 0){
        //   session()->flash('message',['success'=>'Already Suggested! Please choose different Username']);
        //   return redirect()->back();
        // }
        // $this->validate($request, [
        //   'id'             => 'exists:username_suggestions,id',
        //   'username'       => 'required',
        //   'jockey_silk_no' => 'image|mimetypes:gif|size:10',
        // ]);
        // $username = UsernameSuggestion::find($request->id);
      }else{
        $check = UsernameSuggestion::where('username',$request->username)->count();
        if($check > 0){
          session()->flash('message',['warning'=>'Already Suggested! Please choose different Username']);
          return redirect()->back();
        }
        $this->validate($request, [
          'username'             => 'required',
          'jockey_silk_no' => 'required|image|mimetypes:image/gif|max:10',
        ]);

        $jockeySilks = new JockeySilk();
        $jockeySilks->used = 0;
        $jockeySilks->save();

        $username = new UsernameSuggestion();
        $username->username = $request->username;
        if(!empty($request->jockey_silk_no)){
          $imagePath = public_path('images');
          $imageName = $jockeySilks->id.'.'.$request->jockey_silk_no->getClientOriginalExtension();
          $request->jockey_silk_no->move($imagePath.'/silk', $imageName);
        }
        $username->jockey_silk_no = $jockeySilks->jockey_silk_no;
        $username->save();
      }

      session()->flash('message',['success'=>'Username has been successfully inserted.']);
      return redirect(route('allUsernames'));
    }

    public function usernameNew(){
      return view('admin.usernames.username');
    }

    public function allUsers(Request $request){
      $pendingUsers = User::where('account_status','pending')->count();
      $activeUsers = User::where('account_status','active')->count();
      if($request->search_hint != ''){
        $field = ($request->search_option != '') ? $request->search_option : 'username';
        $users = User::where($field,'LIKE','%'.$request->search_hint.'%')->paginate(config('common.pagination.item_per_page'));
      }else {
        $users = User::paginate(config('common.pagination.item_per_page'));
      }

      return view('admin.users.all_users',['users'=>$users,'pendingUsers'=>$pendingUsers,'activeUsers'=>$activeUsers]);
    }

    public function usersAction(Request $request){
      $this->validate($request, [
        'user_id'             => 'required|exists:users,id',
        'action'              => 'required',
      ]);

      $user = User::find($request->user_id);
      if($request->action == 'delete'){
          $silk = JockeySilk::find($user->silk_code);
          $silk->username = NULL;
          $silk->used = 0;
          $silk->update();
          // TO DO
          // remove user entry from following tables
          // user_mtd_details
          // user_ytd_details
          // season_div_user_lg
          // overall_table
          // monthly_report
          // bettings
          $user->delete();
          session()->flash('message',['success'=>'User deleted successfully.']);
      }else{
        $user->account_status = $request->action;
        $user->update();
        session()->flash('message',['success'=>'User status updated successfully.']);
      }
      return redirect(route('allUsers'));
    }

    public function usersHint(Request $request){
      $field = ($request->field == '') ? 'username' : $request->field;
      $users = User::where($field,'LIKE','%'.$request->hint.'%')->where('account_status', $request->status)->get();
      $return = array();
      foreach ($users as $key => $user) {
        $return[] = ['id'=>$user->id,'label'=>$user->$field];
      }
      return $return;
    }

    public function user(Request $request){
      $user = User::find($request->id);
      $countries = Country::orderBy('country_name')->get();
      return view('admin.users.user',['user'=>$user,'countries'=>$countries]);
    }

    public function updateUser(Request $request){
      $this->validate($request, [
          'email'           => 'required|string|email|max:255',
          'full_name'       => 'required|max:100',
          'gender'          => 'required|in:male,female',
          'date_of_birth'   => 'required|date|before_or_equal:'.date('Y-m-d 00:00:00',strtotime('-18 year')),
          'city'            => 'required|max:40',
          'country'         => 'required|exists:countries,country_id',
          'hear'            => 'required|max:50',
          'quote'           => 'required|max:100',
          'silk_code'       => 'required|exists:jockey_silks,jockey_silk_no',
          'created_at'      => 'required',
          'ip'              => 'required',
          'id'              => 'required|exists:users,id'
      ]);

      extract($request->all());
      $user = User::find($id);
      $oldSilkCode = $user->silk_code;
      $user->email          = trim($email);
      $user->full_name      = trim($full_name);
      $user->gender         = trim($gender);
      $dob = explode("/",$date_of_birth);
      $date_of_birth = $dob[1]."-".$dob[0].'-'.$dob[2];
      $user->date_of_birth  = trim(date('Y-m-d 00:00:00',strtotime($date_of_birth)));
      $user->city           = $request->city;
      $user->country        = $request->country;
      $user->hear           = $request->hear;
      $user->quote          = $request->quote;
      $user->silk_code      = $request->silk_code;
      //$created = explode("/",$created_at);
      //$created_at = $created[1]."-".$created[0].'-'.$created[2];
      //echo $user->created_at     = trim(date('Y-m-d 00:00:00',strtotime($created_at)));
      $user->ip             = $request->ip;

      if($password != ''){
        $user->password = bcrypt($password);
      }

      $user->update();

      if($oldSilkCode != $request->silk_code){
        $silk = JockeySilk::find($user->silk_code);
        $silk->username = NULL;
        $silk->used = 0;
        $silk->update();

        $silk = JockeySilk::find($id);
        $silk->username = $user->username;
        $silk->used = 1;
        $silk->update();
      }
      session()->flash('message',['success'=>'User updated successfully.']);
      return redirect(route('user',['id'=>$id]));
    }

    public function premiumMembers(){
      $users = User::where('member_type', '1')->paginate(config('common.pagination.item_per_page'));
      $mailTemplate = MailTemplate::find(4);
      return view('admin.users.premium',['users'=>$users,'mailTemplate'=>$mailTemplate]);
    }

    public function updateUserMembership(Request $request){
      if(isset($request->renew) && isset($request->release)){
        session()->flash('message',['success'=>'You cannot select both option at a time!']);
        return redirect(route('premiumMembers'));
      }

      if(count(@$request->renew) > 0){
        $mailTemplate = MailTemplate::find(3);
        $mailTemplate->body = str_replace('"', "'", $mailTemplate->body);

        foreach ($request->renew as $key => $renew) {
          $user = User::find($renew);
          $user->vip_expire = date('Y-m-d', strtotime($user->vip_expire . "+".$request->period." months") );
          $user->vip_amount = $request->amount;
          $user->member_type = 1;
          $user->update();

          Mail::send(
            'layouts.mail',
            ['content' => $mailTemplate->body],
            function($message) use ($user,$mailTemplate) {
              $message->to($user->email, $user->username)->subject($mailTemplate->subject);
            }
          );
          /* TO DO send mail to admin*/
        }
        session()->flash('message',['success'=>'Members Renewed and Mail sent to them successfully.']);
        return redirect(route('premiumMembers'));
      }

      if(count(@$request->release) > 0){
        foreach ($request->release as $key => $renew) {
          $user = User::find($renew);
          $user->member_type = 0;
          $user->vip_expire = date('Y-m-d');
          $user->update();

          Mail::send(
            'layouts.mail',
            ['content' => $request->mail_body],
            function($message) use ($user,$request) {
              $message->to($user->email, $user->username)->subject($request->mail_subject);
            }
          );
        }
        session()->flash('message',['success'=>'Members Released and Mail sent to them successfully.']);
        return redirect(route('premiumMembers'));
      }
      session()->flash('message',['warning'=>'Can not process request.']);
      return redirect(route('premiumMembers'));
    }

    public function freeMembers(Request $request){
      $users = User::where('member_type', '0')->paginate(config('common.pagination.item_per_page'));
      $mailTemplate = MailTemplate::find(1);
      return view('admin.users.free',['users'=>$users,'mailTemplate'=>$mailTemplate]);
    }

    public function updateFreeUserMembership(Request $request){
      if(isset($request->send) && isset($request->updagrade)){
        session()->flash('message',['success'=>'You cannot select both option at a time!']);
        return redirect(route('freeMembers'));
      }

      if(count(@$request->send) > 0){
        foreach ($request->send as $key => $renew) {
          $user = User::find($renew);
          $user->member_type = 0;
          $user->vip_expire = date('Y-m-d');
          $user->update();

          Mail::send(
            'layouts.mail',
            ['content' => $request->mail_body],
            function($message) use ($user,$request) {
              $message->to($user->email, $user->username)->subject($request->mail_subject);
            }
          );
        }
        session()->flash('message',['success'=>'Mail sent successfully to Free Members for Membership upgradation.']);
        return redirect(route('freeMembers'));
      }
      if(count(@$request->updagrade) > 0){

        $mailTemplate = MailTemplate::find(2);
        $mailTemplate->body = str_replace('"', "'", $mailTemplate->body);

        foreach ($request->updagrade as $key => $renew) {
          $user = User::find($renew);
          if(!is_null($user->vip_expire)){
              $user->vip_expire = date('Y-m-d', strtotime($user->vip_expire . "+".$request->period." months") );
          }else{
              $user->vip_expire = date('Y-m-d', strtotime("+".$request->period." months") );
          }
          $user->vip_amount = $request->amount;
          $user->member_type = 1;
          $user->update();

          Mail::send(
            'layouts.mail',
            ['content' => $mailTemplate->body],
            function($message) use ($user,$mailTemplate) {
              $message->to($user->email, $user->username)->subject($mailTemplate->subject);
            }
          );
          /* TO DO send mail to admin*/
        }
        session()->flash('message',['success'=>'Members Upgraded and Mail sent to them successfully.']);
        return redirect(route('freeMembers'));

      }

      session()->flash('message',['warning'=>'Can not process request.']);
      return redirect(route('freeMembers'));
    }

    public function adminUsers(Request $request){
      $users = AdminUser::paginate(config('common.pagination.item_per_page'));
      return view('admin.users.admin_list',['users'=>$users]);
    }

    public function adminNew($id = 0){
      $count = AdminUser::where('account_type','subadmin')->count();
      if($count >= 2 && $id == 0){
        session()->flash('message',['danger'=>'Sorry!!! Two SubAdmin Login Details already present. You cannot create more than TWO SubAdmin. ']);
        return redirect(route('adminUsers'));
      }
      if($id > 0){
          $user = AdminUser::find($id);
          return view('admin.users.admin_new',['user'=>$user]);
      }
      return view('admin.users.admin_new');
    }

    public function adminSave(Request $request){

      if($request->id > 0){
        $this->validate($request, [
            'username'        => 'required|string|min:6',
            'email'           => 'required|string|email'
        ]);
        $user = AdminUser::find($request->id);
      }else{
        $this->validate($request, [
            'username'        => 'required|string|min:6',
            'password'        => 'required|string|min:6|confirmed',
            'email'           => 'required|string|email'
        ]);
        $count = AdminUser::where('account_type','subadmin')->count();
        if($count >= 2){
          session()->flash('message',['danger'=>'Sorry!!! Two SubAdmin Login Details already present. You cannot create more than TWO SubAdmin. ']);
          return redirect(route('adminUsers'));
        }
        $user = new AdminUser();
      }
      $user->username = $request->username;
      $user->account_type = "subadmin";
      if($request->password != ''){
          $user->password = bcrypt($request->password);
      }
      $user->email = $request->email;
      $user->save();
      if($request->id > 0){
        session()->flash('message',['success'=>'Admin Profile has been successfully edited.']);
      }else{
        $mailTemplate = MailTemplate::find(7);
        $search = array('[USERNAME]','[PASSWORD]');
        $replase = array($request->username,$request->password);
        $mailTemplate->body = str_replace($search, $replase, $mailTemplate->body);
        Mail::send(
          'layouts.mail',
          ['content' => $mailTemplate->body],
          function($message) use ($request,$mailTemplate) {
            $message->to($request->email, $request->username)->subject($mailTemplate->subject);
          }
        );
        // TO DO send mail to admin
        session()->flash('message',['success'=>'Sub-Admin Account has been Successfully Created. A Mail has been sent to Administrator and Sub-Admin.']);
      }
      return redirect(route('adminUsers'));
    }

    public function checkDuplicateAdminUsername(Request $request){
      $user = AdminUser::where('username',$request->username);
      if(@$request->id > 0){
        $user->where('id','!=',$request->id);
      }
      $user = $user->count();
      return json_encode((($user > 0) ? false: true));
    }

    public function checkDuplicateAdminEmail(Request $request){
      $user = AdminUser::where('email',$request->email);
      if(@$request->id > 0){
        $user->where('id','!=',$request->id);
      }
      $user = $user->count();
      
      return json_encode((($user > 0) ? false: true));
    }

    public function adminDelete(Request $request){
      $this->validate($request, [
          'id'        => 'required|exists:admin_users,id',
      ]);
      $user = AdminUser::find($request->id);
      $user->delete();
      session()->flash('message',['success'=>'Admin Account has been successfully deleted.']);
      return redirect(route('adminUsers'));
    }
}
