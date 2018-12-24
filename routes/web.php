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

    Route::group(['as' => 'profile.', 'namespace' => 'Profile'], function () {
        Route::get('/feed', 'ProfileController@feed')->name('feed');
        Route::get('/id{user}', 'ProfileController@show')->name('show');
        Route::get('/edit', 'ProfileController@edit')->name('edit');
        Route::put('/update', 'ProfileController@update')->name('update');

        Route::group(['as' => 'wall.messages.', 'namespace' => 'Wall'], function () {
            Route::get('/create', 'WallPostsController@create')->name('create');
            Route::get('/wall-{user}_{message}', 'WallPostsController@show')->name('show.message');
            Route::post('/', 'WallPostsController@store')->name('store');
            Route::delete('/{message}', 'WallPostsController@wall_message_destroy')->name('destroy');

            Route::group(['as' => 'comments.'], function () {
               Route::get('/comments', 'CommentsController@index')->name('index');
               Route::post('/wall{user}/{wall_message_id}/add-comment', 'CommentsController@store')->name('store');
               Route::post('/comments/{commentId}/{type}', 'CommentController@update')->name('update');

            });

        });


    });


        // Route for index page
        Route::get('comments/{pageId}', 'Profile\Wall\CommentController@index');
        // Route for store comment
        Route::post('comments', 'Profile\Wall\CommentsController@store');
        // Route for update comment
        Route::post('comments/{commentId}/{type}', 'Profile\Wall\CommentController@update');



    Route::group(['as' => 'user.', 'namespace' => 'Users'], function () {
        Route::get('/people', 'UsersController@index')->name('index');
        Route::post('ajaxRequest', 'UsersController@ajaxRequest')->name('ajaxRequest');


        Route::group(['as' => 'wall.', 'namespace' => 'Wall'], function () {
            Route::get('/wall{user}', 'WallPostsController@index')->name('index');
            Route::get('/wall{user}_{message}', 'WallPostsController@show')->name('show');
        });

    });



});



