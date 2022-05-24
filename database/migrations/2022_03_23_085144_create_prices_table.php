<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
        });

        DB::statement('INSERT INTO `prices` ( `url`, `value`) VALUES
                            ( \'do-1500\', \'До 1500 руб.\'),
                            ( \'ot-1500-do-2000\', \'От 1500 до 2000 руб.\'),
                            ( \'ot-2000-do-3000\', \'От 2000 до 3000 руб.\'),
                            ( \'ot-3000-do-6000\', \'От 3000 до 6000 руб.\'),
                            ( \'do-3000\', \'до 3000\'),
                            ( \'ot-6000\', \'От 6000 руб.\');');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
