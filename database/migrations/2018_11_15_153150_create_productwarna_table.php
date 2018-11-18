<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductwarnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_warna', function (Blueprint $table) {
            $table->increments('id_product_warna');
            $table->integer('product')->unsigned();
            $table->integer('warna')->unsigned();
            $table->timestamp('created_at')->nullable();

            $table->foreign('product')->references('id_product')->on('product');
            $table->foreign('warna')->references('id_warna')->on('warna');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_warna');
    }
}
