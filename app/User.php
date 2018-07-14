<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function validateCredentials($request){
        $user = self::where('email', addslashes(trim($request->email)))->where('type',0)->first();
        if($user){
          if (Hash::check($request->password, $user->password)){
            unset($user->password);
            session()->regenerate();
            session()->put('account_type', 'Admin');
            session()->put('user', $user);
            //session()->put('admin_acl', $adminAcl);
            $this->log($request,$request->email,'login','success');
            return true;
          }
        }
        $this->log($request,$request->email,'login','fail');
        return false;
    }

    public function log($request,$username,$action,$result){
        DB::table('admin_login_log')->insert([
          'username'      => $username,
          'action'        => $action,
          'result'        => $result,
          'request_time'  => $request->server('REQUEST_TIME'),
          'user_agent'    => $request->server('HTTP_USER_AGENT'),
          'user_ip'       => $request->server('REMOTE_ADDR'),
          'session_id'    => session()->getId(),
        ]);
    }
}
