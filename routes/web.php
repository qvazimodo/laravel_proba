<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\AdminIndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;




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
        Route::get('/one/{news}', [NewsController::class, 'show'])->name('show');
        Route::get('/save/{id}', [NewsController::class, 'save'])->name('save');
        //Route::match(['get', 'post'], '/userprofile', [UserProfileController::class, 'update'])->name('userprofile');
        Route::name('category.')
            ->group(function () {
                Route::get('categories', [CategoryController::class, 'index'])->name('index');
                Route::get('category/{slug}', [CategoryController::class, 'show'])->name('show');
                Route::get('category/save/{slug}', [CategoryController::class, 'save'])->name('save');
            });


    });

Route::match(['get', 'post'], '/userprofile', [UserProfileController::class, 'update'])->name('userUpdateProfile')->middleware('auth');

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'verified', 'is_admin'])
        ->group(function () {
        Route::resource('/news', AdminNewsController::class)->except(['show']);
        Route::get('/parser',[ParserController::class, 'index'])->name('parser');
        //CRUD
        /*
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::match(['get', 'post'], '/create', [AdminNewsController::class, 'create'])->name('create');
        Route::get('/edit/{news}', [AdminNewsController::class, 'edit'])->name('edit');
        Route::post('/update/{news}', [AdminNewsController::class, 'update'])->name('update');
        Route::delete('/destroy/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');*/
        Route::name('')
            ->group(function(){
                Route::resource('/categories', AdminCategoryController::class)->except(['show']);
                /*Route::resource('/news', AdminNewsController::class)->except(['show']);
                Route::get('categories', [AdminCategoryController::class, 'index'])->name('index');
                Route::match(['get', 'post'], 'categories/create', [AdminCategoryController::class, 'create'])->name('create');
                Route::get('categories/edit/{category}', [AdminCategoryController::class, 'edit'])->name('edit');
                Route::post('categories/update/{category}', [AdminCategoryController::class, 'update'])->name('update');
                Route::delete('categories/destroy/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');*/

            });
        Route::name('')
            ->group(function() {
                Route::resource('/users', UsersController::class)->except(['show']);
            });


        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
    });

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


