<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_times', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('param_id')->unsigned();
            $table->integer('posts_id')->unsigned();
            $table->smallInteger('city_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_times');
    }
}
