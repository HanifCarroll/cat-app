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

Route::get('/cats', 'CatController@index');
Route::get('/cats/new', 'CatController@create');
Route::post('/cats', 'CatController@store');
Route::get('/cats/{cat}', 'CatController@show');
Route::get('/cats', 'CatController@index');
Route::get('/cats/{cat}/edit', 'CatController@edit');
Route::patch('/cats/{cat}', 'CatController@update');
Route::delete('/cats/{cat}', 'CatController@destroy');

Route::post('/cats/{cat}/comments', 'CommentController@store');