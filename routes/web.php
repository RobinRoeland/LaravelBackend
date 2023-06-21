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

//routes voor main views
Route::get('/', 'App\Http\Controllers\MainController@welcome');
Route::get('about', 'App\Http\Controllers\MainController@about');
Route::get('index', 'App\Http\Controllers\MainController@index');
Route::get('news', 'App\Http\Controllers\MainController@news');
Route::get('faq', 'App\Http\Controllers\MainController@faq');

//routes voor contact-formulier
Route::get('/contact', 'App\Http\Controllers\ContactController@createForm');
Route::post('/contact', 'App\Http\Controllers\ContactController@storeForm');

//routes voor Products administratie
Route::get('products', 'App\Http\Controllers\ProductsController@products');
Route::get('products/new', 'App\Http\Controllers\ProductsController@new');
Route::post('products', 'App\Http\Controllers\ProductsController@store');
Route::put('update-product/{id}', 'App\Http\Controllers\ProductsController@update');
Route::get('products/edit/{id}', 'App\Http\Controllers\ProductsController@edit');
Route::get('products/{id}', 'App\Http\Controllers\ProductsController@detail');

//routes voor account beheer
Route::get('/reg', 'App\Http\Controllers\UsersController@create');
Route::post('reg', 'App\Http\Controllers\UsersController@store');
Route::get('profile', 'App\Http\Controllers\UsersController@profile');
Route::get('edit-profile', 'App\Http\Controllers\UsersController@edit');
Route::post('profile', 'App\Http\Controllers\UsersController@update');

//routes voor sessie beheer
Route::get('/logon', 'App\Http\Controllers\SessionsController@create');
Route::post('logon', 'App\Http\Controllers\SessionsController@store');
Route::get('/logout', 'App\Http\Controllers\SessionsController@destroy');
Route::get('passw-req', 'App\Http\Controllers\SessionsController@forgotPassword');
Route::post('passw-req', 'App\Http\Controllers\SessionsController@sendResetLink');
Route::get('passw-reset', 'App\Http\Controllers\SessionsController@resetPassword');
Route::post('passw-reset', 'App\Http\Controllers\SessionsController@storePassword');

//routes voor Users administratie
Route::get('users', 'App\Http\Controllers\AdminController@users');
Route::get('user-add/', 'App\Http\Controllers\AdminController@addUser');
Route::post('user-add/', 'App\Http\Controllers\AdminController@storeUser');
Route::get('user-delete/{id}', 'App\Http\Controllers\AdminController@deleteUser');
Route::get('user-admin/{id}', 'App\Http\Controllers\AdminController@toggleAdmin');
//routes voor FAQ administratie
Route::get('faq-add/', 'App\Http\Controllers\AdminController@addFaq');
Route::post('faq-add/', 'App\Http\Controllers\AdminController@storeFaq');
Route::post('faq-update', 'App\Http\Controllers\AdminController@updateFaq');
Route::get('faq-edit/{id}', 'App\Http\Controllers\AdminController@editFaq');
Route::get('faq-delete/{id}', 'App\Http\Controllers\AdminController@deleteFaq');
//routes voor Latest News administratie
Route::get('news-add/', 'App\Http\Controllers\AdminController@addNews');
Route::post('news-add/', 'App\Http\Controllers\AdminController@storeNews');
Route::post('news-update', 'App\Http\Controllers\AdminController@updateNews');
Route::get('news-edit/{id}', 'App\Http\Controllers\AdminController@editNews');
Route::get('news-delete/{id}', 'App\Http\Controllers\AdminController@deleteNews');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
