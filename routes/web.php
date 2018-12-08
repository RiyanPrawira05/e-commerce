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
Route::get('/registrasi', 'Auth\RegisterController@showRegisterForm')->name('register');
Route::post('/registrasi', 'Auth\RegisterController@register')->name('register');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// Home
Route::get('/', function () {
    return view('backend.welcome.index');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

// Users
Route::resource('users', 'UserController', ['names' => 'users']);
Route::post('/users/{id}/change-password', 'UserController@password')->name('users.password');
Route::post('/users/{id}/change-photo', 'UserController@foto')->name('users.foto');
// Route::get('/users/search', 'UserController@search')->name('users.search');

// Route::get('/users', 'UserController@index')->name('users');
// Route::get('/users/create', 'UserController@create')->name('create');
// Route::post('/users/create', 'UserController@store')->name('store');
// Route::get('/users/{id}/edit', 'UserController@edit')->name('edit');
// Route::post('/users/{id}/edit', 'UserController@update')->name('update');
// Route::get('/users/{id}/destroy', 'UserController@destroy')->name('destroy');

// Alamat Pengguna
Route::resource('alamat', 'AlamatController', ['names' => 'alamat']);

// Product
Route::resource('product', 'ProductController', ['names' => 'product']);

// Jenis
Route::resource('jenis', 'JenisController', ['names' => 'jenis']);

// Route::get('/jenis/create', 'JenisController@create')->name('create');
// Route::post('/jenis/add', 'JenisController@store')->name('add');
// Route::get('/jenis/{id}/edit', 'JenisController@edit')->name('edit');
// Route::post('/jenis/{id}/update', 'JenisController@update')->name('update');
// Route::get('/jenis/{id}/delete', 'JenisController@destroy')->name('destroy');

// Category
Route::resource('category', 'CategoryController', ['names' => 'category']);

// Size
Route::resource('size', 'SizeController', ['names' => 'size']);

// Warna
Route::resource('color', 'WarnaController', ['names' => 'colors']);

// Stock
Route::resource('stock', 'StockController', ['names' => 'stock']);

// Lingkar Dada 
Route::resource('lingkardada', 'LingkardadaController', ['names' => 'LD']);

// Via 
Route::resource('pembayaran/via', 'ViaController', ['names' => 'via']);

// Status 
Route::resource('status', 'StatusController', ['names' => 'status']);

// Discount 
Route::resource('discount', 'DiscountController', ['names' => 'discount']);

// Bank Account 
Route::resource('bankAccount', 'BankAccountController', ['names' => 'bank']);

// Jabatan 
Route::resource('jabatan', 'JabatanController', ['names' => 'jabatan']);


// Tampilan untuk users
Route::get('/test', function () {
    return view('layouts.frontend');
})->name('users');



