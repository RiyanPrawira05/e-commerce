<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_user', function (Blueprint $table) {
            $table->integer('discount')->unsigned();
            $table->integer('user')->unsigned();

            $table->foreign('discount')->references('id_discount')->on('discount');
            $table->foreign('user')->references('id_users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount_user');
    }
}
