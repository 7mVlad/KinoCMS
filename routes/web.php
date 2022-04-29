<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Banner', 'prefix' => 'banners'], function() {
        Route::get('/', 'EditController')->name('admin.banner.index');
        Route::patch('/', 'UpdateController')->name('admin.banner.update');

    });

    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function() {
        Route::get('/', 'IndexController')->name('admin.film.index');
        Route::get('/create', 'CreateController')->name('admin.film.create');
        Route::post('/', 'StoreController')->name('admin.film.store');
        Route::get('/{film}/edit', 'EditController')->name('admin.film.edit');
        Route::patch('/{film}', 'UpdateController')->name('admin.film.update');
        Route::delete('/{film}', 'DeleteController')->name('admin.film.delete');
    });

    Route::group(['namespace' => 'News', 'prefix' => 'news'], function() {
        Route::get('/', 'IndexController')->name('admin.news.index');
        Route::get('/create', 'CreateController')->name('admin.news.create');
        Route::post('/', 'StoreController')->name('admin.news.store');
        Route::get('/{news}/edit', 'EditController')->name('admin.news.edit');
        Route::patch('/{news}', 'UpdateController')->name('admin.news.update');
        Route::delete('/{news}', 'DeleteController')->name('admin.news.delete');
    });

    Route::group(['namespace' => 'Stock', 'prefix' => 'stocks'], function() {
        Route::get('/', 'IndexController')->name('admin.stock.index');
        Route::get('/create', 'CreateController')->name('admin.stock.create');
        Route::post('/', 'StoreController')->name('admin.stock.store');
        Route::get('/{stock}/edit', 'EditController')->name('admin.stock.edit');
        Route::patch('/{stock}', 'UpdateController')->name('admin.stock.update');
        Route::delete('/{stock}', 'DeleteController')->name('admin.stock.delete');
    });

    // Route::group(['namespace' => 'User', 'prefix' => 'users'], function() {
    //     Route::get('/', 'IndexController')->name('admin.user.index');
    //     Route::get('/create', 'CreateController')->name('admin.user.create');
    //     Route::post('/', 'StoreController')->name('admin.user.store');
    //     // Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
    //     // Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
    //     // Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    // });


});

Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController')->name('main.index');
});

