<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostMetrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_metros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('metros_id')->unsigned();
            $table->bigInteger('posts_id')->unsigned();
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
        Schema::dropIfExists('post_metros');
    }
}
