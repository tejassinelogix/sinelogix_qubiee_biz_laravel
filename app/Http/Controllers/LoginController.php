<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Login;
use App\Models\Category;
use App\Form; 
use View;
use File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Validator;
use DB;

class LoginController extends Controller {

	//code for dashboard function
	public function getDashboard() {
		//$data['header'] = View::make('dashboard-header')->render();
	echo View::make('Admin/header')->render();
        return view('Admin/index');
       
    }
    //code for show admin login page show
    public function PostLogin() {
        return view('Admin/page-login');
       
    }
    // code for registration page shown
     public function getRegistration() {
        //echo "call now";
        return view('Admin/page-register');
    }
   
    //code for login user check valid or not
       public function postLoginuser( Request  $Request ){
        	$name=$Request->input('email'); 
        $psw=$Request->input('password'); 
    
        if(!empty($name) && !empty($psw)){
              $abc=Login::adminuserlogin($name,$psw);
                   if(count($abc)> 0){
          Session::set('successful_login','yes');
          //return View('product-details');
            Redirect::to('administration/dashboard')->send();
        }else{
                
        return redirect()->back()->with('errorMessage','Invalid Credentials, Plese Try Agin');
                }
        } else{
          return redirect()->back()->with('errorMessage','Plese Eneter The Username And Password');

        }
       
    }
    // code for shwo all the created product list page
     public function getProduct() {
        //echo "call now";
         $users = DB::select('select * from all_products  where status= 1');
  		 /*print_r($users);
  		 die;*/
        echo View::make('Admin/header')->render(); 
      return view('Admin/all-products',['users'=>$users]);
        //return view('Admin/all-products');
    }
    // code for shown create product page
     public function getCreateproduct() {
        //echo "call now";
         $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
          $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
        echo View::make('Admin/header')->render();
        return view('Admin/add-new-product',compact('users','categoryall'));
    }
    // code for add admin panel user regisration
       public function postAdduserdetails( Request  $Request ){
  /*  echo "call function";
    print_r($_POST);
*/
   echo "we are working....on this page";
   
   die;
      $name=$Request->input('name'); 
      $email=$Request->input('email'); 
     
     // $Username=$Request->input('username'); 
      $Password=$Request->input('password'); 
      $confirm=$Request->input('confirm'); 
     
     $validator  = Validator::make($Request->all(), [
        'name' => 'required',
        'email' => 'required|email',
         'password' => 'required|min:6',
         'confirm' => 'required|same:password',
    ]);

    if ($validator->fails()) {
        //return redirect()->back()->withErrors($v->errors());
     // return redirect()->back()->with('errorMessage','plese enter all Details');
      return redirect('administration/registration')
                        ->withErrors($validator);

    } else {
      
       DB::table('registration_details')->insert(['user_name' => $name,'user_email_id' => $email,'login_name' => $email,'user_password' => $Password]);
      DB::table('loginuser')->insert(['Username' => $email,'Password' => $Password]);
   return view('page-register');
    }
 
  }

