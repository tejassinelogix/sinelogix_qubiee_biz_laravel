<?php


namespace App\Models\user;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $casts = [
    'product_name' => 'array',
    'product_description' => 'array',
    'short_description' => 'array',
    'meta_title' => 'array',
    'meta_description' => 'array',
    'meta_keyword' => 'array',
    ];
    public function tags()
    {
    	return $this->belongsToMany('App\Models\user\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Models\user\category','category_posts')->withTimestamps();;
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Models\user\like');
    }

    // public function getSlugAttribute($value)
    // {
    //     return route('product',$value);
    // }
   public function admins()
    {
      
       return $this->belongsTo('App\Admin','role_id');

    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
