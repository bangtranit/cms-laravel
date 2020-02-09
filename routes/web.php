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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/blog/post/{post}', [PostsController::class, 'show'])->name('blog.show');
Route::get('/search', 'WelcomeController@listPostByKeyword')->name('blog.search');
Route::get('/category/{category}/posts', 'WelcomeController@listPostOfCategory')->name('blog.cat_posts');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
    Route::resource('/tags', 'TagController');
    Route::get('/trashed-posts', 'PostController@trashedPosts')->name('posts.trashed');
    Route::put('/posts-restore/{post}', 'PostController@restorePost')->name('posts.restore');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('users', 'UserController');
    Route::post('user/setadmin', 'UserController@setadmin')->name('users.setadmin');
});


//Route::middleware(['auth'])->group(function (){
//});

