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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::group([
    'middleware' => ['auth'],
], function () {
	
	Route::get('/feed', 'HomeController@feed')->name('feed');

    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Profile',], function () {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/edit', 'HomeController@edit')->name('edit');
        Route::put('/update', 'HomeController@update')->name('update');
    });

});



