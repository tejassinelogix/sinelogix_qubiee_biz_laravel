<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('products', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('imagepath');
        //     $table->string('title');
        //     $table->text('description');
        //     $table->integer('price');
        //     $table->timestamps();

        // });

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->json('product_name');
            $table->integer('product_price');
            $table->integer('original_price');
            $table->json('product_description');
            $table->text('short_description');
            $table->string('url');
            $table->integer('main_category');
            $table->integer('sub_category');
            $table->string('offer');
            $table->string('country');
            $table->string('section');
            $table->json('meta_title');
            $table->json('meta_description');
            $table->json('meta_keyword');
            $table->string('product_image');
            $table->string('product_ref_number');
            $table->string('status');
            $table->string('role_id');
            $table->string('discount');
            $table->string('feature');
            $table->string('details');
            $table->string('support');
            $table->string('vendor_details');
            $table->integer('voucher_id');
            $table->string('return_policy');
            $table->dateTime('createdOn');
            $table->dateTime('updatedOn');
            $table->dateTime('offer_start_date');
            $table->dateTime('offer_expire_date');
            $table->timestamps();

        });

      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
