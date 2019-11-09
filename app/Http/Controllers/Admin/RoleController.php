<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Permission;
use App\Models\admin\role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        if( Session::has('locale') ){
            $language= $this->language = Session::get('locale');
        }    
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
        $roles = role::all();
        return view('Admin.role.show',compact('language','roles'));
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
        $permissions = Permission::all();
        // return view('admin.role.create');
        return view('Admin.role.create',compact('language','permissions'));
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
            'name' =>'required|max:50|unique:roles'
            ]);
        $role = new role;
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'))->with('message','Role Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $role = role::find($id);
        $permissions = Permission::all();
        return view('Admin.role.edit',compact('language','role','permissions'));
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
            'name' =>'required|max:50'
            ]);
        $role = role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect(route('role.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        role::where('id',$id)->delete();
        return redirect()->back()->with('message','Role Deleted Successfully');
    }
}
