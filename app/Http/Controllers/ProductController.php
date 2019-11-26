<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Cart;
use App\Product;
use App\Order;
use App\VerifyUser;
use App\VerifyAdminUser;
use Illuminate\Http\Request;
use View;
use App\Http\Requests;
use Session;
use Auth;
use Stripe\Stripe;
use Stripe\Charge;
use DB;
use Illuminate\Support\Facades\Redirect;
use Validator;
use Illuminate\Support\Facades\Storage;
use Mail;
use App\order_product;
use App\email_subscription;
use App\verify_email_subscription;
Use Alert;
use PDF;
use Intervention;
use App\Models\admin\discount_voucher;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    private $language;
    public function __construct() {
        if( Session::has('locale') ){
            $this->language = Session::get('locale');
        }      
    }

    public function getIndex(){
        if(Session::has('locale') ){
            $this->language = Session::get('locale');
        }
        else{
            $this->language = app()->getLocale();
        }
        $products = Product::all();
        return view('welcome',['products' => $products, 'language' => $this->language]);
    }
    
    
    public function getAddToCart(Request $request, $id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
        
//        if($request->input('send_gift')){
//            $send_as_gift = $request->input('send_gift');
//            Session::put('send_as_gift', $send_as_gift);
//            Session::save();
//        }
//        else{
//            Session::put('send_as_gift', 'No');
//            Session::save();
//        }
        Session::put('send_as_gift', 0);
            Session::save();
        if ($request->hasFile('logo_file')) {
                $image = $request->file('logo_file');
                $strname = 'order_img';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/order_img');
                
                $pro_id = $request->o_pro_id;
                $v_id = $request->role_id;
                $user_id = Auth::user()->id;
                
                DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
                $image->move($destinationPath, $nameimage);
                Session::put('over_img', $nameimage);
                Session::save();
        }
        else{
            Session::put('over_img', 'No');
                Session::save();
        }
        
        
        $cart->add($product,$product->id);
          
        $request->session()->put('cart', $cart);
//        return redirect('/shopping-cart');
    	//dd($request->session()->get('cart'));
      return back();
//        return redirect()->back()->with('add-to-cart-success', 'Product Add Successfully');
//    	return redirect()->route('back');
  } 
  // for buy now  take you to the cart directly.
    public function getAddToCartBuynow(Request $request, $id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
        
//        if($request->input('send_gift')){
//            $send_as_gift = $request->input('send_gift');
//            Session::put('send_as_gift', $send_as_gift);
//            Session::save();
//        }
//        else{
//            Session::put('send_as_gift', 'No');
//            Session::save();
//        }
        Session::put('send_as_gift', 0);
            Session::save();
        
        if ($request->hasFile('logo_file')) {
                $image = $request->file('logo_file');
                $strname = 'order_img';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/order_img');
                
                $pro_id = $request->o_pro_id;
                $v_id = $request->role_id;
                $user_id = Auth::user()->id;
                
                DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
                $image->move($destinationPath, $nameimage);
                Session::put('over_img', $nameimage);
                Session::save();
        }
        else{
            Session::put('over_img', 'No');
                Session::save();
        }
        
        
        $cart->addbuynow($product,$product->id);
        $request->session()->put('cart', $cart);
        return redirect('/shopping-cart');
    	//dd($request->session()->get('cart'));
//      return back();
//        return redirect()->back()->with('add-to-cart-success', 'Product Add Successfully');
//    	return redirect()->route('back');
  } 
  // end add to cart buy now
 
  // code for add to cart gift
      public function getAddToCartGift(Request $request, $id){
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
        
//        if($request->input('send_gift')){
//            $send_as_gift = $request->input('send_gift');
//            Session::put('send_as_gift', $send_as_gift);
//            Session::save();
//        }
//        else{
//            Session::put('send_as_gift', 'No');
//            Session::save();
//        }
        Session::put('send_as_gift', 1);
            Session::save();
        
        if ($request->hasFile('logo_file')) {
                $image = $request->file('logo_file');
                $strname = 'order_img';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/order_img');
                
                $pro_id = $request->o_pro_id;
                $v_id = $request->role_id;
                $user_id = Auth::user()->id;
                
                DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
                $image->move($destinationPath, $nameimage);
                Session::put('over_img', $nameimage);
                Session::save();
        }
        else{
            Session::put('over_img', 'No');
                Session::save();
        }
        
        
        $cart->addgift($product,$product->id);
      
        $request->session()->put('cart', $cart);
        return redirect('/shopping-cart');
    	//dd($request->session()->get('cart'));
     // return back();
  } 
  // end add to cart gift
  public function getAddToCartPost(Request $request){
        $id = $request->o_pro_id;
    	$product = Product::find($id);
    	$oldCart = Session::has('cart') ? Session::get('cart') : null;

    	$cart = new Cart($oldCart);
         if($request->input('send_gift')){
            $send_as_gift = $request->input('send_gift');
            Session::put('send_as_gift', $send_as_gift);
            Session::save();
        }
        else{
            Session::put('send_as_gift', 0);
            Session::save();
        }
        
        
        if ($request->hasFile('logo_file')) {
                $image = $request->file('logo_file');
                $strname = 'order_img';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/order_img');
                
                $pro_id = $request->o_pro_id;
                $v_id = $request->role_id;
                $user_id = Auth::user()->id;
                
                DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
                $image->move($destinationPath, $nameimage);
                Session::put('over_img', $nameimage);
                Session::save();
        }
        else{
            Session::put('over_img', 'No');
                Session::save();
        }
         if($request->input('send_gift')){
             $cart->add($product,$product->id);
        }
        else{
            $cart->addgift($product,$product->id);
        }
    
//      $cart->addwithimg($product,$product->id);
      $request->session()->put('cart', $cart);
    	//dd($request->session()->get('cart'));
      return redirect()->back()->with('add-to-cart-success', 'Product Add Successfully');
    	//return redirect()->route('back');
  }
  
  
  
  
  public function getProductAddToCart(Request $request, $id){
     
//        $p_id_array=explode(",",$id);
    
    $p_id_array = explode(',', $id); 
    
        //echo "<pre>";
        //print_r($p_id_array);
    $id_array = array_filter($p_id_array, 'strlen');
//        die;
    foreach ($id_array as $pid) {
        
        $product = Product::find($pid);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product,$product->id);
//        echo $pid."<br>";
//        echo "<pre>";
//        print_r($cart);
        
        $request->session()->put('cart', $cart);
    }         
    return back();
    	//return redirect()->route('back');
}

