<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard ='admin';

      public function roles()
    {
        return $this->belongsToMany('App\Models\admin\role');
    }
     public function order_product()
    {
        // return $this->hasMany('App\order_product');
         
    }
    public function getNameAttribute($value)
           {
               return ucfirst($value);
           }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','status','verified','job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new AdminResetPasswordNotification($token));
    }
    public function Review(){
        return $this->hasMany('App\Review');
    }
     public function verifyAdminUser()
    {
        return $this->hasOne('App\VerifyAdminUser');
    }
    public function rate_admins()
    {
        return $this->hasOne('App\rate_admins');
    }
}
