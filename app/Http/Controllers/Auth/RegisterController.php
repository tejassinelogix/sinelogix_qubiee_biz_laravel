<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\VerifyUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use DB;
use Mail;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                    'name' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'dateofbirth' => 'required|date',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'phoneno' => 'required|numeric',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
        $page = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'lastname' => $data['lastname'],
            'password' => Hash::make($data['password']),
        ]);
        
     $dataid =$page->id;
     if($dataid){
         //code for crate the verifcation token
         //if reuse uncomment VerifyUser insertation ,mail and below registered funcion
         //and LoginController authenticated function
//         $verifyUser = VerifyUser::create([
//            'id' => $dataid,
//            'token' => str_random(40)
//        ]);
         //end code for crate the verifcation token
//           DB::table('users_wallets')->insertGetId(
//                [ 
//                    'users_id' => $dataid,
//                     'tr_type' => 'credit'
//                   
//                   ]
//            );  
            DB::table('profile')->insertGetId(
                [ 
                    'id' => $dataid,
                    'name' => $data['name'],
                    'lastname'=>$data['lastname'],
                    'dob'=>$data['dateofbirth'],
                    'email'=>$data['email'],
                    'contact'=>$data['phoneno'],
                   ]
            ); 
     }
//     Mail::send(['html'=>'verifyUser'],['user' => $page,'verifyUser' => $verifyUser],function ($message) use ($page){
//            $message->to($page['email'],$page['email'])->subject('verify your email account');
//            $message->from('ganesh.j@etcspl.com','Qubiee');
//        });
      return $page;
    }
    // code for after registration redirect the back page and show verfication message
//     protected function registered(Request $request, $user)
//    {
//        $this->guard('web')->logout();
//        return redirect('/')->with('status', 'We sent you an activation code. Check your email and click on the link to verify.');
//    }
    //end code here
}
