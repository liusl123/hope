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


Route::group(['middleware'=>'login'],function(){
    //后台主页
    Route::get('/admin', 'AdminController@index');

    //分类模块
    // Route::controller('/admin/cate','CateController');

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