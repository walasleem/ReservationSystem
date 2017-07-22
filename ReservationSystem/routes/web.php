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

Route::post('/ReservationSystem/airports/create','AirportController@store');
Route::get('/ReservationSystem/airports','AirportController@index');
Route::patch('/ReservationSystem/airports/update/{airport}','AirportController@update');
Route::get('/ReservationSystem/airports/show/{airport}','AirportController@show');
Route::delete('/ReservationSystem/airports/delete/{airport}','AirportController@destroy');
Route::get('/ReservationSystem/airports/search/{city}','AirportController@search');

Route::post('/ReservationSystem/flights/create','FlightController@store');
Route::get('/ReservationSystem/flights','FlightController@index');
//Route::get('/ReservationSystem/test','FlightController@test');
Route::get('/ReservationSystem/flights/search/{from}/{to}','FlightController@search');
Route::patch('/ReservationSystem/flights/update/{flight}','FlightController@update');
Route::get('/ReservationSystem/flights/show/{flight}','FlightController@show');
Route::delete('/ReservationSystem/flights/delete/{flight}','FlightController@destroy');

Route::post('/ReservationSystem/users/flights/reserve','UserController@reserve');
Route::post('/ReservationSystem/users/flights/cancel/{flight}','UserController@cancel');

Route::get('/ReservationSystem/users','UserController@index');
Route::patch('/ReservationSystem/users/update/{user}','UserController@update');
Route::post('/ReservationSystem/users/create','UserController@store');
Route::get('/ReservationSystem/users/show/{user}','UserController@show');
Route::delete('/ReservationSystem/users/delete/{user}','UserController@destroy');
//Route::get('/auth0/callback', '\Auth0\Login\Auth0Controller@callback');
Route::get('/',function(){
	echo "You Are A User";
});
Route::get('/loogedOut',function(){
	echo "You Are A Guest";
});

Route::get('/ReservationSystem/login','UserController@login');
Route::get('/ReservationSystem/logout', 'UserController@logout')->middleware('auth');
Route::get('/callback','\Auth0\Login\Auth0Controller@callback');





