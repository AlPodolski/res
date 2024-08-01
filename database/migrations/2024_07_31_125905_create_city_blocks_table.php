<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityBlocksTable extends Migration
{
    public function up(): void
    {
        Schema::create('city_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('city_id');
            $table->string('old_city');
            $table->string('new_city');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('city_blocks');
    }
}
