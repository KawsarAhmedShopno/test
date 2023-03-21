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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/doctor', 'App\Http\Controllers\DoctorController');


Route::get('/appointment', 'App\Http\Controllers\AppointmentController@view')->name('appointment.index');


Route::post('/appointment/store', 'App\Http\Controllers\AppointmentController@store')->name('appointment.store');


Route::delete('/appointment/{id}', 'App\Http\Controllers\AppointmentController@destroy')->name('appointment.destroy');
