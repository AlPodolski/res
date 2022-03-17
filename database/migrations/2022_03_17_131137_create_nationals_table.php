<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNationalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nationals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
            $table->string('value2');
        });

        $sql = "INSERT INTO `nationals` (`url`, `value`, `value2`) VALUES
                ( 'uzbechka', 'Узбечка', 'Узбечки'),
                ( 'aziatka', 'Азиатка', 'Азиатки'),
                ( 'armyanka', 'Армянка', 'Армянки'),
                ( 'mylatka', 'Мулатка', 'Мулатки'),
                ( 'negrityanka', 'Негритянка', 'Негритянки'),
                ( 'russkaya', 'Русская', 'Русские'),
                ( 'tadjichka', 'Таджичка', 'Таджички'),
                ( 'taika', 'Тайка', 'Тайки'),
                ( 'ukrainka', 'Украинка', 'Украинки'),
                ( 'kitayanka', 'Китаянка', 'Китаянки'),
                ( 'amerikanka', 'Американка', 'Американки'),
                ( 'arabka', 'Арабка', 'Арабки'),
                ( 'vetnamka', 'Вьетнамка', 'Вьетнамки'),
                ( 'cheshka', 'Чешка', 'Чешки'),
                ( 'yaponka', 'Японка', 'Японки'),
                ( 'ujgurka', 'Уйгурка', 'Уйгурки'),
                ( 'tatarka', 'Татарка', 'Татарки'),
                ( 'koreyanka', 'Кореянка', 'Кореянки'),
                ( 'kirgizka', 'Киргизка', 'Киргизки'),
                ( 'kalmychka', 'Калмычка', 'Калмычки'),
                ( 'kazashka', 'Казашка', 'Казашки'),
                ( 'evrejka', 'Еврейка', 'Еврейки'),
                ( 'beloruska', 'Белоруска', 'Белоруски'),
                ( 'azerbajdzhanka', 'Азербайджанка', 'Азербайджанки'),
                ( 'adygejka', 'Адыгейка', 'Адыгейки'),
                ( 'abhazka', 'Абхазка', 'Абхазки');";

        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nationals');
    }
}
