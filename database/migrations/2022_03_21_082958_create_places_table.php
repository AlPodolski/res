<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('value');
            $table->string('url');
        });

        $sql = "INSERT INTO `places` (`value`, `url`) VALUES
                ('Апартаменты', 'appartamentu'),
                ('На выезд', 'viezd'),
                ('В машине', 'v-mashine'),
                ('В сауне', 'v-sayne'),
                ('На дому', 'na-domu'),
                ('В клубе', 'v-klube'),
                ('По вызову', 'po-vizovu'),
                ('На дорогах', 'na-doroge');";

        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
