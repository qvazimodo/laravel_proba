<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTestCategory extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_all_categories()
    {
        $response = $this->get('/news/categories');

        $response->assertStatus(200);
        $response->assertSeeText('Категории новостей');
    }

    public function test_one_category()
    {
        $response = $this->get('/news/category/sport');

        $response->assertStatus(200);
        $response->assertSeeText('Новости категории Спорт');
    }

    public function test_wrong_category()
    {
        $response = $this->get('/news/category/nature');

        $response->assertStatus(200);
        $response->assertSeeText('Нет такой категории');
    }

    public function test_wrong_category_page()
    {
        $response = $this->get('/news/categories/nature');

        $response->assertStatus(404);

    }
}
