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
        Route::get('/', 'MainController@index')->name('admin.main.index');
    });

    Route::group(['namespace' => 'Banner', 'prefix' => 'banners'], function () {
        Route::get('/', 'BannerController@edit')->name('admin.banner.index');
        Route::patch('/', 'BannerController@update')->name('admin.banner.update');
    });

    Route::group(['namespace' => 'Film', 'prefix' => 'films'], function () {
        Route::get('/', 'FilmController@index')->name('admin.film.index');
        Route::get('/create', 'FilmController@create')->name('admin.film.create');
        Route::post('/', 'FilmController@store')->name('admin.film.store');
        Route::get('/{film}/edit', 'FilmController@edit')->name('admin.film.edit');
        Route::patch('/{film}', 'FilmController@update')->name('admin.film.update');
        Route::delete('/{film}', 'FilmController@delete')->name('admin.film.delete');
    });

    Route::group(['namespace' => 'Cinema', 'prefix' => 'cinemas'], function () {
        Route::get('/', 'CinemaController@index')->name('admin.cinema.index');
        Route::get('/create', 'CinemaController@create')->name('admin.cinema.create');
        Route::post('/', 'CinemaController@store')->name('admin.cinema.store');
        Route::get('/{cinema}/edit', 'CinemaController@edit')->name('admin.cinema.edit');
        Route::patch('/{cinema}', 'CinemaController@update')->name('admin.cinema.update');
        Route::delete('/{cinema}', 'CinemaController@delete')->name('admin.cinema.delete');

        Route::group(['namespace' => 'Hall', 'prefix' => 'halls'], function () {
            Route::get('/create/{cinema}', 'HallController@create')->name('admin.hall.create');
            Route::post('/{cinema}', 'HallController@store')->name('admin.hall.store');
            Route::get('/{hall}/edit', 'HallController@edit')->name('admin.hall.edit');
            Route::patch('/{hall}', 'HallController@update')->name('admin.hall.update');
            Route::get('/{hall}', 'HallController@delete')->name('admin.hall.delete');
        });
    });

    Route::group(['namespace' => 'News', 'prefix' => 'news'], function () {
        Route::get('/', 'NewsController@index')->name('admin.news.index');
        Route::get('/create', 'NewsController@create')->name('admin.news.create');
        Route::post('/', 'NewsController@store')->name('admin.news.store');
        Route::get('/{news}/edit', 'NewsController@edit')->name('admin.news.edit');
        Route::patch('/{news}', 'NewsController@update')->name('admin.news.update');
        Route::delete('/{news}', 'NewsController@delete')->name('admin.news.delete');
    });

    Route::group(['namespace' => 'Stock', 'prefix' => 'stocks'], function () {
        Route::get('/', 'StockController@index')->name('admin.stock.index');
        Route::get('/create', 'StockController@create')->name('admin.stock.create');
        Route::post('/', 'StockController@store')->name('admin.stock.store');
        Route::get('/{stock}/edit', 'StockController@edit')->name('admin.stock.edit');
        Route::patch('/{stock}', 'StockController@update')->name('admin.stock.update');
        Route::delete('/{stock}', 'StockController@delete')->name('admin.stock.delete');
    });

    Route::group(['namespace' => 'Page', 'prefix' => 'pages'], function () {
        Route::get('/', 'PageController@index')->name('admin.page.index');
        Route::get('/create', 'PageController@create')->name('admin.page.create');
        Route::post('/', 'PageController@store')->name('admin.page.store');
        Route::get('/{page}/edit', 'PageController@edit')->name('admin.page.edit');
        Route::patch('/{page}', 'PageController@update')->name('admin.page.update');
        Route::delete('/{page}', 'PageController@delete')->name('admin.page.delete');

        Route::group(['namespace' => 'Main', 'prefix' => 'main'], function () {
            Route::get('/{main}/edit', 'MainController@edit')->name('admin.main-page.edit');
            Route::patch('/{main}', 'MainController@update')->name('admin.main-page.update');
        });

        Route::group(['namespace' => 'Contact', 'prefix' => 'contacts'], function () {
            Route::get('/', 'ContactController@edit')->name('admin.contact.edit');
            Route::patch('/update', 'ContactController@update')->name('admin.contact.update');
        });
    });

    Route::group(['namespace' => 'User', 'prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('admin.user.index');
        Route::get('/search', 'UserController@search')->name('admin.user.search');
        Route::get('/create', 'UserController@create')->name('admin.user.create');
        Route::post('/', 'UserController@store')->name('admin.user.store');
        Route::get('/{user}/edit', 'UserController@edit')->name('admin.user.edit');
        Route::patch('/{user}', 'UserController@update')->name('admin.user.update');
        Route::delete('/{user}', 'UserController@delete')->name('admin.user.delete');
    });

    Route::group(['namespace' => 'Mailing', 'prefix' => 'mailings'], function () {
        Route::get('/', 'MailController@index')->name('admin.mailing.index');
        Route::post('/send', 'MailController@send')->name('admin.mailing.send');
        Route::get('/{mailing}', 'MailController@delete')->name('admin.mailing.delete');
    });

    Route::group(['namespace' => 'Schedule', 'prefix' => 'schedule'], function () {
        Route::get('/', 'ScheduleController@index')->name('admin.schedule.index');
        Route::get('/create', 'ScheduleController@create')->name('admin.schedule.create');
        Route::get('/{id}', 'ScheduleController@ajax')->name('admin.schedule.ajax');
        Route::post('/', 'ScheduleController@store')->name('admin.schedule.store');
        Route::get('/{schedule}/edit', 'ScheduleController@edit')->name('admin.schedule.edit');
        Route::patch('/{schedule}', 'ScheduleController@update')->name('admin.schedule.update');
        Route::delete('/{schedule}', 'ScheduleController@delete')->name('admin.schedule.delete');
    });
});

// end Admin

Route::group(['namespace' => 'Main'], function () {
    Route::get('/', 'MainController@index')->name('main.index');
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

Route::group(['namespace' => 'Schedule'], function () {
    Route::get('/schedule', 'IndexController')->name('schedule.index');
    Route::post('/schedule/filter', 'FilterController')->name('schedule.filter');
    Route::get('/booking/{id}', 'BookingController@index')->name('booking.index');
    Route::post('/booking/store', 'BookingController@bookingStore')->name('booking.store');
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

    Route::group(['namespace' => 'Contact'], function () {
        Route::get('/contacts', 'IndexController')->name('contact.index');
    });
});


Route::group(['namespace' => 'Cinema'], function () {
    Route::get('/cinema', 'IndexController')->name('cinema.index');
    Route::get('/cinema/{cinema}', 'ShowController')->name('cinema.show');

    Route::group(['namespace' => 'Hall'], function () {
        Route::get('/{hall}', 'ShowController')->name('hall.show');
    });
});
