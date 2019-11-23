<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class Discount_Voucher extends Model
{
    protected $table = 'discount_voucher';
    protected $primaryKey = 'discount_id';
    public $timestamps = false;
    protected $guarded = [];

    public function get_discount_voucher($inputs)
    {   

        $result = [];
        try{            
            // DB::enableQueryLog();
            $data = Discount_Voucher::create($inputs);           
            // dd(DB::getQueryLog(),$inputs,'test');
            if($data)
                $result = $data->toArray();
            return $result; 
        }catch(\Exception $e){
            return $result;
        }
    }

    public function getDiscountVoucher_id($discount_id){
        $discounts = DB::select("select * from discount_voucher Where discount_id = $discount_id");
        return $discounts;
    }

     public function getDiscountVoucher_del($discount_id){
       $discounts2 = DB::table('discount_voucher')->where('discount_id', $discount_id)->delete();
       return $discounts2;
    }

    public function update_discounts($discount_id, $discount_data){
      
      $discounts1 = DB::table('discount_voucher')->where('discount_id', $discount_id)->update($discount_data);
      return $discounts1;
     
    }

      public function getDiscount_with_vouchers()
    {
    $discounts = DB::table('discount_voucher')
    ->selectRaw('discount_voucher.discount_id as discount_id,discount_voucher.voucher_type_id as main_voucher_type_id,discount_voucher.voucher_name as main_voucher_name,discount_voucher.validity_end_date as validity_end_date,voucher_type.voucher_id as sub_voucher_id,voucher_type.voucher_name as sub_voucher_name')
    ->join('voucher_type', 'voucher_type.voucher_id', '=', 'discount_voucher.voucher_type_id')    
    ->get();

    return $discounts;
}

 public function get_voucher_by_name($voucher_name)
    {
        try {
            // DB::enableQueryLog();
            $data = Discount_Voucher::select('*')
                ->where('voucher_name', 'LIKE', $voucher_name)->get();
          // dd($data,'query',$voucher_name);
           // dd(DB::getQueryLog(),$voucher_name,'test',$data);
            if (!empty($data)) {
                $data = $data->toArray();
            }
            return $data;
        } catch (\Exception $ex) {return null;}
    }


      /*
    * Code   : TDS 
    * Params : date , policy no, dealer codelead status, dlrcode
    * Return : Policy details result as per params  
    */
    public function get_discount_apply_coupan($search_data = array())
    { 
        try{
            if(empty($search_data))
                throw new Exception("Search Params Empty", 401);
            $data = self::select('*');             
            if(array_key_exists('voucher_name', $search_data) 
                && !empty($search_data['voucher_name']))
                $data->where("discount_voucher.voucher_name", $search_data['voucher_name']);
            if(array_key_exists('category_id', $search_data) 
                && !empty($search_data['category_id']))
                $data->where("discount_voucher.category_id", $search_data['category_id']);
            if(array_key_exists('brand_id', $search_data) 
                && !empty($search_data['brand_id']))
                $data->where("discount_voucher.brand_id",$search_data['brand_id']);
            if(array_key_exists('product_id', $search_data) 
                && !empty($search_data['product_id']))
                $data->where("discount_voucher.product_id",$search_data['product_id']);
            $data = $data->get();
            if(count($data) > 0){ // success
                $res['status'] = true;
                $res['message'] = "Discount get successfully..!";
                $res['data'] = $data->toArray();   
            }else{ // error                
                $res['status'] = false;
                $res['message'] = "Coupan code not valid for this product!";
            }                          
            return $res;
        } catch (Exception $ex) {                
               $res['status'] = false;
               $res['message'] = "Discount not empty!";
              return $res;
        }
    }

    public function update_coupon_onetime($coupon_name, $updateArray) {
            return self::where('voucher_name', $coupon_name)->update($updateArray);
    }
}
