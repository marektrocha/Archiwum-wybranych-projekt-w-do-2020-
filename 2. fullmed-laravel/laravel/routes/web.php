<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth as FacadesAuth; // fasada logowania i zabezpieczania middleware

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

Route::get('doctors/edit/{id}', 'App\Http\Controllers\DoctorController@edit');

Route::post('doctors/edit/', 'App\Http\Controllers\DoctorController@editStore');

Route::get('doctors/create', 'App\Http\Controllers\DoctorController@create');

Route::post('doctors/', 'App\Http\Controllers\DoctorController@store');

Route::get('doctors/', 'App\Http\Controllers\DoctorController@index');

Route::get('doctors/{id}', 'App\Http\Controllers\DoctorController@show');

Route::get('doctors/specialisations/{id}', 'App\Http\Controllers\DoctorController@listBySpecialisation');

Route::get('doctors/delete/{id}', 'App\Http\Controllers\DoctorController@delete');



Route::get('patients/', 'App\Http\Controllers\PatientController@index')->middleware('auth');

Route::get('patients/{id}', 'App\Http\Controllers\PatientController@show')->middleware('auth');

Route::post('patients', 'App\Http\Controllers\PatientController@store');


Route::get('specialisations/', 'App\Http\Controllers\SpecialisationController@index');

Route::get('specialisations/create', 'App\Http\Controllers\SpecialisationController@create');

Route::post('specialisations/', 'App\Http\Controllers\SpecialisationController@store');


Route::get('visits/', 'App\Http\Controllers\VisitController@index');

Route::get('visits/create', 'App\Http\Controllers\VisitController@create');

Route::post('visits/', 'App\Http\Controllers\VisitController@store');



FacadesAuth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
