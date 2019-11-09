<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanneraddsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banneradds', function (Blueprint $table) {
            $table->increments('id');
            $table->json('name')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('section')->nullable();
            $table->string('role_id')->nullable();
            $table->string('status')->default('0');
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
        Schema::dropIfExists('banneradds');
    }
}
