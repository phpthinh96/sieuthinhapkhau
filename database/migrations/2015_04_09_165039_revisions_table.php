<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
class RevisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisions', function ($table) {
            $table->increments('id');
            $table->string('revisionable_type',200);
            $table->integer('revisionable_id');
            $table->integer('user_id')->nullable();
            $table->string('key',200);
            $table->mediumText('old_value')->nullable();
            $table->mediumText('new_value')->nullable();
            $table->timestamps();

            $table->index(array('revisionable_id', 'revisionable_type'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisions');
    }
}
