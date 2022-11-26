<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MyTestNews extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_news()
    {
        $response = $this->get('/news');

        $response->assertStatus(200);
        $response->assertSeeText('Портал новостей');
    }
    public function test_one_news()
    {
        $response = $this->get('/news/one/1');

        $response->assertStatus(200);
        $response->assertSeeText('Новость 1');
    }

    public function test_empty_news()
    {
        $response = $this->get('/news/one/y');

        $response->assertStatus(200);
        $response->assertSeeText('Нет такой новости');
    }
}
