<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class comments extends Seeder
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
                'user_id' => 1,
                'video_id' => rand(0,9),
                'comment' => $faker->paragraph
            ];
            \App\Models\comment::create($array);
        }
    }
}
