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

//后台登录页面
	Route::get('/admin','AdminController@index');

//登录模块
Route::controller('/login','LoginController');

//临时测试订单的路由
Route::controller('/order','OrderController');

Route::controller('/address','AddressController');

//用户模块
Route::controller('/admin/user','UserController');
   
//axjx阿贾克斯
  Route::controller('/ajax','AjaxController');

//类别模块
   Route::controller('/admin/cate','CateController');


   
//验证码
   // Route::controller('/code','LoginController');

   


 //   Event::listen('illuminate.query',function($query){
 //     var_dump($query);
 // });
