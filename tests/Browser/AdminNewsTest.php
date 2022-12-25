<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddNewsTitle()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->type('title', '1')
                ->press('Добавить');
            });
    }

    public function testFormAddNewsText()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->type('text', '')
                ->press('Добавить')
                ->assertSee('Поле Текст новости обязательно для заполнения.');

        });
    }
}
