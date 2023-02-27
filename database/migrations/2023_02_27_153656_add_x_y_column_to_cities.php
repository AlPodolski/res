<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddXYColumnToCities extends Migration
{
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->string('x')->nullable();
            $table->string('y')->nullable();
        });
    }

    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropColumn('y');
            $table->dropColumn('x');
        });
    }
}
