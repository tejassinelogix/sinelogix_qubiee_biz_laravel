<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class voucher_type extends Model
{

	protected $table = 'voucher_type'; 
    public $timestamps = true;
    protected $guarded = [];

    public function get_voucher_type()
    {	
      try {      	
    	  return voucher_type::select('*')->get()->toArray();
      } catch (\Exception $ex) {	return null; } 
    }
}
