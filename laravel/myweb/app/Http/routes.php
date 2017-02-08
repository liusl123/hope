<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/admin','AdminController@index');
Route::controller('/admin/user','UserController');
Route::controller('/admin/cate','CateController');
Route::controller('/admin/good','GoodsController');

Route::controller('/admin/administrator','AdministratorController');
Route::controller('/sy','SyController');
Route::controller('/order/orders','OrdersController');
// 回收站
Route::controller('/admin/recycle','RecycleController');
// 验证码
Route::get('/code','AdminController@code');
// 后台登录
Route::controller('/admin','AdminController');




// sql语句记录
// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });