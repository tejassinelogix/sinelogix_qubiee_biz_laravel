<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;
class product_details extends Model {
     protected $table = 'product_details';
      public $timestamps = false;
      protected $primaryKey = 'product_id';

      protected $casts = [
    'product_name' => 'array',
    'product_description' => 'array',
    'short_description' => 'array',
    'meta_title' => 'array',
    'meta_description' => 'array',
    'meta_keyword' => 'array',
    ];
       
       
       
}