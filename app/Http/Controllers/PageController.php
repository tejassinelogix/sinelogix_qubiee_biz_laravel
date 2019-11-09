<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Login;
use App\Models\Category;
use App\Form; 
use View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Validator;
use DB;

class PageController extends Controller {
    
       public function getCreatepage() {
        //echo "call now";
        // $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
          //$categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
        echo View::make('Admin/header')->render();
//        return view('Admin/add-new-page',compact('users','categoryall'));
   return view('Admin/add-new-page');
        } 
         public function getAllpages() {
        
        // $users = DB::select('select * from all_products  where status= 1');
        // $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
   
          //$users = Category::getAllProduct();
       //$category_parent_id = Category::getMainCategory();
         $pagedetails = Category::getPagesdetails();
   			//$users = DB::select('select * from all_products where product_id = ?',[$id]); //for get data
  		 /*print_r($users);
  		 die;*/
        echo View::make('Admin/header')->render(); 
        return view('Admin/all-pages',['pagedetails'=>$pagedetails]); 
    }
     public function getShowpages($id){


  			$pagesedit = DB::select('select * from all_pages where page_id = ?',[$id]); //for get data
  			   //$array = json_decode(json_encode($users), true);
// $main_category_id = $array[0]['main_category'];
                        // echo "<pre>";
  			// print_r($users);
  			// die;
  			echo View::make('Admin/header')->render();
   return view('Admin/edit-page',['pagesedit'=>$pagesedit]);  		
  	}
          //code for add product 
            public function postAddpage( Request  $Request ){
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
      //$price=$Request->input('price'); 
     
      $description=$Request->input('description'); 

      $shortdescription=$Request->input('shortdescription'); 
     $url=$Request->input('url'); 
      //$maincategory=$Request->input('maincategory'); 
       //$subcategory=$Request->input('subcategory'); 
         //   $offer=$Request->input('offer'); 
            $country=$Request->input('country'); 
           //  $section=$Request->input('section'); 
               $metatitle=$Request->input('MetaTitle'); 
      $metadescription=$Request->input('MetaDescription'); 
$metakeyword =$Request->input('MetaKeyword'); 

 //$productfile =$Request->input('photos'); 
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
     	'shortdescription' => 'required',
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
        $nameimage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/pages');
        //echo  'this is file path'.$destinationPath;
        //xtacky/public_html/public/images
        //die;
        $nameimagepath="pages".'/'.$nameimage;
        //$this->save();
     $data=DB::table('all_pages')->insertGetId(['page_name' => $name,'short_description' => $shortdescription,'url' => $url,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'page_description' => $description,'meta_keyword' =>$metakeyword,'page_image' => $nameimagepath]);

  if( $data > 0)
    {
    	$image->move($destinationPath, $nameimage);
//    	 		    	$users = DB::table('all_products')
//		                     ->select('product_id', 'main_category','sub_category')
//		                     ->where('product_id', '=', $data)
//		                     ->get();
//		  
//                     $array = json_decode(json_encode($users), true);


//                     $product_id=$array[0]['product_id'];
//                          $main_category=$array[0]['main_category'];
//                         $sub_category= $array[0]['sub_category'];

	    	
    	return redirect()->back()->with('success','Page  Upload Successfully');
    }
  
        
    } else {
          return redirect()->back()->with('success','Plese Select Page Image');
    }
       
      
     
    }
 
  }
  public function postUpdateinfo(Request  $Request){
  	
  	
			    
 $edittitle=$Request->input('title'); 
  			 $product_id=$Request->input('page_id'); 
		$image=$Request->input('file-input');
		 $editdescription=$Request->input('description'); 

              $shortdescription=$Request->input('shortdescription'); 
               $url=$Request->input('url'); 
             
    
               $country=$Request->input('country'); 
            
                  $metatitle=$Request->input('MetaTitle'); 
                  $metadescription=$Request->input('MetaDescription');
                   $metakeyword=$Request->input('MetaKeyword');
              $fileoldpath=$Request->input('filepath');
			     $validator  = Validator::make($Request->all(), [
			        'title' => 'required',
                     
                    'description' => 'required',
                    'shortdescription' => 'required',
                    
                    
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
					     
        $nameimage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/pages');
        //echo  'this is file path'.$destinationPath;
        //die;
        $nameimagepath="pages".'/'.$nameimage;
          

				$pageupdate=DB::table('all_pages')
            ->where('page_id', $product_id)
            ->update(['page_name' => $edittitle,'short_description' => $shortdescription,'url' => $url,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'page_description' => $editdescription,'meta_keyword' =>$metakeyword,'page_image' => $nameimagepath]);
     if($pageupdate>0){
          $image->move($destinationPath, $nameimage);
         return redirect()->back()->with('success','Page Updated Successfully');
     }
         
 } else {
        $pageupdate=DB::table('all_pages')
            ->where('page_id', $product_id)
            ->update(['page_name' => $edittitle,'short_description' => $shortdescription,'url' => $url,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'page_description' => $editdescription,'meta_keyword' =>$metakeyword,'page_image' => $fileoldpath]);
         
     return redirect()->back()->with('success','Page  Updated successfully');
    
             
    }

		
     
  		}		
  	}

}