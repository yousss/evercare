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
Route::get('/news/create', 'NewController@create')->name('news.create');
Route::post('/news/store', 'NewController@store')->name('news.store');
Route::delete('/news/{id}', 'NewController@destroy')->name('news.destroy');
Route::get('/news/show/{id}', 'NewController@show')->name('news.show');
