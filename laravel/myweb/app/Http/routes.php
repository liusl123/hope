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
以post方式发送ajax请求一个路由
Route::get('/ajax',function(){
	return view('test.ajax');--->注意括号里面的路径
});
Route::post('/test1',function(){--->注意'/test1'要与ajax中url的提交地址一致
	echo '问君能有几多愁,恰似一江春水向东流';
});

路由组中的格式是---->
Route::group(['middleware'=>'login'],function(){
	
});

Route::get('/t',[
	'as'=>'test',
	'uses'=>'TestController@test'----->中的'uses'是代表使用的意思所以不能换
]);
//可以传递参数--->http://www.lamp169.com/good/edit/5&&&public function getEdit($id){
    	// echo '商品修改页面'.$id;
    // }----->缺点就是不能在这里限制参数需要在行内限制

   Route::controller('/request','RequestController');---->隐式控制器一定要记得去请求文件加get 
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