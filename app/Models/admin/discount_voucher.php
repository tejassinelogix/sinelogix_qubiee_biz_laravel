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

}
