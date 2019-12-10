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
      } catch (\Exception $ex) {  return null; } 
    }

    public function get_voucher_by_id($voucher_id) {
     // $brands = DB::select('select * from category  where category_parent_id = ?', [0]);
      $data = self::select('*');
      $data->where("voucher_type.voucher_id", $voucher_id);
      $data = $data->get()->toArray(); 
      return $data;
    }

      public static function getvoucher_type_id($voucher_id) {
       // $brands = DB::select('select * from category  where category_parent_id = ?', [0]);
        $voucher_type_id = DB::select('select * from voucher_type where voucher_id = $voucher_id');    
        return $voucher_type_id;
}
      }
