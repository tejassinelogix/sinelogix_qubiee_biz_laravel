<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email_subscription extends Model
{
     protected $fillable = [
         'email', 'ref_number','status',
    ];

    public function verify_email_subscription()
{
  return $this->hasOne('App\verify_email_subscriptions');
}
}
