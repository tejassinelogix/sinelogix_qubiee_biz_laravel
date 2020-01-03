<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmailidToUsersAddress extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_address', function (Blueprint $table) {
            $table->integer('gift_reciver_mark')->after('name')->default(0);
            $table->string('giftevent')->after('name')->nullable();
            $table->integer('orders_id')->after('name')->default(0);
            $table->string('email')->after('name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_address', function (Blueprint $table) {
            $table->dropColumn('gift_reciver_mark');
            $table->dropColumn('giftevent');
            $table->dropColumn('orders_id');
            $table->dropColumn('email');
        });
    }
}
