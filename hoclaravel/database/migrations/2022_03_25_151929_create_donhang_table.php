<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id_dh');
            $table->integer('id_kh')->unsigned();
            $table->foreign('id_kh')->references('id_kh')->on('khachhang');
            $table->dateTimetz('ngaydat_dh');
            $table->string('noigiao_dh');
            $table->integer('trangthai_dh');
            $table->integer('huy_dh');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donhang');
    }
}