           //code for add product 
            public function postAddproduct( Request  $Request ){
  /*  echo "call function";
    print_r($_POST);
*/
     //   $file = $Request->file('file-input');
        //Display File Name
      //echo 'File Name: '.$file->getClientOriginalName();
      //echo '<br>';
      //Display File Extension
      //echo 'File Extension: '.$file->getClientOriginalExtension();
      //echo '<br>';
   
      //Display File Real Path
      //echo 'File Real Path: '.$file->getRealPath();
      //echo '<br>';
   
      //Display File Size
      //echo 'File Size: '.$file->getSize();
      //echo '<br>';
   
      //Display File Mime Type
      //echo 'File Mime Type: '.$file->getMimeType();
   
      //Move Uploaded File
 
  // echo "<pre>";
  // echo  print_r($_POST);
  // die;

      $name=$Request->input('title'); 
      $price=$Request->input('price'); 
     
      $description=$Request->input('description'); 

      $shortdescription=$Request->input('shortdescription'); 
     $url=$Request->input('url'); 
      $maincategory=$Request->input('maincategory'); 
       $subcategory=$Request->input('subcategory'); 
            $offer=$Request->input('offer'); 
            $country=$Request->input('country'); 
             $section=$Request->input('section'); 
               $metatitle=$Request->input('MetaTitle'); 
      $metadescription=$Request->input('MetaDescription'); 
$metakeyword =$Request->input('MetaKeyword'); 
$original_price =$Request->input('originalprice'); 
 $productfile =$Request->input('photos'); 
 
 
 $to_date=$Request->input('to_date'); 
 $from_date=$Request->input('from_date'); 
 // echo "<pre>";
 // print_r($_FILES);
 // die;
  
        if (!empty($url)) {
        	$urlname=trim($Request->input('url')); 
            $urlower= strtolower($urlname);
          $url=str_replace(' ', '-',$urlower);
         // echo  $url;
         // die;
        } else{
        	$urlname=trim($Request->input('title')); 
            $urlower= strtolower($urlname);
          $url=str_replace(' ', '-',$urlower);
             
        }

     $validator  = Validator::make($Request->all(), [
     	'title' => 'required',
     	//'price' => 'required',
     	//'shortdescription' => 'required',
     	//'url' => 'required',
     	'description' => 'required',
     	//'maincategory' => 'required|not_in:0',
     	//'subcategory' => 'required|not_in:0',
     	//'offer' => 'required|not_in:0 ',
     	'country' => 'required ',
     	//'MetaTitle' => 'required ',
     	//'MetaDescription' => 'required ',
     	//'MetaKeyword' => 'required ',
        'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
    ]);
// dimensions:min_width=200,min_height=300
    if ($validator->fails()) {
        //return redirect()->back()->withErrors($v->errors());
     // return redirect()->back()->with('errorMessage','plese enter all Details');
      return redirect('administration/createproduct')
                        ->withErrors($validator);

    } else {

    	   if ($Request->hasFile('file-input')) {
        $image = $Request->file('file-input');
        $strname = 'xtacky';
        $nameimageex = $image->getClientOriginalExtension();
         $nameimagename=$image->getClientOriginalName();
         $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',str_replace(' ', '-',$nameimagename));
                  // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
        $nameimage= $withoutExt.''.str_shuffle($strname).'.'.$nameimageex;
        
        //$nameimage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images');
        //echo  'this is file path'.$destinationPath;
        //xtacky/public_html/public/images
        //die;
        
        //$this->save();
     $data=DB::table('all_products')->insertGetId(['product_name' => $name,'product_price' => $price,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $description,'meta_keyword' =>$metakeyword,'original_price' =>$original_price,'product_image' => $nameimage,'offer_start_date' => $from_date,'offer_expire_date' => $to_date]);

  if( $data > 0)
    {
     //$data=45;
    	$image->move($destinationPath, $nameimage);
                $today = date("Ymd");
                          $unique = "XT".$today . $data;
                               DB::table('products')
                   ->where('id', $data)
                   ->update(['product_ref_number' => $unique]);
      //              return redirect()->back()->with('ordersuccess','Your reference number : '.$unique);
    	 		    	$users = DB::table('products')
		                     ->select('id', 'main_category','sub_category')
		                     ->where('id', '=', $data)
		                     ->get();
                $array = json_decode(json_encode($users), true);
                     $product_id=$array[0]['id'];
                          $main_category=$array[0]['main_category'];
                         $sub_category= $array[0]['sub_category'];
            if ($Request->hasFile('photos')) {
                        $getProductimagedetails = Category::getProductimagedetails($product_id);
             foreach ($getProductimagedetails  as $getProductimage) 
                                        {
                                         $lang_invitee= explode('|', $getProductimage->images_name);
                                      
                                         foreach ($lang_invitee  as $key => $value) 
                                        {
                                    $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
                                    if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                        unlink($usersImage);
                                        }  
                                        } } 
                         $data=array();
      foreach($Request->file('photos') as $image)
            {
           $strname = 'xtacky';
            $nameimageprodex = $image->getClientOriginalExtension();
         $nameimagenameprod=$image->getClientOriginalName();
         $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagenameprod));
                  // $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                  $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
                //$name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product_image', $name);  
                $data[] = 'product_image/'.$name;  
            }
              DB::table('product_images')->insert( [
        'images_name'=>  implode("|",$data),
        'product_id' =>$product_id,
        'category_id' =>$main_category,
        'sub_category' =>$sub_category,
        //you can put other insertion here
    ]);
    	return redirect()->back()->with('success','Product  Upload successfully');
    }else {
        return redirect()->back()->with('success','Product  Upload successfully');
    }
        
    }
   } else {
          return redirect()->back()->with('success','plese select product  image');
    }
       
      
     
    }
 
  }


	public function getUserinfo( Request  $Request ){
  		 $users = DB::select('select * from all_products');
  		 /*print_r($users);
  		 die;*/

      return view('all-products',['users'=>$users]);
  	}
  	//code for show edit the produt page
 public function getShow($id){

$category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
  //$category_parent_id = json_decode(json_encode($category_parent), true);
    
          $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) '); //get main sub categry
  
  			$users = DB::select('select * from products where id = ?',[$id]); //for get data
  			   $array = json_decode(json_encode($users), true);

        $main_category_id = $array[0]['main_category'];
          
        $getProductimagedetails = Category::getProductimagedetails($id);
               $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);
                        // echo "<pre>";
  			// print_r($users);
  			// die;
  			echo View::make('Admin/header')->render();
   return view('Admin/edit-product',['users'=>$users,'category_parent_id'=>$category_parent_id,'subcategory'=>$subcategory,'getAllsubmenuparent'=>$getAllsubmenuparent,'getProductimagedetails'=>$getProductimagedetails]);  		
  	}


      //code for submit product  edit form 
  	public function postUpdateinfo(Request  $Request){
  	
  	
			    
 $edittitle=$Request->input('title'); 
  			 $product_id=$Request->input('product_id'); 
		$image=$Request->input('file-input');
			 $editprice=$Request->input('price'); 
			  $editdescription=$Request->input('product-description'); 

              $shortdescription=$Request->input('shortdescription'); 
               $url=$Request->input('url'); 
                $maincategory=$Request->input('maincategory'); 
				$subcategory=$Request->input('subcategory'); 
              $offer=$Request->input('offer'); 
               $country=$Request->input('country'); 
                $section=$Request->input('section');
                  $metatitle=$Request->input('MetaTitle'); 
                  $metadescription=$Request->input('metadescription');
                   $metakeyword=$Request->input('MetaKeyword');
                   $original_price =$Request->input('originalprice'); 
              $fileoldpath=$Request->input('filepath');
               $filepath_product=$Request->input('filepath_product');
               $offer_start_date = $Request->input('offer_start_date');
               $offer_expire_date = $Request->input('offer_expire_date');
			     $validator  = Validator::make($Request->all(), [
			        'title' => 'required',
                    'price' => 'required',
                    'product-description' => 'required',
                    'shortdescription' => 'required',
                    //'maincategory' => 'required|not_in:0',
                   // 'subcategory' => 'required|not_in:0',
                    //'offer' => 'required|not_in:0 ',
                    'country' => 'required ',
                        //'MetaTitle' => 'required ',
                        //'metadescription' => 'required ',
                        //'MetaKeyword' => 'required ',
                        // 'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);
			
						  
			     if ($validator->fails()) {
			      
      		     	return redirect()->back()
                        ->withErrors($validator);

    } else {

			if ($Request->hasFile($image)) {
				 
        $image = $Request->file('file-input');
				 $strname = 'xtacky';	     
        $nameimageex = $image->getClientOriginalExtension();
         $nameimagename=$image->getClientOriginalName();
         $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagename));
//                   $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
             $nameimage= $withoutExt.''.str_shuffle($strname).'.'.$nameimageex;
//        echo $nameimage;
//        die;
         $destinationPath = public_path('images');
        //echo  'this is file path'.$destinationPath;
        //die;
           $image->move($destinationPath, $nameimage);

				DB::table('all_products')
            ->where('id', $product_id)
            ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $nameimage]);
                 if ($Request->hasFile('photos')) {
                          $getProductimagedetails = Category::getProductimagedetails($product_id);
             foreach ($getProductimagedetails  as $getProductimage) 
                                        {
                                         $lang_invitee= explode('|', $getProductimage->images_name);
                                      
                                         foreach ($lang_invitee  as $key => $value) 
                                        {
                                    $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
                                    if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                        unlink($usersImage);
                                        }  
                                        } } 
                         $data=array();
      foreach($Request->file('photos') as $image)
            {
           $strname = 'xtacky';
             $nameimageprodex = $image->getClientOriginalExtension();
         $nameimagenameprod=$image->getClientOriginalName();
         $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
          $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
                //$name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product_image', $name);  
                $data[] = 'product_image/'.$name;  
            }
    if (!$getProductimagedetails) {
                           DB::table('product_images')->insert( [
        'images_name'=>  implode("|",$data),
        'product_id' =>$product_id,
        'category_id' =>$main_category,
        'sub_category' =>$sub_category,
        //you can put other insertion here
    ]);
         } else {
               DB::table('product_images')
                      ->where('product_id', $product_id)
                      ->update( [
        'images_name'=>  implode("|",$data),
        'product_id' =>$product_id,
        'category_id' =>$maincategory,
        'sub_category' =>$subcategory,
        //you can put other insertion here
    ]);
                             }
    	return redirect()->back()->with('success','Product  Upload successfully');
    }else {
        return redirect()->back()->with('success','Product  Upload successfully');
    }
                                
         //return redirect()->back()->with('success','Product  Updated Successfully');
    } else {
      
        DB::table('all_products')
            ->where('product_id', $product_id)
            ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $fileoldpath,'offer_start_date' => $offer_start_date,'offer_expire_date' => $offer_expire_date]);
         //    return redirect()->back()->with('success','Product  updated successfully');
                      if ($Request->hasFile('photos')) {
                            
                            
       
                       $getProductimagedetails = Category::getProductimagedetails($product_id);
                      // $array = json_decode(json_encode($getProductimagedetails), true);
                    
                       foreach ($getProductimagedetails  as $getProductimage) 
                                        {
                                 
                                         $lang_invitee= explode('|', $getProductimage->images_name);
                                      
                                         foreach ($lang_invitee  as $key => $value) 
                                        {
                                    $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
                                    if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                        unlink($usersImage);
                                        }  
                                        } }
             
                          $data=array();
      foreach($Request->file('photos') as $image)
            {
      
           $strname = 'xtacky';
          $nameimageprodex = $image->getClientOriginalExtension();
         $nameimagenameprod=$image->getClientOriginalName();
         $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',str_replace(' ', '-',$nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                    $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
                //$name=$image->getClientOriginalName();
                $image->move(public_path().'/images/product_image', $name);  
                $data[] = 'product_image/'.$name;  
            }
             if (!$getProductimagedetails) {
                           DB::table('product_images')->insert( [
        'images_name'=>  implode("|",$data),
        'product_id' =>$product_id,
        'category_id' =>$maincategory,
        'sub_category' =>$subcategory,
        //you can put other insertion here
    ]);
         } else {
             DB::table('product_images')
                      ->where('product_id', $product_id)
                      ->update( [
        'images_name'=>  implode("|",$data),
        'product_id' =>$product_id,
        'category_id' =>$maincategory,
        'sub_category' =>$subcategory,
        //you can put other insertion here
    ]);
                             }
    
            return redirect()->back()->with('success','Product  Upload successfully');
    }else {
        return redirect()->back()->with('success','Product  Upload successfully');
    }     
        }
		}		
  	}


  	public function getDelete($id) {
      //DB::delete('delete from student where id = ?',[$id]);
      DB::table('all_products')
            ->where('product_id', $id)
            ->update(['status' => 0]);
            return redirect()->back()->with('success','Product  Deleted successfully');
   }
   // code for add banner slider page




    public function subcat(Request $Request)
    { 
       
       $id = $_GET['id'];
     
       $states = DB::table('category')->where('category_parent_id', $id)->pluck('category_id','category_name');

//       $states = DB::table("category")
//                    ->where("category_parent_id",$id )
//                    ->lists("category_id","category_name");
        return response()->json($states);
    }

}









// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use App\Http\Requests;
// use App\Models\Login;
// use App\Models\Category;
// use App\Form; 
// use View;
// use File;

// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Session;
// use Illuminate\Support\Facades\Redirect;
// use Illuminate\Support\MessageBag;
// use Validator;
// use DB;

// class LoginController extends Controller {

// 	//code for dashboard function
// 	public function getDashboard() {
// 		//$data['header'] = View::make('dashboard-header')->render();
// 	echo View::make('Admin/header')->render();
//         return view('Admin/index');
       
//     }
//     //code for show admin login page show
//     public function PostLogin() {
//         return view('Admin/page-login');
       
//     }
//     // code for registration page shown
//      public function getRegistration() {
//         //echo "call now";
//         return view('Admin/page-register');
//     }
   
//     //code for login user check valid or not
//       public function postLoginuser( Request  $Request ){
//         	$name=$Request->input('email'); 
//         $psw=$Request->input('password'); 
    
//         if(!empty($name) && !empty($psw)){
//               $abc=Login::adminuserlogin($name,$psw);
//                   if(count($abc)> 0){
//           Session::set('successful_login','yes');
//           //return View('product-details');
//             Redirect::to('administration/dashboard')->send();
//         }else{
                
//         return redirect()->back()->with('errorMessage','Invalid Credentials, Plese Try Agin');
//                 }
//         } else{
//           return redirect()->back()->with('errorMessage','Plese Eneter The Username And Password');

