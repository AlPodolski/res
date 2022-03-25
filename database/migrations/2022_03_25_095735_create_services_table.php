<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('url');
            $table->string('value');
            $table->string('value2');
        });

        $sql = "INSERT INTO `services` (`value`, `url`, `value2`) VALUES
('Госпожа', 'gospogha', 'Госпожи'),
('Легкая доминация', 'legkaya-dominaciya', 'Легкой доминации'),
('Ролевые игры', 'rolevye-igry', 'Ролевых игр'),
('Страпон', 'strapon', 'Страпона'),
('Фистинг анальный', 'fisting-analynyy', 'анального фистинга'),
('Фистинг классический', 'fisting-klassicheskiy', 'классического фистинга'),
('Минет в машине', 'minet-v-mashine', 'Минета в машине'),
('Минет глубокий', 'minet-glubokiy', 'глубокого минета'),
('Золотой дождь', 'zolotoy-doghdy', 'Золотого дождя'),
('Копро', 'kopro', 'Копро'),
('Анилингус', 'anilingus', 'Анилингуса'),
('Куннилингус', 'kunilingus', 'Куннилингуса'),
('Стриптиз', 'striptiz', 'Стриптиза'),
('Боди массаж', 'bodi-massagh', 'Боди массажа'),
('Ветка сакуры', 'vetka-sakury', 'Ветки сакуры'),
('Массаж простаты', 'massagh-prostaty', 'Массажа простаты'),
('Урологический массаж', 'urologicheskiy', 'Урологического массажа'),
('Эротический массаж', 'eroticheskiy', 'Эротического массажа'),
('Секс классический', 'klasijeskiy', 'классического секса'),
('Анальный секс', 'analnyj-seks', 'Анального секса'),
('Минет в презервативе', 'minet-v-prezervative', 'Минета в презервативе'),
('Минет без резинки', 'minet-bez-rezinki', 'Минета без резинки'),
('Окончание на грудь', 'okonchanie-na-grud', 'Окончания на грудь'),
('Окончание на лицо', 'okonchanie-na-lico', 'Окончания на лицо'),
('Окончание в рот', 'okonchanie-v-rot', 'Окончания в рот'),
('Лесби-шоу', 'lesbi-shou', 'Лесби-шоу'),
('Бандаж', 'bandazh', 'Бандажа'),
('Рабыня', 'rabynya', 'Рабыни'),
('Эскорт', 'eskort', 'Эскорта'),
('БДСМ', 'bdsm', 'БДСМа'),
('Cекс по телефону', 'ceks-po-telefonu', 'Cекса по телефону'),
('Виртуальный секс', 'virtualynyy-seks', 'Виртуального секса'),
('Игрушки', 'igrushki', 'Игрушки'),
('Клизма', 'klizma', 'Клизма'),
('Легкое подчинение', 'legkoe-podchinenie', 'Легкого подчинения'),
('Лесби откровенное', 'lesbi-otkrovennoe', 'Лесби откровенного'),
('Порка', 'porka', 'Порки'),
('Профессиональный массаж', 'professionalynyy', 'Профессионального массажа'),
('Расслабляющий массаж', 'rasslablyayuschiy', 'Расслабляющего массажа'),
('Секс групповой', 'seks-gruppovoy', 'Секса группового'),
('Секс лесбийский', 'seks-lesbiyskiy', 'Секса лесбийского'),
('Стриптиз профи', 'striptiz-profi', 'Стриптиза профи'),
('Трамплинг', 'trampling', 'Трамплинга'),
('Услуги семейной паре', 'uslugi-semeynoy-pare', 'Услуг семейной паре'),
('Фетиш', 'fetish', 'Фетиша'),
('Фингеринг', 'fingering', 'Фингеринга'),
('Фото/видео съемка', 'foto-video-syemka', 'Фото/видео съемки'),
('Целуюсь', 'celuyusy', 'Целуюсь'),
('экспресс', 'ehkspress', 'экспресса');";

        DB::statement($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
