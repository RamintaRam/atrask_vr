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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
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




});

