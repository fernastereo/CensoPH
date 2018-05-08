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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/fetch', 'DynamicDependent@fetch');
Route::get('/findsomething', 'DynamicDependent@findsomething');
Route::get('/verify/{token}', 'DynamicDependent@verify')->name('verify');
Route::get('/sendverification/{user}', 'DynamicDependent@reSendVerification')->name('resend');

Route::resource('properties', 'PropertyController');
Route::get('habitants/create/{property_id}', 'HabitantController@create')->name('habitants.createh'); //el ? indica que es opcional el parametro
Route::resource('habitants', 'HabitantController');
Route::delete('habitants/{habitant}', 'HabitantController@destroy');