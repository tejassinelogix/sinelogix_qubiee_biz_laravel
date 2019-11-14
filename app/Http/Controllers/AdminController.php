<?php

namespace App\Http\Controllers;

//namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\MessageBag;
use View;
use App\Models\Category;
use Validator;
use DB;
use File;
use App\Models\admin\role;
use App\Models\admin\discount_voucher;
use App\Models\user\product;
//use App\Models\user\category;
use App\Models\admin\admin;
use App\order_product;
use App\rate_admins;
use App\email_subscription;
use App\Order;
use App\banneradds;
use App\freedeilvery;
use PDF;
use Excel;
use App\User;
use App\Review;
use App\stock;
use App\transtions_admins;
use Illuminate\Support\Facades\Input;
use App\Models\admin\voucher_type;
use App\Models\admin\discount_voucher;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;


class AdminController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $menu = array();
    public $menu1;

    public function __construct() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        }
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {


        //   // Redirect::to('administration/dashboard')->send();
//         $countproduct = product::count();
        $usertype = (Auth::user()->job_title);

        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        if ($usertype == 'superadmin') {
          $countproduct = product::count();
          $countorder_product = order_product::where('status', '=',1)->count();

      } else {
          $research = product::where('role_id', '=', Auth::user()->id)->get();
          $countproduct = count($research);

          $vendorOrdrCount= order_product::where('status', '=',1)->where('role_id', '=', Auth::user()->id)->get();

          $countorder_product = count($vendorOrdrCount);

      }
      $countcategorydata = DB::table('category')->where('status', '=',1)->get();
      $countcategory = count($countcategorydata);

//         $countcategory = Category::count();
      $countCustomer = User::count();
      $countUser = admin::count();
      $countrole = role::count();
      echo view('Admin.index', compact('language', 'countproduct', 'countUser', 'countrole', 'countcategory','countorder_product','countCustomer'));
  }

    // public function index(){
    //    // return ('admin-dashboard');
    //     return view('Admin.header');
    //     return view('Admin.index');
    // }
//product section code start 
    // ganesh added code here for admin panel access
  public function product() {
        //echo "call now";
    if (Session::has('locale')) {
        $this->language = Session::get('locale');
    } else {
        $this->language = app()->getLocale();
    }
    $role_id = Auth::user()->id;
    $role_title = Auth::user()->job_title;
    if ($role_title == 'superadmin') {
//        $users = DB::select('select * from products ORDER BY id DESC');
        $users = product::with('admins')
                ->orderBy('id', 'desc')
                ->get();
    } else {
        $users = product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
        //$users = DB::select('select * from products  where role_id    = ?', [$role_id]);
//        $users = DB::select('select * from products  where status= 1 and role_id    = ?', [$role_id]);
    }
    $all_cat = DB::select("select category_id,category_name from category where status= 1 and category_parent_id=0");
    
        /* print_r($users);
        die; */

        return view('Admin.all-products', ['all_cat'=>$all_cat,'language' => $this->language, 'users' => $users]);

    }
      public function allSubscriber() {
        //echo "call now";
    if (Session::has('locale')) {
        $this->language = Session::get('locale');
    } else {
        $this->language = app()->getLocale();
    }
    $role_id = Auth::user()->id;
    $role_title = Auth::user()->job_title;
 
// $users = email_subscription::where('status', '=',1)->paginate(2);
 $users = email_subscription::paginate(2);
   // $users = DB::select('select * from email_subscription  ');
        //$users = DB::select('select * from products  where status= 1');
        /* print_r($users);
        die; */
//        echo View('Admin.header')->render();
        return view('Admin.all-subscriber', ['language' => $this->language, 'users' => $users]);
        
    }

    public function getDashboard() {
        //$data['header'] = View::make('dashboard-header')->render();
        echo View::make('Admin/header')->render();
        return view('Admin/index');
    }

    public function createproduct() {
        //$addprodyuctid=NULL ;
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
//           if( Session::has('productid') ){
//            $addprodyuctid = Session::get('productid');
//        } 


        if (Auth::user()->can('products.create')) {
            //echo "call now";
            $productlist = DB::select('select id,product_name from products  where status= 1');
            $users = DB::select('select * from category where category_parent_id = 0 and status= 1');
            //  $categoryall = DB::select('select * from category');
            $categoryall = DB::select('select * from category where status= 1 and category_parent_id NOT IN (0) ');
//        echo View('Admin.header')->render();
            return view('Admin.add-new-product', compact('language', 'users', 'categoryall', 'productlist'));
        }
        return redirect(route('admin.dashboard'));
    }

    //add product
    public function addproduct(Request $Request) {
        
        $validator = Validator::make($Request->all(), [
            'title' => 'required',
            //'price' => 'required',
            //'discount' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            //'shortdescription' => 'required',
            //'url' => 'required',
            'maincategory' => 'required|not_in:0',
            //'subcategory' => 'required|not_in:0',
            //'offer' => 'required',
            //'country' => 'required ',
            //'section' => 'required ',
            'MetaTitle' => 'required ',
            'MetaDescription' => 'required ',
            'MetaKeyword' => 'required ',
            'originalprice' => 'required',
            'photos' => 'required',
            //'to_date' => 'required',
            //'from_date' => 'required',
            //'sub_cat' => 'required',
        ]);
         Input::flash();
        
       
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


        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        $role_id = Auth::user()->id;

        $name = $Request->input('title');
        $price = $Request->input('price');
        $discountvalue = $Request->input('discount');
        $Request->except('_token');
        $description = $Request->input('description');

        $shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');
        $maincategory = $Request->input('maincategory');
        $subcategory = $Request->input('subcategory');
        $offer = $Request->input('offer');
        //$country = $Request->input('country');
        $section = $Request->input('section');
        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('MetaDescription');
        $metakeyword = $Request->input('MetaKeyword');
        $original_price = $Request->input('originalprice');
        $productfile = $Request->input('photos');
        
        //$addonce = $Request->input('addonce');

        //$to_date = $Request->input('to_date');
        //$from_date = $Request->input('from_date');
        $s_cat_id = $Request->input('sub_cat');
        $customization = $Request->input('customization');
        $gift_wrapping = $Request->input('gift_wrapping');
        //$addvertisment = $Request->input('addvertisment');
        $prodspecifiction = $Request->input('prodspecifiction');
        $deliverytime = $Request->input('deliverytime');
        $deliverycharges = $Request->input('deliverycharges');
        $productsku = $Request->input('productsku');
        
        
            if($discountvalue ==""){
                $discount= 0;
                 $price=$original_price;
            }else{
                $discount= $discountvalue;
             }
       
        
        if($customization == null){
            $cust = 0;
        }
        else{
            $cust = $customization;
        }
        
        if($gift_wrapping == null){
            $gift_wrap = 0;
        }
        else{
            $gift_wrap = $gift_wrapping;
        }
//        if($addvertisment == null){
//            $addvert = 0;
//        }
//        else{
//            $addvert = $addvertisment;
//        }
//        
//        echo $customization;
//        die;
        
        // echo "<pre>";
        // print_r($_FILES);
        // die;
        //$countofaddone = count($addonce);
        if ($s_cat_id > 0) {
            $sub_cat_id = $s_cat_id;
            echo $sub_cat_id;
            //  die;
        } else {
            $sub_cat_id = $subcategory;
            echo $sub_cat_id;
            //  die;
        }

        if (!empty($url)) {
            $urlname = trim($Request->input('url'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);
            // echo  $url;
            // die;
        } else {
            $urlname = trim($Request->input('title'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);
        }

       // $validator = Validator::make($Request->all(), [
           // 'title' => 'required',
           // 'originalprice' => 'required',
                    //'price' => 'required',
                    //'shortdescription' => 'required',
                    //'url' => 'required',
           // 'description' => 'required',
                    //'maincategory' => 'required|not_in:0',
                    //'subcategory' => 'required|not_in:0',
                    //'offer' => 'required|not_in:0 ',
            //'country' => 'required ',
                        //'MetaTitle' => 'required ',
                        //'MetaDescription' => 'required ',
                        //'MetaKeyword' => 'required ',
                        //'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
                        //'file-zip' => 'required|file|mimes:zip',
       // ]);
// dimensions:min_width=200,min_height=300
        if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            // return redirect()->back()->with('errorMessage','plese enter all Details');
            return redirect('admin/createproduct')
            ->withErrors($validator);
        } else {
            // check if file selected 
            if ($Request->hasFile('file-input')) {
                $image = $Request->file('file-input');
                $strname = 'qubiee';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;

                //$nameimage = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images');
                //echo  'this is file path'.$destinationPath;
                //xtacky/public_html/public/images
                //die;
                //$this->save();
                //code  for url check url slug already exitst or not
                $users = DB::select('SELECT count(url) as url from products where url like "%' . $url . '%" ');
                // echo $users[0]['url'];
                $homedata = json_decode(json_encode($users), true);

                $abc = $homedata[0]['url'];
                //echo $abc;
                //die;

                if ($abc == 1) {
                    $new_url = $url . -$abc;
                } else if ($abc >= 1) {

                    $new_url = $url . -$abc;
                } else {
                    $new_url = $url;
                }
//                echo $new_url;
//                die;
                //code for insert recored in database

                if ($language == 'en') {
                    $language_ar = 'ar';
                    $name_ar = '';
                    $description_ar = '';
                    $metatitle_ar = '';
                    $metadescription_ar = '';
                    $metakeyword_ar = '';
                    //$shortdescription_ar = '';
                } elseif ($language == 'ar') {
                    $language_ar = 'en';
                    $name_ar = '';
                    $description_ar = '';
                    $metatitle_ar = '';
                    $metadescription_ar = '';
                    $metakeyword_ar = '';
                    //$shortdescription_ar = '';
                }
                $post = new product;
                $post->product_name = [$language => $name, $language_ar => $name_ar];
                $post->product_description = [$language => $description, $language_ar => $description_ar];
                $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
                $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
                $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
                $post->product_price = $price;
                //$post->country = $country;
                $post->discount = $discount;
               // $post->short_description = [$language => $shortdescription, $language_ar => $shortdescription_ar];
                $post->url = $new_url;
                $post->main_category = $maincategory;
                $post->sub_category = $sub_cat_id;
                $post->offer = $offer;
                $post->section = $section;
                $post->role_id = $role_id;
                $post->original_price = $original_price;
                $post->product_image = $nameimage;
                //$post->offer_start_date = $from_date;
                //$post->offer_expire_date = $to_date;
                $post->custmization = $cust;
                $post->gift_wrapping = $gift_wrap;
                //$post->addvertise_seciton = $addvert;
                $post->product_specification = $prodspecifiction;
                $post->deliverytime = $deliverytime;
                $post->dilverycharges = $deliverycharges;
                $post->sku = $productsku;
                $post->save();
                $data = $post->id;
                //Session::put('productid',$data);
                // $data = DB::table('products')->insertGetId(['product_name' => $name, 'product_price' => $price,'discount' => $discount, 'short_description' => $shortdescription, 'url' => $new_url, 'main_category' => $maincategory, 'sub_category' => $sub_cat_id, 'offer' => $offer, 'country' => $country, 'section' => $section, 'role_id'=>$role_id ,'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $description, 'meta_keyword' => $metakeyword, 'original_price' => $original_price, 'product_image' => $nameimage, 'offer_start_date' => $from_date, 'offer_expire_date' => $to_date]);

                if ($data > 0) {
                    $image->move($destinationPath, $nameimage);
                    //$data=45;
                    // code check addonce count exicute for loop inset tha product addonce in products_addonce table
                    //echo count($addonce);
//                    $addoncedata = json_decode(json_encode($addonce), true);
//                    if ($addoncedata[0] > 0) {
//                        $datanumber = $data;
//                        $datapnr = [];
//                        for ($i = 0; $i < count($addonce); $i++) {
//                            $datapnr = array(
//                                'product_id' => $addonce[$i],
//                                'id' => $datanumber
//                            );
//                            $data_insert = DB::table('products_addonce')->insert($datapnr);
//                        }
//                    }

                    // code for download purchaabled product like xtacky 
//                    if ($Request->hasFile('file-zip')) {
//                        $imagezip = $Request->file('file-zip');
//
//                        $strname = 'qubiee';
//                        $nameimageex = $imagezip->getClientOriginalExtension();
//                        $nameimagename = $imagezip->getClientOriginalName();
//                        $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
//                        // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
//                        $zipfilename = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
//                        $zipfilenamepath = "product_zip" . '/' . $zipfilename;
//                        $destinationPath = public_path('images/product_zip');
//                        DB::table('products_downloads')->insert([
//                            'product_id' => $data,
//                            'products_link' => $zipfilenamepath,
//                                //you can put other insertion here
//                        ]);
//                        $imagezip->move($destinationPath, $zipfilename);
//                    }

                    //end code for uplod zip file here
                    //code for add the product mutiapl product files

                    $today = date("Ymd");
                    $unique = "XT" . $today . $data;
                    DB::table('products')
                    ->where('id', $data)
                    ->update(['product_ref_number' => $unique]);
                    //              return redirect()->back()->with('ordersuccess','Your reference number : '.$unique);
                    $users = DB::table('products')
                    ->select('id', 'main_category', 'sub_category')
                    ->where('id', '=', $data)
                    ->get();
                    $array = json_decode(json_encode($users), true);
                    $product_id = $array[0]['id'];
                    $main_category = $array[0]['main_category'];
                    $sub_category = $array[0]['sub_category'];
                    
                    //code for add stock
                    $user_id=(Auth::user()->id);
                    $productidstock = $data;
                    $quantity = $Request->input('quantity');       

                    $stk_list = DB::select('select * from stocks where product_id = ?', [$productidstock]);
                    $stk_cnt = count($stk_list);

                    if($stk_cnt > 0){
                        $stk_list1 = DB::select('select * from stocks where product_id = ? ORDER BY id DESC LIMIT 1', [$productidstock]);

                        $o_qty = $stk_list1[0]->original_qty;
                        $s_qty = $stk_list1[0]->sale_qty;
                        $r_qty = $stk_list1[0]->remained_qty;
                        if($o_qty > $r_qty){
                            $quantity = $quantity + $r_qty;
                        }
                        $stock = new stock;
                        $stock->role_id = $user_id;
                        $stock->product_id = $productidstock;
                        $stock->original_qty = $quantity;
                        $stock->remained_qty = $quantity;
                        $stock->sale_qty = 0;
                        $stock->repeat_cnt = $stk_cnt;
                        $stock->save();              
                    }
                    else{
                        $stock = new stock;
                        $stock->role_id = $user_id;
                        $stock->product_id = $productidstock;
                        $stock->original_qty = $quantity;
                        $stock->remained_qty = $quantity;
                        $stock->sale_qty = 0;
                        $stock->repeat_cnt = $stk_cnt;
                        $stock->save();
                    }        
                    //end add stock
                    //code for if file selected or not
                    if ($Request->hasFile('photos')) {
                        $getProductimagedetails = Category::getProductimagedetails($product_id);
                        foreach ($getProductimagedetails as $getProductimage) {
                            $lang_invitee = explode('|', $getProductimage->images_name);

                            foreach ($lang_invitee as $key => $value) {
                                $usersImage = public_path("/images/{$value}"); // get previous image from folder

                                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                    unlink($usersImage);
                                }
                            }
                        }
                        $data = array();
                        foreach ($Request->file('photos') as $image) {
                            $strname = 'qubiee';
                            $nameimageprodex = $image->getClientOriginalExtension();
                            $nameimagenameprod = $image->getClientOriginalName();
                            $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
                            // $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                            $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                            //$name=$image->getClientOriginalName();
                            $image->move(public_path() . '/images/product_image', $name);
                            $data[] = 'product_image/' . $name;
                        }
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $main_category,
                            'sub_category' => $sub_cat_id,
                                //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    } else {
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    }
                }
            } else {
                return redirect()->back()->with('success', 'please select product  image');
            }
        }
    }

    public function showproductdetails($id) {


        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $category_parent_id = DB::select('select * from category where status= 1 and  category_parent_id = 0'); //get main categry
        //$category_parent_id = json_decode(json_encode($category_parent), true);
        $productlist = DB::select('select id,product_name from products  where status= 1');
        $subcategory = DB::select('select * from category where status= 1 and category_parent_id NOT IN (0) '); //get main sub categry

        $products_addonce = DB::select('select * from products_addonce a, products p where a.product_id = p.id and a.id= ' . $id);
//        echo "<pre>";
//        print_r($products_addonce);
//        die;

        $users = DB::select('select * from products where id = ?', [$id]); //for get data
        $array = json_decode(json_encode($users), true);

        $main_category_id = $array[0]['main_category'];
        $sub_menu_id = $array[0]['sub_category'];

        $getProductimagedetails = Category::getProductimagedetails($id);
        $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);

        $all_cat = DB::select("select * from category where status= 1");
        if ($sub_menu_id == 0) {
            //echo "Main Category";
            $menu_cat_data = 0;
        } else {
            $menu_cat_data = $this->get_menu_tree($sub_menu_id);
        }
