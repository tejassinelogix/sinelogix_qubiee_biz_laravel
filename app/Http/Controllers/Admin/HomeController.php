<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\admin\role;
use App\Models\user\product;
use App\Models\user\category;
use App\Models\user\User ;
use App\Admin;

class HomeController extends Controller
{ /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
//          $countproduct = product::count();
////         $countcategory = category::count();
//          $countUser = Admin::count();
//           $countrole = role::count();
//       return view('Admin/admin/home',compact('countproduct','countUser','countrole'));
         $usertype=(Auth::user()->job_title);
        if($usertype='superadmin'){
              $research = product::where('role_id','=',Auth::user()->id)->get();
          $countproduct=count($research);
        }  else {
            $countproduct = product::count();
        }
         $countcategorydata = DB::table('category')->get();
        $countcategory= count($countcategorydata);
       
//         $countcategory = Category::count();
          $countUser = admin::count();
           $countrole = role::count();
        echo view('Admin.index',compact('countproduct','countUser','countrole','countcategory'));
    }
}
