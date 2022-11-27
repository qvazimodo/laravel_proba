<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AdminCategoryTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testFormAddCategoryName()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('name', '')
                ->press('Добавить')
                ->assertSee('Поле Название категории обязательно для заполнения.');


        });
    }


    public function testFormAddCategorySlug()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/admin/categories/create')
                ->type('slug', '')
                ->press('Добавить')
                ->assertSee('Поле Псевдоним категории обязательно для заполнения.');

        });
    }


}
