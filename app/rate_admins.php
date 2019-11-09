<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rate_admins extends Model
{
   protected $fillable = ['id','admin_id', 'rate', 'lesshundred','greterhundred','locationname', 'status','created_at'];

     public function admin()
    {
       return $this->belongsTo('App\Models\admin\admin','admin_id');

    }
}
