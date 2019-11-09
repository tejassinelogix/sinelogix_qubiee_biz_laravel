<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranstionsAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transtions_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('paidamount')->nullable();
            $table->integer('amountreq')->nullable();
            $table->integer('amountreqmark')->nullable();
            $table->integer('debitamount')->nullable();
            $table->string('requestnumber')->nullable();
            $table->string('creditrequestnumber')->nullable();
            $table->integer('status')->default(1);
            $table->integer('readmark')->default(0);
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
        Schema::dropIfExists('transtions_admins');
    }
}
