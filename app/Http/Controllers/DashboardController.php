<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Login;
use App\Models\Category;
use View;
use App\Models\user\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Validator;
use App\banneradds;
use App\order_product;
use App\Order;
use DB;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;



class DashboardController extends Controller {

    private $language;
   
    
    public function __construct() {

        if (Session::has('locale')) {
            $this->language = Session::get('locale');
            
        }
    }

    public function getLogin() {
        //echo "call now";
        return view('login');
    }

    public function getForgetpassoword() {
        //echo "call now";
        return view('forgot-password');
    }

    public function guestCheckout() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }

        $getMainCategory = Category::getMainCategory();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategory = Category::getSubCategory();
        $getPagesdetails = Category::getPagesdetails();
        $getSubBlogs = Category::getSubBlogs();
        $getHome = Category::getHome();
        $homedata = json_decode(json_encode($getHome), true);
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
                $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
            
        //echo "call now";
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $this->language])->render();
        echo View('guest-checkout');
        echo View::make('dashboard-footer', ['language' => $this->language, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }
    
    public function guestCheckoutRegister(Request $Request) {
        
        $validatedData = $Request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'address' => 'required',
            'contact' => 'required',
            //'state' => 'required',
            'country' => 'required',
            //'pincode' => 'required',
            'terms' => 'required',
        ]);
//        $this->Validate($request,[
//    		'email' => 'required|email',
//    		'password' => 'required|min:6'
//    	]);
        
        $password=$Request['name']."@123456";