public function getReduceByOne($id){
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->reduceByOne($id);
    if(count($cart->items) > 0){
        Session::put('cart',$cart);
    }
    else{
        Session::forget('cart');
    }  
        //echo "<pre>";
        //print_r($cart);
//    return redirect('/shopping-cart');
        return back();
}

public function getIncreaseByOne($id){
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->increaseByOne($id);
    Session::put('cart',$cart);
        //echo "<pre>";
        //print_r($cart);
//    return redirect('/shopping-cart');
        return back();
}

public function getRemoveItem($id){
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItem($id);
    if(count($cart->items) > 0){
        Session::put('cart',$cart);
        return back();
    }
    else{
        Session::forget('cart');
        return redirect('/shopping-cart');       
    }        
        //echo "<pre>";
        //print_r($cart);
    
        
}
public function getRemoveItemAll(){
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeItemAll();
    
        Session::forget('cart');
         echo 'Deleted successfully.';
        //return redirect('/shopping-cart');       
     
    
        
}
public function getCart(){ 
    if(Session::has('locale') ){
        $this->language = Session::get('locale');
    }
    else{
        $this->language = app()->getLocale();
    } 
    
    $getHome= Category::getHome();
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
    $getPagesdetails= Category::getPagesdetails();

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
    
    if(!Session::has('cart')){
           //echo View::make('dashboard-header', ['getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
//            return view('shopping-cart',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
           //echo View('shopping-cart',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
           //echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails])->render();
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
//        echo "<pre>";
//            print_r($cart);
    echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
//    	return view('shopping-cart',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'products' => $cart->items, 'totalPrice' => $cart->totalPrice,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
    echo View('shopping-cart',['cart' => $cart,'language' => $this->language,'getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'products' => $cart->items, 'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal,'giftcart' => $cart->giftcart,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails])->render();
    echo View::make('dashboard-footer', ['language' => $this->language,'getMainCategory' => $getMainCategory,'getPagesdetails' => $getPagesdetails])->render();
    
}

//     public function getCheckout(){
//         $getHome= Category::getHome();

//         $getSubCategorycate = Category::getSubCategorycate();
//         $getSubCategoryWordpress = Category::getSubCategoryWordpress();
//         $getSubCategoryWebsite = Category::getSubCategoryWebsite();
//         $getSubCategorywoocomer = Category::getSubCategorywoocomer();
//         $getSubCategorypresta = Category::getSubCategorypresta();
//         $getSubCategorymagento = Category::getSubCategorymagento();
//         $getSubCategoryjoomala = Category::getSubCategoryjoomala();
//         $getSubBlogs = Category::getSubBlogs();
//         $homedata = json_decode(json_encode($getHome), true);
//         $getPagesdetails= Category::getPagesdetails();
//         $getMainCategory = Category::getMainCategory();
//   $getSubCategory = Category::getSubCategory();

//         if(!Session::has('cart')){
//             echo View::make('dashboard-header', ['getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
// //            return view('shopping-cart',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
//             echo View('shopping-cart',['getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategory'=>$getSubCategory,'getMainCategory'=>$getMainCategory,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
//             echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails])->render();
//         }
//         $oldCart = Session::get('cart');
//         $cart = new Cart($oldCart);
//         $total = $cart->totalPrice;
//         echo View::make('dashboard-header', ['getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
// //        return view('checkout',['total' => $total,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
//         echo View('checkout',['total' => $total,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);
//         echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails])->render();

//     }

    public function getCheckout(Request $request){
   
 if(Session::has('locale') ){
            $this->language = Session::get('locale');
        }
        else{
            $this->language = app()->getLocale();
        } 

         $getHome= Category::getHome();
        
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails= Category::getPagesdetails();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        if(!Session::has('cart')){
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
      
        // update onetime coupon code
        if(is_array($oldCart->coupon_name) && sizeof($oldCart->coupon_name) > 0){            
                $obj_discount = new discount_voucher();
                foreach ($oldCart->coupon_name as $c_key => $c_value) {                    
                    $get_vouchers = $obj_discount->get_voucher_by_name($c_value);                  
                    if(isset($get_vouchers) && !empty($get_vouchers)){                    
                        if($get_vouchers[0]['is_voucher_used'] == "no")
                            $obj_discount->update_coupon_onetime($get_vouchers[0]['voucher_name'],['is_voucher_used' => 'yes']);                     
                    }                       
                 }
        }

        $cart = new Cart($oldCart);

        $total = $cart->totalPrice;
        $totalQty = $cart->totalQty;
        $giftcart = $cart->giftcart;
        $shippingmark = $cart->shippingmark;

        $user_id = Auth::user()->id;
        $getUserAddress = Category::getUserAddress($user_id);      
        $getProfileInfo = Category::getProfileInfo($user_id); 
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

        // echo $total;
        // die();

        // echo View::make('dashboard-header', ['getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();

        // echo View('paypalPay',['products' => $cart->items,'total' => $total,'getSubCategoryWordpress'=>$getSubCategoryWordpress,'getSubCategoryWebsite'=>$getSubCategoryWebsite,'getSubCategorywoocomer'=>$getSubCategorywoocomer,'getSubCategorypresta'=>$getSubCategorypresta,'getSubCategorymagento'=>$getSubCategorymagento,'getSubCategoryjoomala'=>$getSubCategoryjoomala,'getSubCategorycate'=>$getSubCategorycate,'homedata'=>$homedata,'getSubBlogs'=>$getSubBlogs,'getPagesdetails'=>$getPagesdetails]);

        // echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails])->render();


        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'language' => $this->language,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata])->render();
//        echo view('paypalPay',['language' => $this->language,'products' => $cart->items,'total' => $total])->render();
        // echo "<pre>  test";
        // print_r($cart->items);
        // exit;
        echo View::make('checkout',['language' => $this->language,'products' => $cart->items,'shippingmark' => $shippingmark,'giftcart' => $giftcart,'giftboxtotal' => $cart->giftboxtotal,'dilverycharge' => $cart->dilverycharge,'totalQty' => $totalQty,'total' => $total, 'address' => $getUserAddress, 'profile' => $getProfileInfo])->render();
        echo View::make('dashboard-footer', ['language' => $this->language,'getMainCategory' => $getMainCategory,'getPagesdetails' => $getPagesdetails])->render();
    }


