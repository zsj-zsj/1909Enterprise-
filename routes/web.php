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



//后台主页
Route::get('admin','Admin\IndexController@index');
Route::get('head','Admin\IndexController@head');
Route::get('left','Admin\IndexController@left');
Route::get('main','Admin\IndexController@main');

//导航栏
Route::prefix('navigation')->group(function(){
    Route::get('/create','Admin\Navigation@create');
    Route::post('/story','Admin\Navigation@story');
    Route::get('/index','Admin\Navigation@index');
    Route::get('/edit','Admin\Navigation@edit');
    Route::post('/upd','Admin\Navigation@upd');
    Route::post('/del','Admin\Navigation@del');
    Route::post('/change','Admin\Navigation@change');
    Route::post('/changesort','Admin\Navigation@changesort');
});