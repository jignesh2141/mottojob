<?php

namespace App;

use DB;
use App\AdminAcl;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Model
{
  public function validateCredentials($request){
    $user = self::where('email', addslashes(trim($request->email)))->first();
    if($user){
      if (Hash::check($request->password, $user->password)){
        unset($user->password);
        $adminAcl = AdminAcl::getAdminAcl($user->account_type);
        session()->regenerate();
        session()->put('account_type', $user->account_type);
        session()->put('user', $user);
        //session()->put('admin_acl', $adminAcl);
        $this->log($request,$request->email,'login','success');
        return true;
      }
    }
    $this->log($request,$request->email,'login','fail');
    return false;
  }

  /*public function log($request,$username,$action,$result){
    DB::table('admin_login_log')->insert([
      'username'      => $username,
      'action'        => $action,
      'result'        => $result,
      'request_time'  => $request->server('REQUEST_TIME'),
      'user_agent'    => $request->server('HTTP_USER_AGENT'),
      'user_ip'       => $request->server('REMOTE_ADDR'),
      'session_id'    => session()->getId(),
    ]);
  }*/

}
