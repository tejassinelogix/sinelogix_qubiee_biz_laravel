<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\admin;
use App\Models\admin\role;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function __construct()
    {
          if( Session::has('locale') ){
            $language= $this->language = Session::get('locale');
        }    
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }

        $users = admin::all();
        // return view('admin.user.show');
        return view('Admin.user.show',compact('language','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $roles = role::all();
        // return $roles;

          return view('Admin.user.create',compact('language','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'phone' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $request['password'] = bcrypt($request->password);
        $user = admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User is Created successfully');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
           if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
//         $users = User::find($id);
       $users = admin::find($id);
        $roles = role::all();
        
      
        $usersProducts = DB::select('select * from products  where role_id    = ?', [$id]);
 
   

        return view('Admin.user.userInfo', compact('language', 'users','roles','usersProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $user = admin::find($id);
        $roles = role::all();
        return view('Admin.user.edit',compact('language','user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request,[
            //'name' => 'required|string|max:255',
            //'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric',
          //'password' => 'required|string|min:6',
        ]);
      $password_old=$request->password_old;
      $password=$request->password;
      $password_encrpt=bcrypt($request->password);
      if($request->password){
          if($password == $password_old){
              
              $request['password'] = $password;
          }  elseif($password_encrpt != $password_old) {
               
               $request['password'] = bcrypt($request->password);
          }
      }  else {  
        
           $request['password'] = $password_old;
      }
      
        $request->status? : $request['status']=0;
      
        $user = admin::where('id',$id)->update($request->except('_token','_method','role','password_old','name','email'));
        admin::find($id)->roles()->sync($request->role);
        return redirect(route('user.index'))->with('message','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        admin::where('id',$id)->delete();
        return redirect()->back()->with('message','User is deleted successfully');
    }
}
