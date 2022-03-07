<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotaspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motasp', function (Blueprint $table) {
            $table->increments('id_mt');
            $table->integer('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id_sp')->on('sanpham');
            $table->string('thanhphan_mt');
            $table->string('khoiluong_mt');
            $table->string('hdsd_mt');
            $table->string('hansd_mt');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motasp');
    }
}
