<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Validator;
use DB;
use Auth;
use Mail;
use App\VerifyAdminUser;
use App\Admin;

class AdminLoginController extends Controller
{
    public function __construct(){
		$this->middleware('guest:admin', ['except' => ['logout']]);
	}
        

    public function showLoginForm(){        
    	return view('auth.admin-login');
    }

    public function showRegForm(){
          return view('auth.adminregister');
    }
    public function addvendore(Request $Request){
       

       $name=$Request->input('name'); 
      $email=$Request->input('email'); 
     $phone=$Request->input('phone'); 
      $Pass=$Request->input('password'); 
      $confirm=$Request->input('confirm'); 
      $job_title='vendor';
     $Password=Hash::make($Pass);
     $validator  = Validator::make($Request->all(), [
        'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
             'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
         'password_confirmation' => 'required|same:password',
    ]);

    if ($validator->fails()) {
        
        //return redirect()->back()->withErrors($v->errors());
     return redirect()->back()->with('errorMessage','Plese enter all Details');
      //return redirect('index/registration')
                        //->withErrors($validator);

    } else {
    
     $data = array("name" => "qubiee");
//     Mail::send(['text'=>'mail'], $data, function($message) {
//          $message->to('poojabochare99@gmail.com', 'Qubiee')->subject
//             ('Laravel Basic Testing Mail');
//          $message->from('mainaccount@xtacky.com','Qubiee');
//     });
    
       
   //$dataid= DB::table('admins')->insert(['name' => $name,'email' => $email,'phone' => $phone,'status' => 0,'job_title' => "admin",'password' => $Password]);
       $page = Admin::create([
                         'name' => $name,
                         'email' => $email,
                         'phone' => $phone,
                         'status' => 0,
                         'job_title' => "admin",
                         'password' => $Password]);
       $dataid =$page->id;
   $verifyUser = VerifyAdminUser::create([
            'id' => $dataid,
            'token' => str_random(40)
        ]);
      Mail::send(['html'=>'verifyAdminUser'],['admin' => $page,'verifyUser' => $verifyUser],function ($message) use ($page){
            $message->to($page['email'],$page['email'])->subject('verify your email account');
            $message->from('ganesh.j@etcspl.com','Qubiee');
        }); 
        Mail::send(['html'=>'verifyAdminNotif'],['admin' => $page,'verifyUser' => $verifyUser],function ($message) use ($page){
            $message->to('sales@qubiee.com',$page['email'])->subject('account registration notification');
            $message->from('ganesh.j@etcspl.com','Qubiee');
        }); 
    
    return redirect()->back()->with('sucussMessage',"Account successfully registered as vendor,We sent you an activation link . Check your email and click on the link to verify. and will be activated after admin's approval !");
   // return view('login');
    }

   }

    public function login(Request $request){
    	//Validate the form data

    	$this->Validate($request,[
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	// Attempt to log the user in

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {

    		//if successfull
    		return redirect()->intended(route('admin.dashboard'));

    	}
    	//if fails
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        //$request->session()->invalidate();

        //return $this->loggedOut($request) ?: redirect('/');
        return redirect('/');
    }




}