//        echo "<pre>";
//        print_r($menu_cat_data);
        //die;
//        $sub = json_decode(json_encode($getAllsubmenuparent), true);
//        
//        $getsubmenuparent = Category::getAllparent($sub_menu_id);
//
//        if(empty($getsubmenuparent)) {
//            $all_cat = $getsubmenuparent;
//        }
//        else{
//            $sub_parent_id = $getsubmenuparent[0]->category_parent_id;
//            $all_cat = Category::getAllsubmenuparent($sub_parent_id);
//        }
        //echo View::make('Admin.header')->render();
        return view('Admin.edit-product', ['language' => $this->language, 'productlist' => $productlist, 'users' => $users, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory, 'getAllsubmenuparent' => $getAllsubmenuparent, 'getProductimagedetails' => $getProductimagedetails, 'product_addonce' => $products_addonce, 'menu_all_category' => $menu_cat_data, 'all_cat' => $all_cat]);
    }

    //code for submit product  edit form 

    public function updateproduct(Request $Request) {
        // check current selected language
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        //get the usesr id
        $role_id = Auth::user()->id;
        $edittitle = $Request->input('title');
        $product_id = $Request->input('product_id');
        $image = $Request->input('file-input');
        $editprice = $Request->input('price');
        $editdescription = $Request->input('product-description');

        //$shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');
        $discountvalue = $Request->input('discount');
        $maincategory = $Request->input('maincategory');
        $subcategory = $Request->input('subcategory');
        $offer = $Request->input('offer');
        //$country = $Request->input('country');
        $section = $Request->input('section');
        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('metadescription');
        $metakeyword = $Request->input('MetaKeyword');
        $original_price = $Request->input('originalprice');
        $fileoldpath = $Request->input('filepath');
        $filepath_product = $Request->input('filepath_product');

        $s_cat_id = $Request->input('sub_cat');
        $addonce = $Request->input('addonce');
        $gift_wrapping = $Request->input('gift_wrapping');
        //$addvertisment = $Request->input('addvertisment');
        $customization = $Request->input('customization');
        //$as_gift_wrapping = $Request->input('as_gift_wrapping');
        $prodspecifiction = $Request->input('prodspecifiction');
        $deliverytime = $Request->input('deliverytime');
        $deliverycharges = $Request->input('deliverycharges');
        $productsku = $Request->input('productsku');
        
      
        if($discountvalue ==""){
                $discount= 0;
                 $editprice=$original_price;
            }else{
                $discount= $discountvalue;
             }
                  

        if ($s_cat_id > 0) {
            $sub_cat_id = $s_cat_id;
        } else {
            $sub_cat_id = $subcategory;
        }
          if($customization == null){
            $cust = 0;
        }
        else{
            $cust = $customization;
        }
         if($gift_wrapping == null){
            $gift_wrap = 0;
        }
        else{
            $gift_wrap = $gift_wrapping;
        }
//         if($as_gift_wrapping == null){
//            $as_gift_wrap = 0;
//        }
//        else{
//            $as_gift_wrap = $as_gift_wrapping;
//        }
        
//          if($addvertisment == null){
//            $addvert = 0;
//        }
//        else{
//            $addvert = $addvertisment;
//        }
       
        $validator = Validator::make($Request->all(), [
            'title' => 'required',
            'originalprice' => 'required',
            'product-description' => 'required',
            //'shortdescription' => 'required',
                    //'maincategory' => 'required|not_in:0',
                    // 'subcategory' => 'required|not_in:0',
                    //'offer' => 'required|not_in:0 ',
            //'country' => 'required ',
                        //'MetaTitle' => 'required ',
                        //'metadescription' => 'required ',
                        //'MetaKeyword' => 'required ',
                        // 'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
        ]);


        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator);
        } else {
            //validation true then check file selected or not
            if ($Request->hasFile($image)) {

                $image = $Request->file('file-input');
                $strname = 'qubiee';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
//                   $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
//        echo $nameimage;
//        die;
                $destinationPath = public_path('images');
                //echo  'this is file path'.$destinationPath;
                //die;
                $image->move($destinationPath, $nameimage);

                $addoncedata = json_decode(json_encode($addonce), true);
                // check addonece selected or not
                if ($addoncedata[0] > 0) {
                    $datanumber = $product_id;
                    $datapnr = [];
                    for ($i = 0; $i < count($addonce); $i++) {
                        $p_addonce = DB::select("SELECT * FROM `products_addonce` WHERE id = '" . $product_id . "' and product_id = $addonce[$i]");
                        $datapnr = array(
                            'product_id' => $addonce[$i],
                            'id' => $datanumber
                        );
                        if ($p_addonce) {

                        } else {
                            $data = DB::table('products_addonce')->insert($datapnr);
                        }
                    }
                }

//$post = new product;
//                DB::table('products')
//                    ->where('id', $product_id)
//                    ->update(['product_name->en' => $edittitle,'discount' => $discount,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $sub_cat_id,'offer' => $offer,'country' => $country,'updated_role_id'=>$role_id,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description->en' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $nameimage]);
                // code for update the jsone data 
                $post = product::where('id', $product_id)->first();
                if ($post) {

                    $product_name = $post->product_name;
                    $product_description = $post->product_description;

                    //$short_description = $post->short_description;
                    $meta_title = $post->meta_title;
                    $meta_description = $post->meta_description;
                    $meta_keyword = $post->meta_keyword;

                    if (isset($product_name[$language])) {
                        // condtion for is language attributes found then updated it
                        $product_name[$language] = $edittitle;
                        $product_description[$language] = $editdescription;
                        //$short_description[$language] = $shortdescription;
                        $meta_title[$language] = $metatitle;
                        $meta_description[$language] = $metadescription;
                        $meta_keyword[$language] = $metakeyword;
                        $post->product_name = $product_name;
                        $post->product_description = $product_description;
                        $post->product_price = $editprice;
                        //$post->country = $country;
                        $post->discount = $discount;
                        $post->short_description = $product_name;
                        //$post->short_description = $short_description;
                        $post->url = $url;
                        $post->main_category = $maincategory;
                        $post->sub_category = $sub_cat_id;
                        $post->offer = $offer;
                        $post->section = $section;
                        $post->updated_role_id = $role_id;
                        $post->meta_title = $meta_title;
                        $post->meta_description = $meta_description;
                        $post->meta_keyword = $meta_keyword;
                        $post->original_price = $original_price;
                        $post->product_image = $nameimage;
                        $post->custmization = $cust;
                        $post->gift_wrapping = $gift_wrap;
                        //$post->addvertise_seciton = $addvert;
                        //$post->as_gift_wrap = $as_gift_wrap;
                        $post->product_specification = $prodspecifiction;
                        $post->deliverytime = $deliverytime;
                        $post->dilverycharges = $deliverycharges;
                        $post->status = 0;
                        $post->sku = $productsku;
                        $post->save();
                    } else {
                        //condition check if language not found the add the attributes 
                        if ($language == 'en') {
                            $language_ar = 'ar';
                            $name_ar = '';
                            $description_ar = '';
                            $metatitle_ar = '';
                            $metadescription_ar = '';
                            $metakeyword_ar = '';
                            //$shortdescription_ar = '';
                        } elseif ($language == 'ar') {
                            $language_ar = 'en';
                            $name_ar = '';
                            $description_ar = '';
                            $metatitle_ar = '';
                            $metadescription_ar = '';
                            $metakeyword_ar = '';
                            //$shortdescription_ar = '';
                        }

                        $post->product_name = [$language => $name, $language_ar => $name_ar];
                        $post->product_description = [$language => $description, $language_ar => $description_ar];
                        $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
                        $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
                        $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
                        $post->product_price = $price;
                        //$post->country = $country;
                        $post->discount = $discount;
                        //$post->short_description = [$language => $shortdescription, $language_ar => $shortdescription_ar];
                        $post->url = $new_url;
                        $post->main_category = $maincategory;
                        $post->sub_category = $sub_cat_id;
                        $post->offer = $offer;
                        $post->section = $section;
                        $post->updated_role_id = $role_id;
                        $post->original_price = $original_price;
                        $post->product_image = $nameimage;
                        //$post->offer_start_date = $from_date;
                        //$post->offer_expire_date = $to_date;
                        $post->custmization = $cust;
                        $post->gift_wrapping = $gift_wrap;
                        //$post->addvertise_seciton = $addvert;
                        //$post->as_gift_wrap = $as_gift_wrap;
                        $post->product_specification = $prodspecifiction;
                        $post->deliverytime = $deliverytime;
                        $post->dilverycharges = $deliverycharges;
                        $post->status = 0;
                        $post->sku = $productsku;
                        $post->save();
                    }
                }


//    DB::table('products')
//            ->where('id', $product_id)
//            ->update(['product_name' => $edittitle,'discount' => $discount,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $sub_cat_id,'offer' => $offer,'country' => $country,'updated_role_id'=>$role_id,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $nameimage]);
                if ($Request->hasFile('photos')) {
                    // condtion check product multipal images selected or not
                    $getProductimagedetails = Category::getProductimagedetails($product_id);
                    foreach ($getProductimagedetails as $getProductimage) {
                        $lang_invitee = explode('|', $getProductimage->images_name);

                        foreach ($lang_invitee as $key => $value) {
                            $usersImage = public_path("/images/{$value}"); // get previous image from folder

                            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                unlink($usersImage);
                            }
                        }
                    }
                    $data = array();
                    foreach ($Request->file('photos') as $image) {
                        $strname = 'qubiee';
                        $nameimageprodex = $image->getClientOriginalExtension();
                        $nameimagenameprod = $image->getClientOriginalName();
                        $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                        $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                        //$name=$image->getClientOriginalName();
                        $image->move(public_path() . '/images/product_image', $name);
                        $data[] = 'product_image/' . $name;
                    }
                    if (!$getProductimagedetails) {
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $main_category,
                            'sub_category' => $sub_category,
                                //you can put other insertion here
                        ]);
                    } else {
                        DB::table('product_images')
                        ->where('product_id', $product_id)
                        ->update([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                        //you can put other insertion here
                        ]);
                    }
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                } else {
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                }

                //return redirect()->back()->with('success','Product  Updated Successfully');
            } else {
                // if file not selected exicuation here
                $addoncedata = json_decode(json_encode($addonce), true);
                if ($addoncedata[0] > 0) {
                    $datanumber = $product_id;
                    $datapnr = [];
                    for ($i = 0; $i < count($addonce); $i++) {
                        $p_addonce = DB::select("SELECT * FROM `products_addonce` WHERE id = '" . $product_id . "' and product_id = $addonce[$i]");
                        $datapnr = array(
                            'product_id' => $addonce[$i],
                            'id' => $datanumber
                        );
                        if ($p_addonce) {

                        } else {
                            $data = DB::table('products_addonce')->insert($datapnr);
                        }
                    }
                }
                // updated jsone data with out updating the image
                $post = product::where('id', $product_id)->first();
                if ($post) {

                    $product_name = $post->product_name;
                    $product_description = $post->product_description;

                    //$short_description = $post->short_description;
                    $meta_title = $post->meta_title;
                    $meta_description = $post->meta_description;
                    $meta_keyword = $post->meta_keyword;

                    if (isset($product_name[$language])) {
                        // if language attiribiutes found
                        $product_name[$language] = $edittitle;
                        $product_description[$language] = $editdescription;
                        //$short_description[$language] = $shortdescription;
                        $meta_title[$language] = $metatitle;
                        $meta_description[$language] = $metadescription;
                        $meta_keyword[$language] = $metakeyword;
                        $post->product_name = $product_name;
                        $post->product_description = $product_description;
                        $post->product_price = $editprice;
                       // $post->country = $country;
                        $post->discount = $discount;
                        //$post->short_description = $product_name;
                        //$post->short_description = $short_description;
                        $post->url = $url;
                        $post->main_category = $maincategory;
                        $post->sub_category = $sub_cat_id;
                        $post->offer = $offer;
                        $post->section = $section;
                        $post->updated_role_id = $role_id;
                        $post->meta_title = $meta_title;
                        $post->meta_description = $meta_description;
                        $post->meta_keyword = $meta_keyword;
                        $post->original_price = $original_price;
                        $post->product_image = $fileoldpath;
                        $post->custmization = $cust;
                        $post->gift_wrapping = $gift_wrap;
                        //$post->addvertise_seciton = $addvert;
                        //$post->as_gift_wrap = $as_gift_wrap;
                        $post->product_specification = $prodspecifiction;
                        $post->deliverytime = $deliverytime;
                        $post->dilverycharges = $deliverycharges;
                        $post->sku = $productsku;
                        $post->save();
                    } else {
                        // if language attiribiutes not found
                        if ($language == 'en') {
                            $language_ar = 'ar';
                            $name_ar = '';
                            $description_ar = '';
                            $metatitle_ar = '';
                            $metadescription_ar = '';
                            $metakeyword_ar = '';
                            //$shortdescription_ar = '';
                        } elseif ($language == 'ar') {
                            $language_ar = 'en';
                            $name_ar = '';
                            $description_ar = '';
                            $metatitle_ar = '';
                            $metadescription_ar = '';
                            $metakeyword_ar = '';
                            //$shortdescription_ar = '';
                        }

                        $post->product_name = [$language => $edittitle, $language_ar => $name_ar];
                        $post->product_description = [$language => $editdescription, $language_ar => $description_ar];
                        $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
                        $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
                        $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
                        $post->product_price = $editprice;
                        $post->discount = $discount;
                       // $post->country = $country;
                        //$post->short_description = [$language => $shortdescription, $language_ar => $shortdescription_ar];
                        $post->url = $url;
                        $post->main_category = $maincategory;
                        $post->sub_category = $sub_cat_id;
                        $post->offer = $offer;
                        $post->section = $section;
                        $post->updated_role_id = $role_id;
                        $post->original_price = $original_price;
                        $post->product_image = $fileoldpath;
                        $post->custmization = $cust;
                        $post->gift_wrapping = $gift_wrap;
                        //$post->addvertise_seciton = $addvert;
                        //$post->as_gift_wrap = $as_gift_wrap;
                        $post->product_specification = $prodspecifiction;
                        $post->deliverytime = $deliverytime;
                        $post->dilverycharges = $deliverycharges;
                        $post->sku = $productsku;
                        $post->save();
                    }
                }

//        DB::table('products')
//            ->where('id', $product_id)
//            ->update(['product_name' => $edittitle,'discount' => $discount,'product_price' => $editprice,'short_description' => $shortdescription,'url' => $url,'main_category' => $maincategory,'sub_category' => $sub_cat_id,'offer' => $offer,'country' => $country,'updated_role_id'=>$role_id,'section' => $section,'original_price' =>$original_price,'meta_title' => $metatitle,'meta_description' => $metadescription,'product_description' => $editdescription,'meta_keyword' =>   $metakeyword,'product_image' => $fileoldpath]);

                if ($Request->hasFile('photos')) {



                    $getProductimagedetails = Category::getProductimagedetails($product_id);
                    // $array = json_decode(json_encode($getProductimagedetails), true);

                    foreach ($getProductimagedetails as $getProductimage) {

                        $lang_invitee = explode('|', $getProductimage->images_name);

                        foreach ($lang_invitee as $key => $value) {
                            $usersImage = public_path("/images/{$value}"); // get previous image from folder

                            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                unlink($usersImage);
                            }
                        }
                    }

                    $data = array();
                    foreach ($Request->file('photos') as $image) {

                        $strname = 'qubiee';
                        $nameimageprodex = $image->getClientOriginalExtension();
                        $nameimagenameprod = $image->getClientOriginalName();
                        $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                        $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                        //$name=$image->getClientOriginalName();
                        $image->move(public_path() . '/images/product_image', $name);
                        $data[] = 'product_image/' . $name;
                    }
                    if (!$getProductimagedetails) {
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                //you can put other insertion here
                        ]);
                    } else {
                        DB::table('product_images')
                        ->where('product_id', $product_id)
                        ->update([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                        //you can put other insertion here
                        ]);
                    }

                    return redirect()->back()->with('success', 'Product  Upload successfully');
                } else {
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                }
            }
        }
    }

    //code for delete product
    public function deleteproduct($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('products')
        ->where('id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }
    //code for status  product
    public function approvproduct($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('products')
        ->where('id', $id)
        ->update(['status' => 1]);
        return redirect()->back()->with('success', 'Product Approv successfully');
    }
    // code for add banner slider page
    //code for status banner product
    public function approvbannproduct($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('banneradds')
        ->where('id', $id)
        ->update(['status' => 1]);
        return redirect()->back()->with('success', 'Product Approv successfully');
    }
    // code for add banner slider page
    //product add end

    public function allmenu() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        // $users = DB::select('select * from products  where status= 1');
        // $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
        //$users = Category::getAllProduct();
        $category_parent_id = Category::getMainCategory();
        $subcategory = Category::getSubCategory();
        //$users = DB::select('select * from products where product_id = ?',[$id]); //for get data
        /* print_r($users);
        die; */
//        echo View::make('Admin.header')->render();
        return view('Admin.all-menus', ['language' => $this->language, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory]);
    }

    public function menu() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        // $surnames = DB::table('category')->lists('category_id','category_name'); 
        //$users = DB::select('select * from category where category_parent_id = 0');
        $users = DB::select('select * from category where status= 1');
//        echo View::make('Admin.header')->render();
        return view('Admin.add-new-menu', compact('language', 'users'));
    }
       public function addlayout() {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         $getlayoutinfo = Category::getlayoutinfo();
              $layoutdata = json_decode(json_encode($getlayoutinfo), true);
               if($layoutdata){
                   $layoutclass_name = $layoutdata[0]['class_name'];
               $layoutbackground_image = $layoutdata[0]['background_image'];
               $background_color = $layoutdata[0]['background_color'];
               $backgroundStatus = $layoutdata[0]['status'];
               $backgroundId = $layoutdata[0]['id'];
                 
             }else{
                  $layoutclass_name = '';
               $layoutbackground_image = '';
               $background_color = '';
               $backgroundStatus='';
               $backgroundId='';
               
             }
        // $surnames = DB::table('category')->lists('category_id','category_name'); 
        //$users = DB::select('select * from category where category_parent_id = 0');
        
//        echo View::make('Admin.header')->render();
        return view('Admin.add-layout', compact('language','layoutclass_name','layoutbackground_image','background_color','backgroundStatus','backgroundId'));
    }
    
      //code for status  product layout
    public function activatelayout($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('add_layout')
        ->where('id', $id)
        ->update(['status' => 1]);
        return redirect()->back()->with('success', 'Layout Activated successfully');
    }
         //code for status  product layout
    public function deactivatelayout($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('add_layout')
        ->where('id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Layout Deactivated successfully');
    }

    //code for dashboard function
    public function dashboard() {
        //$data['header'] = View::make('dashboard-header')->render();
        echo View::make('Admin.header')->render();
        return view('Admin.index');
    }

    //Updtae menu using modal
    public function editmenupage(Request $Request) {
        /*  echo "call function";
          print_r($_POST);
         */
//           echo "hello";
//           die;
          $categoryid1 = trim($Request->input('categoryid1'));
          $this->validate($Request, [
            'etitle1' => 'required',
                //'description' => 'required'
        ]);
          $data = array(
            'category_name' => $Request->input('etitle1'),
            'meta_title' => $Request->input('eMetaTitle1'),
            'meta_description' => $Request->input('eMetaDescription1'),
            'meta_keyword' => $Request->input('eMetaKeyword1')
        );
          if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        $post = Category::where('category_id', $categoryid1)->first();
        if ($post) {

            $product_name = $post->category_name;
            $meta_title = $post->meta_title;
            $meta_description = $post->meta_description;
            $meta_keyword = $post->meta_keyword;

            if (isset($product_name[$language])) {
                $product_name[$language] = $Request->input('etitle1');

                $meta_title[$language] = $Request->input('eMetaTitle1');
                $meta_description[$language] = $Request->input('eMetaDescription1');
                $meta_keyword[$language] = $Request->input('eMetaKeyword1');
                $post->category_name = $product_name;
                $post->meta_title = $meta_title;
                $post->meta_description = $meta_description;
                $post->meta_keyword = $meta_keyword;
                $post->save();
            }
        }

//        DB::table('category')
//                ->where('category_id', $categoryid1)
//                ->update($data);
        return redirect()->back()->with('success', 'Menu Updated Successfully');
    }

    //Updtae submenu using modal
    public function editsubmenupage(Request $Request) {

        $esubcategoryid = trim($Request->input('esubcategoryid'));
        $this->validate($Request, [
            'esubcategory' => 'required',
        ]);
        $data = array(
            'category_name' => $Request->input('esubcategory'),
            'meta_title' => $Request->input('eSubMetaTitle'),
            'meta_keyword' => $Request->input('eSubMetaKeyword'),
            'meta_description' => $Request->input('eSubMetaDescription')
        );
        
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        $post = Category::where('category_id', $esubcategoryid)->first();
        if ($post) {

            $product_name = $post->category_name;
            $meta_title = $post->meta_title;
            $meta_description = $post->meta_description;
            $meta_keyword = $post->meta_keyword;

            if (isset($product_name[$language])) {
                $product_name[$language] = $Request->input('esubcategory');

                $meta_title[$language] = $Request->input('eSubMetaTitle');
                $meta_description[$language] = $Request->input('eSubMetaDescription');
                $meta_keyword[$language] = $Request->input('eSubMetaKeyword');
                $post->category_name = $product_name;
                $post->meta_title = $meta_title;
                $post->meta_description = $meta_description;
                $post->meta_keyword = $meta_keyword;
                $post->save();
            }
        }
        
        
        
        
        
        
        
//        echo $esubcategoryid;
//        print_r($data);
//        die;
        
//        $id = DB::table('category')
//        ->where('category_id', $esubcategoryid)
//        ->update($data);
//        
//        echo $id ;
//        die;
        return redirect()->back()->with('success', 'SubMenu Updated Successfully');
    }

    //Delete Menu
    public function deletemenu($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('category')
        ->where('category_id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Category Deleted successfully');
    }

    //Delete SubMenu
    public function deletesubmenu($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('category')
        ->where('category_id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Sub-Category Deleted successfully');
    }

    // code for add new menu
    public function addmenu(Request $Request) {


      if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }


    $name = trim($Request->input('title'));
    $metatitle = $Request->input('MetaTitle');
    $metadescription = $Request->input('MetaDescription');
    $metakeyword = $Request->input('MetaKeyword');
    $urlname = trim($Request->input('title'));
    $urlower = strtolower($urlname);
    $url = str_replace(' ', '-', $urlower);
    $validator = Validator::make($Request->all(), [
        'title' => 'required',
        //'file-input' => 'required|file|mimes:jpeg,png,jpg,gif,svg',
    ]);
