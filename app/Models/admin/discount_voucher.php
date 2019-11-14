<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use DB;

class discount_voucher extends Model
{
	 protected $fillable = ['is_auto_generated', 'voucher_name', 'voucher_type_id', 'voucher_validity','validity_start_date','validity_end_date','is_minimum_order','minimum_amount','discount_type','discount_type_amount','category_id','brand_id','product_id'];

	protected $table = 'discount_voucher';
    public $timestamps = true;
   protected $guarded = [];

    public function get_discount_voucher($inputs)
    {	
    	//dd($inputs);
    	DB::enableQueryLog();
    	dd(discount_voucher::create($inputs));
    	dd(DB::getQueryLog());
    	dd($data);
    }
}
