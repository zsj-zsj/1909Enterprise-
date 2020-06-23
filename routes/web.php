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

//分类
Route::prefix('cate')->group(function(){
    Route::get('/create','Admin\Category@create');
    Route::post('/story','Admin\Category@story');
    Route::get('/index','Admin\Category@index');
    Route::post('/del','Admin\Category@del');
    Route::get('/edit','Admin\Category@edit');
    Route::post('/upd','Admin\Category@upd');
    Route::post('/isshow','Admin\Category@isshow');
});
//分类详情
Route::prefix('catecont')->group(function(){
    Route::get('/create','Admin\CateCont@create');
    Route::post('/story','Admin\CateCont@story');
    Route::get('/index','Admin\CateCont@index');
    Route::post('/del','Admin\CateCont@del');
    Route::get('/edit','Admin\CateCont@edit');
    Route::post('/upd','Admin\CateCont@upd');
    Route::post('/isshow','Admin\CateCont@isshow');
    Route::post('/changesort','Admin\CateCont@changesort');
});