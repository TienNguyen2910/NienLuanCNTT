<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiohangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giohang', function (Blueprint $table) {
            $table->increments('id_gh');
            
            $table->integer('id_sp')->unsigned();
            $table->foreign('id_sp')->references('id_sp')->on('sanpham');
    
            $table->integer('soluong');

            $table->integer('id_kh')->unsigned();
            $table->foreign('id_kh')->references('id_kh')->on('khachhang');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('giohang');
    }
}
