<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengirimanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengiriman', function (Blueprint $table) {
            $table->increments('id_pengiriman');
            $table->string('no_resi')->comment('Nomer Resi Pengiriman');
            $table->enum('pengiriman', ['POS','JNE','JNT']);
            $table->integer('alamat')->comment('Alamat Users')->unsigned();
            $table->dateTime('tgl_pengiriman');

            $table->foreign('alamat')->references('id_alamat')->on('alamat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengiriman');
    }
}
