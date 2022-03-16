<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $i = 0;

        $data = array();

        while ($i < 3){

            $data[] = [
                'name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'password' => Hash::make('password'),
            ];

            $i++;

        }

        DB::table('users')->insert($data);
    }
}
