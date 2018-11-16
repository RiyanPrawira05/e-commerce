<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('id_product');
            $table->string('product', 100);
            $table->string('foto', 50);
            $table->integer('category')->comment('Kategori Baju, ex: Mens, Womens, Celana, dll');
            $table->integer('jenis')->comment('Jenis, ex: Jeans, Chino, dll');
            $table->string('harga');
            $table->string('size', 200);
            $table->text('deskripsi');
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
        Schema::dropIfExists('product');
    }
}
