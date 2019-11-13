<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class discount_voucher extends Model
{
    public function get_discount_voucher()
    {
    	// return $this->belongsToMany('App\Models\admin\Permission');
    }
    public function getDiscountVoucher()
    {
    	$discount_voucher  = DB::select("select * from discount_voucher");
    	return $discount_voucher;
    }
}
