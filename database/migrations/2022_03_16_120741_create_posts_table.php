<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('user_id')->unsigned()->nullable();
            $table->smallInteger('city_id')->unsigned();
            $table->string('name');
            $table->string('url')->nullable();
            $table->string('phone');
            $table->text('about')->nullable();
            $table->mediumInteger('price')->unsigned();
            $table->tinyInteger('tarif_id')->unsigned();
            $table->boolean('publication_status')->unsigned();
            $table->smallInteger('rost')->unsigned()->nullable();
            $table->smallInteger('ves')->unsigned()->nullable();
            $table->smallInteger('age')->unsigned()->nullable();
            $table->smallInteger('breast_size')->unsigned()->nullable();
            $table->string('old_url')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
