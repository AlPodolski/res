<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('place_id')->unsigned();
            $table->integer('post_id')->unsigned();
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
        Schema::dropIfExists('post_places');
    }
}
