<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', ['as' => 'frontend.index', 'uses' => 'FrontEndController@index']);






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin', 'middleware'=>['auth', 'check if super-admin']], function () {
    Route::get('/', function () {
        return view('admin.welcome_admin');
    });

    Route::group(['prefix' => 'categories_translations'], function () {
        Route::get('/', ['as' => 'app.categories_translations.index', 'uses' => 'VRCategoriesTranslationsController@adminIndex']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/create', ['as' => 'app.categories_translations.create', 'uses' => 'VRCategoriesTranslationsController@adminCreate']);
            Route::post('/create', ['as' => 'app.categories_translations.store', 'uses' => 'VRCategoriesTranslationsController@adminStore']);
            Route::get('/edit', ['as' => 'app.categories_translations.edit', 'uses' => 'VRCategoriesTranslationsController@adminEdit']);
            Route::post('/edit', ['as' => 'app.categories_translations.update', 'uses' => 'VRCategoriesTranslationsController@adminUpdate']);
            Route::get('/', ['as' => 'app.categories_translations.show', 'uses' => 'VRCategoriesTranslationsController@adminShow']);
            Route::delete('/', ['as' => 'app.categories_translations.delete', 'uses' => 'VRCategoriesTranslationsController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'languages'], function () {
        Route::get('/', ['as' => 'app.language.index','uses' => 'VRLanguageCodesController@adminIndex']);
        Route::get('/create', ['as' => 'app.language.create','uses' => 'VRLanguageCodesController@adminCreate']);
        Route::post('/create', ['as' => 'app.language.store', 'uses' => 'VRLanguageCodesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.language.edit', 'uses' => 'VRLanguageCodesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.language.update', 'uses' => 'VRLanguageCodesController@adminUpdate']);
            Route::get('/', ['as' => 'app.language.show', 'uses' => 'VRLanguageCodesController@adminShow']);
            Route::delete('/', ['as' => 'app.language.delete', 'uses' => 'VRLanguageCodesController@adminDestroy']);
        });
    });


    Route::group(['prefix' => 'menu'], function () {
        Route::get('/', ['as' => 'app.menu.index','uses' => 'VRMenuController@adminIndex']);
        Route::get('/create', ['as' => 'app.menu.create','uses' => 'VRMenuController@adminCreate']);
        Route::post('/create', ['as' => 'app.menu.store', 'uses' => 'VRMenuController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.menu.edit', 'uses' => 'VRMenuController@adminEdit']);
            Route::post('/edit', ['as' => 'app.menu.update', 'uses' => 'VRMenuController@adminUpdate']);
            Route::get('/', ['as' => 'app.menu.show', 'uses' => 'VRMenuController@adminShow']);
            Route::delete('/', ['as' => 'app.menu.delete', 'uses' => 'VRMenuController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'pages'], function () {
        Route::get('/', ['as' => 'app.pages.index','uses' => 'VRPagesController@adminIndex']);
        Route::get('/create', ['as' => 'app.pages.create','uses' => 'VRPagesController@adminCreate']);
        Route::post('/create', ['as' => 'app.pages.store', 'uses' => 'VRPagesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.pages.edit', 'uses' => 'VRPagesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.pages.update', 'uses' => 'VRPagesController@adminUpdate']);
            Route::get('/', ['as' => 'app.pages.show', 'uses' => 'VRPagesController@adminShow']);
            Route::delete('/', ['as' => 'app.pages.delete', 'uses' => 'VRPagesController@adminDestroy']);
        });
    });


    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', ['as' => 'app.order.index','uses' => 'VROrderController@adminIndex']);
        Route::get('/create', ['as' => 'app.order.create','uses' => 'VROrderController@adminCreate']);
        Route::get('/reservation', ['as' => 'app.order.reservation','uses' => 'VROrderController@adminReservations']);
        Route::get('/reservations', ['as' => 'app.order.reservations','uses' => 'VRReservationsController@index']);
        Route::post('/create', ['as' => 'app.order.store', 'uses' => 'VROrderController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.order.edit', 'uses' => 'VROrderController@adminEdit']);
            Route::post('/edit', ['as' => 'app.order.update', 'uses' => 'VROrderController@adminUpdate']);
            Route::get('/', ['as' => 'app.order.show', 'uses' => 'VROrderController@adminShow']);
            Route::delete('/', ['as' => 'app.order.delete', 'uses' => 'VROrderController@adminDestroy']);

        });
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'app.users.index','uses' => 'VRUsersController@adminIndex']);
        Route::get('/create', ['as' => 'app.users.create','uses' => 'VRUsersController@adminCreate']);
        Route::post('/create', ['as' => 'app.users.store', 'uses' => 'VRUsersController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.users.edit', 'uses' => 'VRUsersController@adminEdit']);
            Route::post('/edit', ['as' => 'app.users.update', 'uses' => 'VRUsersController@adminUpdate']);
            Route::get('/', ['as' => 'app.users.show', 'uses' => 'VRUsersController@adminShow']);
            Route::delete('/', ['as' => 'app.users.delete', 'uses' => 'VRUsersController@adminDestroy']);
        });
    });

    Route::group(['prefix' => 'pages_categories'], function () {
        Route::get('/', ['as' => 'app.categories.index','uses' => 'VRCategoriesController@adminIndex']);
        Route::get('/create', ['as' => 'app.categories.create','uses' => 'VRCategoriesController@adminCreate']);
        Route::post('/create', ['as' => 'app.categories.store', 'uses' => 'VRCategoriesController@adminStore']);
        Route::group(['prefix' => '{id}'], function () {
            Route::get('/edit', ['as' => 'app.categories.edit', 'uses' => 'VRCategoriesController@adminEdit']);
            Route::post('/edit', ['as' => 'app.categories.update', 'uses' => 'VRCategoriesController@adminUpdate']);
            Route::get('/', ['as' => 'app.categories.show', 'uses' => 'VRCategoriesController@adminShow']);
            Route::delete('/', ['as' => 'app.categories.delete', 'uses' => 'VRCategoriesController@adminDestroy']);
        });
    });



});

Route::get('/{lang}/pages/{slug}', ['as' => 'app.user.show', 'uses' => 'FrontEndController@showPage']);