<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class skills extends Seeder
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
            ];
            \App\Models\skill::create($array);
        }
    }
}
