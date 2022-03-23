<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
        });

        DB::statement('INSERT INTO `ages` ( `url`, `value`) VALUES
                            ( \'18-20\', \'От 18 до 20 лет\'),
                            ( \'21-25\', \'От 21 до 25 лет\'),
                            ( \'26-30\', \'От 26 до 30 лет\'),
                            ( \'31-35\', \'От 31 до 35 лет\'),
                            ( \'36-40\', \'От 36 до 40 лет\'),
                            ( \'40-50\', \'От 40 до 50 лет\'),
                            ( \'50-75\', \'От 50 до 75 лет\');');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ages');
    }
}
