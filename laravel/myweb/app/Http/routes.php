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

Route::get('/','AdminController@index');
// Route::controller('/admin/user','UserController');
Route::controller('/admin/cate','CateController');
Route::controller('/admin/good','GoodsController');
Route::controller('/home/good','GoodController');
Route::controller('/admin/administrator','AdministratorController');
// Route::controller('/sy','SyController');
// Route::controller('/admin/orders','OrdersController');
Route::controller('/admin/activity','ActivityController');
Route::controller('/home/activity','ActivityController');
Route::controller('/home/sc','ScController');
Route::controller('/home/shouji','SjController');
Route::controller('/home/sp','XiController');
Route::controller('/admin/xq','XqController');
Route::controller('/admin/photo','PhotoController');
Route::controller('/admin/color','ColorController');
// Route::controller('/admin/lunbo','LbController');
// Route::group(['middleware'=>'login'],function(){
// 	//网站首页
// });


//后台登录页面

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


   
//验证码
   // Route::controller('/code','LoginController');

   


 //   Event::listen('illuminate.query',function($query){
 //     var_dump($query);
 // });
