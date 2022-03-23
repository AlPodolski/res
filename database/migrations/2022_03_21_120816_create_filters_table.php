<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filter_url')->unique();
            $table->string('related_class')->nullable();
            $table->string('related_param')->nullable();
            $table->string('search_param')->nullable();
            $table->integer('related_id')->nullable();
            $table->string('parent_class');
            $table->smallInteger('city_id')->unsigned()->nullable();
            $table->string('type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filters');
    }
}
