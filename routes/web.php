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


Route::get('signup','App\Http\Controllers\LoginController@signup');           
Route::post('signup','App\Http\Controllers\LoginController@do_signup');
Route::get('login','App\Http\Controllers\LoginController@login');
Route::post('login','App\Http\Controllers\LoginController@do_login');
Route::get('logout','App\Http\Controllers\HomeController@logout');
Route::get('home','App\Http\Controllers\HomeController@home');
Route::get('profile','App\Http\Controllers\HomeController@profile');
Route::get('new_post','App\Http\Controllers\NewPostController@new_post');

Route::get('europeana_api/{ricerca}','App\Http\Controllers\NewPostController@europeana_api');
Route::post('salva_elem','App\Http\Controllers\NewPostController@salva_elem');
Route::post('elimina_post','App\Http\Controllers\HomeController@elimina_post');

Route::get('ticketmaster_api/{ricerca}','App\Http\Controllers\NewPostController@ticketmaster_api');    
Route::post('salva_evento','App\Http\Controllers\NewPostController@salva_evento');
Route::post('elimina_evento','App\Http\Controllers\HomeController@elimina_evento');     


