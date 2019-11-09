<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Login;
use App\Models\Category;
use View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Validator;
use DB;

class BannerController extends Controller {


 public function getWordpress(Request $Request) {
        //$categoryname = trim($Request->input('category'));
   $categoryname = "wordpress";
     $getSubCategoryWordpress = Category::getSubCategoryWordpress();
      $getSubCategoryWebsite = Category::getSubCategoryWebsite();
      $getSubCategorywoocomer = Category::getSubCategorywoocomer();
      $getSubCategorypresta = Category::getSubCategorypresta();
      $getSubCategorymagento = Category::getSubCategorymagento();
      $getSubCategoryjoomala = Category::getSubCategoryjoomala();
      $getSubCategorycate = Category::getSubCategorycate();
      $getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
     echo View::make('dashboard-header',['getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate])->render();
     return view('main-category-page',['getParentSubCategorycate'=>$getParentSubCategorycate,'categoryname'=>$categoryname]);
    }
     public function getShowbanner($id){
         
         
//$category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
  //$category_parent_id = json_decode(json_encode($category_parent), true);
    
         // $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) '); //get main sub categry
   $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
          $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
  			$getProductdetails = DB::select('select * from products where product_id = ?',[$id]); 
                         $array = json_decode(json_encode($getProductdetails), true);

        $main_category_id = $array[0]['main_category'];
               $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);
  	
//  			 echo "<pre>";
//  			 print_r($getProductdetails);
//  			 die;
  echo View::make('Admin/header')->render();
  			//echo View::make('dashboard-header')->render();
  			return view('Admin/edit-bannerproduct',['getProductdetails'=>$getProductdetails,'users'=>$users,'categoryall'=>$categoryall,'getAllsubmenuparent'=>$getAllsubmenuparent]);
   //return view('product-details',['users'=>$users,'category_parent_id'=>$category_parent_id,'subcategory'=>$subcategory]);  		
  	}
             // code for shown create product page
     public function getCreatebannerproduct() {
        //echo "call now";
         $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
          $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
        echo View::make('Admin/header')->render();
        return view('Admin/add-bannerslider-product',compact('users','categoryall'));
    }
           // code for shwo all the created product list page
     public function getBannerproduct() {
        //echo "call now";
         $users = DB::select('select * from products  where status= 1');
       /*print_r($users);
       die;*/
        echo View::make('Admin/header')->render(); 
      return view('Admin/all-banner-products',['users'=>$users]);
        //return view('Admin/all-products');
    }
        
                       //code for add banner product 
            public function postAddbannerproduct( Request  $Request ){
  /*  echo "call function";
    print_r($_POST);
*/
    
      $name=$Request->input('title'); 
      $price=$Request->input('price'); 
     
      $description=$Request->input('description'); 

      $shortdescription=$Request->input('shortdescription'); 
     $url=$Request->input('url'); 
      $maincategory=$Request->input('maincategory'); 
       $subcategory=$Request->input('subcategory'); 
            $offer=$Request->input('offer'); 
            $country=$Request->input('country'); 
               $metatitle=$Request->input('MetaTitle'); 
      $metadescription=$Request->input('MetaDescription'); 
$metakeyword =$Request->input('MetaKeyword'); 
$section="banner";
 $productfile =$Request->input('photos'); 
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
      'maincategory' => 'required|not_in:0',
      'subcategory' => 'required|not_in:0',
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
      return redirect('admin/createbannerproduct')
                        ->withErrors($validator);

    } else {

         if ($Request->hasFile('file-input')) {
        $image = $Request->file('file-input');
        $nameimage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/bannersliderimages');
        //echo  'this is file path'.$destinationPath;
        $nameimagepath="bannersliderimages".'/'.$nameimage;
        //die;
        
        //$this->save();
     $data=DB::table('products')->insertGetId(['product_name' => $name,'product_price' => $price,'short_description' => $shortdescription,'url' => $url,'section' => $section,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $description,'meta_keyword' =>   $metakeyword,'product_image' => $nameimagepath]);

  if( $data > 0)
    {
      $image->move($destinationPath, $nameimage);
                $users = DB::table('products')
                         ->select('product_id', 'main_category','sub_category')
                         ->where('product_id', '=', $data)
                         ->get();
      
                     $array = json_decode(json_encode($users), true);
                     
                     $product_id=$array[0]['product_id'];
                          $main_category=$array[0]['main_category'];
                         $sub_category= $array[0]['sub_category'];

        
      return redirect()->back()->with('success','Product  Upload successfully');
    }
  
        
    } else {
          return redirect()->back()->with('success','plese select product  image');
    }
       
      
     
    }
 
  }
          //code for edit the banner procut pages 
  	public function postUpdatebanner(Request  $Request){
  	
              	    
 $edittitle=$Request->input('title'); 
  			 $product_id=$Request->input('product_id'); 
		$image=$Request->input('file-input');
			 $editprice=$Request->input('price'); 
			  $editdescription=$Request->input('description'); 

              $shortdescription=$Request->input('shortdescription'); 
               $url=$Request->input('url'); 
                $maincategory=$Request->input('maincategory'); 
				$subcategory=$Request->input('subcategory'); 
              $offer=$Request->input('offer'); 
               $country=$Request->input('country'); 
              //  $section=$Request->input('section');
                  $metatitle=$Request->input('MetaTitle'); 
                  $metadescription=$Request->input('MetaDescription');
                   $metakeyword=$Request->input('MetaKeyword');
              $fileoldpath=$Request->input('filepath');
			     $validator  = Validator::make($Request->all(), [
			        'title' => 'required',
                    'price' => 'required',
                    'description' => 'required',
                    'shortdescription' => 'required',
                    'maincategory' => 'required|not_in:0',
                    'subcategory' => 'required|not_in:0',
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
					     
        $nameimage = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('images/bannersliderimages');
        $nameimagepath="bannersliderimages".'/'.$nameimage;
        //echo  'this is file path'.$destinationPath;
        //die;
           	$bannerupdate=DB::table('products')
            ->where('product_id', $product_id)
            ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $nameimagepath]);
            // return redirect()->back()->with('success','Product  Updated Successfully');
     // echo "Record updated successfully.<br/>";
     
      if( $bannerupdate > 0){
         $image->move($destinationPath, $nameimage);
          return redirect()->back()->with('success','Product  updated successfully');
     }
    
     } else {
      $bannerupdate=  DB::table('products')
            ->where('product_id', $product_id)
            ->update(['product_name' => $edittitle,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $subcategory,'offer' => $offer,'country' => $country,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $fileoldpath]);
     
        return redirect()->back()->with('success','Product  updated successfully');
            //return redirect()->back()->with('success','plese select product  image');
    }
    }		
  	}
        //code for home page banner section get the prduct details
 public function getProductdetails($nameproduct){
     
//$category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
  //$category_parent_id = json_decode(json_encode($category_parent), true);
    
         // $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) '); //get main sub categry
  
  			$getProductdetails = DB::select('select * from product_details where url = ?',[$nameproduct]); 
  			 $homedata = json_decode(json_encode($getProductdetails), true);
            //for get data
//  			 echo "<pre>";
//  			 print_r($getProductdetails);
//  			 die;
  			
     $getSubCategoryWordpress = Category::getSubCategoryWordpress();
      $getSubCategoryWebsite = Category::getSubCategoryWebsite();
      $getSubCategorywoocomer = Category::getSubCategorywoocomer();
      $getSubCategorypresta = Category::getSubCategorypresta();
      $getSubCategorymagento = Category::getSubCategorymagento();
      $getSubCategoryjoomala = Category::getSubCategoryjoomala();
      $getSubCategorycate = Category::getSubCategorycate();
      $getPagesdetails= Category::getPagesdetails();
      $getMainCategory = Category::getMainCategory();
       $getSubBlogs = Category::getSubBlogs();
        $getProductimagedetails = Category::getProductimagedetails($nameproduct);
      //$getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
     echo View::make('dashboard-header',['getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'getSubBlogs'=>$getSubBlogs,'homedata'=>$homedata])->render();
  			//echo View::make('dashboard-header')->render();
  			echo view('product-details',['getProductdetails'=>$getProductdetails,'getMainCategory'=>$getMainCategory,'getProductimagedetails'=>$getProductimagedetails])->render();
     echo View::make('dashboard-footer',['getPagesdetails'=>$getPagesdetails])->render();  		
  	}

}