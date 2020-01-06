<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class Category extends Model {
     protected $table = 'category';
      public $timestamps = false;
      protected $primaryKey = 'category_id';
       protected $casts = [
        'category_name' => 'array',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'meta_keyword' => 'array',
    ];

    //get the main caegory
        public static function getMainCategory() {
       // $brands = DB::select('select * from category  where category_parent_id = ?', [0]);
        $brands = DB::select('select * from category where category_parent_id = 0 and status = 1');    
        return $brands;
    }
    //get the sub caegory
   public static function getSubCategory() {
        $subcategory = DB::select('select * from category where category_parent_id NOT IN (0) and status = 1'); 
        return $subcategory;
    }
    // get the list of all product in admin panel
  public static function getAllProduct() {
        $users = DB::select('select * from all_products  where status= 1');
        return $users;
    }
    // use for selected main menus sub menu in cuurtn not use commented in menu created page
     public static function getAllMainSubMenu($id) {
        $users = DB::select('select * from category  where category_id= $id and category_parent_id = $id');
         $users = DB::where('status' , 1)
     ->where(function($result) {
         $result->where("type" , "private")
           ->orWhere('type' , "public");
     })
     ->get();
        return $users;
    }
    //below 1 to 7 get the parent details
     public static function getSubCategorypage() {
        $users = DB::select('select * from category  where category_parent_id= 1 and status= 1');
        return $users;
    }
     public static function getSubCategoryWordpress() {
        $users = DB::select('select * from category  where category_parent_id= 1 and status= 1');
        return $users;
    }
      public static function getSubCategoryWebsite() {
        $users = DB::select('select * from category  where category_parent_id= 2 and status= 1');
        return $users;
    }
     public static function getSubCategorywoocomer() {
        $users = DB::select('select * from category  where category_parent_id= 3 and status= 1');
        return $users;
    }
    public static function getSubCategorypresta() {
        $users = DB::select('select * from category  where category_parent_id= 4 and status= 1');
        return $users;
    }
     public static function getSubCategorymagento() {
        $users = DB::select('select * from category  where category_parent_id= 5 and status= 1');
        return $users;
    }
        public static function getSubCategoryjoomala() {
        $users = DB::select('select * from category  where category_parent_id= 6 and status= 1');
        return $users;
    }
    
     public static function getSubCategorycate() {
        $users = DB::select('select * from category  where category_parent_id= 7 and status= 1');
        return $users;
    }
      public static function getSubBlogs() {
        $users = DB::select('select * from category  where category_parent_id= 35 and status= 1');
        return $users;
    }


// fist get the parent id according to url slug and after according to parent id get sub catgory
    public static function getParentCategoryproduct($url) {
        $brands = DB::select('select category_id from category  where url = ?', [$url]);
        $array = json_decode(json_encode($brands), true);

 $product_id=$array[0]['category_id']; 
 //$product_id;
  $users = DB::select('select * from products  where status= 1 and main_category = ?', [$product_id]);
   // $allsubcategory=DB::select('select * from category  where category_parent_id    = ?', [$product_id]);
   // echo "<pre>";
   // print_r($product_id);
   // die;
        return $product_id;
    }
    //end here
    // fist get all categories the parent id according to url slug and after according to parent id get sub catgory
    public static function getParentAllCategoryproduct($url) {
         
 //$product_id;
  $users = DB::select('select * from products  where status= 1');
   // $allsubcategory=DB::select('select * from category  where category_parent_id    = ?', [$product_id]);
   // echo "<pre>";
   // print_r($product_id);
   // die;
        return $users;
    }
    //end here all categories
        public static function getParentSubCategorycate($url) {
        $brands = DB::select('select category_id from category  where status = 1 and url = ?', [$url]);
        $array = json_decode(json_encode($brands), true);

 $product_id=$array[0]['category_id']; 
 //$product_id;
   $allsubcategory=DB::select('select * from category  where status = 1 and  category_parent_id    = ?', [$product_id]);
   // echo "<pre>";
   // print_r($product_id);
   // die;
        return $allsubcategory;
    }
    //end
       public static function getParentAllSubCategorycate($url) {
        $brands = DB::select('select category_id from category  where status = 1');
        $array = json_decode(json_encode($brands), true);

 $product_id=$array[0]['category_id']; 
 //$product_id;
   $allsubcategory=DB::select('select * from category  where status = 1 ');
   // echo "<pre>";
   // print_r($product_id);
   // die;
        return $allsubcategory;
    }
    // get banner section product details
public static function getBannerslider() {
        $users = DB::select('select * from products  where section = "banner" and status= 1');
        return $users;
    }
    //get new prodcut details
    public static function getNewproduct() {
        //$users = DB::select('select * from all_products  where section= "New"');
//        $users = DB::select('select * from products where section = "New" and offer_expire_date <= CURRENT_DATE() ORDER BY id DESC');
        $users = DB::select('select * from products where section = "New" ORDER BY id DESC');
        return $users;
    }
    //get the featured section poroduct details
     public static function getFetureproduct() {
         $users = DB::select('select * from products  where section= "Feature" and  status= 1');
        return $users;
    }
    //new offer section
      public static function getProductoffers() {
            $data = DB::select('SELECT * FROM `products` WHERE offer_start_date <= CURRENT_DATE() and offer_expire_date >=CURRENT_DATE() and status= 1');
            return $data;
        }
    //get related product details
    public static function getAllRelatedproduct($sub_cat_id) {
        //$users = DB::select('select * from all_products  where section= "New"');
        $users = DB::select('select * from products where sub_category = "'.$sub_cat_id.'" and  status= 1 and as_gift_wrap = 0');
        return $users;
    }    
    // get the category prodct like workpress->popular item->product
    public static function getCategoryproduct($id) {
         $users = DB::select('select * from products  where status= 1 and sub_category = ?', [$id]);
        return $users;
    }
    //first get the sub category parent id and then get the details of parent page
     public static function getSubCategorycateparentid($id) {
        $brands = DB::select('select category_parent_id from category  where category_id = ?', [$id]);
        $array = json_decode(json_encode($brands), true);

 $product_id=$array[0]['category_parent_id']; 
 //$product_id;
    $allsubcategory=DB::select('select * from category  where category_id    = ?', [$product_id]);
        return $allsubcategory;
    }
    // get the prodct details last page
      public static function getProductdetails($nameproduct) {
         
        $users = DB::select("select * from products  where url  like  '%$nameproduct%'");
        
        return $users;
    }
     public static function getProductdetailsall($nameproduct) {
         
        $users = DB::select("select * from product_details  where url  like  '$nameproduct'");
        
        return $users; 
    }
        // shwo the product seller name 
  public static function getproductseller($nameproduct) {
         
        $users = DB::select("select id,name from admins  where id = '".$nameproduct."' ");        
        return $users; 
    }
	public static function getproductsellerData($nameproduct) {
         
        $usersData = DB::select("select * from product_details  where role_id = '".$nameproduct."' ");        
        return $usersData; 
    }
    // shwo the product addones 
  public static function getaddonesproduct($nameproduct) {
         
        $users = DB::select("select * from products_addonce  where id = '".$nameproduct."' ");
        
        return $users; 
    }
    
    // for show the addones product detils here
     public static function getproductdetailsaddones() {
        $users = DB::select('select id,product_name,product_price,url from products  where status= 1');
        return $users;
    }
        // use for selected main menu"s sub menu in edit product page
     public static function getAllsubmenuparent($id) {
        $users = DB::select('select category_id,category_name from category  where status=1 and category_parent_id = ?', [$id]);
       return $users;
    }
    public static function getAllparent($id) {
        $users = DB::select('select category_parent_id from category  where status=1 and category_parent_id != 0 and category_id = ?', [$id]);
       return $users;
    }
    // get the home page seo details 
      public static function getHome() {
        $users = DB::select('select page_name,meta_title,meta_description,meta_keyword,url from all_pages  where page_id= 1');
        return $users;
    }
    //get the parent page seo details
    public static function getCategorymainseo($url) {
         $maincategory = DB::select('select category_id,category_name,meta_title,meta_description,meta_keyword,url from category  where url = ?', [$url]);
        return $maincategory;
    }
     //get the sub caegory seo details
    public static function getSubcategoryseo($id) {
         $subcatseo = DB::select('select category_id,category_name,meta_title,meta_description,meta_keyword,url from category  where category_id = ?', [$id]);
        return $subcatseo;
    }
       public static function adminloginProfile($id) {
            $data = DB::select('select * from admins where id ="'.$id.'" ');
            return $data;
        }
      public static function adminProfileInfo($id) {
            $data = DB::select('select * from profile_admin where id ="'.$id.'" ');
            return $data;
        }
    public static function getPagesdetails() {
        $users = DB::select('select * from all_pages  where status= 1');
        return $users;
    }
         public static function getpagemainseo($url) {
         $maincategory = DB::select('select page_id,page_name,meta_title,meta_description,meta_keyword,url from all_pages  where url = ?', [$url]);
        return $maincategory;
    }
       public static function getAjaxproductdetails($nameproduct) {
        $users = DB::select("select product_id,product_name from all_products  where product_name  like  '%$nameproduct%'");
        return $users;
    }
     public static function getProductimagedetails($nameproduct) {
        $users = DB::select("select image_id,images_name from product_images where product_id = ?", [$nameproduct]);
        return $users;
    }

      
       public static function getProfile($id) {
            $data = DB::select('select * from users where id ="'.$id.'" ');
            return $data;
        }
      public static function getProfileInfo($id) {
            $data = DB::select('select * from profile where id ="'.$id.'" ');
            if($data){
                return $data;
            }else{
               $data = DB::select('select * from users where id ="'.$id.'" ');
               return $data;
            }
           
        }
        public static function getuserwallets($id) {
            $data = DB::select('select * from users_wallets where users_id ="'.$id.'" ');
            return $data;
        }
        public static function getuserwalletsadd($id) {
            $data = DB::select('select * from users_wallets where wallets_add_statues= 1 and users_id ="'.$id.'" ');
            return $data;
        }      
        
        public static function getCatName($cat_slug){
           
            if($cat_slug == "allcategories"){
                $cat_nm = DB::select('select category_name,url from category  where status= 1 ');
           // return $cat_nm;
            }
            else{
                $cat_nm = DB::select('select category_name,url from category  where status= 1 and url = ?', [$cat_slug]);
           // return $cat_nm;
            }
             return $cat_nm;
            
        }
        
        public static function getUserAddress($user_id){
            $address = DB::select('select * from users_address where user_id =?', [$user_id]);
            return $address;
        }
        
        public static function getUserAddressID($add_id){
            $address = DB::select('select * from users_address where id =?', [$add_id]);
            return $address;
        }
               public static function getlayoutimagedetails($nameproduct) {
        $users = DB::select("select id,background_image from add_layout where id = ?", [$nameproduct]);
        return $users;
    }
        public static function getlayoutdetails() {
           
        //$users = DB::select("select class_name,background_image,background_color from add_layout where id = ?", [$nameproduct]);
$users = DB::select("select id,status,class_name,background_image,background_color from add_layout where status = 1");
            return $users;
    }
       public static function getlayoutinfo() {
       
$users = DB::select("select id,status,class_name,background_image,background_color from add_layout");
            return $users;
    }

    public static function get_subcat_by_parent_cat_id($category_id) {        
        $sub_category = DB::table('category')->where('category_parent_id', $category_id)->where('status', 1)->pluck('category_id', 'category_name');
        return $sub_category;
    }

    public static function get_products_by_categories($category_id) {        
        $sub_category = DB::table('category')->where('category_parent_id', $category_id)->where('status', 1)->pluck('category_id', 'category_name');
        return $sub_category;
    }




}
