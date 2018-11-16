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
            $table->char('kode', 20)->comment('Kode Diskon');
            $table->string('potongan')->comment('ex: 10%');
            $table->integer('users');
            $table->integer('product');
            $table->dateTime('open_discount')->comment('Dimulainya Diskon');
            $table->dateTime('expired_discount')->comment('Berakhirnya Diskon');
            $table->timestamp('created_at')->nullable();
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
