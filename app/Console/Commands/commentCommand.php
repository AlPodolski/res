<?php

namespace App\Console\Commands;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Review;
use Illuminate\Console\Command;
use League\Csv\Reader;
use League\Csv\Statement;

class commentCommand extends Command
{
    protected $signature = 'comment';

    protected $description = 'Command description';

    public function handle(): void
    {
        $stream = \fopen(storage_path('comments_20_02_2025.csv'), 'r');

        $csv = Reader::createFromStream($stream);
        $csv->setDelimiter(';');
        $csv->setHeaderOffset(0);
        //build a statement
        $stmt = (new Statement());

        $records = $stmt->process($csv);

        foreach ($records as $record) {

            $comments[] = $record['text'];

        }

        $posts = Post::where('fake', Post::POST_FAKE)->get();

        $names = [
            // Славянские имена (60 штук)
            "Александр", "Дмитрий", "Иван", "Сергей", "Владимир", "Андрей", "Николай", "Михаил", "Павел", "Егор",
            "Виктор", "Олег", "Артём", "Константин", "Максим", "Василий", "Григорий", "Роман", "Фёдор", "Юрий",
            "Алексей", "Степан", "Борис", "Тимофей", "Ярослав", "Даниил", "Станислав", "Евгений", "Пётр", "Глеб",
            "Кирилл", "Вячеслав", "Анатолий", "Аркадий", "Игнат", "Виталий", "Леонид", "Захар", "Матвей", "Вадим",
            "Игорь", "Антон", "Ростислав", "Семён", "Елисей", "Святослав", "Денис", "Остап", "Платон", "Тарас",
            "Мирослав", "Богдан", "Родион", "Всеволод", "Велимир", "Добрыня", "Любомир", "Тихон", "Прохор", "Лавр",

            // Восточные имена (15 штук)
            "Ахмед", "Омар", "Магомед", "Рамзан", "Али", "Мурат", "Ибрагим", "Рустам", "Тимур", "Фарид",
            "Сулейман", "Шамиль", "Джамал", "Камиль", "Зуфар",

            // Логины пользователей (30 штук)
            "user123", "admin001", "test_user", "john_doe", "jane_doe", "cool_guy", "hot_chick", "random_name", "fast_typist", "lazy_boy",
            "pro_gamer", "night_owl", "early_bird", "code_master", "dev_ninja", "bug_hunter", "cyber_warrior", "data_wizard", "hackerman", "php_lover",
            "linux_fan", "win_user", "mac_addict", "coffee_junkie", "tea_lover", "pizza_fanatic", "burger_king", "icecream_dream", "music_lover", "sports_fan"
        ];

        foreach ($posts as $post) {

            if (rand(0, 1)) {

                $comment = $comments[array_rand($comments)];
                $name = $names[array_rand($names)];

                $review = new Comment();

                $review->text = $comment;
                $review->related_id = $post->id;
                $review->name = $name;
                $review->related_class = Post::class;
                $review->status = Comment::PUBLICATION_STATUS;

                $review->save();

            }

        }

    }
}
