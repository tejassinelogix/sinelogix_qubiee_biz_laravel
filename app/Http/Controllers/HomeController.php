<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use DB;
use Auth;
use View;
use App\Product;
use PDF;
use App\order_product;
use App\Order;
use App\User;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function frontpage() {
        return View::make('front-page');
    }
    public function index() {
//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//      return view('home',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
        echo View('home', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function profile() {

//        $language = app()->getLocale();
        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $id = Auth::user()->id;
        $getProfile = Category::getProfile($id);
        $getProfileInfo = Category::getProfileInfo($id);
        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//      return view('profile',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails,'Profile' =>$getProfile, 'getProfileInfo' => $getProfileInfo])->render();
        echo View('profile', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'Profile' => $getProfile, 'getProfileInfo' => $getProfileInfo, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function getOrders() {
//          $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getSubCategorycate = Category::getSubCategorycate();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails = Category::getPagesdetails();

//        $orders = Auth::user()->orders()->where('payment_status', '=', 'Cash on delivery')->paginate(6);
            $orders = Auth::user()->orders()->orderBy('id', 'desc')->paginate(6);

//            echo "<pre>";
//            print_r($orders);
//            die;
        $orders->map(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;

//            $order->cart = unserialize(base64_decode($order->cart));
//            return $order;
        });
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//        return view('order',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'orders' => $orders,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
        echo View('order', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'orders' => $orders, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'language' => $language]);
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

      public function cancelOrder($id) {
          
          $orderCanled = Order::find($id);
          $orderCanled->payment_status = 'Cancel';
          $orderCanled->save();
          if($orderCanled->id > 0){
//                $ordersCanled = order_product::find($id);
//          $ordersCanled->status = 0;
                    DB::table('order_products')
                ->where("order_id", '=', $orderCanled->id)
                ->update(['status'=> 0]);      
//          $ordersCanled->save();
             return redirect()->back()->with('info', 'Order Successfully Canceled ');
          }else{
               return redirect()->back()->with('info', 'Some Thing Wrong ! Please Try Agin');
          }
       
      }
    public function addProfile(Request $request) {
        $this->validate($request, [
            'Name' => 'required',
            'lastname' => 'required',
            'Email' => 'required',
            'Contact' => 'required|numeric',
            'CompanyName' => 'required',
            'Country' => 'required',
            'State' => 'required',
            'Address' => 'required',
                //     'profile_img' => 'required|file|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $user_id = $request->input('user_id');
        $Name = $request->input('Name');
        $Lastname = $request->input('lastname');
        $postalcode = $request->input('postalcode');
        $locality = $request->input('locality');
        $Email = $request->input('Email');
        $Contact = $request->input('Contact');
        $CompanyName = $request->input('CompanyName');
        $Country = $request->input('Country');
        $State = $request->input('State');
        $Address = $request->input('Address');
        
         $data = array(
            'name' => $request->input('Name'),
            'lastname' => $request->input('lastname'),
            'email' => $request->input('Email'),
        );
        $userdata = User::where('id', $user_id)->update($data);
        $users = DB::select('select * from profile where id= "' . $user_id . '"');
        if ($users) {

            if ($request->hasFile('profile_img')) {
                $id = $users[0]->id;

                $image = $request->file('profile_img');
                $strname = 'xtacky';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/profile');

                $data = DB::table('profile')
                        ->where('id', $id)
                        ->update(['name' => $Name,'lastname'=> $Lastname, 'email' => $Email, 'locality' => $locality, 'pin_code' => $postalcode, 'contact' => $Contact, 'company' => $CompanyName, 'address' => $Address, 'state' => $State, 'country' => $Country, 'profile_img' => $nameimage]);
                if ($data) {
                    $image->move($destinationPath, $nameimage);
                    return redirect('/profile')->with('info', 'Profile updated successfully');
                } else {
                    return redirect('/profile')->with('info', 'Failed');
                }
            } else {
                $id = $users[0]->id;
                DB::table('profile')
                        ->where('id', $id)
                        ->update(['name' => $Name, 'lastname'=> $Lastname,'email' => $Email, 'locality' => $locality, 'pin_code' => $postalcode, 'contact' => $Contact, 'company' => $CompanyName, 'address' => $Address, 'state' => $State, 'country' => $Country]);
                return redirect('/profile')->with('info', 'Profile updated successfully');
            }
        } else {
            if ($request->hasFile('profile_img')) {
                $image = $request->file('profile_img');
                $strname = 'xtacky';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/profile');
                $data = DB::table('profile')->insert(['id' => $user_id, 'name' => $Name,'lastname'=> $Lastname, 'locality' => $locality, 'email' => $Email, 'pin_code' => $postalcode, 'contact' => $Contact, 'company' => $CompanyName, 'address' => $Address, 'state' => $State, 'country' => $Country, 'profile_img' => $nameimage]);
                //echo $data;
                if ($data) {
                    $image->move($destinationPath, $nameimage);
                    return redirect('/profile')->with('info', 'Profile saved successfully');
                } else {
                    return redirect('/profile')->with('info', 'Failed');
                }
            } else {
                $data = DB::table('profile')->insert(['id' => $user_id, 'name' => $Name,'lastname'=> $Lastname, 'email' => $Email, 'locality' => $locality, 'pin_code' => $postalcode, 'contact' => $Contact, 'company' => $CompanyName, 'address' => $Address, 'state' => $State, 'country' => $Country]);
                return redirect('/profile')->with('info', 'Profile saved successfully');
            }
        }
    }

    public function myAccount() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//      return view('account',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
        echo View('account', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function refund() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//      return view('refund',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
        echo View('refund', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    //for wallet
    public function wallet() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $role_id = Auth::user()->id;
        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails = Category::getPagesdetails();
        $getuserwallets = Category::getuserwallets($role_id);
        $total_wallet = 0;
        //  if check the wallets set or not
        if ($getuserwallets) {

            foreach ($getuserwallets as $wallets) {
                // echo "<pre>";
                // print_r($wallets->wallets_amount);
                $total_wallet += $wallets->wallets_amount;
                // echo $total_price;
            }
        }
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
        echo View::make('dashboard-header', [ 'backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
//      return view('refund',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
        echo View('wallet', ['total_wallet' => $total_wallet, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'getuserwallets' => $getuserwallets])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'getMainCategory' => $getMainCategory])->render();
    }

    public function download() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails = Category::getPagesdetails();

        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });

//$productdownload = array();
        if (!$orders->isEmpty()) {
            foreach ($orders as $order) {
                // $purchesorderid=14;
                $purchesorderid = $order['id'];

                foreach ($order->cart->items as $item) {
                    $produtid = $item['item']['id'];
                    $pd_beforefor = DB::select('select pd.*,p.product_name from products_downloads pd,products p where pd.product_id = p.id and pd.product_id =?', [$produtid]);
                    foreach ($pd_beforefor as $key => $value) {
                        $productdownload[] = $value;
                    }
                }
            }
        } else {
            $productdownload = array();
        }
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

        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
        echo View('download', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'orders' => $orders, 'productdownload' => $productdownload, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function setting() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $id = Auth::user()->id;
        $getProfile = Category::getProfile($id);
        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
//     return view('setting',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails,'Profile' =>$getProfile])->render();
        echo View('setting', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'Profile' => $getProfile, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function changePassword(Request $request) {

        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);
           
        $user_id = $request->input('user_id');
        $pass = $request->input('password');
        $oldpassword = $request->input('oldpassword');
        $password = Hash::make($pass);
         $user = User::findOrFail($user_id);
            if (Hash::check($oldpassword, $user->password)) { 
             DB::table('users')
                ->where('id', $user_id)
                ->update(['password' => $password]);
        return redirect('/setting')->with('info', 'Password updated successfully');
            }else{
            
        return redirect('/setting')->with('infofiled', 'Current Password does not match ');
            }
            
       
    }

    public function user_address() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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

        $user_id = Auth::user()->id;
//        echo $user_id;        
        $user_address = DB::select('select * from users_address where user_id =?', [$user_id]);
        $user_profile = DB::select('select * from profile where id =?', [$user_id]);
//        echo"<pre>";
//        print_r($user_address);
//        die;
        
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
        echo View('user-address', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'user_address' => $user_address,'user_profile' => $user_profile, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }
     public function orderPlace() {

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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

        $user_id = Auth::user()->id;
//        echo $user_id;        
        $user_address = DB::select('select * from user_address where user_id =?', [$user_id]);
        if(!Session::has('cart')){
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
        echo View('thankyouOrder', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'user_address' => $user_address, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function add_user_address(Request $request) {
//        $this->validate($request, [
//        $user_id => $request->input('user_id'),
//        $Address => $request->input('Address'),
//        $City => $request->input('City'),
//        $State => $request->input('State'),
//        $Country => $request->input('Country'),
//        ]);

        $user_id = $request->input('user_id');
        $name = $request->input('name');
        $Address = $request->input('address');
        $streetname = $request->input('streetname');
        $City = $request->input('City');
        //$State = $request->input('State');
        $Country = $request->input('Country');
        $phone = $request->input('phone');
         $landmark = $request->input('landmark');
        $flg = 0;

        $data = DB::table('user_address')->insert(['user_id' => $user_id,'name' => $name,'phone' => $phone,'landmark' => $landmark, 'address' => $Address, 'street_name' => $streetname, 'country' => $Country, 'city' => $City, 'flag' => $flg]);
        return redirect('/user-address')->with('info', 'Address saved successfully');
    }

    public function user_wishlist() {

//        $language = app()->getLocale();

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }

        $getHome = Category::getHome();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
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

        $user_id = Auth::user()->id;
        $user_wishlist = DB::select('select * from users_wishlist where user_id =?', [$user_id]);

        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
        echo View('user-wishlist', ['getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'user_wishlist' => $user_wishlist, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();
    }

    public function getAddToWishlist(Request $request) {
        $user_id = Auth::user()->id;
         $id = $request->id;
        $product = Product::find($id);
           $result = DB::table('users_wishlist')->select('user_id')->where('user_id',$user_id)->where('product_id',$id)->count();
//        echo $user_id;
//        echo "<pre>";
//        print_r($product);
           if($result > 0){
               return json_encode(array("success" => 2,'data'=>'already added wish list'));
           }else{
               $data = DB::table('users_wishlist')->insert(['user_id' => $user_id, 'product_id' => $id, 'product_details' => $product]);
           }
            
        if ($data) {
            $request->session()->flash('addtowishlist', 'Post created successfully.');
//            Session::put('addtowishlist', 'Item created successfully.');
            return json_encode(array("success" => 1, 'data' => $data));
           // return redirect()->back()->with('add-to-wishlist-success', 'Product added in wishlist successfully');
        } else {
             return json_encode(array("success" => 0));
           // return redirect()->back()->with('add-to-wishlist-failed', 'Product added in wishlist failed');
        }
    }

    public function getDeleteToWishlist(Request $request, $id) {
//        echo "HIIII";
//        echo $id."<br>";
        //$flg = DB::table('users_wishlist')->where('id', $id)->delete();
        //$flg = DB::table('users_wishlist')->where('id', '=', $id)->delete();
//        echo $flg;
//        die;
        $flg = DB::table('users_wishlist')->delete($id);
        if ($flg) {
            return redirect()->back()->with('delete-from-wishlist-success', 'Product removed from wishlist successfully');
        } else {
            return redirect()->back()->with('delete-from-wishlist-failed', 'Product removed from wishlist Failed');
        }
    }

    public function deleteAddress(Request $request, $id) {
        $flg = DB::table('users_address')->delete($id);
//        echo $id;
//        echo $flg;
//        die;

        if ($flg) {
            return redirect()->back()->with('delete-address-success', 'Address removed successfully');
        } else {
            return redirect()->back()->with('delete-address-failed', 'Address removed Failed');
        }
    }
    public  function orderinvoice($insertedId){
         
        if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }
    
      $order = Auth::user()->orders()->where('id', '=',$insertedId)->get();


        $order->map(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;

//            $order->cart = unserialize(base64_decode($order->cart));
//            return $order;
        });
        foreach($order as $orders){
           $add_id= $orders->shipping_address.'this is shipping_address ';
         }
            
          if($add_id !=0){
            $order_add = Category::getUserAddressID($add_id);
        }    
         
//    $orderdata = order_product::with('admins')->where('order_id', '=',$insertedId)->get();
//    $countnumber=count($orderdata);
//
//    $order=array();
//    if($countnumber>0){
//     foreach ($orderdata as $value) {
//
//        $order = Order::with('user')->where('id', '=',$value->order_id)->get(); 
//        $orderrole_id=$value->role_id;
//        $product_id=$value->product_id;
//        $vendorname=$value->admins->name;
//    }
//    $order->map(function($order, $key) {
//        $order->cart = unserialize($order->cart);
//        return $order;
//
//    });

        // $data = ['title' => 'Welcome to qubiee.com'];

    $pdf = PDF::loadView('userorderpdf',compact('language','order','usertype','orderrole_id','product_id','id','vendorname','order_add','add_id'));

        // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);

        $pdf->setPaper('A4', 'landscape');


    return $pdf->download('QubieeOrders.pdf');
    
  
//   }else{
//
//    return redirect()->back()->with('errormeesag','Order Place But Something Wrong For invoice not Genrated');
//   
//    }
    }

    public function add_address(Request $request) {

        $user_id = Auth::user()->id;

        // $user_id = $request->input('user_id');
        $name = $request->input('name');
        $landmark = $request->input('landmark');
        $address = $request->input('address');
        $streetname = $request->input('streetname');
        $city = $request->input('city');
        //$state = $request->input('state');
        $country = $request->input('country');
//        $pin_code = $request->input('pin_code');
        $phone = $request->input('phone');


        // $Address = $request->input('Address');
        // $City = $request->input('City');
        // $State = $request->input('State');
        // $Country = $request->input('Country');
        // $flg = 0;

        $data = DB::table('users_address')->insert(['user_id' => $user_id, 'name' => $name, 'landmark' => $landmark,'address' => $address,'street_name' => $streetname, 'city' => $city, 'country' => $country, 'phone' => $phone]);
        return redirect('/checkout')->with('info', 'Address saved successfully');
    }


    public function myNotification($type)
    {
        switch ($type) {
            case 'message':
                alert()->message('Sweet Alert with message.');
                break;
            case 'basic':
                alert()->basic('Sweet Alert with basic.','Basic');
                break;
            case 'info':
                alert()->info('Sweet Alert with info.');
                break;
            case 'success':
                alert()->success('Sweet Alert with success.','Welcome to ItSolutionStuff.com')->autoclose(3500);
                break;
            case 'error':
                alert()->error('Sweet Alert with error.');
                break;
            case 'warning':
                alert()->warning('Sweet Alert with warning.');
                break;
            default:
                # code...
                break;
        }


        return view('my-notification');
    }

}
