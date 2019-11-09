<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->text('cart');
            $table->text('address');
            $table->string('name');
            $table->string('email');
            $table->string('contact');
            $table->string('postal_code');
            $table->string('city');
            $table->string('payment_id');
            $table->string('payment_status');
            $table->string('transaction_id');
            $table->string('payment_details');
            $table->string('shipping_address');
            $table->string('send_gift');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