//         }
       
//     }
//     // code for shwo all the created product list page
//      public function getProduct() {
//         //echo "call now";
//          $users = DB::select('select * from all_products  where status= 1');
//   		 /*print_r($users);
//   		 die;*/
//         echo View::make('Admin/header')->render(); 
//       return view('Admin/all-products',['users'=>$users]);
//         //return view('Admin/all-products');
//     }
//     // code for shown create product page
//      public function getCreateproduct() {
//         //echo "call now";
//          $users = DB::select('select * from category where category_parent_id = 0');
//         //  $categoryall = DB::select('select * from category');
//           $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
//         echo View::make('Admin/header')->render();
//         return view('Admin/add-new-product',compact('users','categoryall'));
//     }
//     // code for add admin panel user regisration
//       public function postAdduserdetails( Request  $Request ){
//   /*  echo "call function";
//     print_r($_POST);
// */
//   echo "we are working....on this page";
   
//   die;
//       $name=$Request->input('name'); 
//       $email=$Request->input('email'); 
     
//      // $Username=$Request->input('username'); 
//       $Password=$Request->input('password'); 
//       $confirm=$Request->input('confirm'); 
     
//      $validator  = Validator::make($Request->all(), [
//         'name' => 'required',
//         'email' => 'required|email',
//          'password' => 'required|min:6',
//          'confirm' => 'required|same:password',
//     ]);