public function postSubscribe(Request $request){
    $validator  = Validator::make($request->all(),[
        'email' => 'required|email|unique:email_subscriptions',
    ]);

    if ($validator->fails()) {
          alert()->success('The email has already been taken.')->autoclose(5000);
        return redirect()->back()->withErrors($validator);
    } 
    else{
        $email = $request->input('email');
        
       
        
                $user  = new email_subscription;
                $user->email =$email;
                $user->ref_number = 10003877;
                //$user->status = 0;
                $user->save();

                $verifyUser = verify_email_subscription::create([
    'email_subscription_id' => $user->id,
    'token' => sha1(time())
  ]);
              
Mail::send(['html'=>'subscription'],['user' => $user,'verifyUser' => $verifyUser],function ($message) use ($user){
            $message->to($user['email'],$user['email'])->subject('Newsletter Subscription');
            $message->from('ganeshjag007@gmail.com','Qubiee');
        });


  // Mail::send(['html'=>'subscription'],['user '=>$user],  function ($message) use ($email){
  //           $message->to($email,$email)->cc('ganesh.j@etcspl.com')->subject('Lets Talk');
  //           $message->from('ganeshjag007@gmail.com','Xtacky');
  //       });
        
        Storage::append('email.txt',$email);
       // DB::table('email_subscription')->insert(['email' => $email,'ref_number' => '10003877']);
      alert()->success('Your Request Has Been Sent! Please Check Your Mail Inbox For The Confirmation')->autoclose(5000);
    
        return redirect()->back()->with('subscribe_success','Subscribed successfully');
    }       
}
// code for verify link newsletter sibscription user
public function verifyUser($token)
{
    $verifyUser = verify_email_subscription::with('email_subscription')->where('token', $token)->first();
  if(isset($verifyUser) ){

    $user = $verifyUser->email_subscription;
    
    if(!$user->status) {
      $verifyUser->email_subscription->status = 1;
      $verifyUser->email_subscription->save();

      // $verifyUser->token =  sha1(time());
      // $verifyUser->save();
     
      $status = "Your e-mail is verified. ";
      // Mail::send(['html'=>'un-subscription'],['user' => $user,'verifyUser' => $verifyUser],function ($message) use ($user){
      //       $message->to($user['email'],$user['email'])->cc('ganeshjag007@gmail.com')->subject('unsubscribe Subscription');
      //       $message->from('ganeshjag007@gmail.com','Qubiee');
      //   });  
       
    } else {

      $status = "Your e-mail is already verified.";
    
    }
  } else {
    alert()->success('Sorry your email cannot be identified.')->autoclose(5000);

    return redirect('/')->with('warning', "Sorry your email cannot be identified.");
  }
   alert()->success($status)->autoclose(5000);
  return redirect('/')->with('status', $status);

}
// end here
//code for newletter subscrption unsubcribtiaon link user forntend
public function UnsubscribUser($token)
{
    $verifyUser = verify_email_subscription::with('email_subscription')->where('token', $token)->first();
   
  if(isset($verifyUser) ){

    $user = $verifyUser->email_subscription;

    if($user->status) {
        
      $verifyUser->email_subscription->status = 0;
      $verifyUser->email_subscription->save();
        $verifyUser->token =  sha1(time());
      $verifyUser->save(); 
       $status = "Your e-mail is Unsubscrib. ";
  
    } else {
        
      $status = "Your e-mail is already Unsubscrib.";
    
    }
  } else {
    alert()->success('Sorry your email cannot be identified.')->autoclose(5000);

    return redirect('/')->with('warning', "Sorry your email cannot be identified.");
  }
   alert()->success($status)->autoclose(5000);
  return redirect('/')->with('status', $status);

}
// end here
//code for usr confermatoin link front end user login verification
 public function verifyUserLogin($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/')->with('status', $status);
    }
    //end code here 
    //code for vendor usr confermatoin link 
 public function verifyAdminUserLogin($token)
    {
        $verifyUser = VerifyAdminUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $admin = $verifyUser->admin;
            
            if(!$admin->verified) {
                $verifyUser->admin->verified = 1;
                $verifyUser->admin->save();
                $status = "Your e-mail is verified. You can login after admin approval.";
            }else{
                $status = "Your e-mail is already verified. You can now login.You can login after admin approval.";
            }
        }else{
            return redirect('/vendor/login')->with('warning', "Sorry your email cannot be identified.");
        }

        return redirect('/vendor/login')->with('status', $status);
    }
    //end code here 
