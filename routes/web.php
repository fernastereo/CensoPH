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

Route::get('/fetch', 'DynamicDependent@fetch');
Route::get('/verify/{token}', 'DynamicDependent@verify')->name('verify');
Route::get('/sendverification/{user}', 'DynamicDependent@reSendVerification')->name('resend');

Route::middleware(['auth'])->group(function(){
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/findsomething', 'DynamicDependent@findsomething');
	Route::get('/findallhabitants', 'DynamicDependent@findallhabitants');
	Route::get('/findinactivehabitants', 'DynamicDependent@findinactivehabitants');

	Route::resource('properties', 'PropertyController');

	Route::get('/habitants/create/{property_id}', 'HabitantController@create')->name('habitants.createh'); //el ? indica que es opcional el parametro
	Route::get('/habitants/{habitant}/active', 'HabitantController@active')->name('habitants.active');
	Route::resource('habitants', 'HabitantController');

	Route::get('/vehicles/create/{property_id}', 'VehicleController@create')->name('vehicles.createh');
	Route::get('/vehicles/{vehicle}/active', 'VehicleController@active')->name('vehicles.active');
	Route::resource('vehicles', 'VehicleController');

	Route::get('/pets/create/{property_id}', 'PetController@create')->name('pets.createh');
	Route::get('/pets/{pet}/active', 'PetController@active')->name('pets.active');
	Route::resource('pets', 'PetController');	
});