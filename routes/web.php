<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::get('locale/{locale}', function ($locale) {
      Session::put('locale',$locale);
      return redirect()->back();    
});

Route::resource('administration','LoginController');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('reviews', 'ReviewsController')->only(['store']);
});
//code for foront end user token verify
//Route::get('/user/verifyuser/{token}', 'ProductController@verifyUserLogin');
// code for vendor verification token link
Route::get('/user/verifyadminuser/{token}', 'ProductController@verifyAdminUserLogin');
// code for newsletter subcription verify link
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
// code for newsletter unsubscription subcription  link
Route::get('/user/unsubscribe/{token}', 'ProductController@UnsubscribUser');
Route::get('my-notification/{type}', 'HomeController@myNotification');

Route::post('/saveJoinedImage',['uses' => 'ProductController@saveJoinedImage', 'middleware' => 'auth']);
Route::post('/saveOverlayImage',['uses' => 'ProductController@saveOverlayImage', 'middleware' => 'auth']);

Route::post('/img_upload',['uses' => 'ProductController@imgUpload', 'middleware' => 'auth']);

Route::get('/add-to-cart/{id}','ProductController@getAddToCart');
Route::get('/buy-now-cart/{id}','ProductController@getAddToCartBuynow');
Route::get('/add-to-cart-gift/{id}','ProductController@getAddToCartGift');
Route::post('/img-upload',['uses' =>'ProductController@getAddToCartPost', 'middleware' => 'auth']);

Route::get('/product-add-to-cart/{id}','ProductController@getProductAddToCart');

Route::get('/shopping-cart','ProductController@getCart');

Route::get('/front-page','HomeController@frontpage');

Route::post('/fetch_coupon_details','HomeController@get_coupon_details');
Route::post('/update_cart_details','ProductController@cart_update');

Route::get('guest-checkout','DashboardController@guestCheckout')->name('guest-checkout');
Route::post('guest-checkoutRegister','DashboardController@guestCheckoutRegister')->name('guest-checkoutRegister');

Route::get('/checkout','ProductController@getCheckout');
Route::post('/checkout','ProductController@postCheckout');
Route::get('/thankyou','ProductController@thankyouOrder')->name('thankyou');
//Route::get('/orderPlace','HomeController@orderPlace')->name('orderPlace');
//Route::get('/downloadInvoicePDF/{orderdata}','ProductController@getInvoicePDF');
Route::get('/downloadInvoicePDF','ProductController@getInvoicePDF');
Route::get('/getPDF','ProductController@getPDF');

Route::get('/downloadPDF','ProductController@getPDF');

Route::post('/subscribe','ProductController@postSubscribe');
Route::post('/contact','ProductController@postContact');
Route::post('/support','ProductController@postSupport');
Route::post('/expert','ProductController@postExpert');

Route::get('/checkout',['uses' => 'ProductController@getCheckout', 'as' => 'checkout', 'middleware' => 'auth']);
Route::post('/checkout',['uses' => 'ProductController@postCheckout', 'as' => 'checkout', 'middleware' => 'auth']);

Route::get('auth/{driver}', ['as' => 'socialAuth', 'uses' => 'Auth\SocialController@redirectToProvider']);
Route::get('auth/{driver}/callback', ['as' => 'socialAuthCallback', 'uses' => 'Auth\SocialController@handleProviderCallback']);

Route::get('/payPaypal','PaypalPaymentController@paywithpaypal');
Route::post('paypal','PaypalPaymentController@paymentPaypal');
Route::get('status','PaypalPaymentController@getPaymentStatus')->name('status');

