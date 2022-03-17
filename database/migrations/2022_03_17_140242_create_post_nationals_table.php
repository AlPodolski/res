<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostNationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_nationals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('post_nationals_id');
            $table->bigInteger('nationals_id');
            $table->bigInteger('citys_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_nationals');
    }
}
