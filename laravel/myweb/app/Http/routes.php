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


Route::group(['middleware'=>'adminlogin'],function(){
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


// sql语句记录
// Event::listen('illuminate.query',function($query){
//      var_dump($query);
//  });

//登录模块
Route::controller('/login','LoginController');

//临时测试订单的路由
Route::controller('/order','OrderController');

Route::controller('/address','AddressController');

//用户模块
Route::controller('/admin/user','UserController');
   
//axjx阿贾克斯
  Route::controller('/ajax','AjaxController');



   
//验证码
   // Route::controller('/code','LoginController');

   


 //   Event::listen('illuminate.query',function($query){
 //     var_dump($query);
 // });
