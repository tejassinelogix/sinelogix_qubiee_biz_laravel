<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->redirectTo = url()->previous();
        $this->middleware('guest')->except('logout','userlogout');
    }

   public function userlogout()
    {
        Auth::guard('web')->logout();

        //$request->session()->invalidate();

        //return $this->loggedOut($request) ?: redirect('/');
        return redirect('/');
    }
    // code for with out verify user login chek
    // if user the code just uncomment this  authenticated function and uncomment 
    // RegisterController code
//     public function authenticated(Request $request, $user)
//    {
//        if (!$user->verified) {
//            auth()->logout();
//            return back()->with('warning', 'You need to confirm your account. We have sent you an activation code, please check your email.');
//        }
//        return redirect()->intended($this->redirectPath());
//    }
    // end here
    

}
