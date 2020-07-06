<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ThongkeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thongke', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->integer('thongke_so_luong_nhap');
            $table->integer('thongke_so_luong_da_ban');
            $table->integer('thongke_so_luong_hien_tai');
            $table->foreign('sanpham_id')->references('id')->on('sanpham')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('thongke');
    }
}
