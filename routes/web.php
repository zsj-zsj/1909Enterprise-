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

Route::get('/',function(){
    phpinfo();
});

// Route::get('/','Index\IndexController@index');
Route::get('message','Index\Message@index');  //留言
Route::get('messagelist','Index\Message@adminlist');  //后天留言列表

// ---------------------------------------------------------------

// 后台登录
Route::get('adlogin','Admin\User@login');
Route::post('addologin','Admin\User@dologin');
Route::get('quit','Admin\User@quit');

//后台主页
Route::get('admin','Admin\IndexController@index')->middleware('login');
Route::get('head','Admin\IndexController@head')->middleware('login');
Route::get('left','Admin\IndexController@left')->middleware('login');
Route::get('main','Admin\IndexController@main')->middleware('login');

//导航栏
Route::prefix('navigation')->group(function(){
    Route::get('/create','Admin\Navigation@create')->middleware('login');
    Route::post('/story','Admin\Navigation@story');
    Route::get('/index','Admin\Navigation@index')->middleware('login');
    Route::get('/edit','Admin\Navigation@edit');
    Route::post('/upd','Admin\Navigation@upd');
    Route::post('/del','Admin\Navigation@del');
    Route::post('/change','Admin\Navigation@change');
    Route::post('/changesort','Admin\Navigation@changesort');
});

//分类
Route::prefix('cate')->group(function(){
    Route::get('/create','Admin\Category@create')->middleware('login');
    Route::post('/story','Admin\Category@story');
    Route::get('/index','Admin\Category@index')->middleware('login');
    Route::post('/del','Admin\Category@del');
    Route::get('/edit','Admin\Category@edit');
    Route::post('/upd','Admin\Category@upd');
    Route::post('/isshow','Admin\Category@isshow');
});
//分类详情
Route::prefix('catecont')->group(function(){
    Route::get('/create','Admin\CateCont@create')->middleware('login');
    Route::post('/story','Admin\CateCont@story');
    Route::get('/index','Admin\CateCont@index')->middleware('login');
    Route::post('/del','Admin\CateCont@del');
    Route::get('/edit','Admin\CateCont@edit');
    Route::post('/upd','Admin\CateCont@upd');
    Route::post('/isshow','Admin\CateCont@isshow');
    Route::post('/changesort','Admin\CateCont@changesort');
});
//图片分类
Route::prefix('cateimg')->group(function(){
    Route::get('/create','Admin\CateImg@create')->middleware('login');
    Route::post('/upload','Admin\CateImg@upload');
    Route::post('/story','Admin\CateImg@story')->middleware('login');
    Route::get('/index','Admin\CateImg@index');
    Route::post('/del','Admin\CateImg@del');
    Route::get('/edit','Admin\CateImg@edit');
    Route::post('/upd','Admin\CateImg@upd');
});

// rbac
Route::prefix('admin')->group(function(){
    //角色添加
    Route::get('/role_cre','Admin\Role@create')->middleware('login');
    Route::post('/role_add','Admin\Role@add');
    Route::get('/role_index','Admin\Role@index')->middleware('login');
    Route::post('/role_del','Admin\Role@del');
    Route::get('/role_edit','Admin\Role@edit');
    Route::post('/role_upd','Admin\Role@upd');

    //权限添加
    Route::get('/permission_cre','Admin\Permission@create')->middleware('login');
    Route::post('/permission_add','Admin\Permission@add');
    Route::get('/permission_index','Admin\Permission@index')->middleware('login');
    Route::post('/permission_del','Admin\Permission@del');
    Route::get('/permission_edit','Admin\Permission@edit');
    Route::post('/permission_upd','Admin\Permission@upd');
    
    //角色权限
    Route::get('/role_perm_cre','Admin\RolePerm@create')->middleware('login');
    Route::post('/role_perm_add','Admin\RolePerm@add');
    Route::get('/role_perm_index','Admin\RolePerm@index')->middleware('login');
    Route::post('/role_perm_del','Admin\RolePerm@del');
    Route::get('/role_perm_edit','Admin\RolePerm@edit');
    Route::post('/role_perm_upd','Admin\RolePerm@upd');

    //添加管理员
    Route::get('/reg','Admin\User@reg')->middleware('login');
    Route::post('/doreg','Admin\User@doreg');
    Route::get('/indexuser','Admin\User@indexuser')->middleware('login');
    Route::post('/userdel','Admin\User@userdel');
    Route::get('/user_edit','Admin\User@edit');
    Route::post('/user_upd','Admin\User@upd');
    Route::get('/updpass','Admin\User@updpass')->middleware('login');
    Route::post('/doupdpass','Admin\User@doupdpass');
});

