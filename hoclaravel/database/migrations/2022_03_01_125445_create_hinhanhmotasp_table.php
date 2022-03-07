<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHinhanhmotaspTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanhmotasp', function (Blueprint $table) {
          $table->increments('id_anhmt');
          $table->integer('id_sp')->unsigned();
          $table->foreign('id_sp')->references('id_sp')->on('sanpham');
          $table->string('duongdan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanhmotasp');
    }
}
