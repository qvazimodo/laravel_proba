<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminIndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;


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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('index');
        Route::get('/one/{id}', [NewsController::class, 'show'])->name('show');
        Route::name('category.')
            ->group(function () {
                Route::get('categories', [CategoryController::class, 'index'])->name('index');
                Route::get('category/{slug}', [CategoryController::class, 'show'])->name('show');
            });
    });

Route::name('admin.')
    ->prefix('admin')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
