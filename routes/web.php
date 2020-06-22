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

Route::get('/','Index\IndexController@index');




Route::get('admin','Admin\IndexController@index');
Route::get('head','Admin\IndexController@head');
Route::get('left','Admin\IndexController@left');
Route::get('main','Admin\IndexController@main');