// dimensions:min_width=200,min_height=300
    if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
//             return redirect()->back()->with('errorMessage','plese enter all Details');
        return redirect()->back()->withErrors($validator);
    } else {

        if ($Request->hasFile('file-input')) {

            $image = $Request->file('file-input');
            $nameimage = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = public_path('images/menu');
                //echo  'this is file path'.$destinationPath;
            $nameimagepath = "menu" . '/' . $nameimage;

            $image->move($destinationPath, $nameimage);
                //$this->save()
            if ($language == 'en') {
                $language_ar = 'ar';
                $name_ar = '';
                $metatitle_ar = '';
                $metadescription_ar = '';
                $metakeyword_ar = '';
                $shortdescription_ar = '';
            } elseif ($language == 'ar') {
                $language_ar = 'en';
                $name_ar = '';
                $metatitle_ar = '';
                $metadescription_ar = '';
                $metakeyword_ar = '';
                $shortdescription_ar = '';
            }
            $post = new Category;
            $post->category_name = [$language => $name, $language_ar => $name_ar];
            $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
            $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
            $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
            $post->url = $url;
            $post->category_image = $nameimagepath;
            $post->save();
                // DB::table('category')->insert(['category_name' => $name, 'url' => $url, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'meta_keyword' => $metakeyword, 'category_image' => $nameimagepath]);


            return redirect()->back()->with('success', 'Category Upload successfully');
        } else {

            if ($language == 'en') {
                $language_ar = 'ar';
                $name_ar = '';
                $metatitle_ar = '';
                $metadescription_ar = '';
                $metakeyword_ar = '';
                $shortdescription_ar = '';
            } elseif ($language == 'ar') {
                $language_ar = 'en';
                $name_ar = '';
                $metatitle_ar = '';
                $metadescription_ar = '';
                $metakeyword_ar = '';
                $shortdescription_ar = '';
            }
            $post = new Category;
            $post->category_name = [$language => $name, $language_ar => $name_ar];
            $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
            $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
            $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
            $post->url = $url;
            $post->save();
                // DB::table('category')->insert(['category_name' => $name, 'url' => $url, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'meta_keyword' => $metakeyword, 'category_image' => $nameimagepath]);


            return redirect()->back()->with('success', 'Category Upload successfully');
       
//            return redirect()->back()->with('success', 'Plese Select Product  Image');
        }
    }
}

    //code for add sub menu
public function addsubmenu(Request $Request) {

  $mainmenu = trim($Request->input('maincategory'));
  $metatitle = $Request->input('MetaTitle');
  $metadescription = $Request->input('MetaDescription');
  $metakeyword = $Request->input('MetaKeyword');
  $submenu = trim($Request->input('subcategory'));
  $urlname = trim($Request->input('subcategory'));
  $urlower = strtolower($urlname);
  $url = str_replace(' ', '-', $urlower);
  $validator = Validator::make($Request->all(), [
    'maincategory' => 'required|not_in:0',
    'subcategory' => 'required',
]);
        // dimensions:min_width=200,min_height=300
  if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            // return redirect()->back()->with('errorMessage','plese enter all Details');
//    return redirect('mainmenu/menu')->withErrors($validator);
    return redirect()->back()->withErrors($validator);
} else {
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }


    if ($language == 'en') {
        $language_ar = 'ar';
        $name_ar = '';
        $metatitle_ar = '';
        $metadescription_ar = '';
        $metakeyword_ar = '';
        $shortdescription_ar = '';
    } elseif ($language == 'ar') {
        $language_ar = 'en';
        $name_ar = '';
        $metatitle_ar = '';
        $metadescription_ar = '';
        $metakeyword_ar = '';
        $shortdescription_ar = '';
    }
    $post = new Category;
    $post->category_name = [$language => $submenu, $language_ar => $name_ar];
    $post->meta_title = [$language => $metatitle, $language_ar => $metatitle_ar];
    $post->meta_description = [$language => $metadescription, $language_ar => $metadescription_ar];
    $post->meta_keyword = [$language => $metakeyword, $language_ar => $metakeyword_ar];
    $post->url = $url;
    $post->category_parent_id = $mainmenu;
    $post->save();
            //$this->save();
            // DB::table('category')->insert(['category_name' => $submenu, 'url' => $url, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'meta_keyword' => $metakeyword, 'category_parent_id' => $mainmenu]);
    return redirect()->back()->with('success-sub-menu', 'Sub Category Upload successfully');
}
}

public function subcat(Request $Request) {

    $id = $_GET['id'];

    $states = DB::table('category')->where('category_parent_id', $id)->where('status', 1)->pluck('category_id', 'category_name');

//       $states = DB::table("category")
//                    ->where("category_parent_id",$id )
//                    ->lists("category_id","category_name");
    return response()->json($states);
}

public function sub_category(Request $Request) {
    $id = $_GET['id'];
    $states = DB::table('category')->where('category_parent_id', $id)->pluck('category_id', 'category_name');
    return response()->json($states);
}

// code start for banner add

public function bannerproduct() {
        //echo "call now";

    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    $role_id = Auth::user()->id;
    $role_title = Auth::user()->job_title;
    if ($role_title == 'superadmin') {

         //$users = DB::select('select * from banneradds ');
         $users = banneradds::get();
    } else {
        //$users = DB::select('select * from banneradds  where status= 1  and  role_id    = ?', [$role_id]);
       $research = banneradds::where('status', '=',1)->where('role_id', '=', Auth::user()->id)->get();
        }
 
        return view('Admin.all-banner-products', ['users' => $users, 'language' => $language]);
        
    }

    public function createbannerproduct() {

        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
        $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
//        echo View::make('Admin/header')->render();
        return view('Admin/add-bannerslider-product', compact('users', 'categoryall', 'language'));
    }

    public function showbanner($id) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
        $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
        $getProductdetails = DB::select('select * from banneradds where id = ?', [$id]);
        $array = json_decode(json_encode($getProductdetails), true);

        

