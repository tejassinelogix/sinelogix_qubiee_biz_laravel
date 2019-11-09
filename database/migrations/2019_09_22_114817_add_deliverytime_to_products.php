<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeliverytimeToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
          $table->integer('gift_wrapping')->after('status')->default('0');
          $table->string('as_gift_wrap')->after('gift_wrapping')->default('0');
          $table->string('wraping_charage')->after('gift_wrapping')->nullable();
          $table->string('deliverytime')->after('gift_wrapping');
          $table->string('dilverycharges')->after('gift_wrapping')->nullable();
          $table->string('colourcharge')->after('gift_wrapping')->nullable();
    	  $table->string('colourcode')->after('gift_wrapping')->nullable();
    	  $table->string('country')->after('offer')->nullable()->nullable();
          $table->string('addvertise_seciton')->after('gift_wrapping')->default('0');
          $table->string('sku')->after('gift_wrapping')->nullable();
          $table->string('updated_role_id')->after('role_id')->nullable();
          $table->integer('custmization')->after('gift_wrapping')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
           $table->dropColumn('gift_wrapping');
           $table->dropColumn('as_gift_wrap');
           $table->dropColumn('wraping_charage');
           $table->dropColumn('deliverytime');
           $table->dropColumn('dilverycharges');
           $table->dropColumn('colourcharge');
		   $table->dropColumn('colourcode');
		   $table->dropColumn('country');
           $table->dropColumn('addvertise_seciton');
           $table->dropColumn('sku');
           $table->dropColumn('updated_role_id');
           $table->dropColumn('custmization');
        });
    }
}
