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
}
