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

// Route::controller('/admin/user','UserController');
Route::controller('/home/good','GoodController');
// Route::controller('/sy','SyController');
// Route::controller('/admin/orders','OrdersController');
Route::controller('/home/activity','ActivityController');
Route::controller('/home/sc','ScController');
Route::controller('/home/shouji','SjController');
Route::controller('/home/sp','XiController');
Route::controller('/admin/xq','XqController');
Route::controller('/admin/photo','PhotoController');
Route::controller('/admin/color','ColorController');
// Route::controller('/admin/lunbo','LbController');

Route::group(['middleware'=>'login'],function(){
    //后台主页
    Route::get('/admin', 'AdminController@index');

    //分类模块
    // Route::controller('/admin/cate','CateController');
    Route::controller('/admin/cate','CateController');
    Route::controller('/admin/good','GoodsController');
    Route::controller('/admin/administrator','AdministratorController');
    Route::controller('/admin/orders','OrdersController'); 
    //用户模块
    Route::controller('/admin/user','UserController');
    Route::controller('/admin/activity','ActivityController');
    // 回收站
    Route::controller('/admin/recycle','RecycleController');
    
});
// 后台登录
Route::controller('/admin','AdminController');
// 验证码
Route::get('/code','AdminController@code');

// 临时路由
Route::get('/grzx','GrzxController@grzx');

// 购物车
Route::controller('/home/cart','CartController');

// 商品临时
Route::controller('/home/good','GoodController');

// 订单
// Route::any('/home/order/add','OrderController@add');
Route::controller('/home/order','OrderController');

// 地址
Route::controller('/home/address','AddressController');


// sql语句记录
// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });