<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [
                'name' => 'Спорт',
                'slug' => 'sport'
            ],
            [
                'name' => 'Политика',
                'slug' => 'politics'
            ],
        ];
        DB::table('categories')->insert($category);
    }
}
