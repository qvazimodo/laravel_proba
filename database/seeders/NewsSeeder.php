<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i < 25; $i++) {
            $data[] = [
                'id' => $faker->unique()->numberBetween(1,25),
                'title' => $faker->realText(rand(10, 20)),
                'text' => $faker->realText(rand(100, 300)),
                'isPrivate' => $faker->boolean,
                'category_id' => $faker->numberBetween(1,2),
                'news_source_id' => $faker->numberBetween(1,25),
                'created_at' => $faker->date(),
                'updated_at' => $faker->date(),
            ];
        }
        return $data;
    }
}
