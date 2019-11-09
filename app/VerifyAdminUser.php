<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerifyAdminUser extends Model
{
   protected $guarded = [];

      public function admin()
    {
       return $this->belongsTo('App\Admin','id');

    }
}
