<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostIntimHairsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_intim_hairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('posts_id')->unsigned();
            $table->smallInteger('intim_hair_id')->unsigned();
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
        Schema::dropIfExists('post_intim_hairs');
    }
}
