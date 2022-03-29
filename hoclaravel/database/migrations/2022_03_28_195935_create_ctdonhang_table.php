<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctdonhang', function (Blueprint $table) {
            $table->integer('id_dh')->unsigned();
            $table->foreign('id_dh')->references('id_dh')->on('donhang');

            $table->integer('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id_sp')->on('sanpham');

            $table->integer('soluong_ct');
            $table->integer('dongia');
            $table->primary(['id_dh','id_sp']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ctdonhang');
    }
}
