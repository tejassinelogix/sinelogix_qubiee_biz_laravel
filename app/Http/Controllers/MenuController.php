<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Login;
use View;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Validator;
use DB;

class MenuController extends Controller {

 public function getMenu() {
    	// $surnames = DB::table('category')->lists('category_id','category_name'); 
 	       $users = DB::select('select * from category where category_parent_id = 0');
    	 echo View::make('Admin/header')->render();
       return view('Admin/add-new-menu', compact('users'));
    }
 
     public function getAllmenu() {
        
        // $users = DB::select('select * from all_products  where status= 1');
        // $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
   
          //$users = Category::getAllProduct();
        $category_parent_id = Category::getMainCategory();
         $subcategory = Category::getSubCategory();
   			//$users = DB::select('select * from all_products where product_id = ?',[$id]); //for get data
  		 /*print_r($users);
  		 die;*/
        echo View::make('Admin/header')->render(); 
        return view('Admin/all-menus',['category_parent_id'=>$category_parent_id]); 
    }

 public function getEditmenu($id){
       // $subcategory = Category::getAllMainSubMenu($id);
       // echo "<pre>";
       // print_r($subcategory);
       // die;
 	echo View::make('Admin/header')->render();
   return view('Admin/edit-menu');  
     // return view('Admin/edit-menu',['users'=>$users,'category_parent_id'=>$category_parent_id,'subcategory'=>$subcategory]);  	
 }
      // code for add new menu
    public function postAddmenu( Request  $Request ){
  /*  echo "call function";
    print_r($_POST);
*/
  $name=trim($Request->input('title')); 
       $metatitle=$Request->input('MetaTitle'); 
      $metadescription=$Request->input('MetaDescription'); 
$metakeyword =$Request->input('MetaKeyword'); 
  $urlname=trim($Request->input('title')); 
            $urlower= strtolower($urlname);
          $url=str_replace(' ', '-',$urlower);
     $validator  = Validator::make($Request->all(), [
        'title' => 'required',
        'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
    ]);
// dimensions:min_width=200,min_height=300
    if ($validator->fails()) {
        //return redirect()->back()->withErrors($v->errors());
     // return redirect()->back()->with('errorMessage','plese enter all Details');
      return redirect('mainmenu/menu')
                        ->withErrors($validator);

    } else {

    	   if ($Request->hasFile('file-input')) {
        $image = $Request->file('file-input');
        $nameimage = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('images/menu');
        //echo  'this is file path'.$destinationPath;
    $nameimagepath="menu".'/'.$nameimage;
        //die;
        $image->move($destinationPath, $nameimage);
        //$this->save();
     DB::table('category')->insert(['category_name' => $name,'url' => $url,'meta_title' => $metatitle,'meta_description' => $metadescription,'meta_keyword' =>$metakeyword,'category_image' => $nameimagepath]);
     // DB::table('loginuser')->insert(['Username' => $Username,'Password' => $Password]);
   //return view('Admin/');
     //return redirect('administration/createproduct')->send();
          //Redirect::to('dashboard/index')->send();
   //return back()->with('success','Image Upload successfully');
   return redirect()->back()->with('success','Category Upload successfully');
        
    } else {
            return redirect()->back()->with('success','Plese Select Product  Image');
    }
       
      
     
    }
 
  }

 //code for add sub menu
         public function postAddsubmenu( Request  $Request ){
  /*  echo "call function";
    print_r($_POST);
*/
  $mainmenu=trim($Request->input('maincategory')); 
$metatitle=$Request->input('MetaTitle'); 
      $metadescription=$Request->input('MetaDescription'); 
$metakeyword =$Request->input('MetaKeyword'); 
   $submenu=trim($Request->input('subcategory')); 
    $urlname=trim($Request->input('subcategory')); 
            $urlower= strtolower($urlname);
          $url=str_replace(' ', '-',$urlower);
     $validator  = Validator::make($Request->all(), [
        'maincategory' => 'required|not_in:0',
        'subcategory' => 'required',
    ]);
// dimensions:min_width=200,min_height=300
    if ($validator->fails()) {
        //return redirect()->back()->withErrors($v->errors());
     // return redirect()->back()->with('errorMessage','plese enter all Details');
      return redirect('mainmenu/menu')
                        ->withErrors($validator);

    } else {
//$this->save();
     DB::table('category')->insert(['category_name' => $submenu,'url' => $url,'meta_title' => $metatitle,'meta_description' => $metadescription,'meta_keyword' =>$metakeyword,'category_parent_id' => $mainmenu]);
   return redirect()->back()->with('success-sub-menu','Sub Category Upload successfully');
        
   
    }
 
  } 

}

 