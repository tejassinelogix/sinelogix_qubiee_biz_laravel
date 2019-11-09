<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    public function permissions()
    {
    	return $this->belongsToMany('App\Models\admin\Permission');
    }
}
