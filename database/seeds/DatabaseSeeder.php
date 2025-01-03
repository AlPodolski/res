<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
         $this->call(PostSeeder::class);
         $this->call(UserNationalSeed::class);
         $this->call(PostsHairColorSeed::class);
         $this->call(PostsMetroSeeder::class);
         $this->call(PostRayonSeeder::class);
         $this->call(PostIntimHairSeed::class);
         $this->call(PostTimeSeed::class);
         $this->call(PostPlaceSeeder::class);
         $this->call(PostPhotoSeeder::class);
         $this->call(AddFilterSeed::class);
         $this->call(MetaSeeder::class);
         $this->call(UserServiceSeeder::class);
         $this->call(TopPostsSeeder::class);
    }
}
