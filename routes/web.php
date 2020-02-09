<?php
use App\Http\Controllers\Blog\PostsController;
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

Auth::routes();

/**
 * Route for blog post
 */
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('blog/tags/{tag}', [PostsController::class, 'tag'])->name('blog.tag');
Route::get('blog/categories/{category}', [PostsController::class, 'category'])->name('blog.category');

/**
 * Route for admin
 */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
    Route::resource('/tags', 'TagController');
    Route::get('/trashed-posts', 'PostController@trashedPosts')->name('posts.trashed');
    Route::put('/posts-restore/{post}', 'PostController@restorePost')->name('posts.restore');
});

/**
 * Route for User admin
 */
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('users', 'UserController');
    Route::post('user/setadmin', 'UserController@setadmin')->name('users.setadmin');
});
