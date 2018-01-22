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



Auth::routes();

Route::resource('/', 'ArticleController');
Route::resource('/articles', 'ArticleController');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'ArticleController@store');



Route::get('/{article}/edit', 'ArticleController@edit');
Route::get('/modif', 'ArticleController@articles');

Route::get('/{article}', 'ArticleController@show');