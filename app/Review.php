<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = ['product_id','role_id','hedline', 'user_id', 'rating', 'comment'];

    public function product()
    {
        return $this->belongsTo('App\Models\user\product');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
       // return $this->belongsTo(User::class);
    }
    
        public function admins()
    {
      
       return $this->belongsTo('App\Admin','role_id');

    }
    
}
