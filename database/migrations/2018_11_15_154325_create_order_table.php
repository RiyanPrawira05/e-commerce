<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->dateTime('tgl_order');
            $table->integer('users')->unsigned();
            $table->integer('alamat')->unsigned();
            $table->integer('product')->unsigned();
            $table->integer('discount')->unsigned();
            $table->string('berat', 100);
            $table->integer('pengiriman')->unsigned();
            $table->integer('status')->unsigned();
            $table->string('total_pembayaran');
            $table->timestamp('created_at')->nullable();

            $table->foreign('users')->references('id_users')->on('users');
            $table->foreign('alamat')->references('id_alamat')->on('alamat');
            $table->foreign('product')->references('id_product')->on('product');
            $table->foreign('discount')->references('id_discount')->on('discount');
            $table->foreign('pengiriman')->references('id_pengiriman')->on('pengiriman');
            $table->foreign('status')->references('id_status')->on('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
