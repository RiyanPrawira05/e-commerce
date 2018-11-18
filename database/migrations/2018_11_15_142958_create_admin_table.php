<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id_admin');
            $table->string('name',100);
            $table->text('email')->nullable();
            $table->integer('jabatan')->unsigned();
            $table->text('alamat')->nullable();
            $table->timestamps();

            $table->foreign('jabatan')->references('id_jabatan')->on('jabatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
}
