<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 1; $i <= 10; $i++) {
            $array = [
              'name' => $faker->name,
              'meta_keywords' => $faker->word,
              'meta_des' => $faker->word,
            ];
            \App\Models\category::create($array);
        }
    }
}
