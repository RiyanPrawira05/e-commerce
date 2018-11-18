<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('id_stock');
            $table->string('stock', 100);
             $table->integer('product')->unsigned();
            $table->integer('category')->unsigned();
            $table->timestamp('created_at')->nullable();

            $table->foreign('product')->references('id_product')->on('product');
            $table->foreign('category')->references('id_category')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
}
