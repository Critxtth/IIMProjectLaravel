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


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/', 'ArticleController');
Route::resource('/articles', 'ArticleController');

Route::get('/{pageId}', function($pageId){

    return view('page',['pageId' => $pageId]);

});

Route::get('comments/{pageId}', 'CommentController@index');

Route::post('comments', 'CommentController@store');

Route::post('comments/{commentId}/{type}', 'CommentController@update');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/create', 'ArticleController@store');

Route::get('/modif', 'ArticleController@articles');




Route::get('/{article}/edit', 'ArticleController@edit');



Route::get('/{article}', 'ArticleController@show');
