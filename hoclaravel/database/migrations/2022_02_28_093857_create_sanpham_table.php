<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id_sp');
            $table->string('ten_sp',100);
            $table->integer('dongiagoc_sp');
            $table->integer('dongia_sp');
            $table->integer('soluong_sp');
            $table->string('hinhanh_sp');
            $table->text('mota_sp')->nullable();
            $table->integer('id_th')->unsigned();
        });

        Schema::table('sanpham',function($table){
            $table->foreign('id_th')->references('id_th')->on('thuonghieu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sanpham');
    }
}
