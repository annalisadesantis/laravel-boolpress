<?php

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


// Rotta pubblica
Route::get('/', 'HomeController@index')->name('index');
Route::get('/contatti', 'HomeController@contatti')->name('contatti');
Route::get('/posts', 'PostController@index')->name('posts.index');
Route::get('/posts/{slug}', 'PostController@show')->name('posts.show');
Route::get('/categories/{slug}', 'CategoryController@show')->name('categories.show');
Route::get('/categories', 'CategoryController@index')->name('categories.index');
Route::get('/tags/{slug}', 'TagController@show')->name('tags.show');
Route::get('/tags', 'TagController@index')->name('tags.index');



// Rotte di autorizzazione con il register disattivato
Auth::routes(['register' => false]);

// Rotta privata
Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function() {

    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('/posts', 'PostController');
    Route::resource('/categories', 'CategoryController');
    //Route::resource('/users', 'UserController');

    Route::get('/users', 'UserController@index')->name('users.index');

});
