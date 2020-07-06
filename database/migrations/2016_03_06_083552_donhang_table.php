<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DonhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('donhang_nguoi_nhan',100);
            $table->string('donhang_nguoi_nhan_email',100);
            $table->string('donhang_nguoi_nhan_sdt', 20);
            $table->text('donhang_nguoi_nhan_dia_chi');
            $table->text('donhang_ghi_chu');
            $table->decimal('donhang_tong_tien_truoc_thue',10,2);
            $table->decimal('donhang_tax',10,2);
            $table->decimal('donhang_tong_tien',10,2);
            $table->integer('user_id')->unsigned();
            $table->integer('tinhtrangdonhang_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('tinhtrangdonhang_id')->references('id')->on('tinhtrangdonhang')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