//  			 echo "<pre>";
//  			 print_r($getProductdetails);
//  			 die;
//        echo View::make('Admin.header')->render();
        return view('Admin.edit-bannerproduct', ['getProductdetails' => $getProductdetails, 'users' => $users, 'categoryall' => $categoryall, 'language' => $language]);
        //return view('product-details',['users'=>$users,'category_parent_id'=>$category_parent_id,'subcategory'=>$subcategory]);  		
    }

    //code for edit the banner procut pages 
    public function updatebanner(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }


        $role_id = Auth::user()->id;
        $edittitle = $Request->input('title');
        $Request->except('_token');
        $product_id = $Request->input('product_id');
        $image = $Request->input('file-input');
         $addvertisment = $Request->input('addvertisment');
       

        
        $url = $Request->input('url');
        
        $section = $Request->input('section');
       
        $fileoldpath = $Request->input('filepath');
        $validator = Validator::make($Request->all(), [
            'title' => 'required',
            'url' => 'required',
            'addvertisment' => 'required|numeric|in:1,2,others',
        ]);


        if ($validator->fails()) {

            return redirect()->back()
            ->withErrors($validator);
        } else {

            if ($Request->hasFile($image)) {

                $image = $Request->file('file-input');

                $nameimage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/bannersliderimages');
                $nameimagepath = "bannersliderimages" . '/' . $nameimage;
                //echo  'this is file path'.$destinationPath;
                //die;

                $post = banneradds::where('id', $product_id)->first();
                if($post) {

                    $product_name = $post->name;
                    if (isset($product_name[$language])) {
                        $product_name[$language] = $edittitle;
                        $post->name = $product_name;
                        $post->url = $url;
                        $post->section = $addvertisment;
                        $post->image = $nameimagepath;
                        $post->save();
                        $bannerupdate = $post->id;
                    }
                }
//                $bannerupdate = DB::table('products')
//                        ->where('id', $product_id)
//                        ->update(['product_name' => $edittitle, 'product_price' => $editprice, 'short_description' => $shortdescription, 'url' => $url, 'main_category' => $maincategory, 'sub_category' => $subcategory,'updated_role_id'=>$role_id, 'offer' => $offer, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $editdescription, 'meta_keyword' => $metakeyword, 'product_image' => $nameimagepath]);
//           

                if ($bannerupdate > 0) {
                    $image->move($destinationPath, $nameimage);
                    return redirect()->back()->with('success', 'Product  updated successfully');
                }
            } else {
                $post = banneradds::where('id', $product_id)->first();
                if ($post) {

                    $product_name = $post->name;
                    

                    if (isset($product_name[$language])) {
                        $product_name[$language] = $edittitle;
                        $post->name = $product_name;
                        $post->url = $url;
                        $post->section = $addvertisment;
                        $post->image = $fileoldpath;
                        $post->save();
                    }
                }
//                $bannerupdate = DB::table('products')
//                        ->where('id', $product_id)
//                        ->update(['product_name' => $edittitle, 'product_price' => $editprice, 'short_description' => $shortdescription, 'url' => $url, 'main_category' => $maincategory, 'sub_category' => $subcategory, 'offer' => $offer, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $editdescription, 'meta_keyword' => $metakeyword, 'product_image' => $fileoldpath]);

                return redirect()->back()->with('success', 'Product  updated successfully');
                //return redirect()->back()->with('success','plese select product  image');
            }
        }
    }

    //code for add banner product 
    public function addbannerproduct(Request $Request) {
       

      if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }


    $role_id = Auth::user()->id;
    $name = $Request->input('title');
     
    $Request->except('_token');
    $addvertisment = $Request->input('addvertisment');
    $url = $Request->input('url');
    
    $section = "banner";
    $validator = Validator::make($Request->all(), [
                    'title' => 'required',
                    'url' => 'required',
                    'addvertisment' => 'required|numeric|in:1,2,others',
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
            $nameimage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/bannersliderimages');
                //echo  'this is file path'.$destinationPath;
            $nameimagepath = "bannersliderimages" . '/' . $nameimage;
                //die;
                //$this->save();
            if ($language == 'en') {
                $language_ar = 'ar';
                $name_ar = '';
               
            } elseif ($language == 'ar') {
                $language_ar = 'en';
                $name_ar = '';
               
            }
//                    if($addvertisment == null){
//                   $addvert = 0;
//                        }
//                        else{
//                            $addvert = $addvertisment;
//                        }
            $post = new banneradds;
            $post->name = [$language => $name, $language_ar => $name_ar];
            $post->url = $url;
            $post->section = $addvertisment;
            $post->role_id = $role_id;
            $post->image = $nameimagepath;
            $post->save();
            $data = $post->id;
            $image->move($destinationPath, $nameimage);
                //$data = DB::table('products')->insertGetId(['product_name' => $name, 'product_price' => $price, 'short_description' => $shortdescription,'role_id'=>$role_id,'section' => $section, 'url' => $new_url, 'main_category' => $maincategory, 'sub_category' => $subcategory, 'offer' => $offer, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $description, 'meta_keyword' => $metakeyword, 'product_image' => $nameimagepath]);

           return redirect()->back()->with('success', 'Product  Upload successfully');
             
        } else {
            return redirect()->back()->with('success', 'plese select product  image');
        }
    }
}

    // code for page section
