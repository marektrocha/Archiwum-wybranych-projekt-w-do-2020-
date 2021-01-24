<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

// PRODUCTS
Route::get('products/edit/{id}', 'App\Http\Controllers\ProductController@edit');
Route::post('products/edit/', 'App\Http\Controllers\ProductController@editStore');
Route::get('products/create', 'App\Http\Controllers\ProductController@create');
Route::get('products/', 'App\Http\Controllers\ProductController@index');
Route::get('products/delete/{id}', 'App\Http\Controllers\ProductController@delete');
Route::get('products/buy/{id}', 'App\Http\Controllers\ProductController@buy');
Route::post('products/store/', 'App\Http\Controllers\ProductController@buystore');
Route::get('products/payment', 'App\Http\Controllers\ProductController@payment');
Route::get('products/avability', 'App\Http\Controllers\ProductController@indexAvability');
Route::get('products/unavability', 'App\Http\Controllers\ProductController@indexUnavability');
Route::get('products/zero', 'App\Http\Controllers\ProductController@amountZero');
Route::get('products/more', 'App\Http\Controllers\ProductController@amountFive');

//EDIT PRODUCT
Route::get('products/create', 'App\Http\Controllers\ProductController@create');
Route::post('products/', 'App\Http\Controllers\ProductController@store');

//INCOMES
Route::get('incomes/', 'App\Http\Controllers\IncomeController@index');
Route::get('incomes/show', 'App\Http\Controllers\IncomeController@show');

//USERS
Route::post('users/', 'App\Http\Controllers\UserController@store');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
