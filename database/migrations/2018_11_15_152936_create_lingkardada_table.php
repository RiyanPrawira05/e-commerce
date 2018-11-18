<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLingkardadaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lingkardada', function (Blueprint $table) {
            $table->increments('id_lingkar_dada');
            $table->string('ukuran', 100);
            $table->integer('product')->unsigned();
            $table->timestamp('created_at')->nullable();

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
        Schema::dropIfExists('lingkardada');
    }
}
