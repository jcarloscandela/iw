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
/*
Route::get('/', function () {
    return view('/home/laravel');
});*/
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'HomeController@index')->name('home.inicio');

Route::get('/listado', 'HomeController@listado')->name('home.listado');
///App/Http/Controllers/

Route::get('/tabla', 'HomeController@tabla')->name('home.tabla');
Route::get('/tabla_ajax', 'HomeController@tabla_ajax')->name('ajax.tabla');

Route::get('/logged', function(){
  return view('home');
});

Route::get('/welcome', function(){
  return view('welcome');
});

Route::get('/tracks', 'TracksController@index')->name('tracks.tabla');