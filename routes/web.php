<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function()  {
/*   return view('welcome');*/
    return view('index')->with([
    'title' => 'Страница приветствия',
    'name'  => 'Hello',
    'link1' => '<a href="/info">О нас</a>',
    'link2' => '<a href="/news">Новости</a>'


        ]);

});
Route::get('/info', function()  {
    /*   return view('welcome');*/
    return view('index')->with([
        'title' => 'Страница информации',
        'name' => 'О нас',
        'link1' => '<a href="/">Главная</a>',
        'link2' => '<a href="/news">Новости</a>'
    ]);

});
Route::get('/news', function()  {
    /*   return view('welcome');*/
    return view('index')->with([
        'title' => 'Страница новостей',
        'name' => 'море новостей',
        'link1' => '<a href="/">Главная</a>',
        'link2' => '<a href="/info">О нас</a>'
    ]);

});