public function postSupport(Request $request){ 
    $validator  = Validator::make($request->all(),[
        'name' => 'required',
        'product_id' => 'required',
        'product_name' => 'required',
        'product_price' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'subject' => 'required',
        'comment' => 'required',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }
    else{
        $name = $request->input('name');
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $subject = $request->input('subject');
        $comment = $request->input('comment');
        $today = date("YmdHis");
        $token = "XT" . $today;
        
        $user = array(
           'name' => $request->input('name'),
           'product_id' => $request->input('product_id'),
           'product_name' => $request->input('product_name'),
           'product_price' => $request->input('product_price'),
           'email' => $request->input('email'),
           'mobile' => $request->input('mobile'),
           'subject' => $request->input('subject'),
           'comment' => $request->input('comment'),
           'token' => $token
       );
        
        Mail::send(['html'=>'support_mail'],['user' => $user],function ($message) use ($user){
            $message->to($user['email'],$user['email'])->cc('pooja@etcspl.com')->subject('Support');
            $message->from('poojabochare77@gmail.com','Xtacky');
        });
            //echo $token;
        DB::table('support')->insert(['customer_name' => $name,'customer_email' => $email,'customer_contact' => $mobile,'customer_subject' => $subject,'customer_comment' => $comment,'product_id' => $product_id,'product_name' => $product_name,'product_price' => $product_price,'ref_number' => $token]);
        return redirect()->back()->with('support_success','Message Sent successfully');
    }  
}

public function postExpert(Request $request){ 
    $validator  = Validator::make($request->all(),[
        'name' => 'required',
        'product_id' => 'required',
        'product_name' => 'required',
        'product_price' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'subject' => 'required',
        'comment' => 'required',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }
    else{
        $name = $request->input('name');
        $product_id = $request->input('product_id');
        $product_name = $request->input('product_name');
        $product_price = $request->input('product_price');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $subject = $request->input('subject');
        $comment = $request->input('comment');
        $today = date("YmdHis");
        $token = "XT" . $today;
        
        $user = array(
           'name' => $request->input('name'),
           'product_id' => $request->input('product_id'),
           'product_name' => $request->input('product_name'),
           'product_price' => $request->input('product_price'),
           'email' => $request->input('email'),
           'mobile' => $request->input('mobile'),
           'subject' => $request->input('subject'),
           'comment' => $request->input('comment'),
           'token' => $token
       );
        
        Mail::send(['html'=>'expert_mail'],['user' => $user],function ($message) use ($user){
            $message->to($user['email'],$user['email'])->cc('pooja@etcspl.com')->subject('Hire Expert');
            $message->from('poojabochare77@gmail.com','Xtacky');
        });
            //echo $token;
        DB::table('expert')->insert(['customer_name' => $name,'customer_email' => $email,'customer_contact' => $mobile,'customer_subject' => $subject,'customer_comment' => $comment,'product_id' => $product_id,'product_name' => $product_name,'product_price' => $product_price,'ref_number' => $token]);
        return redirect()->back()->with('expert_success','Message Sent successfully');
    }  
}

public function postContact(Request $request){
  
    $validator  = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email',
        'mobile' => 'required',
        'company' => 'required',
        'message' => 'required',
    ]);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator);
    }
    else{
        $token = $request->input('_token');
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $company = $request->input('company');
        $message = $request->input('message');
        
        $user = array(
           'name' => $request->input('name'),
           'email' => $request->input('email'),
           'mobile' => $request->input('mobile'),
           'company' => $request->input('company'),
           'message' => $request->input('message')
       );
        
        Mail::send(['html'=>'contact_mail'],['user' => $user],function ($message) use ($user){
            $message->to($user['email'],$user['email'])->cc('pooja@etcspl.com')->subject('Lets Talk');
            $message->from('poojabochare77@gmail.com','Xtacky');
        });
            //echo $token;
        DB::table('contact')->insert(['name' => $name,'email' => $email,'contact_no' => $mobile,'company_name' => $company,'message' => $message,'ref_number' => $token]);
        return redirect()->back()->with('contact_success','Message Sent successfully');
    }      
}

public function postCheckout(Request $request){
//    echo "HIII";
//    die;
    if (Session::has('locale')) {
        $language = Session::get('locale');
    } else {
        $language = app()->getLocale();
    }
    $getHome= Category::getHome();
    $getSubCategorycate = Category::getSubCategorycate();
    $getSubCategoryWordpress = Category::getSubCategoryWordpress();
    $getSubCategoryWebsite = Category::getSubCategoryWebsite();
    $getSubCategorywoocomer = Category::getSubCategorywoocomer();
    $getSubCategorypresta = Category::getSubCategorypresta();
    $getSubCategorymagento = Category::getSubCategorymagento();
    $getSubCategoryjoomala = Category::getSubCategoryjoomala();
    $getSubBlogs = Category::getSubBlogs();
    $homedata = json_decode(json_encode($getHome), true);
    $getPagesdetails= Category::getPagesdetails();

    if(!Session::has('cart')){
        return view('shopping-cart');
    }
    $oldCart = Session::get('cart');
    $cart = new Cart($oldCart);
//    $over_img = Session::get('over_img');
    

//        Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
//        try{
//                     
//             $charge=Charge::create(array(
//               'amount' => $cart->totalPrice * 100,
//               'currency' => 'usd',
//               'source' => $request->input('stripeToken'), // obtained with Stripe.js
//               'description' => 'Test Charge'
//             ));

         //   print_r($charge->id);
//            echo $charge;
//            die();
    
//            echo Auth::user()->email ;
//            print_r(Auth::user());
//            die;
    
    
    $order = new Order();
    
//    if($over_img){
//        $order->over_img = $over_img;
//    }
   // $request->input('send_gift')
     $giftcart= $cart->giftcart;
    $order->cart = serialize($cart);
    
    $order->name = $request->input('name');
    $order->email = Auth::user()->email;
    $order->contact = $request->input('contact');
    $order->postal_code = $request->input('postal');
    $order->city = $request->input('city');
    $order->send_gift = $giftcart;
    $order->payment_status = 'Cash on delivery';
    $order->transaction_id = '1';
    
    $order->payment_id = '1';
    $order->payment_details= 'Cash on delivery';
        
    $shipping_address = $request->input('shipping_address');
    $address = $request->input('address');
    $order->address = $address;
    if($shipping_address == $address){
        $order->shipping_address = $address;
    }
    else{
        $order->shipping_address = $shipping_address;
    }
    
    Auth::user()->orders()->save($order);
    $insertedId = $order->id;
    
//    $cart_data = $cart->items ;
//     echo "<pre>";
////       echo $pro_qty;
//       print_r($cart_data);
//        die;
              // foreach ($cart as $key => $value) {
    foreach ($cart->items as  $valuesec) {
     
       $datas = new order_product();
       $datas->product_id = $valuesec['item']['id'];
       $datas->order_id=$insertedId;
       $datas->role_id=$valuesec['item']['role_id'];
       $datas->product_price=$valuesec['item']['product_price'];
       $datas->original_price=$valuesec['item']['original_price'];
       $datas->offer_id=$insertedId;
       $datas->product_ref_number=1234567890;
       $datas->save();
       
       $pro_id = $valuesec['item']['id'];
       $pro_qty = $valuesec['qty'];
//       echo "<pre>";
//       echo $pro_qty;
       $qty_pro = (int)$pro_qty;
//       print_r($valuesec['item']);
//        die;
       
//       alert($pro_qty);
        $pro_qty = DB::table('stocks')->where('product_id', $pro_id )->latest()->first();
        $r_qty = $pro_qty->remained_qty; 
        $s_qty = $pro_qty->sale_qty; 
        $p_id = $pro_qty->id; 
        
        
//       echo "int",$qty_pro + $s_qty;
        
        if($r_qty >= $qty_pro){
            $r_qty = $r_qty - $qty_pro;
            $s_qty = $s_qty + $qty_pro;
            $status = DB::table('stocks')->where('id', $p_id)->update(['remained_qty' => $r_qty, 'sale_qty' => $s_qty]);
        }
       
            // echo $valuesec['item']['product_name'][$language];
       
   }
//   die;
        // }

//        }catch(\Exception $e){
//            //echo $e->getMessage();
//            //die;
//            return view('checkout')->with('error', $e->getMessage());
//        }
 
   
   // code for user recived invoice 
//    Session::forget('cart');
    $role_id = Auth::user()->id;
    if (Session::has('locale')) {
        $language = $this->language = Session::get('locale');
    } else {
        $language = $this->language = app()->getLocale();
    }

    $orderdata = order_product::with('admins')->where('order_id', '=',$insertedId)->get();
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
    
    
    
//    return redirect()->route('thankyou')->with('orderdata',$orderdata);
    return $this->thankyouOrder($order);
//    return redirect()->route('orderPlace')->with('success','successfully purchased products');
//    // $data = ['title' => 'Welcome to qubiee.com'];
//    $pdf = PDF::loadView('userorderpdf',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'));
//    // $pdf = PDF::loadView('Admin.myPDF',compact('language','order','usertype','orderrole_id','product_id','id','vendorname'))->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
//    $pdf->setPaper('A4', 'landscape');
//    return $pdf->download('QubieeOrders.pdf');   
 
   }else{
    return redirect()->back()->with('errormeesag','Order Place But Something Wrong For invoice not Genrated');  
    }
   //end
   // return back()->with('success','successfully purchased products');
}
    public function thankyouOrder($orderdata)
    {                 
        $data = json_decode($orderdata);

        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }
        $getHome= Category::getHome();
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails= Category::getPagesdetails();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $user_id = Auth::user()->id;
        $getUserAddress = Category::getUserAddress($user_id);      
        $getProfileInfo = Category::getProfileInfo($user_id); 
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

        if(!Session::has('cart')){
            return view('shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;              
        
        Session::put('order_data', $orderdata);
        Session::save();
        
        echo View::make('dashboard-header', ['backgroundStatus'=>$backgroundStatus,'background_color' => $background_color,'layoutbackground_image' => $layoutbackground_image,'layoutclass_name' => $layoutclass_name,'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'getSubBlogs' => $getSubBlogs, 'homedata' => $homedata, 'language' => $language])->render();
        echo View::make('thankyouOrder', ['order' => $data,'orderdata' => $orderdata,'dilverycharge'=> $cart->dilverycharge,'products' => $cart->items,'total' => $total,'giftboxtotal'=> $cart->giftboxtotal, 'address' => $getUserAddress,'giftcart'=> $cart->giftcart, 'profile' => $getProfileInfo,'getSubCategory' => $getSubCategory, 'getMainCategory' => $getMainCategory, 'getSubCategoryWordpress' => $getSubCategoryWordpress, 'getSubCategoryWebsite' => $getSubCategoryWebsite, 'getSubCategorywoocomer' => $getSubCategorywoocomer, 'getSubCategorypresta' => $getSubCategorypresta, 'getSubCategorymagento' => $getSubCategorymagento, 'getSubCategoryjoomala' => $getSubCategoryjoomala, 'getSubCategorycate' => $getSubCategorycate, 'homedata' => $homedata, 'getSubBlogs' => $getSubBlogs, 'getPagesdetails' => $getPagesdetails, 'language' => $language])->render();
        echo View::make('dashboard-footer', ['getPagesdetails' => $getPagesdetails, 'language' => $language, 'getMainCategory' => $getMainCategory])->render();  
        Session::forget('cart');
     
    }
    
//    public function getInvoicePDF($orderdata)
    public function getInvoicePDF()
    {  
        $order=array();
        $order = Session::get('order_data');
        if (Session::has('locale')) {
            $language = Session::get('locale');
        } else {
            $language = app()->getLocale();
        }
        
        $add_id = $order[0]['shipping_address'];
        
        if($add_id !=0){
            $order_add = Category::getUserAddressID($add_id);
        }      
   
        $data = ['title' => 'Welcome to qubiee.com'];
        
//        echo View('thankyouOrder', ['order' => $order, 'language' => $language, 'order_add' => $order_add,'add_id' => $add_id]);
//        $pdf = PDF::loadView('userorderpdf',compact('language','order','order_add','add_id'));    
        $pdf = PDF::loadView('userpdf',compact('language','order','order_add','add_id'));    
//        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('QubieeOrders.pdf');   
    }
    public function getPDF()
    {  
        $pdf = PDF::loadView('userpdf');
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('QubieeOrders.pdf');   
    }
//    public function saveJoinedImage(Request $request)
//    {        
//        $img = $request->post('imgBase64');
//        $image = Image::make($img);
//
//        $pro_id = $request->post('id');
////        $destinationPath = public_path('images\order_img');
//        $v_id = $request->post('v_id');
//
//        // $num = rand(10,100);
//        // log($num);
//
//        // $dt = date("Y-m-d H:i:s");
//        // $todayDate = date("d-m-Y");
//        $todayDate = time();       
//
//        $strname = 'qubiee';
//        $nameimage = '\order_' . '' . str_shuffle($strname) . '' .$todayDate. ''. '.jpg';
//
//        // $img->resize(300, 200);
////        $image->save($destinationPath.''.$nameimage);
//        
//        $destinationPath = public_path('images\order_img');
//        $image->move($destinationPath, $nameimage);
//
//        $user_id = Auth::user()->id;
//
//        DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
//
//        return response()->json(['success'=>'Image Saved successfully.']);
//    }

    // public function saveOverlayImage(Request $request)
    // {        
    //     $custImg = $request->post('custImg');
    //     $image = Image::make($custImg);

    //     // $pro_id = $request->post('id');
    //     // $destinationPath = public_path('images\order_img');

    //     // $todayDate = time();       

    //     // $strname = 'qubiee';
    //     // $nameimage = '\order_' . '' . str_shuffle($strname) . '' .$todayDate. ''. '.jpg';
    //     // $image->save($destinationPath.''.$nameimage);
        
    //     return response()->json(['success'=>'Image Saved successfully.','custImg'=>$custImg]);
    // }

    public function saveJoinedImage(Request $request)
    {        
        $img = $request->post('imgBase64');
        $image = Image::make($img);

        $pro_id = $request->post('id');
        $destinationPath = public_path('images\order_img');
        $v_id = $request->post('v_id');

        // $num = rand(10,100);
        // log($num);

        // $dt = date("Y-m-d H:i:s");
        // $todayDate = date("d-m-Y");
        $todayDate = time();       

        $strname = 'qubiee';
        $nameimage = '\order_' . '' . str_shuffle($strname) . '' .$todayDate. ''. '.jpg';

        // $img->resize(300, 200);
        $image->save($destinationPath.''.$nameimage);

        $user_id = Auth::user()->id;

        DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);

        return response()->json(['success'=>'Image Saved successfully.']);
    }
    
    public function saveOverlayImage(Request $request)
    {        
        // $img = $request->post('imgBase64');
        // $image = Image::make($img);

        $pro_id = $request->post('id');
        $v_id = $request->post('v_id');
        $image = $request->file('file');
        
        // $num = rand(10,100);
        // log($num);

        // // $dt = date("Y-m-d H:i:s");
        // // $todayDate = date("d-m-Y");
        $todayDate = time();       

        $strname = 'qubiee';
        $nameimage = '\order_over_' . '' . str_shuffle($strname) . '' .$todayDate. ''. '.jpg';

        // // $img->resize(300, 200);
        // $image->save($destinationPath.''.$nameimage);

        $destinationPath = public_path('images\order_img\overlay');
        $image->move($destinationPath, $nameimage);

        $user_id = Auth::user()->id;

        DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
        
        // Session::set('overlay_img', $nameimage);
        // $overlay_img1 = Session::get('overlay_img');

        return response()->json(['success'=>'Image Saved successfully.']);
    }
    
    public function imgUpload(Request $request)
    { 
        if ($request->hasFile('logo_file')) {
                $image = $request->file('logo_file');
                $strname = 'order_img';
                $nameimageex = $image->getClientOriginalExtension();
                $nameimagename = $image->getClientOriginalName();
                $withoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', str_replace(' ', '-', $nameimagename));
                $nameimage = $withoutExt . '' . str_shuffle($strname) . '.' . $nameimageex;
                $destinationPath = public_path('images/order_img');
                
                $pro_id = $request->o_pro_id;
                $v_id = $request->role_id;
                $user_id = Auth::user()->id;
                
                DB::table('orders_img')->insert(['user_id' => $user_id,'v_id' => $v_id,'order_img' => $nameimage,'id' => $pro_id]);
                $image->move($destinationPath, $nameimage);
                
                Session::put('over_img', $nameimage);
                Session::save();
                return redirect()->back()->with('success','Save successfully');
        }
        else{
            return redirect()->back()->with('error','Choose File');
        }
    }
    // code for addd gift box in cart
         public function addGiftBox(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $sendasgiftvalue = $_GET['brand'];
        
          $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->addgiftwraping($sendasgiftvalue);
                 Session::put('cart',$cart);
       return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal));
 
    }
       public function removeGiftBox(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $sendasgiftvalue = $_GET['brand'];
        
          $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removegiftwraping($sendasgiftvalue);
                 Session::put('cart',$cart);
                 return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal));
       
    }
    //code for send as gift 
      public function addSendAsGift(Request $Request) {
         if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $sendasgiftvalue = $_GET['brand'];
        
          $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->addSendAsGift();
                 Session::put('cart',$cart);
       return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal,'giftcart'=> $cart->giftcart));
 
    }
      public function removeSendAsGift(Request $Request) {
        if (Session::has('locale')) {
            $language = $this->language = Session::get('locale');
        } else {
            $language = $this->language = app()->getLocale();
        }
         
        $sendasgiftvalue = $_GET['brand'];
        
          $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->removeSendAsGift(); 
                 Session::put('cart',$cart);
       return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal,'giftcart'=> $cart->giftcart));
 
    }
    public function getAjaxIncreaseByOne(Request $Request){
         $id = $_GET['brand'];
        
    $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->increaseByOne($id);
    Session::put('cart',$cart);
        //echo "<pre>";
        //print_r($cart);
//    return redirect('/shopping-cart');
//        return back();
     return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal,'giftcart'=> $cart->giftcart,'data'=>$cart));
}
public function getAjaxDecreaseByOne(Request $Request){
    $id = $_GET['brand'];
    
 $oldCart = Session::has('cart') ? Session::get('cart') : null;
    $cart = new Cart($oldCart);
    $cart->reduceByOne($id);
    if(count($cart->items) > 0){
        Session::put('cart',$cart);
         
    }
    else{
        Session::forget('cart');
    return json_encode(array("success" => 0));
        
    }  
 return json_encode(array("success" => 1,'totalPrice' => $cart->totalPrice,'dilverycharge' => $cart->dilverycharge,'giftboxtotal' => $cart->giftboxtotal,'giftcart'=> $cart->giftcart,'data'=>$cart));
      //  return back(); 
}


public function cart_update(Request $request){
     
        $post_params = $request->all();
        if(Session::has('locale') ){
            $this->language = Session::get('locale');
        } else{
            $this->language = app()->getLocale();
        } 

        $getHome= Category::getHome();        
        $getSubCategorycate = Category::getSubCategorycate();
        $getSubCategoryWordpress = Category::getSubCategoryWordpress();
        $getSubCategoryWebsite = Category::getSubCategoryWebsite();
        $getSubCategorywoocomer = Category::getSubCategorywoocomer();
        $getSubCategorypresta = Category::getSubCategorypresta();
        $getSubCategorymagento = Category::getSubCategorymagento();
        $getSubCategoryjoomala = Category::getSubCategoryjoomala();
        $getSubBlogs = Category::getSubBlogs();
        $homedata = json_decode(json_encode($getHome), true);
        $getPagesdetails= Category::getPagesdetails();
        $getMainCategory = Category::getMainCategory();
        $getSubCategory = Category::getSubCategory();

        $oldCart = Session::get('cart');
        // echo "<pre> test";
       // print_r($oldCart->items);
        // dd($post_params);
       // exit;
        foreach ($oldCart->items as $key=>$products) {
            
            $oldCart->totalPrice = $post_params['data']['You_Pay'];
            if($key == $post_params['data']['Product_id']){
                $temp = $products['item'];              
                 $fields = $temp->getAttributes();                
                 $fields['product_price'] = $post_params['data']['Product_Price'];
                 $temp->setRawAttributes($fields);
                 /* comment starts */
                 // $fields = $temp->getAttributes();
                 // $products['item']->setRawAttributes()->update($fields);
                 // print_r($fields);
                 /* comment ends */
                 $products['item'] = $temp;      
                 // echo "<pre> tet";
                 // print_r($products);
                 $oldCart->items[$key] = $products;  
            }            
        }
        $oldCart->coupon_name = $post_params['data']['coupon_name'];      
        if(!empty($oldCart->coupon_name)){  
            foreach ($oldCart->coupon_name as $key => $value) {  
                if(in_array($value,$post_params['data']['coupon_name'])){
                   // echo "found";
                }else{                  
                    array_push($oldCart->coupon_name, $post_params['data']['coupon_name']);
                }
            }
        }else{
            $oldCart->coupon_name = $post_params['data']['coupon_name'];
        }
        // echo "<pre> after";
        // print_r($oldCart);
        // exit;
        $new_cart = $request->session('cart', $oldCart);
        $test = Session::get('cart');
        // dd($oldCart, $new_cart,$test, session()->all());
        $cart = new Cart($test);                
        die(json_encode(array("status" => true)));
    }

}
