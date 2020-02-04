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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
    Route::get('/trashed-posts', 'PostController@trashedPosts')->name('posts.trashed');
    Route::put('/posts-restore/{post}', 'PostController@restorePost')->name('posts.restore');
});

//Route::middleware(['auth'])->group(function (){
//    Route::get('/dashboard', 'HomeController@index')->name('home');
//    Route::resource('/categories', 'CategoryController');
//    Route::resource('/posts', 'PostController');
//    Route::get('/trashed-posts', 'PostController@trashedPosts')->name('posts.trashed');
//    Route::put('/posts-restore/{post}', 'PostController@restorePost')->name('posts.restore');
//});