//     if ($validator->fails()) {
//         //return redirect()->back()->withErrors($v->errors());
//      // return redirect()->back()->with('errorMessage','plese enter all Details');
//       return redirect('administration/registration')
//                         ->withErrors($validator);

//     } else {
      
//       DB::table('registration_details')->insert(['user_name' => $name,'user_email_id' => $email,'login_name' => $email,'user_password' => $Password]);
//       DB::table('loginuser')->insert(['Username' => $email,'Password' => $Password]);
//   return view('page-register');
//     }
 
//   }

//           //code for add product 
//             public function postAddproduct( Request  $Request ){
//   /*  echo "call function";
//     print_r($_POST);
// */
//      //   $file = $Request->file('file-input');
//         //Display File Name
//       //echo 'File Name: '.$file->getClientOriginalName();
//       //echo '<br>';
//       //Display File Extension
//       //echo 'File Extension: '.$file->getClientOriginalExtension();
//       //echo '<br>';
   
//       //Display File Real Path
//       //echo 'File Real Path: '.$file->getRealPath();
//       //echo '<br>';
   
//       //Display File Size
//       //echo 'File Size: '.$file->getSize();
//       //echo '<br>';
   
//       //Display File Mime Type
//       //echo 'File Mime Type: '.$file->getMimeType();
   
//       //Move Uploaded File
 
//   // echo "<pre>";
//   // echo  print_r($_POST);
//   // die;

//       $name=$Request->input('title'); 
//       $price=$Request->input('price'); 
     
//       $description=$Request->input('description'); 

//       $shortdescription=$Request->input('shortdescription'); 
//      $url=$Request->input('url'); 
//       $maincategory=$Request->input('maincategory'); 
//       $subcategory=$Request->input('subcategory'); 
//             $offer=$Request->input('offer'); 
//             $country=$Request->input('country'); 
//              $section=$Request->input('section'); 
//               $metatitle=$Request->input('MetaTitle'); 
//       $metadescription=$Request->input('MetaDescription'); 
// $metakeyword =$Request->input('MetaKeyword'); 
// $original_price =$Request->input('originalprice'); 
//  $productfile =$Request->input('photos'); 
 
 
//  $to_date=$Request->input('to_date'); 
//  $from_date=$Request->input('from_date'); 
//  // echo "<pre>";
//  // print_r($_FILES);
//  // die;
  