public function allpages() {
  if (Session::has('locale')) {
        $this->language = Session::get('locale');
    } else {
        $this->language = app()->getLocale();
    }
        // $users = DB::select('select * from products  where status= 1');
        // $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
        //$users = Category::getAllProduct();
        //$category_parent_id = Category::getMainCategory();
    $pagedetails = Category::getPagesdetails();
        //$users = DB::select('select * from products where product_id = ?',[$id]); //for get data
        /* print_r($users);
        die; */
        //echo View::make('Admin.header')->render();
        return view('Admin.all-pages', ['language' => $this->language,'pagedetails' => $pagedetails]);
    }

    public function createpage() {
        echo View::make('Admin.header')->render();
        return view('Admin.add-new-page');
    }

    //code for add product 
    public function addpage(Request $Request) {



        $name = $Request->input('title');
        //$price=$Request->input('price'); 

        $description = $Request->input('description');

        $shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');
        //$maincategory=$Request->input('maincategory'); 
        //$subcategory=$Request->input('subcategory'); 
        //   $offer=$Request->input('offer'); 
        $country = $Request->input('country');
        //  $section=$Request->input('section'); 
        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('MetaDescription');
        $metakeyword = $Request->input('MetaKeyword');

        //$productfile =$Request->input('photos'); 
        

        if (!empty($url)) {
            $urlname = trim($Request->input('url'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);

        } else {
            $urlname = trim($Request->input('title'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);
        }

        $validator = Validator::make($Request->all(), [
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
            return redirect('admin/createpage')
            ->withErrors($validator);
        } else {

            if ($Request->hasFile('file-input')) {
                $image = $Request->file('file-input');
                $nameimage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/pages');
                //echo  'this is file path'.$destinationPath;
                //xtacky/public_html/public/images
                //die;
                $nameimagepath = "pages" . '/' . $nameimage;
                //$this->save();
                $data = DB::table('all_pages')->insertGetId(['page_name' => $name, 'short_description' => $shortdescription, 'url' => $url, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'page_description' => $description, 'meta_keyword' => $metakeyword, 'page_image' => $nameimagepath]);

                if ($data > 0) {
                    $image->move($destinationPath, $nameimage);
//                    $users = DB::table('products')
//                            ->select('product_id', 'main_category', 'sub_category')
//                            ->where('product_id', '=', $data)
//                            ->get();
//
//                    $array = json_decode(json_encode($users), true);
//                     $product_id=$array[0]['product_id'];
//                          $main_category=$array[0]['main_category'];
//                         $sub_category= $array[0]['sub_category'];


                    return redirect()->back()->with('success', 'Page Upload Successfully');
                }
            } else {
                return redirect()->back()->with('success', 'Plese Select Page Image');
            }
        }
    }

    public function showpages($id) {


        $pagesedit = DB::select('select * from all_pages where page_id = ?', [$id]); //for get data
        //$array = json_decode(json_encode($users), true);
// $main_category_id = $array[0]['main_category'];

        echo View::make('Admin.header')->render();
        return view('Admin.edit-page', ['pagesedit' => $pagesedit]);
    }

    public function updatepageinfo(Request $Request) {


        $edittitle = $Request->input('title');
        $Request->except('_token');
        $product_id = $Request->input('page_id');
        $image = $Request->input('file-input');
        $editdescription = $Request->input('description');

        $shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');


        $country = $Request->input('country');

        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('MetaDescription');
        $metakeyword = $Request->input('MetaKeyword');
        $fileoldpath = $Request->input('filepath');
        $validator = Validator::make($Request->all(), [
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

                $nameimage = time() . '.' . $image->getClientOriginalExtension();
                $destinationPath = public_path('images/pages');

                $nameimagepath = "pages" . '/' . $nameimage;


                $pageupdate = DB::table('all_pages')
                ->where('page_id', $product_id)
                ->update(['page_name' => $edittitle, 'short_description' => $shortdescription, 'url' => $url, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'page_description' => $editdescription, 'meta_keyword' => $metakeyword, 'page_image' => $nameimagepath]);
                if ($pageupdate > 0) {
                    $image->move($destinationPath, $nameimage);
                    return redirect()->back()->with('success', 'Page Updated Successfully');
                }
            } else {
                $pageupdate = DB::table('all_pages')
                ->where('page_id', $product_id)
                ->update(['page_name' => $edittitle, 'short_description' => $shortdescription, 'url' => $url, 'country' => $country, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'page_description' => $editdescription, 'meta_keyword' => $metakeyword, 'page_image' => $fileoldpath]);

                return redirect()->back()->with('success', 'Page  Updated successfully');
            }
        }
    }

    public function ajax(Request $Request) {
        $productname = $Request->input('id');

        //$getProductdetails = Category::getAjaxproductdetails($productname);
        $users = DB::select("select id,product_name from product_details  where product_name  like  '%$productname%' OR category_name  like  '%$productname%'");
        $userss = DB::select("select id,product_name from products  where product_name  like  '%$productname%'");

//return response()->json($users);
        foreach ($users as $s) {
            $urlnewname = trim($s->product_name);
            $newproductfullname = str_replace(' ', '-', $urlnewname);
            $product_price = trim($s->product_price);
            $response['product'][] = Array('id' => $s->id, 'name' => $newproductfullname . '' . $product_price);
        }
        foreach ($userss as $s) {
            $urlnewname = trim($s->product_name);
            $product_price = trim($s->product_price);
            $newproductfullname = str_replace(' ', '-', $urlnewname);
            $response['product'][] = Array('id' => $s->id, 'name' => $newproductfullname);
        }

        echo json_encode($response);
    }

    public function deletebannerproduct($id) {

        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('banneradds')
        ->where('id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }

    public function deletepage($id) {

        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('all_pages')
        ->where('page_id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Page Deleted successfully');
    }

    public function allblog() {
        //echo "call now";
        $role_id = Auth::user()->id;
        $role_title = Auth::user()->job_title;
        if ($role_title == 'admin') {
            $users = DB::select('select * from products  where section= "blog" and status= 1');
        } else {
            $users = DB::select('select * from products  where section= "blog" and status= 1 and role_id    = ?', [$role_id]);
        }
        //$users = DB::select('select * from products  where section= "blog" and status= 1');

//        echo View('Admin.header')->render();
        return view('Admin.all-blog', ['users' => $users]);
        
    }

    public function createblog() {
        //echo "call now";
        $users = DB::select('select * from category where category_parent_id = 0');
        //  $categoryall = DB::select('select * from category');
        $categoryall = DB::select('select * from category where category_parent_id NOT IN (0) ');
//        echo View('Admin.header')->render();
        return view('Admin.add-new-Blog', compact('users', 'categoryall'));
    }

    public function addblog(Request $Request) {
        $role_id = Auth::user()->id;
        $name = $Request->input('title');
        $price = $Request->input('price');
        $Request->except('_token');
        $description = $Request->input('description');

        $shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');
        $maincategory = $Request->input('maincategory');
        $subcategory = $Request->input('subcategory');
        $offer = $Request->input('offer');
        $country = $Request->input('country');
        $section = $Request->input('section');
        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('MetaDescription');
        $metakeyword = $Request->input('MetaKeyword');
        $original_price = $Request->input('originalprice');
        $productfile = $Request->input('photos');


        $to_date = $Request->input('to_date');
        $from_date = $Request->input('from_date');




        if (!empty($url)) {
            $urlname = trim($Request->input('url'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);
            // echo  $url;
            // die;
        } else {
            $urlname = trim($Request->input('title'));
            $urlower = strtolower($urlname);
            $url = str_replace(' ', '-', $urlower);
        }

        $validator = Validator::make($Request->all(), [
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
            return redirect('admin/createblog')
            ->withErrors($validator);
        } else {

            if ($Request->hasFile('file-input')) {
                $image = $Request->file('file-input');
                $strname = 'qubiee';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
                $nameimagepath = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $nameimage = "blog/" . $nameimagepath;
                //$nameimage = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images/blog/');
                //echo  'this is file path'.$destinationPath;
                //xtacky/public_html/public/images
                //die;
                //$this->save();
                //code sneha for url
                $users = DB::select('SELECT count(url) as url from products where url like "%' . $url . '%" ');
                // echo $users[0]['url'];
                $homedata = json_decode(json_encode($users), true);

                $abc = $homedata[0]['url'];
                //echo $abc;
                //die;

                if ($abc == 1) {
                    $new_url = $url . -$abc;
                } else if ($abc >= 1) {

                    $new_url = $url . -$abc;
                } else {
                    $new_url = $url;
                }

                //code sneha for url

                $data = DB::table('products')->insertGetId(['product_name' => $name, 'role_id' => $role_id, 'product_price' => $price, 'short_description' => $shortdescription, 'url' => $new_url, 'main_category' => $maincategory, 'sub_category' => $subcategory, 'offer' => $offer, 'country' => $country, 'section' => $section, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $description, 'meta_keyword' => $metakeyword, 'original_price' => $original_price, 'product_image' => $nameimage, 'offer_start_date' => $from_date, 'offer_expire_date' => $to_date]);

                if ($data > 0) {
                    //$data=45;
                    $image->move($destinationPath, $nameimage);
                    $today = date("Ymd");
                    $unique = "XT" . $today . $data;
                    DB::table('products')
                    ->where('id', $data)
                    ->update(['product_ref_number' => $unique]);
                    //              return redirect()->back()->with('ordersuccess','Your reference number : '.$unique);
                    $users = DB::table('products')
                    ->select('id', 'main_category', 'sub_category')
                    ->where('id', '=', $data)
                    ->get();
                    $array = json_decode(json_encode($users), true);
                    $product_id = $array[0]['id'];
                    $main_category = $array[0]['main_category'];
                    $sub_category = $array[0]['sub_category'];
                    if ($Request->hasFile('photos')) {
                        $getProductimagedetails = Category::getProductimagedetails($product_id);
                        foreach ($getProductimagedetails as $getProductimage) {
                            $lang_invitee = explode('|', $getProductimage->images_name);

                            foreach ($lang_invitee as $key => $value) {
                                $usersImage = public_path("/images/blog/blogimage/{$value}"); // get previous image from folder

                                if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                    unlink($usersImage);
                                }
                            }
                        }
                        $data = array();
                        foreach ($Request->file('photos') as $image) {
                            $strname = 'qubiee';
                            $nameimageprodex = $image->getClientOriginalExtension();
                            $nameimagenameprod = $image->getClientOriginalName();
                            $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
                            // $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                            $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                            //$name=$image->getClientOriginalName();
                            $image->move(public_path() . '/images/blog/blogimage', $name);
                            $data[] = 'blog/blogimage/' . $name;
                        }
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $main_category,
                            'sub_category' => $sub_category,
                                //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    } else {
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    }
                }
            } else {
                return redirect()->back()->with('success', 'plese select product  image');
            }
        }
    }

    public function showblogtdetails($id) {

        $category_parent_id = DB::select('select * from category where category_parent_id = 0'); //get main categry
        //$category_parent_id = json_decode(json_encode($category_parent), true);

        $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) '); //get main sub categry

        $users = DB::select('select * from products where id = ?', [$id]); //for get data
        $array = json_decode(json_encode($users), true);

        $main_category_id = $array[0]['main_category'];

        $getProductimagedetails = Category::getProductimagedetails($id);
        $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);

        echo View::make('Admin.header')->render();
        return view('Admin.edit-blog', ['users' => $users, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory, 'getAllsubmenuparent' => $getAllsubmenuparent, 'getProductimagedetails' => $getProductimagedetails]);
    }

    public function updateblog(Request $Request) {

        $edittitle = $Request->input('title');
        $product_id = $Request->input('product_id');
        $image = $Request->input('file-input');
        $editprice = $Request->input('price');
        $editdescription = $Request->input('product-description');

        $shortdescription = $Request->input('shortdescription');
        $url = $Request->input('url');
        $maincategory = $Request->input('maincategory');
        $subcategory = $Request->input('subcategory');
        $offer = $Request->input('offer');
        $country = $Request->input('country');
        $section = $Request->input('section');
        $metatitle = $Request->input('MetaTitle');
        $metadescription = $Request->input('metadescription');
        $metakeyword = $Request->input('MetaKeyword');
        $original_price = $Request->input('originalprice');
        $fileoldpath = $Request->input('filepath');
        $filepath_product = $Request->input('filepath_product');
        $validator = Validator::make($Request->all(), [
            'title' => 'required',
                    //'price' => 'required',
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
                $strname = 'qubiee';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
//                   $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
                $nameimagepath = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $nameimage = 'blog/' . $nameimagepath;
//        echo $nameimage;
//        die;
                $destinationPath = public_path('images/blog');
                //echo  'this is file path'.$destinationPath;
                //die;
                $image->move($destinationPath, $nameimage);

                DB::table('products')
                ->where('id', $product_id)
                ->update(['product_name' => $edittitle, 'product_price' => $editprice, 'short_description' => $shortdescription, 'url' => $url, 'main_category' => $maincategory, 'sub_category' => $subcategory, 'offer' => $offer, 'country' => $country, 'section' => $section, 'original_price' => $original_price, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $editdescription, 'meta_keyword' => $metakeyword, 'product_image' => $nameimage]);
                if ($Request->hasFile('photos')) {
                    $getProductimagedetails = Category::getProductimagedetails($product_id);
                    foreach ($getProductimagedetails as $getProductimage) {
                        $lang_invitee = explode('|', $getProductimage->images_name);

                        foreach ($lang_invitee as $key => $value) {
                            $usersImage = public_path("/images/blog/blogimage/{$value}"); // get previous image from folder

                            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                unlink($usersImage);
                            }
                        }
                    }
                    $data = array();
                    foreach ($Request->file('photos') as $image) {
                        $strname = 'qubiee';
                        $nameimageprodex = $image->getClientOriginalExtension();
                        $nameimagenameprod = $image->getClientOriginalName();
                        $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                        $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                        //$name=$image->getClientOriginalName();
                        $image->move(public_path() . '/images/blog/blogimage', $name);
                        $data[] = 'blog/blogimage/' . $name;
                    }
                    if (!$getProductimagedetails) {
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $main_category,
                            'sub_category' => $sub_category,
                                //you can put other insertion here
                        ]);
                    } else {
                        DB::table('product_images')
                        ->where('product_id', $product_id)
                        ->update([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                        //you can put other insertion here
                        ]);
                    }
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                } else {
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                }

                //return redirect()->back()->with('success','Product  Updated Successfully');
            } else {


                DB::table('products')
                ->where('id', $product_id)
                ->update(['product_name' => $edittitle, 'product_price' => $editprice, 'short_description' => $shortdescription, 'url' => $url, 'main_category' => $maincategory, 'sub_category' => $subcategory, 'offer' => $offer, 'country' => $country, 'section' => $section, 'original_price' => $original_price, 'meta_title' => $metatitle, 'meta_description' => $metadescription, 'product_description' => $editdescription, 'meta_keyword' => $metakeyword, 'product_image' => $fileoldpath]);
                //    return redirect()->back()->with('success','Product  updated successfully');
                if ($Request->hasFile('photos')) {



                    $getProductimagedetails = Category::getProductimagedetails($product_id);
                    // $array = json_decode(json_encode($getProductimagedetails), true);

                    foreach ($getProductimagedetails as $getProductimage) {

                        $lang_invitee = explode('|', $getProductimage->images_name);

                        foreach ($lang_invitee as $key => $value) {
                            $usersImage = public_path("/images/blog/blogimage/{$value}"); // get previous image from folder

                            if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                unlink($usersImage);
                            }
                        }
                    }

                    $data = array();
                    foreach ($Request->file('photos') as $image) {

                        $strname = 'qubiee';
                        $nameimageprodex = $image->getClientOriginalExtension();
                        $nameimagenameprod = $image->getClientOriginalName();
                        $withoutprodExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagenameprod));
//                   $name= $withoutprodExt.''.rand(1, 999).'.'.$nameimageprodex;
                        $name = $withoutprodExt . '' . str_shuffle($strname) . '.' . $nameimageprodex;
                        //$name=$image->getClientOriginalName();
                        $image->move(public_path() . '/images/blog/blogimage/', $name);
                        $data[] = 'blog/blogimage/' . $name;
                    }
                    if (!$getProductimagedetails) {
                        DB::table('product_images')->insert([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                //you can put other insertion here
                        ]);
                    } else {
                        DB::table('product_images')
                        ->where('product_id', $product_id)
                        ->update([
                            'images_name' => implode("|", $data),
                            'product_id' => $product_id,
                            'category_id' => $maincategory,
                            'sub_category' => $subcategory,
                                        //you can put other insertion here
                        ]);
                    }

                    return redirect()->back()->with('success', 'Product  Upload successfully');
                } else {
                    return redirect()->back()->with('success', 'Product  Upload successfully');
                }
            }
        }
    }

    //code for delete product
    public function deleteblog($id) {
        //DB::delete('delete from student where id = ?',[$id]);
        DB::table('products')
        ->where('id', $id)
        ->update(['status' => 0]);
        return redirect()->back()->with('success', 'Product Deleted successfully');
    }

    public function removeAddonce(Request $Request) {
        $addonce_id = $Request->input('addon_id');
        DB::delete('delete from products_addonce where addonce_id = ?', [$addonce_id]);
    }

    public function showproductdetails_test($id) {

        $category_parent_id = DB::select('select * from category where status= 1 and  category_parent_id = 0'); //get main categry
        $productlist = DB::select('select id,product_name from products  where status= 1');
        $subcategory = DB::select('select * from category where status= 1 and category_parent_id NOT IN (0) '); //get main sub categry
        $products_addonce = DB::select('select * from products_addonce a, products p where a.product_id = p.id and a.id= ' . $id);
        $users = DB::select('select * from products where status= 1 and  id = ?', [$id]); //for get data
        $array = json_decode(json_encode($users), true);

        $main_category_id = $array[0]['main_category'];
        $sub_menu_id = $array[0]['sub_category'];

        $getProductimagedetails = Category::getProductimagedetails($id);
        $getAllsubmenuparent = Category::getAllsubmenuparent($main_category_id);

        //  $getParent = Category::getAllsubmenuparent($sub_menu_id);

        echo $sub_menu_id;

        //print_r($category_parent_id);
        if ($sub_menu_id == 0) {
            echo "Main Category";
        } else {
            $menu_cat_data = $this->get_menu_tree($sub_menu_id);
            print_r($menu_cat_data);
            echo "hii";
        }

        //   die;
        // echo "<pre>";
//        print_r($getAllsubmenuparent);
//        echo $this->menu1;
//        print_r($this->menu);
        //  die;
        $getsubmenuparent = Category::getAllparent($sub_menu_id);

//        echo View::make('Admin.header')->render();
//        return view('Admin.edit-product', ['productlist' => $productlist,'users' => $users, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory, 'getAllsubmenuparent' => $getAllsubmenuparent, 'getProductimagedetails' => $getProductimagedetails, 'product_addonce' => $products_addonce,'sub_menu_parent' => $getsubmenuparent,'all_category' => $all_cat]);
        //return view('Admin.edit-product', ['productlist' => $productlist,'users' => $users, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory, 'getAllsubmenuparent' => $getAllsubmenuparent, 'getProductimagedetails' => $getProductimagedetails, 'product_addonce' => $products_addonce,'sub_menu_parent' => $getsubmenuparent]);
    }

    function get_menu_tree($sub_menu_id) {

        $cat_data = DB::select('select * from category where status = 1 and category_id = "' . $sub_menu_id . '"');
        $data = json_decode(json_encode($cat_data), true);
        while ($data) {
            $this->menu1 .="<li><a href='" . $data[0]['category_id'] . "'>" . $data[0]['category_name'] . "</a>";
            $this->menu[] = array(
                'id' => $data[0]['category_id'],
                'name' => $data[0]['category_name']
            );

            if ($data[0]['category_parent_id'] == 0) {
                break;
            } else {
                $this->menu1 .= "<ul>";
                return $this->get_menu_tree($data[0]['category_parent_id']); //call  recursively
                $this->menu1 .= "</ul>";
            }
            $this->menu1 .= "</li>";
        }

        $data = $this->menu;

        return $data;
    }

    function report() {
//    echo view('Admin.report',compact('countproduct','countUser','countrole'));

        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            $research = order_product::where('status', '=',1)->with('admins')->get();
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);

        } else {

           $research = order_product::with('admins')->where('status', '=',1)->where('role_id', '=', Auth::user()->id)->get();
       }
       $countnumber=count($research);

    $order=array();
    if($countnumber>0){
       foreach ($research as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
        $admin_status=$value->admin_status;
            }

            $order->map(function($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;

            });
           
            $add_id = $order[0]->shipping_address;
            
                if($add_id !=0){
                    $order_add = Category::getUserAddressID($add_id);
                }
            }
              // foreach ($research as  $valuesec) {
              //   echo $valuesec->admins->name;
              //   die;
              //  }

       echo view('Admin.report', compact('language','research','usertype','vendorId','add_id','order_add','order','orderrole_id','product_id'));
   }
       function invoice() {
//    echo view('Admin.report',compact('countproduct','countUser','countrole'));

        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            $research = order_product::with('admins','product')->where('status', '=',1)->get();
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);

        } else {

           $research = order_product::with('admins','product')->where('status', '=',1)->where('role_id', '=', Auth::user()->id)->get();
       }

              // foreach ($research as  $valuesec) {
              //   echo $valuesec->admins->name;
              //   die;
              //  }

       echo view('Admin.invoice', compact('language','research','usertype','vendorId'));
   }


   function sales() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();  
        }


       echo view('Admin.sales', compact('language','research','usertype','vendorId'));

}
   function prnpriview($id) {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)->where('order_id', '=',$id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();  
        }


       return view('Admin.printsales', compact('language','research','usertype','vendorId'));

}
 function cancelOrders() {
     
     if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            $research = order_product::with('admins','product')->where('status', '=',0)->get();
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);

        } else {

           $research = order_product::with('admins','product')->where('status', '=',0)->where('role_id', '=', Auth::user()->id)->get();
       }

       echo view('Admin.cancel-orders', compact('language','research','usertype','vendorId'));
     
 }
 function holdorders() {
     
     if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            $research = order_product::with('admins','product')->where('admin_status', '=',1)->get();
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);

        } else {

           $research = order_product::with('admins','product')->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)->get();
       }

       echo view('Admin.hold-orders', compact('language','research','usertype','vendorId'));
     
 }
  function monthilyOrders() {
     
     if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

//        if ($usertype == 'superadmin') {
//
//            $research = order_product::with('admins','product')->where('status', '=',0)->get();
//            // $productdetaildata= $research->admins()->paginate(2);
//            //$countproduct = count($research);
//
//        } else {
//
//           $research = order_product::with('admins','product')->where('status', '=',0)->where('role_id', '=', Auth::user()->id)->get();
//       }

       echo view('Admin.monthilyorders', compact('language','usertype','vendorId'));
     
 }
 
  public function ordermonthily(Request $Request) {
       if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
       $from_date_order_format = $_GET['from_date_order'];
        $to_date_order_format = $_GET['to_date_order'];
        
       $from_date_order =date('Y-m-d', strtotime($from_date_order_format));
        $to_date_order =date('Y-m-d', strtotime($to_date_order_format));
        
         $usertype = (Auth::user()->job_title);
     
      if ($usertype == 'superadmin') {

              $orderdata = order_product::with('admins','product')
                     ->where('status', '=',1)
                     ->whereDate('created_at', '>=', $from_date_order)
                     ->whereDate('created_at', '<=', $to_date_order)
//                     ->whereBetween('created_at', array($from_date_order, $to_date_order))
                      ->get();
    $countnumber=count($orderdata);

        } else {
          
            $orderdata = order_product::with('admins','product')
                     ->Where('role_id', Auth::user()->id)
                     ->Where('status', '=', 1)
                      ->whereDate('created_at', '>=', $from_date_order)
                     ->whereDate('created_at', '<=', $to_date_order)
//                     ->whereBetween('created_at', array($from_date_order, $to_date_order))
                     ->get();
     
    $countnumber=count($orderdata);
       }
      
               if ($countnumber > 0) {
          foreach ($orderdata as $researchdata) {
             //$product_name = json_decode($researchdata->product->product_name[$language], true);

       $response[] = Array('usertype'=>$usertype,'vendorname' => $researchdata->admins->name,'order_id' =>$researchdata->order_id,'product_name'=>$researchdata->product->product_name[$language],'product_ref_number'=>$researchdata->product_ref_number);
                     
          }
        
          return json_encode(array("success" => 1, 'data' => $response));
               } else { 
         return json_encode(array("success" => 0));
               }
 
    }
    public function excelOrderMothily(){
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        
                 $usertype = (Auth::user()->job_title);
                 
                  $from_date_order_format = $_GET['from_date_order'];
        $to_date_order_format = $_GET['to_date_order'];
        
          $from_date_order =date('Y-m-d', strtotime($from_date_order_format));
        $to_date_order =date('Y-m-d', strtotime($to_date_order_format));
        
    if ($usertype == 'superadmin') {
//        $research = order_product::with('admins','product')->where('status', '=',1)->get();
       $research = order_product::with('admins','product')
                     ->where('status', '=',1)
                     ->whereDate('created_at', '>=', $from_date_order)
                     ->whereDate('created_at', '<=', $to_date_order)
//                     ->whereBetween('created_at', array($from_date_order, $to_date_order))
                      ->get();
    $countnumber=count($research);
         
    }else{
          $research = order_product::with('admins','product')
                     ->Where('role_id', Auth::user()->id)
                     ->Where('status', '=', 1)
                      ->whereDate('created_at', '>=', $from_date_order)
                     ->whereDate('created_at', '<=', $to_date_order)
//                     ->whereBetween('created_at', array($from_date_order, $to_date_order))
                     ->get();
     
    $countnumber=count($research);
//        $research = order_product::with('admins','product')->where('status', '=',1)->get();
    }
         
         $customer_array[] = array('Sr No.','Vendor Id', 'Vendor Name', 'Order Id', 'Product Name','Product Price','Original Price','Product Reference No.');
         
 $index = 1;
         foreach($research as $customer)
            {  
             
         $customer_array[] = array(
       'Sr No.' => $index++,       
       'Vendor Id'  => $customer->role_id,
       'Vendor Name'   => $customer->admins->name,
       'Order Id'    => $customer->order_id,
       'Product Name'  => $customer->product->product_name[$language],
       'Product Price'  => $customer->product_price,
       'Original Price'  => $customer->original_price,
       'Product Reference No.'  => $customer->product_ref_number
       );
             }
          
             
       Excel::create('Order_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Order Customer Data');
  $excel->sheet('Order Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
          
   
    }
   function getshowsales($id) {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('product_id', '=', $id)
                ->selectRaw('count(*) as total, product_id')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->where('product_id', '=', $id)
                ->selectRaw('count(*) as total, product_id')
                ->selectRaw('sum(product_price) as productprice')
                 ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id')
                ->get();  
        }
//        echo '<pre>';
//        print_r($research);
//        die;
      

  // $data = ['title' => 'Welcome to qubiee.com'];

    $pdf = PDF::loadView('Admin.mySalesPdf',compact('language','research','usertype','vendorId'));
        
        // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

//        $pdf->setPaper('A4', 'landscape');


    return $pdf->download('QubieeSales.pdf');
}
// code for super admin get all bulk the admin report page excel sheet
    public function excelAllSalesReport(){

         
          if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
//  $research = order_product::with('admins','product')
//                ->selectRaw('count(*) as total, product_id')
//                ->selectRaw('sum(product_price) as productprice ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','order_id')
//                ->get();  
            $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
//    $research = order_product::with('admins','product')->where('role_id', '=', Auth::user()->id)
//                ->selectRaw('count(*) as total, product_id')
//                ->selectRaw('sum(product_price) as productprice,order_id as order_id')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','order_id')
//                ->get();  
            $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status')
                ->get();  
        }
         $customer_array[] = array('Sr No.','Product ID','Product Price', 'Product Name', 'Vendor Name', 'Number Of Product','Total');
     
           $index = 1;
         foreach($research as $customer)
            {  
         $customer_array[] = array(
       'Sr No.' => $index++,     
       'Product Id'  => $customer->product_id,
       'Product Price'  => $customer->productpriceitem,      
       'Product Name'    => $customer->product->product_name[$language],
       'Vendor Name'   => $customer->admins->name,
       'Number Of Product'  => $customer->total,
       'Total'  => $customer->productprice      
       );
             }

       Excel::create('Sales_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Sales Customer Data');
  $excel->sheet('Sales Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
          
   
    }
    // end here
    // for sales  pdf export
     function getShowSalesPdf() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status')
                ->selectRaw('sum(product_price) as productprice')
                 ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status')
                ->get();  
        }

  
    $pdf = PDF::loadView('Admin.mySalesPdf',compact('language','research','usertype','vendorId'));
        
        // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

