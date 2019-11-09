<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class verify_email_subscription extends Model
{
    protected $fillable = [
         'email_subscription_id','token',
    ];

    public function email_subscription()
    {
        return $this->belongsTo('App\email_subscription', 'email_subscription_id');
    }
}
