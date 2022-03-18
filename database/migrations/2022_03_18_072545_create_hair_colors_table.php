<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hair_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
        });

        $sql = "INSERT INTO `hair_colors` (`url`, `value`) VALUES
                ('blondinka', 'Блондинка'),
                ('brunetka', 'Брюнетка'),
                ('rysaya', 'Русая'),
                ('rijaya', 'Рыжая'),
                ('shatenka', 'Шатенка');";

        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hair_colors');
    }
}
