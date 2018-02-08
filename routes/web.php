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

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/categories/{id}', 'CategoryController@show')->name('category.show');
Route::resource('/books', 'BookController');
Route::get('/books/{id}', 'BookController@show')->name('books.show');
Route::post('/books/{id}', 'BookController@review')->name('books.review');
Route::post('/books/suggests/{id}', 'BookController@suggest')->name('books.suggests');
Route::resource('/users', 'UserController');
Route::get('/users/suggests/{id}', 'UserController@suggests')->name('user.suggests');
Route::post('/suggests/{id}', 'SuggestController@update')->name('suggests.accept');
Route::post('/comments', 'CommentController@store')->name('comments.store');

Auth::routes();

$admin_config = [
    'prefix'     => 'admin',
    'namespace'  => 'Admin',
    'as'         => 'admin.',
    'middleware' => 'admin',
];

Route::group($admin_config, function () {
	Route::get('/', function() {
		return view('admin.index');
	});

	Route::resource('/users', 'UserController');
});