Route::get('/reduce/{id}','ProductController@getReduceByOne');
Route::get('/increase/{id}','ProductController@getIncreaseByOne');
Route::get('/remove/{id}','ProductController@getRemoveItem');
Route::get('/removeAll','ProductController@getRemoveItemAll');
Route::get('/addgiftbox', 'ProductController@addGiftBox');
Route::get('/removegiftbox', 'ProductController@removeGiftBox');
Route::get('/addsendasgift', 'ProductController@addSendAsGift');
Route::get('/removesendasgift', 'ProductController@removeSendAsGift');
Route::get('/incrementitem/','ProductController@getAjaxIncreaseByOne');
Route::get('/decrementitem/','ProductController@getAjaxDecreaseByOne');
Route::get('/users/logout','Auth\LoginController@userlogout')->name('users.logout');
Route::post('/users/logout','Auth\LoginController@userlogout')->name('users.logout');
Route::get('/order','HomeController@getOrders')->name('order');
Route::get('/cancelorder/{id}','HomeController@cancelOrder')->name('cancelorder');
Route::get('/orderinvoice/{id}','HomeController@orderinvoice')->name('orderinvoice');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/admin','AdminController@index');
Route::post('/addProfile','HomeController@addProfile');
Route::get('/profile','HomeController@profile')->name('profile');

Route::get('/add-to-wishlist',['uses' => 'HomeController@getAddToWishlist', 'middleware' => 'auth']);
Route::get('/delete-from-wishlist/{id}',['uses' => 'HomeController@getDeleteToWishlist', 'middleware' => 'auth']);


Route::get('/myAccount','HomeController@myAccount')->name('myAccount');
Route::get('/refund','HomeController@refund')->name('refund');
Route::get('/wallet','HomeController@wallet')->name('wallet');
Route::get('/download','HomeController@download')->name('download');
Route::get('/setting','HomeController@setting')->name('setting');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::get('/user-address','HomeController@user_address')->name('user-address');
Route::post('/addUserAddress','HomeController@add_user_address')->name('addUserAddress');
Route::get('/user-wishlist','HomeController@user_wishlist')->name('user-wishlist');
Route::get('/delete-address/{id}','HomeController@deleteAddress')->name('delete-address');


Route::post('/addAddress','HomeController@add_address')->name('addAddress');

//Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
//{
    /* TDS :: Server Changes requires */
    // Route::prefix('admin',['namespace'=>'admin'])->group(function(){
    Route::prefix('admin_2',['namespace'=>'admin_2'])->group(function(){
      Route::get('/','Auth\AdminLoginController@showLoginForm');

      Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
      Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
      Route::get('/','AdminController@index')->name('admin.dashboard');
      Route::post('/','AdminController@index')->name('admin.dashboard');

      Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
      Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

      Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
      Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
      Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
      Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


    //   Route::get('/dashboard','AdminController@index');
    //   Route::get('/allproduct','AdminController@product');
    //   Route::get('/createpage','AdminController@createproduct');
      
    //------------Live Files start for admin---------------------------------------------//  
    Route::get('/exportAllOrderExcel', 'AdminController@excelAllOrderReport');
    Route::get('/monthilyOrderExcel', 'AdminController@excelOrderMothily');
    Route::get('/exportOrderExcel/{id}', 'AdminController@excelOrderReport');
    Route::get('/exportAllSalesExcel', 'AdminController@excelAllSalesReport');
    Route::get('/exportAllSalesPdf', 'AdminController@getShowSalesPdf');
    Route::get('/exportExcel/{id}', 'AdminController@excelReport');
    Route::get('/generate-pdf/{id}','AdminController@generatePDF');
    Route::get('/showreport/{id}','AdminController@getShowreport');  
     Route::get('/showinvoice/{id}','AdminController@getShowinvoice');
      Route::get('/cancelinvoice/{id}','AdminController@getCancelinvoice');
     Route::get('/salesreport/{id}', 'AdminController@getshowsales');
     Route::get('/viewreviews/{id}', 'AdminController@viewReviews');
     Route::get('/holdorders', 'AdminController@holdorders');
     Route::get('/cancelorders', 'AdminController@cancelOrders');
     Route::get('/monthilyorders', 'AdminController@monthilyOrders');
     Route::get('/ordersmothily', 'AdminController@ordermonthily');
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/allproduct', 'AdminController@product');
    Route::get('/createproduct', 'AdminController@createproduct');
    Route::get('/importproduct', 'AdminController@importproduct');
    Route::post('/addmenu','AdminController@addmenu');
    Route::post('/updateoreder','AdminController@orderupdate');
    Route::post('/updateadminoreder','AdminController@orderadminupdate');
    Route::post('/addsubmenu', 'AdminController@addsubmenu');
    Route::get('/allmenu', 'AdminController@allmenu');
    Route::get('/menu', 'AdminController@menu');
    Route::get('/addlayout', 'AdminController@addlayout');
    Route::post('/createlayout','AdminController@createlayout');
    Route::post('/editmenupage', 'AdminController@editmenupage');
    Route::post('/editsubmenupage', 'AdminController@editsubmenupage');
    Route::get('/deletemenu/{id}', 'AdminController@deletemenu');
    Route::get('/deletesubmenu/{id}', 'AdminController@deletesubmenu');
    Route::get('/subcat', 'AdminController@subcat');
    Route::get('/sub_category', 'AdminController@sub_category');
    Route::post('/addproduct','AdminController@addproduct');
    Route::post('/addexcelproduct','AdminController@addexcelproduct');
    Route::get('/showproduct/{id}', 'AdminController@showproductdetails');
    
    Route::get('/showproduct1/{id}', 'AdminController@showproductdetails_test');
        
    Route::post('/updateproduct','AdminController@updateproduct');
    Route::get('/bannerproduct', 'AdminController@bannerproduct');
    Route::get('/createbannerproduct', 'AdminController@createbannerproduct');
    Route::get('/giftboxprice', 'AdminController@giftWrap');
    Route::post('/updategiftboxprice', 'AdminController@updateGiftWrapCharge');
    Route::get('/freedelivery', 'AdminController@freeDelivery');
    Route::post('/addfreedelivery', 'AdminController@addFreeDeliveryAmount');
  // Route::post('/addproduct','AdminController@addproduct');
    Route::get('showbanner/{id}','AdminController@showbanner');
    Route::post('/updatebanner','AdminController@updatebanner');
    Route::post('/addbannerproduct','AdminController@addbannerproduct');
    Route::get('/allpages','AdminController@allpages');
    Route::get('/allpages', 'AdminController@allpages');
    Route::get('/createpage', 'AdminController@createpage');
    Route::post('/addpage', 'AdminController@addpage');
    Route::get('/showpages/{id}', 'AdminController@showpages');
    Route::post('/updatepageinfo','AdminController@updatepageinfo');
    Route::get('/deleteproduct/{id}', 'AdminController@deleteproduct');
    Route::get('/approvproduct/{id}', 'AdminController@approvproduct');
    Route::get('/approvbannproduct/{id}', 'AdminController@approvbannproduct');
    Route::get('/deactivatelayout/{id}', 'AdminController@deactivatelayout');
    Route::get('/activatelayout/{id}', 'AdminController@activatelayout');
    Route::get('/deletebannerproduct/{id}', 'AdminController@deletebannerproduct');
    Route::get('/deletepage/{id}', 'AdminController@deletepage');
    Route::get('/allblog', 'AdminController@allblog');
    Route::get('/createblog', 'AdminController@createblog');
    Route::post('/addblog', 'AdminController@addblog');
    Route::get('/showblog/{id}', 'AdminController@showblogtdetails');
    Route::post('/updateblog','AdminController@updateblog');
    Route::get('/deleteblog/{id}', 'AdminController@deleteblog');
    Route::get('/registration','Auth\AdminLoginController@showRegForm')->name('admin.login');
    Route::post('/addvendore','Auth\AdminLoginController@addvendore');
    Route::get('/profiledetails','AdminController@profilePage');
    Route::get('/addonce','AdminController@removeAddonce'); 
    Route::get('/orders','AdminController@report'); 
    Route::get('/invoice','AdminController@invoice'); 
    Route::get('/sales','AdminController@sales'); 
    Route::get('/vendorcommission','AdminController@vendorcommission'); 
    Route::get('/vendorcommissionprint','AdminController@vendorcommissionprint'); 
    Route::get('/exportcommissvenPdf','AdminController@exportcommissvenPdf');
    Route::get('/productcommission','AdminController@productcommission');
    Route::get('/productcommissionprint','AdminController@productcommissionprint');
    Route::get('/productcommissvenpdf','AdminController@productcommissvenPdf');
    Route::get('/pendingcommission','AdminController@pendingcommission');
    Route::get('/pendingprocommissvenpdf','AdminController@pendingProductCommissvenPdf');
    Route::get('/pendingprocommiprint','AdminController@pendingProCommiPrint');
    Route::get('/pendingprocommission/{orderid}','AdminController@pendingProCommission');
    Route::get('/addvencommission','AdminController@addVenCommission'); 
    Route::get('/venpaymentcommission','AdminController@venPaymentCommission');
    Route::get('/amountpayrequest','AdminController@amountPayRequest');
    Route::get('/showcommisson/{id}', 'AdminController@showcommisson');
    Route::post('/editcommission','AdminController@updatevencommission');
//    Route::post('/addtransaction','AdminController@addTransactionAmount');
    Route::get('/addtransaction/{tranid}','AdminController@addTransactionAmount');
    Route::post('/requestforpay','AdminController@requestForPay');
    Route::post('/deuctamountpaid','AdminController@deductAmount');
    Route::get('/showsalecommisson/{id}', 'AdminController@showVendorSaleCommisson');
    Route::get('/showvenpaytran/{id}', 'AdminController@showVenPayTran');
    Route::get('/showvenpaytranpdf/{id}', 'AdminController@showVenPayTranPdf');
    Route::get('/showvenpaytranprint/{id}', 'AdminController@showVenPayTranPrint');
    Route::get('/venpaytranrequest/{id}', 'AdminController@venPayableTranRequest');
    Route::get('/payabletranreqpdf/{id}', 'AdminController@payAbleTranReqPdf');
    Route::get('/payabletranreqprint/{id}', 'AdminController@payAbleTranReqPrint');
    Route::get('/exportVenodrCommPdf/{id}', 'AdminController@exportVenodrCommPdf');
    Route::get('/exportVenodrCommExcel/{id}', 'AdminController@exportVenodrCommExcel');
    Route::get('/prnprivenodrcommview/{id}','AdminController@prnpriVenodrComm');
    Route::get('/prnprivencomm/{id}/{orderid}','AdminController@prnpricommview');
    Route::get('/vencommprnpriview/{orderid}','AdminController@vencommprntpri');
    Route::get('/productidcommission/{orderid}','AdminController@productidcommission');
    Route::get('/status','AdminController@status'); 
    Route::get('/prnpriview/{id}','AdminController@prnpriview');
    Route::get('/productreviews','AdminController@productReviews');
    Route::get('/allsubscriber','AdminController@allSubscriber'); 
//     Route::get('/showuser','AdminController@showuser'); 
    //------------Live Files end for admin---------------------------------------------//    
      Route::get('admin','HomeController@index')->name('admin.home');

	   	// for user product routs
   Route::resource('/user','Admin\UserController');
   
   // for customer controoler
      Route::resource('/customer','Admin\CustomerController');
      // for user Role routs
  Route::resource('/role','Admin\RoleController');

  // for user Permission routs
  Route::resource('/permission','Admin\PermissionController');
  	// for product routs
  Route::resource('/product','Admin\ProductController');
  	//tag routes
  //Route::resource('admin/tag','Admin\TagController');
    // categry routs
 //Route::resource('admin/category','CategoryController');
  
  
  Route::get('/add-stock/{id}', 'AdminController@addstock');
  Route::get('/all-stock', 'AdminController@allstock');
  Route::post('/add-stock', 'AdminController@addproductstock');
   Route::get('/loginsettings','AdminController@settings')->name('loginsetting');
  Route::post('/updatePassword','AdminController@updatePassword')->name('updatePassword');
 
  // TDS : Discount Voucher
  Route::get('/discountvoucher', 'AdminController@view_discount_voucher');
  Route::get('/discountvoucheradd', 'AdminController@add_discount_voucher')->name('discountvoucheradd');
  Route::post('/get_subcategory_details', 'AdminController@get_sub_category');
  Route::post('/get_products_details', 'AdminController@get_products');
  Route::post('/discountvoucher', 'AdminController@create_discount');
  Route::get('/get_vouchers_details', 'AdminController@view_discount_voucher');
  // Route::get('/edit_vouchers', 'AdminController@edit');
  Route::get('/{discount_id}/edit_vouchers', 'AdminController@edit');  
  Route::get('/{discount_id}/del_vouchers', 'AdminController@destroy');
  Route::post('/{discount_id}/update_discount', 'AdminController@update_discounts');
  
 });
