<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transtions_admins extends Model
{
    protected $fillable = ['id','admin_id', 'paidamount','amountreq','requestnumber','amountreqmark', 'status','readmark'];

//     public function admin()
//    {
//       return $this->belongsTo('App\Models\admin\admin','admin_id');
//
//    }
}
