<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class admin extends Authenticatable
{
   use Notifiable;
    public function roles()
    {
        return $this->belongsToMany('App\Models\admin\role');
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
        'name', 'email', 'password','verified','job_title','status','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function rate_admins()
    {
        return $this->hasOne('App\rate_admins');
    }
//     public function transtions_admins()
//    {
//        return $this->hasOne('App\transtions_admins');
//    }
}
