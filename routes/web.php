<?php

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

Route::get('/', [
	'uses' => 'App\Http\Controllers\HomeController@mainSite',
	'as' => 'index'
]);

Auth::routes();


Route::group(['middleware' => 'auth'], function() {

	Route::resource('/movies', 'App\Http\Controllers\MovieController');

	Route::resource('/series', 'App\Http\Controllers\SerieController');

	Route::get('/home', [
		'uses' => 'App\Http\Controllers\HomeController@index',
		'as' => 'home'
	]); 
});
