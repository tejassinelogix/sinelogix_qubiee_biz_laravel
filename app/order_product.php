<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
      protected $fillable = ['product_id','order_id', 'role_id', 'product_price', 'original_price','offer_id','product_ref_number','status','movingfees'];

        public function admins()
    {
      
       return $this->belongsTo('App\Admin','role_id');

    }
     public function product()
    {
        return $this->belongsTo('App\Models\user\product');
    }
      
}
