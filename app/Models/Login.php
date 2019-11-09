<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Login extends Model {

           public static function userlogin($name,$psw){
          
           //	echo "call model function";
            $response = DB::table('registration_details')
                    ->whereLogin_nameAndUser_password($name, $psw)
                    ->first();
        return $response;

           }
             public static function adminuserlogin($name,$psw){
          
           //	echo "call model function";
            $response = DB::table('registration_details')
                    ->whereUser_email_idAndUser_password($name, $psw)
                    ->first();
        return $response;

           }
    
}