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

Route::get('/pagoda','FrontendController@index');

Route::group(['prefix' => 'admin' , 'middleware' => 'auth'], function () {
	Route::get('/','DashboardController@index');
	Route::resource('/founder','FounderController');
	Route::resource('/pagoda','PagodaController');
});