//        $pdf->setPaper('A4', 'landscape');


    return $pdf->download('QubieeSales.pdf');
}
//start change staus order
function status() {
 
            if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            $research = order_product::where('status', '=',1)->where('admin_status', '=',1)->with('admins')->get();
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);

        } else {

           $research = order_product::with('admins')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)->get();
       }
           $countnumber=count($research);

    $order=array();
    if($countnumber>0){
       foreach ($research as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
        $admin_status=$value->admin_status;
            }

            $order->map(function($order, $key) {
                $order->cart = unserialize($order->cart);
                return $order;

            });
           
            $add_id = $order[0]->shipping_address;
            
                if($add_id !=0){
                    $order_add = Category::getUserAddressID($add_id);
                }
            }

              // foreach ($research as  $valuesec) {
              //   echo $valuesec->admins->name;
              //   die;
              //  }

       echo view('Admin.status', compact('language','research','usertype','vendorId','add_id','order_add','order','orderrole_id','product_id'));
}

//end change staus order
//code for update tark order
function orderupdate(Request $request) {
    $id = $request->input('orderid');
     $orderstatus = $request->input('orderstatus');
     $orderproductsid = $request->input('orderproductsid');
//     echo $orderstatus.'this is order id';
//     echo '<br>';
//     echo $id.'this is order id';
//     die;
        $orderCanled = Order::find($id);
          $orderCanled->order_status = $orderstatus;
          $orderCanled->save();
          
          $orderproductCanled = order_product::find($orderproductsid);
          $orderproductCanled->order_status = $orderstatus;
          $orderproductCanled->save();
          
          if($orderCanled->id > 0){
          return redirect()->back()->with('info', 'Order Status Successfully Updated ');
          }else{
               return redirect()->back()->with('info', 'Some Thing Wrong ! Please Try Agin');
          }
    
}
//code for update tark order
function orderadminupdate(Request $request) {
   
     $orderstatus = $request->input('adminstatus');
     $movingfees = $request->input('movingfees');
     $orderproductsid = $request->input('orderproductsid');
      
//       $orderproductCanled = order_product::find($orderproductsid);
//          $orderproductCanled->admin_status = $orderstatus;
//          $orderproductCanled->save();
            $data= DB::table('order_products')
                            ->where('id', $orderproductsid)
                            ->update(['admin_status' => $orderstatus,'movingfees'=>$movingfees]);
             
//          if($orderproductCanled->id > 0){
          if($data > 0){
          return redirect()->back()->with('info', 'Order Status Successfully Updated ');
          }else{
               return redirect()->back()->with('info', 'Some Thing Wrong ! Please Try Agin');
          }
    
}

//start code for all reviews avarage 
function productReviews() {
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

     $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);
      
        if ($usertype == 'superadmin') {
            
             $productReviews = Review::with('admins','product','user')
                ->selectRaw('count(*) as total, product_id')
                ->selectRaw('avg(rating) as rating')
                ->orderBy('total', 'desc')
                ->groupBy('product_id')
                ->get();
//             $productReviews = Review::with('admins','product','user')->get();
            //     $productdetailreview = product::where('url', $name)->first();
//        $productdetaildata= $productdetailreview->reviews()->paginate(2);
        }
        else{
             $productReviews = Review::with('admins','product','user')->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id')
                ->selectRaw('avg(rating) as rating')
                ->orderBy('total', 'desc')
                ->groupBy('product_id')
                ->get();    
// $productReviews = Review::with('admins','product','user')->where('role_id', '=', Auth::user()->id)->get();
        }

    echo view('Admin.product_reviews', compact('language','productReviews'));
}
function viewReviews($id) {
    
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

     $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);
      

$productReviews = Review::with('admins','product','user')->where('product_id', '=', $id)->get();

    echo view('Admin.review_details', compact('language','productReviews'));
}
//end reviews function
public function getShowreport($id){

    $usertype = (Auth::user()->job_title);
    $role_id = Auth::user()->id;
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

    $orderdata = order_product::with('admins')->where('status', '=',1)->where('id', '=',$id)->get();
    $countnumber=count($orderdata);

    $order=array();
    if($countnumber>0){
       foreach ($orderdata as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
        $admin_status=$value->admin_status;
        $movingfees=$value->movingfees;
    }
      
    $order->map(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;

    });
    $add_id = $order[0]->shipping_address;
//    echo $add_id;
//    die;
        if($add_id !=0){
            $order_add = Category::getUserAddressID($add_id);
        }   
//    $shipping = DB::table('users_address')->find($add_id);
//    echo "<pre>";
//    print_r($order);
//    echo "<pre>";
//    print_r($shipping);
//    die;

    echo view('Admin.report_details', compact('language','order','usertype','orderrole_id','product_id','id','vendorname','shipping','add_id','order_add','admin_status','movingfees'));
}
else{

 return redirect()->back()->with('errormeesag','Something Wrong');
}



}
public function getShowinvoice($id){

    $usertype = (Auth::user()->job_title);
    $role_id = Auth::user()->id;
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

    $orderdata = order_product::with('admins')->where('status', '=',1)->where('id', '=',$id)->get();
    $countnumber=count($orderdata);

    $order=array();
    if($countnumber>0){
       foreach ($orderdata as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
    }
    $order->map(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;

    });


    echo view('Admin.showinvoice', compact('language','order','usertype','orderrole_id','product_id','id','vendorname'));
}
else{

 return redirect()->back()->with('errormeesag','Result Not Found');
}


}
// code for cancel order list
 public function getCancelinvoice($id){

    $usertype = (Auth::user()->job_title);
    $role_id = Auth::user()->id;
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

    $orderdata = order_product::with('admins')->where('status', '=',0)->where('id', '=',$id)->get();
    $countnumber=count($orderdata);

    $order=array();
    if($countnumber>0){
       foreach ($orderdata as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
    }
    $order->map(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;

    });


    echo view('Admin.showinvoice', compact('language','order','usertype','orderrole_id','product_id','id','vendorname'));
}
else{

 return redirect()->back()->with('errormeesag','Result Not Found');
}


}
// end code here
// code for genrate the pdf indivdual order show report page
public function generatePDF($id)
{

    $usertype = (Auth::user()->job_title);
    $role_id = Auth::user()->id;
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

    $orderdata = order_product::with('admins')->where('id', '=',$id)->get();
    $countnumber=count($orderdata);

    $order=array();
    if($countnumber>0){
     foreach ($orderdata as $value) {

        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
        $orderrole_id=$value->role_id;
        $product_id=$value->product_id;
        $vendorname=$value->admins->name;
    }
    $order->map(function($order, $key) {
        $order->cart = unserialize($order->cart);
        return $order;

    });

        // $data = ['title' => 'Welcome to qubiee.com'];

    $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'));

        // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        $pdf->setPaper('A4', 'landscape');


    return $pdf->download('QubieeOrders.pdf');
        // return redirect()->back()->with('success','Something Wrong');
}else{

    return redirect()->back()->with('errormeesag','Something Wrong');
}

}
 // end here
// code for excel report details page 

public function excelReport($id)
{


        // $customer_data = DB::table('admins')->get()->toArray();

   $usertype = (Auth::user()->job_title);
   $role_id = Auth::user()->id;
   if (Session::has('locale')) {
    $language = $this->language = Session::get('locale');
} else {
    $language = $this->language = app()->getLocale();
}

$orderdata = order_product::with('admins')->where('status', '=',1)->where('role_id', '=',$id)->get();
$countnumber=count($orderdata);

$order=array();
if($countnumber>0){
 foreach ($orderdata as $value) {

    $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
    $orderrole_id=$value->role_id;
    $product_id=$value->product_id;
    $vendorname=$value->admins->name;
}
$order->map(function($order, $key) {
    $order->cart = unserialize($order->cart);
    return $order;

});


$customer_array[] = array('Sr No.','Vendor Id', 'Vendor Name', 'Order Id', 'Product Name','Price','Quantity','Total','Product Reference No.','Customer Name');

foreach($order as $customer)
{
     $index = 1;
  foreach($customer->cart->items as $item) {   

     if( $item['item']['role_id']==$orderrole_id ){
      $customer_array[] = array(
        'Sr No.' => $index++,    
       'Vendor Id'  => $item['item']['role_id'],
       'Vendor Name'   => $vendorname,
       'Order Id'    => $item['item']['product_ref_number'],
       'Product Name'  => $item['item']['product_name'][$language],
       'Price'  => $item['item']['product_price'],
       'Quantity'  => $item['qty'],
       'Total'  => $item['qty'] * $item['item']['product_price'],
       'Product Reference No.'  => $item['item']['product_ref_number'],
       'Customer Name'  => $customer['user']['name']


   );
  }
}
}


Excel::create('Order_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Order Customer Data');
  $excel->sheet('Order Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
}
}
// end here

// code for super admin get all bulk the admin report page excel sheet
    public function excelAllOrderReport(){
  if (Session::has('locale')) {
    $language = $this->language = Session::get('locale');
} else {
    $language = $this->language = app()->getLocale();
}
         $research = order_product::with('admins','product')->where('status', '=',1)->get();
         $customer_array[] = array('Sr No.','Vendor Id', 'Vendor Name', 'Order Id', 'Product Id','Product Name','Product Price','Original Price','Product Reference No.');
     
 $index = 1;
         foreach($research as $customer)
            {  
              $customer_array[] = array(
              'Sr No.' => $index++,       
              'Vendor Id'  => $customer->role_id,
              'Vendor Name'   => $customer->admins->name,
              'Order Id'    => $customer->order_id,
              'Product Id'  => $customer->product_id,
              'Product Name'  => $customer->product->product_name[$language],
              'Product Price'  => $customer->product_price,
              'Original Price'  => $customer->original_price,
              'Product Reference No.'  => $customer->product_ref_number
              );
            }
            
       Excel::create('Order_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Order Customer Data');
  $excel->sheet('Order Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
          
   
    }
    // end here

    // code for admin wise bulk report oage show
    public function excelOrderReport($id){
                    if (Session::has('locale')) {
               $language = $this->language = Session::get('locale');
           } else {
               $language = $this->language = app()->getLocale();
           }

      $research = order_product::with('admins','product')->where('status', '=',1)->where('role_id', '=',$id)->get();
         $customer_array[] = array('Vendor Id', 'Vendor Name', 'Order Id', 'Product Id','Product Name','Product Price','Original Price','Product Reference No.');
     

         foreach($research as $customer)
            {  
         $customer_array[] = array(
       'Vendor Id'  => $customer->role_id,
       'Vendor Name'   => $customer->admins->name,
       'Order Id'    => $customer->order_id,
       'Product Id'  => $customer->product_id,
       'Product Name'  => $customer->product->product_name[$language],      
       'Product Price'  => $customer->product_price,
       'Original Price'  => $customer->original_price,
       'Product Reference No.'  => $customer->product_ref_number
       );
             }

       Excel::create('Order_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Order Customer Data');
  $excel->sheet('Order Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
          
    }
    // end here
   
    public function addstock($id) {

        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $products = DB::select('select * from products where status= 1 and  id = ?', [$id]); //for get data
        $stocks = DB::select('select p.product_name,s.created_at,s.original_qty,s.remained_qty,s.sale_qty,s.product_id from stocks s, products p where s.product_id = p.id and s.product_id =? ORDER BY s.id DESC',[$id]); 
        return view('Admin.add-stock', ['language' => $this->language, 'product_id' => $id, 'products' => $products,'stocks' => $stocks]);
    }
    
    public function allstock() {

        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }     
           $usertype = (Auth::user()->job_title);
           $role_id = Auth::user()->id;
                if ($usertype == 'superadmin') {
$stocks = DB::select('SELECT * FROM stocks LEFT JOIN products p ON stocks.product_id = p.id WHERE stocks.id IN(SELECT MAX(stocks.id) FROM `stocks` Group by product_id)'); //for get data
                }else{
$stocks = DB::select('SELECT * FROM stocks s LEFT JOIN products p ON s.product_id = p.id WHERE s.role_id='.$role_id.' AND s.id IN(SELECT MAX(s.id) FROM stocks Group by s.product_id)'); //for get data
                      
                }
        

//        $stocks =  DB::table('stocks')->leftJoin('products', function ($join) {
//            $join->on('stocks.product_id', '=', 'products.id')->groupBy('stocks.product_id');
//        })->latest('stocks.product_id')->get();
        
        return view('Admin.all-stock', ['language' => $this->language,'stocks' => $stocks]);
    }
    
    public function addproductstock(Request $request) {

        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
        $user_id=(Auth::user()->id);
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');       
        
        $stk_list = DB::select('select * from stocks where product_id = ?', [$product_id]);
        $stk_cnt = count($stk_list);
        
        if($stk_cnt > 0){
            $stk_list1 = DB::select('select * from stocks where product_id = ? ORDER BY id DESC LIMIT 1', [$product_id]);
            
            $o_qty = $stk_list1[0]->original_qty;
            $s_qty = $stk_list1[0]->sale_qty;
            $r_qty = $stk_list1[0]->remained_qty;
            if($o_qty > $r_qty){
                $quantity = $quantity + $r_qty;
            }
            $stock = new stock;
            $stock->role_id = $user_id;
            $stock->product_id = $product_id;
            $stock->original_qty = $quantity;
            $stock->remained_qty = $quantity;
            $stock->sale_qty = 0;
            $stock->repeat_cnt = $stk_cnt;
            $stock->save();              
        }
        else{
            $stock = new stock;
            $stock->role_id = $user_id;
            $stock->product_id = $product_id;
            $stock->original_qty = $quantity;
            $stock->remained_qty = $quantity;
            $stock->sale_qty = 0;
            $stock->repeat_cnt = $stk_cnt;
            $stock->save();
        }             
        
        return back();
    }
    public function createlayout(Request $Request) {
//        echo 'call now ';
//        print_r($_POST);
//        die;
        
       
        $validator = Validator::make($Request->all(), [
             'layoutoption' => 'required|not_in:0',
             
        ]);
         $layoutoption=$Request->input('layoutoption');
         $backgroudclr=$Request->input('colorcode');
 if ($validator->fails()) {
            //return redirect()->back()->withErrors($v->errors());
            // return redirect()->back()->with('errorMessage','plese enter all Details');
            return redirect('admin/addlayout')
            ->withErrors($validator);
        } else {
             $users = DB::select('select id from add_layout');
            
             if($users){
                       
                    
                 $homedata = json_decode(json_encode($users), true);
              $layoutid = $homedata[0]['id'];
                if ($Request->hasFile('file-input')) {
                    
                        $getProductimagedetails = Category::getlayoutimagedetails($layoutid);
                      
                        foreach ($getProductimagedetails as $getProductimage) {
//                            $lang_invitee = $getProductimage->background_image;
                             $lang_invitee = explode('|', $getProductimage->background_image);
                            foreach ($lang_invitee as $key => $value) {
                                $usersImage = public_path("/images/{$value}"); // get previous image from folder
                        if (File::exists($usersImage)) { // unlink or remove previous image from folder
                                    unlink($usersImage);
                                }
                            }
                        }
                         $image = $Request->file('file-input');
                $strname = 'backgroundimage';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
                $nameimage = $strname . '.' . $nameimageex;

                //$nameimage = time().'.'.$image->getClientOriginalExtension();
                //$destinationPath = public_path('images/layout_images');
                //$image->move($destinationPath, $nameimage);
                 $image->move(public_path() . '/images/layout_images', $nameimage);
                $backgroudclr="";
                         DB::table('add_layout')
                        ->where('id', $layoutid)
                        ->update([
                             'background_image' => 'layout_images/' .$nameimage,
                            'class_name' => $layoutoption,
                            'background_color' => $backgroudclr,
                                        //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    } elseif (isset($Request->colorcode)) {
                         $nameimageempty="";
                       DB::table('add_layout')
                        ->where('id', $layoutid)
                        ->update([
//                            'background_image' =>  $nameimageempty,
                            'class_name' => $layoutoption,
                            'background_color' => $backgroudclr,
                                        //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                } else {
                           
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    }
                }  else {
                  
  if ($Request->hasFile('file-input')) {
                       
                         $image = $Request->file('file-input');
                $strname = 'backgroundimage';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                // $nameimage= $withoutExt.''.rand(1, 999).'.'.$nameimageex;
//                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $nameimage = $strname . '.' . $nameimageex;
                //$nameimage = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('images');
                //$image->move($destinationPath, $nameimage);
                 $image->move(public_path() . '/images/layout_images', $nameimage);
                
                        DB::table('add_layout')->insert([
                            'background_image' => $nameimage,
                            'class_name' => $layoutoption,
                            'background_color' => $backgroudclr,
                                //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Layout Successfully');
                    } elseif (isset($Request->colorcode)) {
                        
                        DB::table('add_layout')->insert([
//                            'background_image' => $nameimage,
                            'class_name' => $layoutoption,
                            'background_color' => $backgroudclr,
                                //you can put other insertion here
                        ]);
                        return redirect()->back()->with('success', 'Layout Successfully');
                    }else {
                        return redirect()->back()->with('success', 'Product  Upload successfully');
                    }
                }
                
         
     

}
}
public function settings() {
    
    
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        return view('Admin.settings',['language'=>$language]);
    }
       public function updatePassword(Request $request) {

        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user_id = $request->input('user_id');
        $pass = $request->input('password');
        $oldpassword = $request->input('oldpassword');
        $password = Hash::make($pass);
        $user = admin::findOrFail($user_id);
        if (Hash::check($oldpassword, $user->password)) {
            DB::table('admins')
                    ->where('id', $user_id)
                    ->update(['password' => $password]);
            return redirect()->back()->with('info', 'Password updated successfully');
        } else {

            return redirect()->back()->with('infofiled', 'Current Password does not match ');
        }
    }
       function vendorcommission() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
//        echo '<pre>';
//        print_r($research);
//        die;
        


       echo view('Admin.user.vendor-commission', compact('language','research','usertype','vendorId','user'));

}
// code vendor commisson print
   function vendorcommissionprint() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
        
         return view('Admin.printvendorcommsales', compact('language','research','usertype','vendorId','user'));
       //echo view('Admin.user.vendor-commission', compact('language','research','usertype','vendorId','user'));

}
// code for rwo wise vendor commsion print
  function vencommprntpri($ordrid) {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)->where('order_id', '=',$ordrid)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
        }
         $user = rate_admins::where('status','=',1)->get();
        return view('Admin.printvendorcommsales', compact('language','research','usertype','vendorId','user'));
       //return view('Admin.printsales', compact('language','research','usertype','vendorId'));

}
  public function addVenCommission()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
        $job_title='admin';
        $users = admin::with('rate_admins')->where('job_title',$job_title)->get(); 
        // return view('admin.user.show');
        return view('Admin.user.addvencommisson',compact('language','users'));
    } 
    public function venPaymentCommission()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
        $job_title='admin';
        $users = admin::with('rate_admins')->where('job_title',$job_title)->get(); 
        // return view('admin.user.show');
        return view('Admin.user.venpaymentcomm',compact('language','users'));
    } 
      public function showcommisson($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
//         $user = admin::find($id);
         $user = admin::with('rate_admins')->where('id',$id)->get();
          
        $roles = role::all();
        return view('Admin.user.editvencommisson',compact('language','user','roles'));
    }
    public function updatevencommission(Request $Request){
          $id = $Request->input('vendorid');
          $userrate = $Request->input('rate');
           $lesshundred = $Request->input('lessthanhundred');
            $greterhundred = $Request->input('greterthanhundred');
            
          $this->validate($Request,[
            'rate' => 'required|numeric',
            'lessthanhundred' => 'required|numeric',
            'greterthanhundred' => 'required|numeric',
        ]);
          
        $user = rate_admins::where('admin_id',$id)->get();
        $usercount=count($user);
       
        if($usercount > 0){
           $post = rate_admins::where('admin_id', $id)->first();
                    $post->rate = $userrate;
                    $post->lesshundred = $lesshundred;
                    $post->greterhundred = $greterhundred;
                    $post->save();     
                    $message="Commission Updated sucssfully";
            }else{
            $post = new rate_admins;
            $post->admin_id = $id;
            $post->rate = $userrate;
            $post->lesshundred = $lesshundred;
            $post->greterhundred = $greterhundred;
            $post->save();
             $message="Commission Added sucssfully";
             }
        return redirect()->back()->with('success', $message);
    }
    // single vendor commission
   public function showVendorSaleCommisson($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', $id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
      
//        echo '<pre>';
//        print_r($user);
//        die;
        


       echo view('Admin.user.showvensalecommisson', compact('language','research','usertype','vendorId','user','id'));
    }
      function productcommission() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
            $research = order_product::with('admins', 'product')->where('status', '=', 1)
                    ->where('admin_status', '=', 1)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                   // ->selectRaw('order_product.created_at as created_att')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//  $research = order_product::with('admins','product')->where('status', '=',1)
//                ->where('admin_status', '=',1)
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice ')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                    ->groupBy('product_id','product_price','role_id','admin_status')
                    ->get();
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }

      echo view('Admin.product-commission', compact('language','research','usertype','vendorId','user'));

}
// code for prodcu row wise commission
  function productidcommission($productid) {
       
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
            $research = order_product::with('admins', 'product')->where('status', '=', 1)
                    ->where('admin_status', '=', 1)->where('product_id', '=', $productid)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                   // ->selectRaw('order_product.created_at as created_att')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//  $research = order_product::with('admins','product')->where('status', '=',1)
//                ->where('admin_status', '=',1)
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice ')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->where('product_id', '=', $productid)
                 ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                 ->selectRaw('sum(product_price) as productprice ')
                 ->selectRaw('product_price as productpriceitem ')
                 ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                 ->get();
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
    return view('Admin.printproductcommsales', compact('language','research','usertype','vendorId','user'));
      //echo view('Admin.product-commission', compact('language','research','usertype','vendorId','user'));

}
// code for product prf download
    function productcommissvenPdf() {
        
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
            $research = order_product::with('admins', 'product')->where('status', '=', 1)
                    ->where('admin_status', '=', 1)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                   // ->selectRaw('order_product.created_at as created_att')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//  $research = order_product::with('admins','product')->where('status', '=',1)
//                ->where('admin_status', '=',1)
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice ')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
        $pdf = PDF::loadView('Admin.productcommissionpdf',compact('language','research','usertype','vendorId','user'));
return $pdf->download('QubieeProductCommission.pdf');
      

}
//code for product commission print priview
  function productcommissionprint() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
            $research = order_product::with('admins', 'product')->where('status', '=', 1)
                    ->where('admin_status', '=', 1)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//  $research = order_product::with('admins','product')->where('status', '=',1)
