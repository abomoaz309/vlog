<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $images = [
            '1592924211lCQONeI0iq.jpg',
            '1592924233gyzt7hCg5z.jpg'
        ];

        $youtube = [
            'https://www.youtube.com/watch?v=tI8ijLpZaHk',
            'https://www.youtube.com/watch?v=dxPhJ0wfp0g',
            'https://www.youtube.com/watch?v=GLSPub4ydiM'
        ];

        $id = [1,2,3,4,5,6,7,8,9,10];

        for($i = 1; $i <= 10; $i++) {
            $array = [
                'name' => $faker->name,
                'des' => $faker->word,
                'meta_keywords' => $faker->word,
                'meta_des' => $faker->word,
                'youtube_link' => $youtube[rand(0,2)],
                'image' => $images[rand(0,1)],
                'published' => rand(0,1),
                'user_id' => 1,
                'category_id' => rand(0,9)
            ];
            $video = \App\Models\video::create($array);
            $video->skills()->sync(array_rand($id, 2));
            $video->tags()->sync(array_rand($id, 2));
        }
    }
}
