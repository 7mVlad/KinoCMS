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

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', 'IndexController')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Banner', 'prefix' => 'banners'], function () {
        Route::get('/', 'EditController')->name('admin.banner.index');
        Route::patch('/', 'UpdateController')->name('admin.banner.update');
    });

    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function () {
        Route::get('/', 'IndexController')->name('admin.film.index');
        Route::get('/create', 'CreateController')->name('admin.film.create');
        Route::post('/', 'StoreController')->name('admin.film.store');
        Route::get('/{film}/edit', 'EditController')->name('admin.film.edit');
        Route::patch('/{film}', 'UpdateController')->name('admin.film.update');
        Route::delete('/{film}', 'DeleteController')->name('admin.film.delete');
    });

    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinemas'], function () {
        Route::get('/', 'IndexController')->name('admin.cinema.index');
        Route::get('/create', 'CreateController')->name('admin.cinema.create');
        Route::post('/', 'StoreController')->name('admin.cinema.store');
        Route::get('/{cinema}/edit', 'EditController')->name('admin.cinema.edit');
        Route::patch('/{cinema}', 'UpdateController')->name('admin.cinema.update');
        Route::delete('/{cinema}', 'DeleteController')->name('admin.cinema.delete');

        Route::group(['namespace' => 'Hall', 'prefix' => 'halls'], function () {
            Route::get('/create/{cinema}', 'CreateController')->name('admin.hall.create');
            Route::post('/{cinema}', 'StoreController')->name('admin.hall.store');
            Route::get('/{hall}/edit', 'EditController')->name('admin.hall.edit');
            Route::patch('/{hall}', 'UpdateController')->name('admin.hall.update');
            Route::get('/{hall}', 'DeleteController')->name('admin.hall.delete');
        });
    });

    Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
        Route::get('/', 'IndexController')->name('admin.news.index');
        Route::get('/create', 'CreateController')->name('admin.news.create');
        Route::post('/', 'StoreController')->name('admin.news.store');
        Route::get('/{news}/edit', 'EditController')->name('admin.news.edit');
        Route::patch('/{news}', 'UpdateController')->name('admin.news.update');
        Route::delete('/{news}', 'DeleteController')->name('admin.news.delete');
    });

    Route::group(['namespace' => 'Stock', 'prefix' => 'stocks'], function () {
        Route::get('/', 'IndexController')->name('admin.stock.index');
        Route::get('/create', 'CreateController')->name('admin.stock.create');
        Route::post('/', 'StoreController')->name('admin.stock.store');
        Route::get('/{stock}/edit', 'EditController')->name('admin.stock.edit');
        Route::patch('/{stock}', 'UpdateController')->name('admin.stock.update');
        Route::delete('/{stock}', 'DeleteController')->name('admin.stock.delete');
    });

    Route::group(['namespace' => 'Page', 'prefix' => 'pages'], function () {
        Route::get('/', 'IndexController')->name('admin.page.index');
        Route::get('/create', 'CreateController')->name('admin.page.create');
        Route::post('/', 'StoreController')->name('admin.page.store');
        Route::get('/{page}/edit', 'EditController')->name('admin.page.edit');
        Route::patch('/{page}', 'UpdateController')->name('admin.page.update');
        Route::delete('/{page}', 'DeleteController')->name('admin.page.delete');

        Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
            Route::get('/{main}/edit', 'EditController')->name('admin.main-page.edit');
            Route::patch('/{main}', 'UpdateController')->name('admin.main-page.update');
        });

        Route::group(['namespace' => 'Contact', 'prefix' => 'contacts'], function () {
            Route::get('/', 'EditController')->name('admin.contact.edit');
            Route::patch('/update', 'UpdateController')->name('admin.contact.update');
        });
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'IndexController@index')->name('admin.user.index');
        Route::get('/search', 'IndexController@search')->name('admin.user.search');
        Route::get('/create', 'CreateController')->name('admin.user.create');
        Route::post('/', 'StoreController')->name('admin.user.store');
        Route::get('/{user}/edit', 'EditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UpdateController')->name('admin.user.update');
        Route::delete('/{user}', 'DeleteController')->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Mailing', 'prefix' => 'mailings'], function () {
        Route::get('/', 'IndexController@index')->name('admin.mailing.index');
        Route::post('/send', 'IndexController@send')->name('admin.mailing.send');
        Route::get('/{mailing}', 'IndexController@delete')->name('admin.mailing.delete');
    });

    Route::group(['namespace' => 'Schedule', 'prefix' => 'schedule'], function () {
        Route::get('/', 'IndexController')->name('admin.schedule.index');
        Route::get('/create', 'CreateController@index')->name('admin.schedule.create');
        Route::get('/{id}', 'CreateController@ajax')->name('admin.schedule.ajax');
        Route::post('/', 'StoreController')->name('admin.schedule.store');
        Route::get('/{schedule}/edit', 'EditController')->name('admin.schedule.edit');
        Route::patch('/{schedule}', 'UpdateController')->name('admin.schedule.update');
        Route::delete('/{schedule}', 'DeleteController')->name('admin.schedule.delete');
    });
});

// end Admin

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'IndexController')->name('main.index');
    Route::patch('/personal', 'UserUpdateController')->name('user.update');
});

Route::group(['namespace' => 'Film'], function () {
    Route::group(['namespace' => 'Poster'], function () {
        Route::get('/poster', 'IndexController')->name('poster.index');
        Route::get('/films/{film}', 'ShowController')->name('film.show');
    });

    Route::group(['namespace' => 'Soon'], function () {
        Route::get('/soon', 'IndexController')->name('soon.index');
    });
});

Route::group(['namespace' => 'Stock'], function () {
    Route::get('/stock', 'IndexController')->name('stock.index');
    Route::get('/stocks/{stock}', 'ShowController')->name('stock.show');
});

Route::group(['namespace' => 'News'], function () {
    Route::get('/news', 'IndexController')->name('news.index');
    Route::get('/news/{news}', 'ShowController')->name('news.show');
});

Route::group(['namespace' => 'Page'], function () {
    Route::get('/page/{page}', 'ShowController')->name('page.show');

    Route::group(['namespace' => 'Mobile'], function () {
        Route::get('/mobile', 'ShowController')->name('mobile.show');
    });
});