//         if (!empty($url)) {
//         	$urlname=trim($Request->input('url')); 
//             $urlower= strtolower($urlname);
//           $url=str_replace(' ', '-',$urlower);
//          // echo  $url;
//          // die;
//         } else{
//         	$urlname=trim($Request->input('title')); 
//             $urlower= strtolower($urlname);
//           $url=str_replace(' ', '-',$urlower);
             
//         }

//      $validator  = Validator::make($Request->all(), [
//      	'title' => 'required',
//      	//'price' => 'required',
//      	//'shortdescription' => 'required',
//      	//'url' => 'required',
//      	'description' => 'required',
//      	//'maincategory' => 'required|not_in:0',
//      	//'subcategory' => 'required|not_in:0',
//      	//'offer' => 'required|not_in:0 ',
//      	'country' => 'required ',
//      	//'MetaTitle' => 'required ',
//      	//'MetaDescription' => 'required ',
//      	//'MetaKeyword' => 'required ',
//         'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
//     ]);
// // dimensions:min_width=200,min_height=300
//     if ($validator->fails()) {
//         //return redirect()->back()->withErrors($v->errors());
//      // return redirect()->back()->with('errorMessage','plese enter all Details');
//       return redirect('administration/createproduct')
//                         ->withErrors($validator);

//     } else {

//     	   if ($Request->hasFile('file-input')) {
//         $image = $Request->file('file-input');
//         $strname = 'xtacky';
//         $nameimageex = $image->getClientOriginalExtension();
//          $nameimagename=$image->getClientOriginalName();
//          $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',str_replace(' ', '-',$nameimagename));
//                   // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
//         $nameimage= $withoutExt.''.str_shuffle($strname).'.'.$nameimageex;
        
//         //$nameimage = time().'.'.$image->getClientOriginalExtension();
//         $destinationPath = public_path('images');
//         //echo  'this is file path'.$destinationPath;
//         //xtacky/public_html/public/images
//         //die;
        
//         //$this->save();
//      $data=DB::table('all_products')->insertGetId(['product_name' => $name,'product_price' => $price,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $description,'meta_keyword' =>$metakeyword,'original_price' =>$original_price,'product_image' => $nameimage,'offer_start_date' => $from_date,'offer_expire_date' => $to_date]);

//   if( $data > 0)
//     {
//      //$data=45;
//     	$image->move($destinationPath, $nameimage);
//                 $today = date("Ymd");
//                           $unique = "XT".$today . $data;
//                               DB::table('all_products')
//                   ->where('product_id', $data)
//                   ->update(['product_ref_number' => $unique]);
//       //              return redirect()->back()->with('ordersuccess','Your reference number : '.$unique);
//     	 		    	$users = DB::table('all_products')
// 		                     ->select('product_id', 'main_category','sub_category')
// 		                     ->where('product_id', '=', $data)
// 		                     ->get();
//                 $array = json_decode(json_encode($users), true);
//                      $product_id=$array[0]['product_id'];
//                           $main_category=$array[0]['main_category'];
//                          $sub_category= $array[0]['sub_category'];
//             if ($Request->hasFile('photos')) {
//                         $getProductimagedetails = Category::getProductimagedetails($product_id);
//              foreach ($getProductimagedetails  as $getProductimage) 
//                                         {
//                                          $lang_invitee= explode('|', $getProductimage->images_name);
                                      
//                                          foreach ($lang_invitee  as $key => $value) 
//                                         {
//                                     $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
//                                     if (File::exists($usersImage)) { // unlink or remove previous image from folder
//                                         unlink($usersImage);
//                                         }  
//                                         } } 
//                          $data=array();
//       foreach($Request->file('photos') as $image)
//             {
//           $strname = 'xtacky';
//             $nameimageprodex = $image->getClientOriginalExtension();
//          $nameimagenameprod=$image->getClientOriginalName();
//          $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagenameprod));
//                   // $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
//                   $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
//                 //$name=$image->getClientOriginalName();
//                 $image->move(public_path().'/images/product_image', $name);  
//                 $data[] = 'product_image/'.$name;  
//             }
//               DB::table('product_images')->insert( [
//         'images_name'=>  implode("|",$data),
//         'product_id' =>$product_id,
//         'category_id' =>$main_category,
//         'sub_category' =>$sub_category,
//         //you can put other insertion here
//     ]);
//     	return redirect()->back()->with('success','Product  Upload successfully');
//     }else {
//         return redirect()->back()->with('success','Product  Upload successfully');
//     }
        