//        echo "<pre>";
//        print_r($Request);
//        die;
           $page = User::create([
            'name' => $Request['name'],
            'email' => $Request['email'],
            'lastname' => $Request['lastname'],
            'password' => Hash::make($password),
            'loginas' => 0,
            'verified'=> 1,   
        ]);
        
     $dataid =$page->id;
     if($dataid){
         
           DB::table('profile')->insertGetId(
                [ 
                    'id' => $dataid,
                        'name' => $Request['name'],
                        'lastname' => $Request['lastname'],
                        'email' => $Request['email'],
                        'address' => $Request['address'],
                        'contact' => $Request['contact'],
                        //'state' => $Request['state'],
                        'country' => $Request['country'],
                        //'pin_code' => $Request['pincode']
                    ]
            );    
     }
     if (Auth::attempt(['email' => $Request['email'], 'password' => $password])) {
              return redirect('/shopping-cart')->with('subscribe_success_guest', 'Now You Login as Guest');;
        }
      
        
    }
    
    public function getRegistration() {
        //echo "call now";
        return view('ragister');
    }
    
    public function postLoginuser(Request $Request) {
        $name = $Request->input('uname');
        $psw = $Request->input('psw');

        if (!empty($name) && !empty($psw)) {
            $abc = Login::userlogin($name, $psw);
//              echo '<pre>';
//              print_r($abc);	
            $id = $abc->login_details_id;
            $user_name = $abc->user_name;

//                   dd(Session::all());
//              die;
            if (count($abc) > 0) {
                Session::set('successful_login_id', $id);
                Session::set('successful_login_name', $user_name);
                //$Request->session()->put('id', '$id');
                //$call= $Request->session()->get('id', '$id');
//             $successful_login = Session::get('successful_login_id');
//             $successful_login_name = Session::get('successful_login_name');
//             echo 'this is name'.$successful_login_name;
//             die;
                //return View('product-details');
                Redirect::to('/')->send();
            } else {

                return redirect()->back()->with('errorMessage', 'invalid credentials,plese try agin');
            }
        } else {
            return redirect()->back()->with('errorMessage', 'plese eneter the username and password');
        }
        //print_r($abc);
//      echo $name;
        //echo $psw;
        //Print_r($_POST);
    }

    public function getIndex(Request $request) {

        // echo $language;
//         if (Auth::check())
//         {
//             echo 'user login';    
//     }else{
//	 echo 'user login not';
//     }
        if (Session::has('locale')) {
            $language=$this->language = Session::get('locale');
        } else {
            $language=$this->language = app()->getLocale();
        }

        $getMainCategory = Category::getMainCategory();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        
       
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategory = Category::getSubCategory();

        $getSubBlogs = Category::getSubBlogs();
        $getHome = Category::getHome();
        $getBannerslider = Category::getBannerslider();
        //code comment replace with product:: method
        //$getNewproduct = Category::getNewproduct();
            $getNewproduct= product::with('reviews')->where('section', 'New')
                    ->where('status',1)
                    ->orderBy('id', 'desc')
                    ->paginate(15);
//            $getAddsectionProduct= product::where('addvertise_seciton', 1)
//                    ->where('status',1)
//                    ->orderBy('id', 'desc')
//                    ->paginate(2);
            $getBannersectionProduct= banneradds::where('section', 1)
                    ->where('status',1)->get();
                    
                    
            $getAddsectionProduct= banneradds::where('section', 2)
                    ->where('status',1)
                    ->orderBy('id', 'desc')
                    ->paginate(2);
            
            
           
           if ($request->ajax()) {
    		$view = view('datawelcome',compact('getNewproduct','language'))->render();
            return response()->json(['html'=>$view]);
        }
        /* -------Code added by pooja--------- */
        $getProductoffers = Category::getProductoffers();
//        echo"<pre>";
//        print_r($getProductoffers);
//        echo"<pre>";

        /* -------Code added by pooja--------- */
        $getFetureproduct = Category::getFetureproduct();
        $getPagesdetails = Category::getPagesdetails();
        $homedata = json_decode(json_encode($getHome), true);
       //$layoutid=1;
            $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
             if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
            
//        $meta_title = $homedata[0]['meta_title'];
//        $meta_description = $homedata[0]['meta_description'];
//         $meta_keyword = $homedata[0]['meta_keyword'];
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $this->language])->render();
        //echo View::make('dashboard-header')->render();
        echo View::make('welcome', ['getBannersectionProduct'=>$getBannersectionProduct,'getAddsectionProduct'=>$getAddsectionProduct,'getBannerslider' => $getBannerslider, 'getNewproduct' => $getNewproduct, 'getFetureproduct' => $getFetureproduct, 'getProductoffers' => $getProductoffers, 'language' => $this->language])->render();

        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'getMainCategory' => $getMainCategory, 'language' => $this->language])->render();
    }

    public function wordpresspage(Request $request,$categoryname) {
        if (Session::has('locale')) {
            $language=$this->language = Session::get('locale');
        } else {
            $language=$this->language = app()->getLocale();
        }
        //$categoryname = "wordpress";
        $getMainCategory = Category::getMainCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        $getSubCategory = Category::getSubCategory();
        //get the parent category product here
        if($categoryname == "allcategories"){
            
            //$getParentCategoryproduct = Category::getParentAllCategoryproduct($categoryname); 
            $getParentSubCategorycate = Category::getParentAllSubCategorycate($categoryname);
                //$array = json_decode(json_encode($getParentCategoryproduct), true);
 
           $poductdata= product::with('reviews')->where('status',1)
                    ->paginate(8);
       } 
        else {
             
            $getParentCategoryproduct = Category::getParentCategoryproduct($categoryname);
            $getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
                $array = json_decode(json_encode($getParentCategoryproduct), true);
 
           $poductdata= product::with('reviews')->where('main_category', $array)
                    ->where('status',1)
                    ->paginate(12);
            }
       
           
        
           if ($request->ajax()) {
    		$view = view('dataproduct',compact('poductdata','language'))->render();
            return response()->json(['html'=>$view]);
        }

        $countProduct=count($poductdata);
        //get the parent category sub cat here
        
        $getCategorymainseo = Category::getCategorymainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();

      $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
            
        //get category name from slug
        $getCatName = Category::getCatName($categoryname);
        if($categoryname == "allcategories"){
             $catName = 'allcategories';
               $catNameurl = "allcategories";
        }else{
             $catName = $getCatName[0]->category_name;
               $catNameurl = $getCatName[0]->url;
        }
       

        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo view('main-category-page', ['poductdata'=>$poductdata,'language' => $this->language, 'getParentSubCategorycate' => $getParentSubCategorycate, 'categoryname' => $categoryname, 'catName' => $catName, 'catNameurl' => $catNameurl,'countProduct'=>$countProduct]);
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getDashboard() {


        // $data['header'] = View::make('dashboard-header')->render();
        echo View::make('dashboard-header')->render();
        //return view('product-details');
        //echo View::make('dashboard-footer')->render();
        //$data['sliderImages'] = Misc::getSliderImages();
    }

    public function getCategoryproduct(Request $request,$namecat, $id) {
//                     echo $id.'this is id of category';
//                     echo '<br>';
//                     echo $name.'this name of caegory';
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
          $language =  $this->language = app()->getLocale();
        }
        $name = str_replace('-', ' ', $namecat);
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        $getSubCategorycateparentid = Category::getSubCategorycateparentid($id);
        $getCategoryproduct = Category::getCategoryproduct($id);
        $array = json_decode(json_encode($getSubCategorycateparentid), true);
        $getSubcategoryseo = Category::getSubcategoryseo($id);
        $homedata = json_decode(json_encode($getSubcategoryseo), true);
        $getPagesdetails = Category::getPagesdetails();
        
        $getMainCategory = Category::getMainCategory();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
            $poductdata= product::with('reviews')->where('sub_category', $id)
                    ->where('status',1)
                    ->paginate(12);
 if ($request->ajax()) {
    		$view = view('sub-cat-product-ajax',compact('id','poductdata','language'))->render();
            return response()->json(['html'=>$view]);
        }
        
        $product_name = $array[0]['category_name'];
        $product_id = $array[0]['category_id'];
        $product_url = $array[0]['url'];
//        echo '<pre>';
//        print_r($getSubCategorycateparentid);
//        die;
//        echo View::make('dashboard-header', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata,'getMainCategory' => $getMainCategory])->render();
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View('sub-category-page', ['id'=>$id,'poductdata'=>$poductdata,'language' => $this->language, 'name' => $name,'product_url'=>$product_url, 'product_name' => $product_name, 'getCategoryproduct' => $getCategoryproduct, 'getSubCategorycateparentid' => $getSubCategorycateparentid,'getMainCategory' => $getMainCategory]);
//        echo View::make('dashboard-footer', ['language' => $this->language, 'getPagesdetails' => $getPagesdetails,'getMainCategory' => $getMainCategory])->render();
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
        
        }

    //code for product details page
    public function getProductdetails($name) {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
//                     echo $name.'this name of caegory';
        $product = trim($name);
        $nameproduct = str_replace('-', ' ', $product);
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        //$getSubCategorycateparentid = Category::getSubCategorycateparentid($id);
        // $getCategoryproduct = Category::getCategoryproduct($id);
        $getProductdetails = Category::getProductdetailsall($name);

        $homedata = json_decode(json_encode($getProductdetails), true);
        $product_id = $homedata[0]['product_id'];
        $roleIdSeller = $homedata[0]['role_id'];
        $getProductSeller = Category::getproductseller($roleIdSeller);
         
          $getProductSoldBy = json_decode(json_encode($getProductSeller), true);
        
        $getProductimagedetails = Category::getProductimagedetails($product_id);
        //for assine addones get selecte prduct
        $getaddonesproduct = Category::getaddonesproduct($product_id);
        // for get all addones product name for commpare
        $productdetailsaddones = Category::getproductdetailsaddones();

        //code for get the product details rating 
        $productdetailreview = product::where('url', $name)->first();
        $productdetaildata= $productdetailreview->reviews()->paginate(2);
      
            //code for related category product details show 
        $sub_cat = $getProductdetails[0]->sub_category;
        // echo "sub_cat ".$sub_cat;

        //$getAllRelatedproduct = Category::getAllRelatedproduct($sub_cat);
         $getAllRelatedproduct= product::with('reviews')
                            ->where('sub_category', $sub_cat)
                             ->where('status',1)
                             ->where('as_gift_wrap',0)
                             ->get();
        $getMainCategory = Category::getMainCategory();

        $getPagesdetails = Category::getPagesdetails();
        
            $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
             $reviewaccess = 0;
             if (Auth::user()) {
            $orders = Auth::user()->orders()->orderBy('id', 'desc')->paginate(6);

            $orders->map(function($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;
            });
            
            foreach ($orders as $order) {
                foreach ($order->cart->items as $item) {
                    if ($product_id == $item['item']['id']) {
                        $reviewaccess = $item['item']['id'];
                    }
                }
            }
        }

        


//        $pro_qty = DB::table('stocks')->where('product_id', $product_id )->latest()->first();
        
        $pro_qty = DB::table('stocks')->where('product_id', $product_id )->orderBy('id', 'ASC')->first();
//        $pro_qty = DB::select("select * from stocks where product_id = ?",[$product_id]);
//        
//        echo "<pre>";
//        echo $product_id;
//        print_r($pro_qty);
//        die;
        
        if($pro_qty){
            $p_qty = $pro_qty->remained_qty;
            $stocklevel = $this->get_stocklevel($p_qty);
        }
        else{
            $stocklevel = null;
            $p_qty = 0;
        }
        
        
//        echo $r_stock;
//        if ($r_stock <= 1 && $r_stock > 0) {
//            $stocklevel = "Low Stock";
//        }
//        elseif($r_stock > 0){
//            $stocklevel = "In Stock";
//        }
//        else{
//            $stocklevel = "Not Available";
//        }
//        die;
        

        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View('product-details', ['reviewaccess'=>$reviewaccess,'getProductSoldBy'=>$getProductSoldBy,'pro_quantity' => $p_qty,'stocklevel' => $stocklevel, 'language' => $this->language, 'productdetailsaddones' => $productdetailsaddones, 'getaddonesproduct' => $getaddonesproduct, 'getProductdetails' => $getProductdetails, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getProductimagedetails' => $getProductimagedetails, 'getAllRelatedproduct' => $getAllRelatedproduct,'productdetaildata'=>$productdetaildata,'productdetailreview'=>$productdetailreview])->render();
        echo View::make('dashboard-footer', ['language' => $this->language, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }
    
    public function get_stocklevel($r_qty){
        
        if ($r_qty <= 1 && $r_qty > 0) {
            $stocklevel = '<div class="btn btn-warning">'. __('message.Low Stock').' </div><div><b> '. __('message.Hurry, Only').' '.$r_qty.' '. __('message.Left').'</b></div>';
        }
        elseif($r_qty > 0){
            //$stocklevel = '<div class="btn btn-success">'. __('message.In Stock') .' </div><div><b> '. __('message.Hurry, Only').' '.$r_qty.' '. __('message.Left').'</b></div>';
       $stocklevel = '<div class="btn btn-success">'. __('message.In Stock') .' </div><div></div>';
            }
        else{
            $stocklevel = '<div class="btn btn-danger">'. __('message.Not Available').'</div>';
        }
        return $stocklevel;
    }

    public function postAdduser(Request $Request) {
        /*  echo "call function";
          print_r($_POST);
         */

        $name = $Request->input('name');
        $email = $Request->input('email');

        $Username = $Request->input('username');
        $Password = $Request->input('password');
        $confirm = $Request->input('confirm');

        $validator = Validator::make($Request->all(), [
                    'name' => 'required',
                    'email' => 'required|email',
                    'username' => 'required|min:6',
                    'password' => 'required|min:6',
                    'confirm' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            // return redirect()->back()->with('errorMessage','plese enter all Details');
            return redirect('index/registration')
                            ->withErrors($validator);
        } else {

            DB::table('registration_details')->insert(['user_name' => $name, 'user_email_id' => $email, 'login_name' => $Username, 'user_password' => $Password]);
            DB::table('loginuser')->insert(['Username' => $Username, 'Password' => $Password]);
            return view('login');
        }
    }

    public function getAbout() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $categoryname = "about";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();


        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        //$getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
        $getCategorymainseo = Category::getpagemainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();

        echo View('about-us');

        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getBlog() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }


        $categoryname = "blog";
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        $getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
        $getCategorymainseo = Category::getpagemainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs
            , 'homedata' => $homedata])->render();
        echo view('main-category-page', ['language' => $this->language, 'getParentSubCategorycate' => $getParentSubCategorycate, 'categoryname' => $categoryname]);
        //echo View('blog');    
        echo View::make('dashboard-footer', ['language' => $this->language, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getPrivacypolicy() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $categoryname = "privacy-policy";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        //$getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
        $getCategorymainseo = Category::getpagemainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View('privacy-policy');
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getTermsconditions() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }

        $categoryname = "terms-and-conditions";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        //$getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
        $getCategorymainseo = Category::getpagemainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';

             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View('terms-conditions');
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getContact() {
//                echo $name;
//                die;
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }

        $categoryname = "contact";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
       
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubBlogs = Category::getSubBlogs();
        //$getParentSubCategorycate = Category::getParentSubCategorycate($categoryname);
        $getCategorymainseo = Category::getpagemainseo($categoryname);
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View('contact', ['language' => $this->language]);
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getNew(Request $Request) {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }

        $categoryname = "New";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();


        $getCategorymainseo = Category::getpagemainseo('home');
        $getNewproduct = Category::getNewproduct();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
               
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo view('all-new-products', ['language' => $this->language, 'getNewproduct' => $getNewproduct, 'categoryname' => $categoryname]);
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    public function getFeature(Request $Request) {
        //$categoryname = trim($Request->input('category'));
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $categoryname = "Feature";
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();


        $getSubCategorycate = Category::getSubCategorycate();

        $getSubBlogs = Category::getSubBlogs();
        $getCategorymainseo = Category::getpagemainseo('home');
        $getNewproduct = Category::getFetureproduct();
        $homedata = json_decode(json_encode($getCategorymainseo), true);
        $getPagesdetails = Category::getPagesdetails();
        $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo view('all-new-products', ['language' => $this->language, 'getNewproduct' => $getNewproduct, 'categoryname' => $categoryname]);
        echo View::make('dashboard-footer', ['language' => $this->language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
    }

    //code for add product 
    public function postOrderproduct(Request $Request) {
//     echo "call function";
//    print_r($_POST);
        $name = $Request->input('name');
        $price = $Request->input('price');
        $comment = $Request->input('comment');
        $subject = $Request->input('subject');
        $email = $Request->input('email');
        $contact = $Request->input('contact');
        $productid = $Request->input('productid');
        $productname = $Request->input('productname');

        $validator = Validator::make($Request->all(), [
                    'name' => 'required',
                    'comment' => 'required',
                    'email' => 'required|email',
                    'contact' => 'required',
        ]);
// dimensions:min_width=200,min_height=300
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            // return redirect()->back()->with('errorMessage','plese enter all Details');
            return redirect()->back()
                            ->withErrors($validator);
        } else {
            $data = DB::table('contact_us')->insertGetId(['product_id' => $productid, 'customer_name' => $name, 'contact' => $contact, 'customer_email' => $email, 'customer_subject' => $subject, 'product_name' => $productname, 'comment' => $comment, 'price' => $price]);
            if ($data > 0) {
                $today = date("Ymd");
                $unique = "XT" . $today . $data;
                DB::table('contact_us')
                        ->where('contact_us_id', $data)
                        ->update(['referenctnumber' => $unique]);
                return redirect()->back()->with('ordersuccess', 'Your reference number : ' . $unique);
//    	 		    	$users = DB::table('all_products')
//		                     ->select('product_id', 'main_category','sub_category')
//		                     ->where('product_id', '=', $data)
//		                     ->get();
                //$array = json_decode(json_encode($users), true);
//                     $product_id=$array[0]['product_id'];
//                          $main_category=$array[0]['main_category'];
//                         $sub_category= $array[0]['sub_category'];


                return redirect()->back()->with('success', 'Order successfully place');
            }


            return redirect()->back()->with('success', 'Order successfully place');
        }
    }

    public function categoryfilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $id = $_GET['brand'];


        foreach ($id as $ids) {
            $catids = base64_decode($ids);

            $users = DB::select('select * from product_details  where status= 1 and  sub_category = ?', [$catids]);
            foreach ($users as $userss) {

                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
        }

        if (count($response) > 0) {

            return json_encode(array("success" => 1, 'data' => $response));
            //return response()->json($response);
        } else {
            return json_encode(array("success" => 0));
        }
        //}
//$states = DB::table('category')->where('category_parent_id', $id)->pluck('category_id', 'category_name');
        //echo json_encode(array("success" => 1, 'data' => $response));
        //return response()->json($response);
    }

    public function categoryfilterprice(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $minimum_price = $_GET['minimum_price'];
        $maximum_price = $_GET['maximum_price'];
        $categoryname = $_GET['categoryname'];
        $categoryname = $_GET['pagename'];
        
        if($categoryname=='maincat'){
            $cat_url="cat_url";
        }else{
             $cat_url="sub_category";
        }

        $results = DB::table('product_details')
                ->where($cat_url, $categoryname)
                ->whereBetween('product_price', array($minimum_price, $maximum_price))
                ->where('status', '=', 1)
                ->where('as_gift_wrap',0)
                ->orderBy('product_price')
                ->get();
        $homedata = json_decode(json_encode($results), true);
        if (count($homedata) > 0) {
            foreach ($results as $userss) {
                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
    // code for most selling product
        public function mostsellingfilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $id = $_GET['brand'];
         
                           $order_product_data= order_product::with('product')
                  ->select('product_id', DB::raw('COUNT(product_id) as count'))
                  ->groupBy('product_id')
                  ->orderBy('count', 'desc')
//                  ->limit(2)                 
                  ->get();
        $response=array();
        foreach ($id as $ids) {
            $catids = base64_decode($ids);

            //$users = DB::select('select * from product_details  where status= 1 and  sub_category = ?', [$catids]);
            foreach ($order_product_data as $userss) {
       
                               if($userss->product->main_category == $catids){
                                    $product_name = $userss->product->product_name;
                     $category_name = $userss->category_name;

                $response[] = Array('id' => $userss->product->id, 'url' => $userss->product->url, 'name' => $product_name[$language], 'original_price' => $userss->product->original_price, 'price' => $userss->product->product_price,'category_name' => $category_name[$language], 'product_image' => $userss->product->product_image, 'sub_category' => $userss->product->sub_category, 'discount' => $userss->product->discount);
                               }
                               
            }
            
               
        }
                if ($response) { 
                    
                 if (count($response) > 0) {
                    
                            return json_encode(array("success" => 1, 'data' => $response));
                            //return response()->json($response);
                        } else {

                            return json_encode(array("success" => 0));
                        }
                }  else {
                      
                 return json_encode(array("success" => 0));   
                }
       
        //}
//$states = DB::table('category')->where('category_parent_id', $id)->pluck('category_id', 'category_name');
        //echo json_encode(array("success" => 1, 'data' => $response));
        //return response()->json($response);
    }

    public function ajax(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $productnamereplace = $Request->input('id');
        $productname = str_replace(' ', '-', $productnamereplace);

        //$getProductdetails = Category::getAjaxproductdetails($productname);
        $users = DB::select("select product_id,product_name,url,discount,product_price,original_price,category_name from product_details  where url  like  '$productname%' and status = 1");

//        $users = DB::select("select product_id,product_name,url,product_price,category_name from product_details  where product_name  like  '$productname%' OR category_name  like  '$productname%'");
//           
//          echo '<pre>';
//          print_r($users);
//          die;
//return response()->json($users);
        foreach ($users as $s) {

            $urlnewname = trim($s->product_name);
//             $newproductfullname = str_replace(' ', '-', $urlnewname);
            $newproductfullname = json_decode($urlnewname);

            $product_price = trim($s->product_price);
           $original_price = trim($s->original_price);
            $category_name_decode = trim($s->category_name);
           $discount = trim($s->discount);
            if($category_name_decode){
                 $category_name = json_decode($category_name_decode);
            }  else {
                 $category_name = $newproductfullname;
                    }
            $url = trim($s->url);
            $response['product'][] = Array('id' => $s->product_id, 'url' => $url, 'name' => $newproductfullname->$language,'discount'=>$discount, 'price' => $product_price,'original_price' => $original_price,  'category_name' => $category_name->$language);
        }
//         foreach ($userss as $s) {
//             $urlnewname=trim($s->product_name); 
//          $newproductfullname=str_replace(' ', '-',$urlnewname);
//          $product_price=trim($s->product_price); 
//          $url=trim($s->url);
//            $response['product'][] = Array('id' => $s->id, 'name' => $newproductfullname,'price' => $product_price);
//        }

        echo json_encode($response);
    }
       // code for search result
       public function search(Request $Request) {
                if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
   $productname  = $Request->input('searchproduct');  
    $q   = str_replace(' ', '-', $productname);    
    if(strlen($q) >= 5){            
        $q = substr_replace($q ,"", -2);            
    }
    
    $user = product::with('reviews')->where ( 'url', 'LIKE', '%' . $q . '%' )->where('status', 1)->get();
$getSubCategory = Category::getSubCategory();
$getMainCategory = Category::getMainCategory();
 $getSubCategorycate = Category::getSubCategorycate();
$getSubBlogs = Category::getSubBlogs();
$getPagesdetails = Category::getPagesdetails();
 $getHome = Category::getHome();
//$getCategorymainseo = Category::getCategorymainseo($search);
$homedata = json_decode(json_encode($getHome), true);
 $getlayoutinfo = Category::getlayoutdetails();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
             }
    if (count ( $user ) > 0){
       echo View('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
        echo View ( 'search_product',['language' => $language])->withDetails ( $user )->withQuery ( $q );
        echo View('dashboard-footer', ['language' => $language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();
}else{
    echo View('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
    return view ( 'search_product' )->withMessage ( 'No Details found. Try to search again !' );
   echo View('dashboard-footer', ['language' => $language, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getPagesdetails' => $getPagesdetails])->render();

}
           
       }
    //ajax load code here
    public function loadDataAjax(Request $request) {

        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $output = '';
        $id = $request->id;
        $categoryname = $request->categoryname;

         if($categoryname == "allcategories"){
               $users = DB::table('product_details')
                ->orderBy('cat_createdOn', 'desc')
                ->where('product_id', '>', $id)
                ->where('status', '=', 1)
//                ->where('category_name','=',$categoryname)
//                ->where('cat_url', '=', $categoryname)
                ->limit(2)
                ->get();
         }else{
               $users = DB::table('product_details')
                ->orderBy('cat_createdOn', 'desc')
                ->where('product_id', '>', $id)
                ->where('status', '=', 1)
//                ->where('category_name','=',$categoryname)
                ->where('cat_url', '=', $categoryname)
                ->limit(2)
                ->get();
         }
      
        // echo '<pre>';
        // print_r($users);
//        $homedata = json_decode(json_encode($users), true);
//         echo '<pre>';
//        print_r($homedata);
//        die;
        // $posts = Post::where('id','<',$id)->orderBy('created_at','DESC')->limit(2)->get();

        if (!$users->isEmpty()) {
            foreach ($users as $userss) {

                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }

            // echo $output;
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
    public function higherpricefilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $categoryname = $_GET['brand'];
       
        $results = DB::table('product_details')
                ->where('cat_url', $categoryname)
                //->whereBetween('product_price', array($minimum_price, $maximum_price))
                ->orderBy('product_price', 'desc')
                ->where('status', '=', 1)
                ->get();
        $homedata = json_decode(json_encode($results), true);
        if (count($homedata) > 0) {
            foreach ($results as $userss) {
                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
       public function lowerpricefilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $categoryname = $_GET['brand'];
       
        $results = DB::table('product_details')
                ->where('cat_url', $categoryname)
                //->whereBetween('product_price', array($minimum_price, $maximum_price))
                ->orderBy('product_price')
                ->where('status', '=', 1)
                ->get();
        $homedata = json_decode(json_encode($results), true);
        if (count($homedata) > 0) {
            foreach ($results as $userss) {
                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
    //code for sub categoary filter 
    public function lowersubpricefilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $categoryname = $_GET['brand'];
       
        $results = DB::table('product_details')
                ->where('sub_category', $categoryname)
                //->whereBetween('product_price', array($minimum_price, $maximum_price))
                ->orderBy('product_price')
                ->where('status', '=', 1)
                ->get();
        $homedata = json_decode(json_encode($results), true);
        if (count($homedata) > 0) {
            foreach ($results as $userss) {
                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
        public function highersubpricefilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $categoryname = $_GET['brand'];
       
        $results = DB::table('product_details')
                ->where('sub_category', $categoryname)
                //->whereBetween('product_price', array($minimum_price, $maximum_price))
                ->orderBy('product_price', 'desc')
                ->where('status', '=', 1)
                ->get();
        $homedata = json_decode(json_encode($results), true);
        if (count($homedata) > 0) {
            foreach ($results as $userss) {
                $product_name = json_decode($userss->product_name, true);

                $category_name = json_decode($userss->category_name, true);

                $response[] = Array('id' => $userss->product_id, 'url' => $userss->url, 'name' => $product_name[$language], 'original_price' => $userss->original_price, 'price' => $userss->product_price, 'category_name' => $category_name[$language], 'product_image' => $userss->product_image, 'sub_category' => $userss->sub_category, 'discount' => $userss->discount);
            }
            return json_encode(array("success" => 1, 'data' => $response));
        } else {
            return json_encode(array("success" => 0));
        }
    }
           public function mostsubsellingfilter(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $id = $_GET['brand'];
         
                           $order_product_data= order_product::with('product')
                  ->select('product_id', DB::raw('COUNT(product_id) as count'))
                  ->groupBy('product_id')
                  ->orderBy('count', 'desc')
//                  ->limit(2)                 
                  ->get();
        $response=array();
        foreach ($id as $ids) {
            $catids = base64_decode($ids);

            //$users = DB::select('select * from product_details  where status= 1 and  sub_category = ?', [$catids]);
            foreach ($order_product_data as $userss) {
       
                               if($userss->product->sub_category == $catids){
                                    $product_name = $userss->product->product_name;
                     $category_name = $userss->category_name;

                $response[] = Array('id' => $userss->product->id, 'url' => $userss->product->url, 'name' => $product_name[$language], 'original_price' => $userss->product->original_price, 'price' => $userss->product->product_price,'category_name' => $category_name[$language], 'product_image' => $userss->product->product_image, 'sub_category' => $userss->product->sub_category, 'discount' => $userss->product->discount);
                               }
                               
            }
            
               
        }
                if ($response) { 
                    
                 if (count($response) > 0) {
                    
                            return json_encode(array("success" => 1, 'data' => $response));
                            //return response()->json($response);
                        } else {

                            return json_encode(array("success" => 0));
                        }
                }  else {
                      
                 return json_encode(array("success" => 0));   
                }
       
        //}
//$states = DB::table('category')->where('category_parent_id', $id)->pluck('category_id', 'category_name');
        //echo json_encode(array("success" => 1, 'data' => $response));
        //return response()->json($response);
    }

}