//});  

Route::prefix('vendor')->group(function(){
 
      Route::get('/','Admin\Auth\LoginController@showVendorLoginForm');

      Route::get('/login','Admin\Auth\LoginController@showVendorLoginForm')->name('vendor.login');
      Route::post('/login','Admin\Auth\LoginController@login')->name('vendor.login.submit');
      Route::get('/','Admin\HomeController@index')->name('vendor.dashboard');
      Route::post('/','Admin\HomeController@index')->name('vendor.dashboard');

      Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
      Route::post('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

      Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
      Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('vendor.password.request');
      Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
      Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');


    //   Route::get('/dashboard','AdminController@index');
    //   Route::get('/allproduct','AdminController@product');
    //   Route::get('/createpage','AdminController@createproduct');
      
    //------------Live Files start for admin---------------------------------------------//  
    Route::get('/monthilyOrderExcel', 'AdminController@excelOrderMothily');
    Route::get('/exportAllOrderExcel', 'AdminController@excelAllOrderReport');
    Route::get('/exportOrderExcel/{id}', 'AdminController@excelOrderReport');
    // for sales data export in excel sheet 
     Route::get('/exportAllSalesExcel', 'AdminController@excelAllSalesReport');
      Route::get('/exportAllSalesPdf', 'AdminController@getShowSalesPdf');
    Route::get('/exportExcel/{id}', 'AdminController@excelReport');
    Route::get('/generate-pdf/{id}','AdminController@generatePDF');
    Route::get('/showreport/{id}','AdminController@getShowreport');  
    Route::get('/showinvoice/{id}','AdminController@getShowinvoice');
     Route::get('/cancelinvoice/{id}','AdminController@getCancelinvoice');
    Route::get('/salesreport/{id}', 'AdminController@getshowsales');
    Route::get('/viewreviews/{id}', 'AdminController@viewReviews');
    Route::get('/holdorders', 'AdminController@holdorders');
     Route::get('/cancelorders', 'AdminController@cancelOrders');
     Route::get('/monthilyorders', 'AdminController@monthilyOrders');
    Route::get('/ordersmothily', 'AdminController@ordermonthily');
    Route::get('/dashboard', 'AdminController@index');
    Route::get('/allproduct', 'AdminController@product');
    Route::get('/createproduct', 'AdminController@createproduct');
     Route::get('/importproduct', 'AdminController@importproduct');
    Route::post('/addmenu','AdminController@addmenu');
    Route::post('/updateoreder','AdminController@orderupdate');
    Route::post('/addsubmenu', 'AdminController@addsubmenu');
    Route::get('/allmenu', 'AdminController@allmenu');
    Route::get('/menu', 'AdminController@menu');
    Route::post('/editmenupage', 'AdminController@editmenupage');
    Route::post('/editsubmenupage', 'AdminController@editsubmenupage');
    Route::get('/deletemenu/{id}', 'AdminController@deletemenu');
    Route::get('/deletesubmenu/{id}', 'AdminController@deletesubmenu');
    Route::get('/subcat', 'AdminController@subcat');
    Route::get('/sub_category', 'AdminController@sub_category');
    Route::post('/addproduct','AdminController@addproduct');
    Route::post('/addexcelproduct','AdminController@addexcelproduct');
    Route::get('/showproduct/{id}', 'AdminController@showproductdetails');
    
    Route::get('/showproduct1/{id}', 'AdminController@showproductdetails_test');
        
    Route::post('/updateproduct','AdminController@updateproduct');
    Route::get('/bannerproduct', 'AdminController@bannerproduct');
    Route::get('/createbannerproduct', 'AdminController@createbannerproduct');
  // Route::post('/addproduct','AdminController@addproduct');
    Route::get('showbanner/{id}','AdminController@showbanner');
    Route::post('/updatebanner','AdminController@updatebanner');
    Route::post('/addbannerproduct','AdminController@addbannerproduct');
    Route::get('/allpages','AdminController@allpages');
    Route::get('/allpages', 'AdminController@allpages');
    Route::get('/createpage', 'AdminController@createpage');
    Route::post('/addpage', 'AdminController@addpage');
    Route::get('/showpages/{id}', 'AdminController@showpages');
    Route::post('/updatepageinfo','AdminController@updatepageinfo');
    Route::get('/deleteproduct/{id}', 'AdminController@deleteproduct');
    Route::get('/deletebannerproduct/{id}', 'AdminController@deletebannerproduct');
    Route::get('/deletepage/{id}', 'AdminController@deletepage');
    Route::get('/allblog', 'AdminController@allblog');
    Route::get('/createblog', 'AdminController@createblog');
    Route::post('/addblog', 'AdminController@addblog');
    Route::get('/showblog/{id}', 'AdminController@showblogtdetails');
    Route::post('/updateblog','AdminController@updateblog');
    Route::get('/deleteblog/{id}', 'AdminController@deleteblog');
    Route::get('/registration','Auth\AdminLoginController@showRegForm')->name('admin.login');
    Route::post('/addvendore','Auth\AdminLoginController@addvendore');
    Route::get('/profiledetails','AdminController@profilePage');
    Route::get('/addonce','AdminController@removeAddonce'); 
    Route::get('/orders','AdminController@report'); 
    Route::get('/invoice','AdminController@invoice');
    Route::get('/sales','AdminController@sales'); 
    Route::get('/amountpayrequest','AdminController@amountPayRequest');
    Route::get('/showvenpaytranpdf/{id}', 'AdminController@showVenPayTranPdf');
    Route::get('/showvenpaytranprint/{id}', 'AdminController@showVenPayTranPrint');
    Route::get('/venpaytranrequest/{id}', 'AdminController@venPayableTranRequest');
    Route::get('/payabletranreqpdf/{id}', 'AdminController@payAbleTranReqPdf');
    Route::get('/payabletranreqprint/{id}', 'AdminController@payAbleTranReqPrint');
    Route::get('/vendorcommission','AdminController@vendorcommission'); 
    Route::get('/exportcommissvenPdf','AdminController@exportcommissvenPdf');
    Route::get('/productcommission','AdminController@productcommission');
    Route::get('/productcommissionprint','AdminController@productcommissionprint');
    Route::get('/pendingprocommiprint','AdminController@pendingProCommiPrint');
    Route::get('/pendingprocommission/{orderid}','AdminController@pendingProCommission');
    Route::get('/productcommissvenpdf','AdminController@productcommissvenPdf');
    Route::get('/pendingcommission','AdminController@pendingcommission');
    Route::get('/pendingprocommissvenpdf','AdminController@pendingProductCommissvenPdf');
    Route::get('/status','AdminController@status'); 
      Route::get('/productreviews','AdminController@productReviews');
//     Route::get('/showuser','AdminController@showuser'); 
    //------------Live Files end for admin---------------------------------------------//    
      Route::get('vendor','HomeController@index')->name('admin.home');

	   	// for user product routs
//   Route::resource('/user','Admin\UserController');
//      // for user Role routs
//  Route::resource('/role','Admin\RoleController');
//
//  // for user Permission routs
//  Route::resource('/permission','Admin\PermissionController');
//  	// for product routs
//  Route::resource('/product','Admin\ProductController');
  	//tag routes
  //Route::resource('admin/tag','Admin\TagController');
    // categry routs
 //Route::resource('admin/category','CategoryController');
      Route::get('/add-stock/{id}', 'AdminController@addstock');
  Route::get('/all-stock', 'AdminController@allstock');
  Route::post('/add-stock', 'AdminController@addproductstock');
 Route::resource('/','AdminController');
 Route::get('/loginsettings','AdminController@settings')->name('loginsetting');
 Route::post('/updatePassword','AdminController@updatePassword')->name('updatePassword');

}); 
 
//--------------Live Files for user-----------------------------------------//

Route::resource('mainmenu', 'MenuController');
Route::resource('product', 'BannerController');
//Route::resource('page', 'PageController');
Route::get('/ajax', 'DashboardController@ajax');
Route::post('/search', 'DashboardController@search');
Route::get('/categoryfilter', 'DashboardController@categoryfilter');
Route::get('/mostsellingfilter', 'DashboardController@mostsellingfilter');
Route::get('/mostsubsellingfilter', 'DashboardController@mostsubsellingfilter');
Route::get('/categoryfilterprice', 'DashboardController@categoryfilterprice');
Route::get('/higherpricefilter', 'DashboardController@higherpricefilter');
Route::get('/highersubpricefilter', 'DashboardController@highersubpricefilter');
Route::get('/lowerpricefilter', 'DashboardController@lowerpricefilter');
Route::get('/lowersubpricefilter', 'DashboardController@lowersubpricefilter');
Route::get('/loaddata','DashboardController@loadDataAjax' );
Route::get('/new', 'DashboardController@getNew', function () {
    //return view('dashboard');
});
Route::get('/home', 'DashboardController@getIndex', function () {
    //return view('dashboard');
});
Route::get('/home', 'DashboardController@getIndex')->name('home');
Route::get('/about', 'DashboardController@getAbout', function () {
    //return view('dashboard');
});
Route::get('/blog', 'DashboardController@getBlog', function () {
    //return view('dashboard');
});
Route::get('/privacy-policy', 'DashboardController@getPrivacypolicy', function () {
    //return view('dashboard');
});
Route::get('/terms-and-conditions', 'DashboardController@getTermsconditions', function () {
    //return view('dashboard');
});
Route::get('/contact', 'DashboardController@getContact', function () {
    //return view('dashboard');
});

Route::get('/feature', 'DashboardController@getFeature', function () {
    //return view('dashboard');
});
Route::get('/{id}', 'DashboardController@wordpresspage');


Route::post('editmenu/{id}', 'MenuController@posteditmenupage');

Route::get('categoryproduct/{id}/{name}', 'DashboardController@getCategoryproduct');
Route::get('productdetails/{name}', 'DashboardController@getProductdetails');
Route::get('product/productdetails/{name}', 'BannerController@getProductdetails');


Route::resource('index','DashboardController');
//--------------Live Files for user-----------------------------------------//

Route::get('/','DashboardController@getIndex', function () {
  //Redirect::to('index')->send();
    //  echo View::make('dashboard-header')->render();
    // return view('welcome');
});






