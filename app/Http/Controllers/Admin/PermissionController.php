<?php

namespace App\Http\Controllers\Admin;

use App\Models\admin\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
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
        $permissions = Permission::all();
      return view('Admin.permission.show',compact('language','permissions'));
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

        return view('Admin.permission.create',compact('language'));
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
            'name' =>'required|max:50|unique:permissions',
            'for'=>'required'
            ]);

        $permissions= new Permission;
        $permissions->name= $request->name;
        $permissions->forper= $request->for;
        $permissions->save();
        return redirect(route('permission.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }

         $permission= Permission::find($permission->id);
        return view('Admin.permission.edit',compact('language','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
      $this->validate($request,[
            'name' =>'required|max:50'
          //  'for'=>'required'
            ]);
        $permissions=  Permission::find($permission->id);
        $permissions->name= $request->name;
         //$permissions->forper= $request->for;
        $permissions->save();
        return redirect(route('permission.index'))->with('message','Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {

         Permission::where('id',$permission->id)->delete();

         return redirect()->back()->with('message','Permission Deleted Successfully');

    }
}