//                ->where('admin_status', '=',1)
//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice ')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();
//               ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
     return view('Admin.printproductcommsales', compact('language','research','usertype','vendorId','user'));
      

}
   function pendingcommission() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',2)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',2)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
      echo view('Admin.pending-product-commission', compact('language','research','usertype','vendorId','user'));

}
//pending product commission pdf
  function pendingProductCommissvenPdf() {
        
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

             if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',2)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',2)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
        $pdf = PDF::loadView('Admin.productcommissionpdf',compact('language','research','usertype','vendorId','user'));
return $pdf->download('QubieePemdingProCommission.pdf');
      

}
// pending product commission all commisson
  function pendingProCommiPrint() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

            if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',2)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',2)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
     return view('Admin.printproductcommsales', compact('language','research','usertype','vendorId','user'));
      

}
// code for pending product commission row wise commission
  function pendingProCommission($productid) {
       
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
            $research = order_product::with('admins', 'product')->where('status', '=', 1)
                    ->where('admin_status', '=', 2)->where('product_id', '=', $productid)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                   // ->selectRaw('order_product.created_at as created_att')
                    ->groupBy('product_id','product_price','role_id','admin_status','movingfees')
                    ->get();

       $user = rate_admins::where('status','=',1)->get();
        } else {

      $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',2)->where('role_id', '=', Auth::user()->id)
                    ->where('product_id', '=', $productid)
                    ->selectRaw('count(*) as total,product_id,role_id,admin_status,movingfees')
                    ->selectRaw('sum(product_price) as productprice ')
                    ->selectRaw('product_price as productpriceitem ')
                    ->groupBy('product_id', 'product_price', 'role_id', 'admin_status', 'movingfees')
                    ->get();

//                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
//                ->selectRaw('sum(product_price) as productprice')
//                ->selectRaw('product_price as productpriceitem ')
//                ->selectRaw('role_id as role_id')
//                ->orderBy('total', 'desc')
//                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
//                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
    return view('Admin.printproductcommsales', compact('language','research','usertype','vendorId','user'));
      //echo view('Admin.product-commission', compact('language','research','usertype','vendorId','user'));

}
public function importproduct() {
             
        //$addprodyuctid=NULL ;
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
//           if( Session::has('productid') ){
//            $addprodyuctid = Session::get('productid');
//        } 


        if (Auth::user()->can('products.create')) {
            //echo "call now";
            $productlist = DB::select('select id,product_name from products  where status= 1');
            $users = DB::select('select * from category where category_parent_id = 0 and status= 1');
            //  $categoryall = DB::select('select * from category');
            $categoryall = DB::select('select * from category where status= 1 and category_parent_id NOT IN (0) ');
//        echo View('Admin.header')->render();
            return view('Admin.import-excel-product', compact('language', 'users', 'categoryall', 'productlist'));
        }
        return redirect(route('admin.dashboard'));
    }
    
public function addexcelproduct() {
    echo 'working............. ';
    die;
    
}
   function exportVenodrCommPdf($id) {
       
    if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', $id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();

        //echo view('Admin.user.showvensalecommisson', compact('language','research','usertype','vendorId','user','id'));
    $pdf = PDF::loadView('Admin.myVendorCommiPdf',compact('language','research','usertype','vendorId','user','id'));
        
        // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

//        $pdf->setPaper('A4', 'landscape');


    return $pdf->download('QubieeVendorCommission.pdf');
}

// code for super admin get all bulk the admin report page excel sheet
    public function exportVenodrCommExcel($id){

          if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', $id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
     
     
        $customer_array[] = array('Sr No.','Order Id','Product Name', 'SKU', 'Vendor Name', 'Selling Price','Quantity','Total','Order Status','Rate','Commission','Order Date');
     
           $index = 1;
         foreach($research as $customer)
            {  
             foreach ($user as $userrate) {
                 if ($userrate->admin_id == $customer->role_id) {

                    if ($customer->productpriceitem <= 100) {
                    $usercommrate=$userrate->lesshundred;
                      $sellingprice = $customer->productpriceitem - ($customer->productpriceitem * ($userrate->lesshundred / 100));       
                      $sellingprice=   $customer->productpriceitem - $sellingprice;
                    } 
                     else{
                     $usercommrate= $userrate->greterhundred;
                      $sellingprice = $customer->productpriceitem - ($customer->productpriceitem * ($userrate->greterhundred / 100)); 
                      $sellingprice=   $customer->productpriceitem - $sellingprice;
                    }
                    } else {

                   }
            
                   if ($customer->admin_status == 1) {
                    $adminstatus = "Approved";
                } else if ($customer->admin_status == 2) {
                    $adminstatus = "Hold";
                } else {
                    $adminstatus = "Approval Pending";
                }


                $customer_array[] = array(
                'Sr No.' => $index++,
                'Order Id' => $customer->order_id,
                'Product Name' => $customer->product->product_name[$language],
                'SKU' => $customer->product->sku,
                'Vendor Name' => $customer->admins->name,
                'Selling Price' => $customer->productpriceitem,
                'Number Of Product' => $customer->total,
                'Total' => $customer->productprice,
                'Order Status'=>$adminstatus,
                'Rate'=>$usercommrate,
                'Commission'=>$sellingprice,    
                'Order Date'=>$customer->created_at
            );
             }  }

       Excel::create('Sales_Customer_Data', function($excel) use ($customer_array){
  $excel->setTitle('Sales Customer Data');
  $excel->sheet('Sales Customer Data', function($sheet) use ($customer_array){
   $sheet->fromArray($customer_array, null, 'A1', false, false);
});
})->download('xlsx');
          
   
    }
    // end here
    
     function prnpriVenodrComm($id) {
       
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', $id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();

     return view('Admin.printvendorcommsales', compact('language','research','usertype','user'));
     //  return view('Admin.printsales', compact('language','research','usertype','vendorId'));

}
 //singel vendor row wise commission print priview
  function prnpricommview($id,$ordrid) {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)->where('role_id', '=',$id)->where('order_id', '=',$ordrid)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
        }
         $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
        return view('Admin.printvendorcommsales', compact('language','research','usertype','vendorId','user'));
       //return view('Admin.printsales', compact('language','research','usertype','vendorId'));

}
  // code for all  vendor commisssion pdf genrate
    function exportcommissvenPdf() {
       
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $usertype = (Auth::user()->job_title);
        $vendorId=(Auth::user()->id);

        if ($usertype == 'superadmin') {

            //$research = order_product::with('admins')->get();
           
            // $productdetaildata= $research->admins()->paginate(2);
            //$countproduct = count($research);
  $research = order_product::with('admins','product')->where('status', '=',1)
                ->where('admin_status', '=',1)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice ')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();  
       $user = rate_admins::where('status','=',1)->get();
        } else {

             //$research = order_product::with('admins')->where('role_id', '=', Auth::user()->id)->get();
      
    $research = order_product::with('admins','product')->where('status', '=',1)->where('admin_status', '=',1)->where('role_id', '=', Auth::user()->id)
                ->selectRaw('count(*) as total, product_id,admin_status,order_id,created_at,offer_id,movingfees')
                ->selectRaw('sum(product_price) as productprice')
                ->selectRaw('product_price as productpriceitem ')
                ->selectRaw('role_id as role_id')
                ->orderBy('total', 'desc')
                ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                ->get();
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
        }
 
        $pdf = PDF::loadView('Admin.myVendorCommiPdf',compact('language','research','usertype','vendorId','user','id'));
return $pdf->download('QubieeVendorCommission.pdf');


       //echo view('Admin.user.vendor-commission', compact('language','research','usertype','vendorId','user'));

}

// code for payment trataction details page
 public function showVenPayTran($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins')
         ->where('status', '=',1)
         ->where('admin_status', '=',1)
         ->where('role_id', '=', $id)
                //->selectRaw('count(*) as total')
                //->selectRaw('sum(product_price) as productprice')
                //->selectRaw('product_price as productpriceitem ')
                //->selectRaw('sum(movingfees) as movingfeessum')
                //->selectRaw('movingfees as movingfeesbal ') 
               // ->selectRaw('product_price as product_price')
               //->selectRaw('role_id as role_id')
                //->orderBy('total', 'desc')
               // ->groupBy('product_id','product_price','role_id','admin_status','order_id','created_at','offer_id','movingfees')
                //->groupBy('role_id','product_price','movingfees')
                ->get();
//        echo '<pre>';
//        print_r($research);
//        die;
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpay = transtions_admins::where('amountreqmark', '=',1)->where('admin_id', '=', $id)->get();
 
                        $totalpayamount=0;
                                  foreach ($userpay as $userpayuser) {
         
             $payedamount = $userpayuser->paidamount;
            $totalpayamount+=$payedamount;
        }


        echo view('Admin.user.venpaymentdetails', compact('language','research','usertype','user','id','userpay','totalpayamount'));
    }
    //code for print pdf for vendor payment transaction 
    
   function showVenPayTranPdf($id) {
        
           if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins')
         ->where('status', '=',1)
         ->where('admin_status', '=',1)
         ->where('role_id', '=', $id)
         ->get();
 
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpay = transtions_admins::where('amountreqmark', '=',1)->where('admin_id', '=', $id)->get();
 
                        $totalpayamount=0;
                                  foreach ($userpay as $userpayuser) {
         
             $payedamount = $userpayuser->paidamount;
            $totalpayamount+=$payedamount;
        }
        $pdf = PDF::loadView('Admin.venpaytransactionpdf',compact('language','research','usertype','user','id','userpay','totalpayamount'));
return $pdf->download('Qubieepaytransaction.pdf');
      

}//end vendor trascation 
//code for print vendor trnscation 
  function showVenPayTranPrint($id) {
       
      if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins')
         ->where('status', '=',1)
         ->where('admin_status', '=',1)
         ->where('role_id', '=', $id)
         ->get();
 
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpay = transtions_admins::where('amountreqmark', '=',1)->where('admin_id', '=', $id)->get();
 
                        $totalpayamount=0;
                                  foreach ($userpay as $userpayuser) {
         
             $payedamount = $userpayuser->paidamount;
            $totalpayamount+=$payedamount;
        }
     return view('Admin.venpaytransactionprint', compact('language','research','usertype','user','id','userpay','totalpayamount'));
      

}
////end code here
    //code for get the recived request and send request details
     public function venPayableTranRequest($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 
 
//    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpayreq = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 0)->get();
    $admipaid = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 1)->get();
    $admindededpay = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 2)->get();
     
   
    echo view('Admin.user.venpayablerequest', compact('language','usertype','user','id','userpayreq','admipaid','admindededpay'));
    }
    //code for transaction req pdf
      public function payAbleTranReqPdf($id)
    {
         if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 
 
//    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpayreq = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 0)->get();
    $admipaid = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 1)->get();
    $admindededpay = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 2)->get();
   
         $pdf = PDF::loadView('Admin.venpayabletransactionpdf',compact('language','usertype','user','id','userpayreq','admipaid','admindededpay'));
