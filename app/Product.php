<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //protected $fillable = ['imagepath','title','description','price'];

//    protected $fillable = ['product_name','product_price','original_price','product_description','short_description','url','main_category','sub_category','offer','country','section','meta_title','meta_description','meta_keyword','product_image','product_ref_number','role_id','status','offer_start_date','offer_expire_date'];

protected $casts = [
    'product_name' => 'array',];
protected $fillable = ['product_name','product_price','original_price','product_description','short_description','url','main_category','sub_category','offer','country','section','meta_title','meta_description','meta_keyword','product_image','product_ref_number','gift_wrapping','sku','addvertise_seciton','colourcode','colourcharge','dilverycharges','deliverytime','wraping_charage','as_gift_wrap','updated_role_id','status','role_id','discount','feature','details','support','vendor_details','voucher_id','return_policy','customization','offer_start_date','offer_expire_date'];




    // $table->increments('id');
    //         $table->string('product_name');
    //         $table->integer('product_price');
    //         $table->integer('original_price');
    //         $table->text('product_description');
    //         $table->text('short_description');
    //         $table->string('url');
    //         $table->integer('main_category');
    //         $table->integer('sub_category');
    //         $table->string('offer');
    //         $table->string('country');
    //         $table->string('section');
    //         $table->string('meta_title');
    //         $table->string('meta_description');
    //         $table->string('meta_keyword');
    //         $table->string('product_image');
    //         $table->string('product_ref_number');
    //         $table->string('status');
    //         $table->dateTime('createdOn');
    //         $table->dateTime('updatedOn');
    //         $table->dateTime('offer_start_date');
    //         $table->dateTime('offer_expire_date');
    //         $table->timestamps();
}
