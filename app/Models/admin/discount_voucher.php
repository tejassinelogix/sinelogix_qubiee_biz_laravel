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

}
