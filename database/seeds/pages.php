<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class pages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 4; $i++) {
            $array = [
                'name' => $faker->name,
                'des' => $faker->paragraph,
                'meta_keywords' => $faker->word,
                'meta_des' => $faker->word,
            ];
            \App\Models\page::create($array);
        }
    }
}
