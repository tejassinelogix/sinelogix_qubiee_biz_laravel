<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_admins', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('admin_id');
            $table->integer('rate')->nullable();
            $table->integer('lesshundred');
            $table->integer('greterhundred');
            $table->string('locationname')->nullable();
            $table->integer('status')->default(1);
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
        Schema::dropIfExists('rate_admins');
    }
}
