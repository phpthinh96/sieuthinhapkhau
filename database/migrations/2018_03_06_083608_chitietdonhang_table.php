<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChitietdonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietdonhang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sanpham_id')->unsigned();
            $table->integer('donhang_id')->unsigned();
            $table->decimal('chitietdonhang_don_gia',10,2);
            $table->integer('chitietdonhang_so_luong');
            $table->decimal('chitietdonhang_thanh_tien',10,2);
            $table->foreign('sanpham_id')->references('id')->on('sanpham')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('donhang_id')->references('id')->on('donhang')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('chitietdonhang');
    }
}
