<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\MainController@welcome');
Route::get('about', 'App\Http\Controllers\MainController@about');
Route::get('index', 'App\Http\Controllers\MainController@index');
Route::get('news', 'App\Http\Controllers\MainController@news');
Route::get('faq', 'App\Http\Controllers\MainController@faq');

Route::get('products', 'App\Http\Controllers\ProductsController@products');
Route::get('products/new', 'App\Http\Controllers\ProductsController@new');
Route::post('products', 'App\Http\Controllers\ProductsController@store');
Route::put('update-product/{id}', 'App\Http\Controllers\ProductsController@update');
Route::get('products/edit/{id}', 'App\Http\Controllers\ProductsController@edit');
Route::get('products/{id}', 'App\Http\Controllers\ProductsController@detail');

Route::get('/reg', 'App\Http\Controllers\UsersController@create');
Route::post('reg', 'App\Http\Controllers\UsersController@store');
Route::get('profile', 'App\Http\Controllers\UsersController@profile');
Route::get('edit-profile', 'App\Http\Controllers\UsersController@edit');
Route::post('profile', 'App\Http\Controllers\UsersController@update');

Route::get('admin', 'App\Http\Controllers\UsersController@admin');

Route::get('/logon', 'App\Http\Controllers\SessionsController@create');
Route::post('logon', 'App\Http\Controllers\SessionsController@store');
Route::get('/logout', 'App\Http\Controllers\SessionsController@destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
