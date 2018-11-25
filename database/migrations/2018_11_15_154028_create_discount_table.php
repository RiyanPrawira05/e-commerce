<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount', function (Blueprint $table) {
            $table->increments('id_discount');
            $table->string('kode', 20)->comment('Kode Diskon');
            $table->string('potongan')->comment('ex: 10%');
            $table->integer('users')->unsigned();
            $table->integer('product')->unsigned();
            $table->dateTime('open_discount')->comment('Dimulainya Diskon');
            $table->dateTime('expired_discount')->comment('Berakhirnya Diskon');
            $table->timestamp('created_at')->nullable();

            $table->foreign('users')->references('id_users')->on('users');
            $table->foreign('product')->references('id_product')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('discount');
    }
}
