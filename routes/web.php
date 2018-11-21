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

Route::get('/', 'ContactController@index');
Route::get('/create', 'ContactController@create');
Route::get('/update/{id}', 'ContactController@update');
Route::post('/save', 'ContactController@save');
Route::get('/delete/{id}', 'ContactController@delete');
