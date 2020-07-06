<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LoaisanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaisanpham', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loaisanpham_ten', 100);
            $table->string('loaisanpham_url',100);
            $table->text('loaisanpham_mo_ta');
            $table->integer('nhom_id')->unsigned();
            $table->foreign('nhom_id')->references('id')->on('nhom')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('loaisanpham');
    }
}
