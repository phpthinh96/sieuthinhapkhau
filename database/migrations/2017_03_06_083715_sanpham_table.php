<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sanpham_ten',100);
            $table->string('sanpham_url',100);
            $table->string('sanpham_anh',100);
            $table->text('sanpham_mo_ta');
            $table->decimal('sanpham_gia',10,2);
            $table->decimal('sanpham_gia_khuyen_mai',10,2);
            $table->integer('sanpham_noi_bat');
            $table->integer('loaisanpham_id')->unsigned();
            $table->integer('donvitinh_id')->unsigned();
            $table->integer('nhacungcap_id')->unsigned();
            $table->foreign('loaisanpham_id')->references('id')->on('loaisanpham')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('donvitinh_id')->references('id')->on('donvitinh')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nhacungcap_id')->references('id')->on('nhacungcap')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham');
    }
}
