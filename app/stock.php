<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    protected $fillable = ['product_id','role_id','repeat_cnt','original_qty','remained_qty'];
}
