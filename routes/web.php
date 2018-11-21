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

Route::get('/pass', function () {
    return bcrypt('123456');
});

// Route untuk Authentication
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/daftar', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/daftar', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Home
Route::get('/', function () {
    return view('welcome_backend');
})->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::resource('users', 'UserController', ['names' => 'users']);
Route::post('/users/{id}/change-password', 'UserController@password')->name('users.password');
// Route::get('/users', 'UserController@index')->name('users');
// Route::get('/users/create', 'UserController@create')->name('create');
// Route::post('/users/create', 'UserController@store')->name('store');
// Route::get('/users/{id}/edit', 'UserController@edit')->name('edit');
// Route::post('/users/{id}/edit', 'UserController@update')->name('update');
// Route::get('/users/{id}/destroy', 'UserController@destroy')->name('destroy');

// Product
Route::get('/product', 'ProductController@index')->name('product');
Route::get('/product/create', 'ProductController@create')->name('create');
Route::post('/product/update', 'ProductController@store')->name('store');



