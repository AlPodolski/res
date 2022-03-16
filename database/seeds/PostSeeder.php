<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $postsData = array();

        $i = 0;

        $price = array(1000, 1500, 2000, 3000, 5000, 10000);

        while ($i <= 100){

            $postsData[] = [
                'user_id' => rand(1,3),
                'name' => $name = $faker->name,
                'url' => Str::slug($name.'-'.rand(1, 1000)),
                'phone' => $faker->phoneNumber,
                'price' => $price[array_rand($price)],
                'publication_status' => rand(0,1),
                'rost' => rand(150,180),
                'ves' => rand(50,80),
                'tarif_id' => rand(1,3),
                'about' => $faker->realText(500),
                'breast_size' => rand(1,4),
            ];

            $i++;

        }

        DB::table('posts')->insert($postsData);
    }
}
