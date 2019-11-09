<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use App\Models\admin\role;
use App\User;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use DB;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        }
        $this->middleware('auth:admin');
    }

    public function index() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        $users = User::all();
        // return view('admin.user.show');
        return view('Admin.customer.show', compact('language', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $roles = role::all();
        // return $roles;

        return view('Admin.customer.create', compact('language', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('customer.index'))->with('message', 'Customer is Created successfully');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
//         $users = User::find($id);
        $users = Category::getProfileInfo($id);

        return view('Admin.customer.customerInfo', compact('language', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $user = User::find($id);
        $user_profile = DB::select('select * from profile where id = '.$id);  
//        print_r($user_profile);
        //  $roles = role::all();
//        return view('Admin.customer.edit',compact('language','user','roles'));
        return view('Admin.customer.edit', compact('language', 'user', 'user_profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastname'=>'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|numeric',
            'address' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postalcode' => 'required',
        ]);
        $password_old=$request->input('password_old');
      $password=$request->input('password'); 
      $password_encrpt= bcrypt($request->input('password'));
        if($request->input('password')){
          if($password == $password_old){
             $passwordsave = $password;
          }elseif($password_encrpt != $password_old) {
               
               $passwordsave = $password_encrpt;
          }
      }  else {  
        
           $passwordsave = $password_old;
      }
        $data = array(
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'password' => $passwordsave,
        );
             $userName =$request->input('name');
             $lastname =$request->input('lastname');
        $userEmail = $request->input('email');
        $userContact = $request->input('contact');
        $userAddress = $request->input('address');
        $userState = $request->input('state');
        $userCountry = $request->input('country');
        $userPinCode= $request->input('postalcode');
        
        $data_profile = array(
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'address' => $request->input('address'),
            'state' => $request->input('state'),
            'country' => $request->input('country'),
            'pin_code' => $request->input('postalcode'),
        );
        // $request->status? : $request['status']=0;
        $user = User::where('id', $id)->update($data);
     
          $usersinfo = DB::select('select * from profile where id= "' . $id . '"');
        if ($usersinfo) {
                $profile = DB::table('profile')
                             ->where('id', $id)
                             ->update($data_profile);
          }  else {
               $data = DB::table('profile')->insert(['id' => $id,'name' => $userName,'lastname'=>$lastname, 'email' => $userEmail, 'pin_code' => $userPinCode, 'contact' => $userContact,'address' => $userAddress, 'state' => $userState, 'country' => $userCountry]);
                 }
                        
             
       

//        admin::find($id)->roles()->sync($request->role);
        return redirect(route('customer.index'))->with('message', 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        User::where('id', $id)->delete();
        return redirect()->back()->with('message', 'Customer is deleted successfully');
    }

}