//     }
//   } else {
//           return redirect()->back()->with('success','plese select product  image');
//     }
       
      
     
//     }
 
//   }


// 	public function getUserinfo( Request  $Request ){
//   		 $users = DB::select('select * from all_products');
//   		 /*print_r($users);
//   		 die;*/

//       return view('all-products',['users'=>$users]);
//   	}
//   	//code for show edit the produt page
//  public function getShow($id){

// $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
//   //$category_parent_id = json_decode(json_encode($category_parent), true);
    
//           $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) '); //get main sub categry
  
//   			$users = DB::select('select * from all_products where product_id = ?',[$id]); //for get data
//   			   $array = json_decode(json_encode($users), true);

//         $main_category_id = $array[0]['main_category'];
          
//         $getProductimagedetails = Category::getProductimagedetails($id);
//               $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);
//                         // echo "<pre>";
//   			// print_r($users);
//   			// die;
//   			echo View::make('Admin/header')->render();
//   return view('Admin/edit-product',['users'=>$users,'category_parent_id'=>$category_parent_id,'subcategory'=>$subcategory,'getAllsubmenuparent'=>$getAllsubmenuparent,'getProductimagedetails'=>$getProductimagedetails]);  		
//   	}


//       //code for submit product  edit form 
//   	public function postUpdateinfo(Request  $Request){
  	
  	
			    
//  $edittitle=$Request->input('title'); 
//   			 $product_id=$Request->input('product_id'); 
// 		$image=$Request->input('file-input');
// 			 $editprice=$Request->input('price'); 
// 			  $editdescription=$Request->input('product-description'); 

//               $shortdescription=$Request->input('shortdescription'); 
//               $url=$Request->input('url'); 
//                 $maincategory=$Request->input('maincategory'); 
// 				$subcategory=$Request->input('subcategory'); 
//               $offer=$Request->input('offer'); 
//               $country=$Request->input('country'); 
//                 $section=$Request->input('section');
//                   $metatitle=$Request->input('MetaTitle'); 
//                   $metadescription=$Request->input('metadescription');
//                   $metakeyword=$Request->input('MetaKeyword');
//                   $original_price =$Request->input('originalprice'); 
//               $fileoldpath=$Request->input('filepath');
//               $filepath_product=$Request->input('filepath_product');
//               $offer_start_date = $Request->input('offer_start_date');
//               $offer_expire_date = $Request->input('offer_expire_date');
// 			     $validator  = Validator::make($Request->all(), [
// 			        'title' => 'required',
//                     'price' => 'required',
//                     'product-description' => 'required',
//                     'shortdescription' => 'required',
//                     //'maincategory' => 'required|not_in:0',
//                   // 'subcategory' => 'required|not_in:0',
//                     //'offer' => 'required|not_in:0 ',
//                     'country' => 'required ',
//                         //'MetaTitle' => 'required ',
//                         //'metadescription' => 'required ',
//                         //'MetaKeyword' => 'required ',
//                         // 'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
//         ]);
			
						  
// 			     if ($validator->fails()) {
			      
//       		     	return redirect()->back()
//                         ->withErrors($validator);

//     } else {

// 			if ($Request->hasFile($image)) {
				 
//         $image = $Request->file('file-input');
// 				 $strname = 'xtacky';	     
//         $nameimageex = $image->getClientOriginalExtension();
//          $nameimagename=$image->getClientOriginalName();
//          $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagename));
// //                   $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
//              $nameimage= $withoutExt.''.str_shuffle($strname).'.'.$nameimageex;
// //        echo $nameimage;
// //        die;
//          $destinationPath = public_path('images');
//         //echo  'this is file path'.$destinationPath;
//         //die;
//           $image->move($destinationPath, $nameimage);

// 				DB::table('all_products')
//             ->where('product_id', $product_id)
//             ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $nameimage]);
//                  if ($Request->hasFile('photos')) {
//                           $getProductimagedetails = Category::getProductimagedetails($product_id);
//              foreach ($getProductimagedetails  as $getProductimage) 
//                                         {
//                                          $lang_invitee= explode('|', $getProductimage->images_name);
                                      