return $pdf->download('Qubieepayabletransaction.pdf');
    }
    //end code transaction request pdf
        //code for transaction req print
      public function payAbleTranReqPrint($id)
    {
         if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $usertype = (Auth::user()->job_title);
 
 
//    $user = rate_admins::where('status','=',1)->where('admin_id', '=', $id)->get();
    $userpayreq = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 0)->get();
    $admipaid = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 1)->get();
    $admindededpay = transtions_admins::where('admin_id', '=', $id)->where('status', '=', 2)->get();
     
   
        return view('Admin.venpayabletranprint', compact('language','usertype','user','id','userpayreq','admipaid','admindededpay'));
      
    }
    //end code transaction request print
    // code for payment send it to the vendor
    //amountreqmark 1 is paid req send 
     public function addTransactionAmount($tranid){
         
//          $id = $Request->input('vendorid');
//          $userrate = $Request->input('payedamount');
          
//          $this->validate($Request,[
//            'payedamount' => 'required|numeric',
//        ]);
            $transactioninfo = transtions_admins::where('requestnumber','=',$tranid)->get();
//            echo '<pre>';
//            print_r($transactioninfo);
//            echo $transactioninfo->amountreq.'this is amount';
//              die;
          
        //$user = rate_admins::where('admin_id',$id)->get();
       // $usercount=count($user);
       
//        if($usercount > 0){
//           $post = rate_admins::where('admin_id', $id)->first();
//                    $post->rate = $userrate;
//                    $post->lesshundred = $lesshundred;
//                    $post->greterhundred = $greterhundred;
//                    $post->save();     
//                    $message="Commission Updated sucssfully";
           // }else{
           foreach ($transactioninfo as $transactioni){
               
               $adminpayid=$transactioni->admin_id;
               $amountreq=$transactioni->amountreq;
               $requestnumber=$transactioni->requestnumber;
               $dataid=$transactioni->id;
           }
           
             $adminid=$adminpayid;
             $currentdate=date('dmyHis');
             $credtiamount=$adminid.'-'.$currentdate;
            
            $post = new transtions_admins;
            $post->admin_id = $adminpayid;
            $post->paidamount = $amountreq;
            $post->requestnumber = $requestnumber;
            $post->creditrequestnumber = $credtiamount;
            $post->amountreqmark =1;
            $post->status =1;
            $post->save();
            $addamount=$post->id;
            if($addamount > 0){
                 $postpaid = $postpaid = transtions_admins::where('id', $dataid)->first();
                    $postpaid->status = 0;
                    $postpaid->readmark = 1;
                    $postpaid->save(); 
                     $message="Payable Amount Added sucssfully"; 
            // }
        return redirect()->back()->with('success', $message);
            }else{
                 $message="Payable Amount Added sucssfully"; 
            
        return redirect()->back()->with('success', $message);
            }
           
    }
         // code for payment req recived admin by admin
    //amountreqmark 0 is request resived
     public function amountPayRequest()
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
        $id=Auth::user()->id;
         $usertype = (Auth::user()->job_title);
 $research = order_product::with('admins')
         ->where('status', '=',1)
         ->where('admin_status', '=',1)
         ->where('role_id', '=', Auth::user()->id)
         ->get();
 
    $user = rate_admins::where('status','=',1)->where('admin_id', '=', Auth::user()->id)->get();
    $userpay = transtions_admins::where('amountreqmark', '=',1)->where('admin_id', '=', Auth::user()->id)->get();
      
          $totalpayamount=0;
                                  foreach ($userpay as $userpayuser) {
         
             $payedamount = $userpayuser->paidamount;
            $totalpayamount+=$payedamount;
        }
    echo view('Admin.user.venpaymentrequest', compact('language','research','usertype','totalpayamount','user','id','userpay'));
    }
    

      public function requestForPay(Request $Request){
          
          $id = $Request->input('vendorid');
          $userrate = $Request->input('payedamount');
          
          $this->validate($Request,[
            'payedamount' => 'required|numeric',
        ]);
        $randnumber=rand();
        
          $requestnumber=$id.'-'.$randnumber;
       $id=Auth::user()->id;
            $post = new transtions_admins;
            $post->admin_id = $id;
            $post->requestnumber = $requestnumber;
            $post->amountreq = $userrate;
            $post->amountreqmark =0;
            $post->status =0;
            $post->save();
            $message="Payment request successfully submitted";
            
        return redirect()->back()->with('success', $message);
    }
    // code for admin deduct amount manuaily  
      public function deductAmount(Request $Request){
         
           $deducationamount = $Request->input('deducationamount');
           $adminid = $Request->input('adminid');
             $requestnumber = $Request->input('requestnumber');

          
          $this->validate($Request,[
            'deducationamount' => 'required|numeric',
        ]);
            $transactioninfo = transtions_admins::where('requestnumber','=',$requestnumber)->first();
            $requseramount=$transactioninfo->amountreq;
            
          $paidamount=  $requseramount - $deducationamount;
//            echo '<pre>';
//            print_r($transactioninfo);
//            echo $transactioninfo->amountreq.'this is amount';
//              die;
          
        //$user = rate_admins::where('admin_id',$id)->get();
       // $usercount=count($user);
       
//        if($usercount > 0){
//           $post = rate_admins::where('admin_id', $id)->first();
//                    $post->rate = $userrate;
//                    $post->lesshundred = $lesshundred;
//                    $post->greterhundred = $greterhundred;
//                    $post->save();     
//                    $message="Commission Updated sucssfully";
           // }else{
             $adminid=$transactioninfo->admin_id;
             $currentdate=date('dmyHis');
             $credtiamount=$adminid.'-'.$currentdate;
             if($deducationamount==$requseramount){
               $amountreqmark=1;
               $paidamount=$deducationamount;
             }else{
                  $amountreqmark=2;
                 
             }
             if($deducationamount > $requseramount ){
                 $message="Deducted amount Not Allow greter than request amount"; 
             }else{
                     $post = new transtions_admins;
            $post->admin_id = $transactioninfo->admin_id;
            $post->paidamount = $paidamount;
            $post->debitamount = $deducationamount;
            $post->requestnumber = $transactioninfo->requestnumber;
            $post->creditrequestnumber = $credtiamount;
            $post->amountreqmark =1;
            $post->status =$amountreqmark;
            $post->save();
            $addamount=$post->id;
            if($addamount > 0){
                 $postpaid = transtions_admins::where('id', $transactioninfo->id)->first();
                    $postpaid->status = 0;
                    $postpaid->readmark = 1;
                    $postpaid->save(); 
            }
            $message="Payable Amount Added sucssfully"; 
             }
             
        
            // }
        return redirect()->back()->with('success', $message);
    }
    // code for gift wrarping charges
        public function giftWrap() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
    
//        $users = DB::select('select * from products where status = 1 and gift_wrapping	 = ?', 1); //for get data
//         $array = json_decode(json_encode($users), true);
        $users = product::select ('id', 'wraping_charage')->where('status', '=', 1)->where('gift_wrapping', '=', 1)->first();
       
         
        return view('Admin.giftwrapcharges', ['language' => $this->language,  'users' => $users]);
    }
    public  function updateGiftWrapCharge(Request $Request){
        
              $wrarpingcharge = $Request->input('wrapcharges');
                 $this->validate($Request,[
                            'wrapcharges' => 'required|numeric',
                        ]);
                   $updatedata=DB::table('products')
                    ->where('gift_wrapping', 1)// for gift wrap applicable 
                   ->where('status', 1)
                    ->update(['wraping_charage' => $wrarpingcharge]);
                    if($updatedata){
                        $updatedata=DB::table('products')
                    ->where('gift_wrapping', 0) // for gift wrap applicable  
                   ->where('status', 1)
                    ->update(['wraping_charage' => 0]);
                    }  
               return redirect()->back()->with('success', 'Gift Box Pirece Added');
    }
    // end code gift wrap code
    // code for free deilvery charges
    
     public function freeDelivery() {
        if (Session::has('locale')) {
            $this->language = Session::get('locale');
        } else {
            $this->language = app()->getLocale();
        }
    
//        $users = DB::select('select * from products where status = 1 and gift_wrapping	 = ?', 1); //for get data
//         $array = json_decode(json_encode($users), true);
        $users = freedeilvery::where('status', '=', 1)->first();
//        echo '<pre>';
//        print_r($users);
      
       return view('Admin.freedeilveryamount', ['language' => $this->language,  'users' => $users]);
    }
     public  function addFreeDeliveryAmount(Request $Request){
        
              $freedeliveryamount = $Request->input('freedeliverycharges');
              $id = $Request->input('freedeilveryid');
                 $this->validate($Request,[
             'freedeliverycharges' => 'required|numeric',
      
        ]);
          
        $user = freedeilvery::where('id',$id)->get();
        $usercount=count($user);
        
        if($usercount > 0){
           $post = freedeilvery::where('id', $id)->first();
                    $post->deilveriescharges = $freedeliveryamount;
                    $post->save();     
                    $message="Free Delivery Amount Updated sucssfully";
            }else{
            $post = new freedeilvery;
            $post->id = $id;
            $post->deilveriescharges = $freedeliveryamount;
            $post->save();
             $message="Free Delivery Amount Added sucssfully";
             }
        return redirect()->back()->with('success', $message);
    }

    public function view_discount_voucher(){
         if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }

        $discounts = DB::select("select * from discount_voucher");

        $category_parent_id = Category::getMainCategory();        
        $subcategory = Category::getSubCategory();        
        return view('Admin.view_discount_voucher', ['language' => $this->language, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory,'discount_voucher'=>$discounts]);
    }

    public function add_discount_voucher(){  

         if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
        $voucher_type_obj      = new voucher_type;
        $list_voucher = $voucher_type_obj->get_voucher_type();
        $category_parent_id = Category::getMainCategory();
        $subcategory = Category::getSubCategory();        
        return view('Admin.add_discount_voucher', ['language' => $this->language, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory, 'list_voucher' => $list_voucher]);
    }

    public function get_sub_category(Request $Request){ 

             if (Session::has('locale')) {
                 $language = $this->language = Session::get('locale');
            } else {
                $language = $this->language = app()->getLocale();
            }

            $resp['status'] = false;
            $resp['message'] = "Subcategory not found..!";
            $resp['data'] = null;
            $resp['language'] = $language;

           

            $post_params = $Request->all();

            if(isset($post_params['data'],$post_params['data']['category_id']) && !empty($post_params['data']['category_id'])){
                $subcategory_list = Category::get_subcat_by_parent_cat_id($post_params['data']['category_id']); 

                if(!empty($subcategory_list)){
                     $resp['status'] = true;
                     $resp['message'] = "Subcategory get successfully..!";
                     $resp['data'] = json_encode($subcategory_list);
                }
            }       
            die(json_encode($resp));
    }  

    public function get_products(Request $Request){ 

             if (Session::has('locale')) {
                 $language = $this->language = Session::get('locale');
            } else {
                $language = $this->language = app()->getLocale();
            }

            $resp['status'] = false;
            $resp['message'] = "Products not found..!";
            $resp['data'] = null;
            $resp['language'] = $language;          

            $post_params = $Request->all();

            if(isset($post_params['data'],$post_params['data']['category_id'],$post_params['data']['sub_category_id']) && !empty($post_params['data']['category_id']) 
                && !empty($post_params['data']['sub_category_id'])){

                $products_list = Category::getAllRelatedproduct($post_params['data']['sub_category_id']); 

                if(!empty($products_list)){
                     $resp['status'] = true;
                     $resp['message'] = "Products get successfully..!";
                     $resp['data'] = json_encode($products_list);
                }
            }       
            die(json_encode($resp));
    } 


    public function create_discount(Request $Request){ 

            if (Session::has('locale')) {
                 $language = $this->language = Session::get('locale');
            } else {
                $language = $this->language = app()->getLocale();
            }

            $resp['status'] = false;
            $resp['message'] = "Discount Voucher not inserted..!";
            $resp['data'] = null;
            $resp['language'] = $language;          

            $post_params = $Request->all();
            if(is_null($post_params['_token']) || $post_params['_token']!=csrf_token()){
                return view('Admin.add_discount_voucher', compact('language', 'users', 'categoryall', 'productlist'));
                return redirect(route('admin.discountvoucheradd'));
            }

            if(isset($post_params['is_auto_generated'],$post_params['is_fixed_select'],$post_params['main_category_select'],$post_params['sub_category_select'],$post_params['products_select']) && $post_params['is_fixed_select'] != 0 && $post_params['main_category_select'] != 0 && $post_params['sub_category_select'] != 0 && $post_params['products_select'] != 0
                && $post_params['is_auto_generated'] != "0"){
                
                $insertArry['is_auto_generated'] = $post_params['is_auto_generated'];
                $insertArry['voucher_name'] = ($post_params['is_auto_generated'] == "yes")?$post_params['auto_coupan']:$post_params['manual_coupan'];
                $insertArry['voucher_type_id'] = $post_params['is_fixed_select'];
                $insertArry['voucher_validity'] = $post_params['is_validity_select'];
                $insertArry['validity_start_date'] = null;
                $insertArry['validity_end_date'] = null;
                // $insertArry['validity_start_date'] = $post_params['fromdate'];
                // $insertArry['validity_end_date'] = $post_params['todate'];
                $insertArry['is_minimum_order'] = $post_params['is_minamt_select'];
                $insertArry['minimum_amount'] = $post_params['minimum_amount'];
                $insertArry['discount_type'] = $post_params['is_discount_by_select'];
                $insertArry['discount_type_amount'] = $post_params['discount_type_input'];
                $insertArry['category_id'] = $post_params['main_category_select'];
                $insertArry['brand_id'] = $post_params['sub_category_select'];
                $insertArry['product_id'] = $post_params['products_select'];

                    $obj_discount = new discount_voucher();                     
                    $add_discount = $obj_discount->get_discount_voucher($insertArry);
                    dd($add_discount,'dii');

            }else{
                dd('error');
                return view('Admin.add_discount_voucher', compact('language', 'users', 'categoryall', 'productlist'));
            }
      return redirect(route('admin.discountvoucheradd'));
        }

     public function edit($id)
    {
        if(Session::has('locale') ){
            $language=$this->language = Session::get('locale');
        }
        else{
            $language=$this->language = app()->getLocale();
        }
         $discounts = DB::select("select * from discount_voucher");
          return view('Admin.view_discount_voucher', ['language' => $this->language, 'category_parent_id' => $category_parent_id, 'subcategory' => $subcategory,'discount_voucher'=>$discounts]);
    }
}
