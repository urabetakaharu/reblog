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






Route::group(['middleware' => ['auth']], function()
    {
        Route::get('/', 'PostController@index')->middleware('auth');
        Route::get('post','PostController@show');
        // {}は何でもいい、{Post}と同名の場合は勝手にgetされる
        
        Route::get('/posts/create', 'PostController@create');
        Route::delete('/posts/{post}', 'PostController@delete');
        Route::get('/posts/{abc}', 'PostController@show');
        Route::post('/posts', 'PostController@store');
        Route::get('/posts/{post}/edit', 'PostController@edit');
        Route::put('/posts/{post}', 'PostController@update');
        Route::get('/categories/{category}', 'CategoryController@index');
        Route::get('/home', 'HomeController@index')->name('home');
    });


Auth::routes();