//                                          foreach ($lang_invitee  as $key => $value) 
//                                         {
//                                     $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
//                                     if (File::exists($usersImage)) { // unlink or remove previous image from folder
//                                         unlink($usersImage);
//                                         }  
//                                         } } 
//                          $data=array();
//       foreach($Request->file('photos') as $image)
//             {
//           $strname = 'xtacky';
//              $nameimageprodex = $image->getClientOriginalExtension();
//          $nameimagenameprod=$image->getClientOriginalName();
//          $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-',$nameimagenameprod));
// //                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
//           $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
//                 //$name=$image->getClientOriginalName();
//                 $image->move(public_path().'/images/product_image', $name);  
//                 $data[] = 'product_image/'.$name;  
//             }
//     if (!$getProductimagedetails) {
//                           DB::table('product_images')->insert( [
//         'images_name'=>  implode("|",$data),
//         'product_id' =>$product_id,
//         'category_id' =>$main_category,
//         'sub_category' =>$sub_category,
//         //you can put other insertion here
//     ]);
//          } else {
//               DB::table('product_images')
//                       ->where('product_id', $product_id)
//                       ->update( [
//         'images_name'=>  implode("|",$data),
//         'product_id' =>$product_id,
//         'category_id' =>$maincategory,
//         'sub_category' =>$subcategory,
//         //you can put other insertion here
//     ]);
//                              }
//     	return redirect()->back()->with('success','Product  Upload successfully');
//     }else {
//         return redirect()->back()->with('success','Product  Upload successfully');
//     }
                                
//          //return redirect()->back()->with('success','Product  Updated Successfully');
//     } else {
      
//         DB::table('all_products')
//             ->where('product_id', $product_id)
//             ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $fileoldpath,'offer_start_date' => $offer_start_date,'offer_expire_date' => $offer_expire_date]);
//          //    return redirect()->back()->with('success','Product  updated successfully');
//                       if ($Request->hasFile('photos')) {
                            
                            
       
//                       $getProductimagedetails = Category::getProductimagedetails($product_id);
//                       // $array = json_decode(json_encode($getProductimagedetails), true);
                    
//                       foreach ($getProductimagedetails  as $getProductimage) 
//                                         {
                                 
//                                          $lang_invitee= explode('|', $getProductimage->images_name);
                                      
//                                          foreach ($lang_invitee  as $key => $value) 
//                                         {
//                                     $usersImage = public_path("/images/{$value}"); // get previous image from folder
                                   
//                                     if (File::exists($usersImage)) { // unlink or remove previous image from folder
//                                         unlink($usersImage);
//                                         }  
//                                         } }
             
//                           $data=array();
//       foreach($Request->file('photos') as $image)
//             {
      
//           $strname = 'xtacky';
//           $nameimageprodex = $image->getClientOriginalExtension();
//          $nameimagenameprod=$image->getClientOriginalName();
//          $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '',str_replace(' ', '-',$nameimagenameprod));
// //                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
//                     $name= $withoutprodExt.''.str_shuffle($strname).'.'.$nameimageprodex;
//                 //$name=$image->getClientOriginalName();
//                 $image->move(public_path().'/images/product_image', $name);  
//                 $data[] = 'product_image/'.$name;  
//             }
//              if (!$getProductimagedetails) {
//                           DB::table('product_images')->insert( [
//         'images_name'=>  implode("|",$data),
//         'product_id' =>$product_id,
//         'category_id' =>$maincategory,
//         'sub_category' =>$subcategory,
//         //you can put other insertion here
//     ]);
//          } else {
//              DB::table('product_images')
//                       ->where('product_id', $product_id)
//                       ->update( [
//         'images_name'=>  implode("|",$data),
//         'product_id' =>$product_id,
//         'category_id' =>$maincategory,
//         'sub_category' =>$subcategory,
//         //you can put other insertion here
//     ]);
//                              }
    
//             return redirect()->back()->with('success','Product  Upload successfully');
//     }else {
//         return redirect()->back()->with('success','Product  Upload successfully');
//     }     
//         }
// 		}		
//   	}


//   	public function getDelete($id) {
//       //DB::delete('delete from student where id = ?',[$id]);
//       DB::table('all_products')
//             ->where('product_id', $id)
//             ->update(['status' => 0]);
//             return redirect()->back()->with('success','Product  Deleted successfully');
//   }
//   // code for add banner slider page




//   public function getSubcat()
//     { 
//       $id = $_GET['id'];
    
//         $states = DB::table("category")
//                     ->where("category_parent_id",$id )
//                     ->lists("category_id","category_name");
//         return response()->json($states);
//     }

// }