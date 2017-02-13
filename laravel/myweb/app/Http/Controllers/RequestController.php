<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Config;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RequestController extends Controller
{
    public function getInfo(Request $request){//对象注入  $request ->由请求报文转化为的对象 来自于全局中间件
    	//'获取请求的基本信息';
    	//1 获取请求方式
    	// echo $request->method();
    	
    	//2.检测请求方式
    	// dd($request->isMethod('get'));//bool(true) 	
    	// dd(array(
    	// 	array(1,2,2,3,4),
    	// 	array(1,2,2,3,4),
    	// 	array(1,2,2,3,4),
    	// 	array(1,2,2,3,4),
    	// ));//var_dump() die();  dd打印后面的代码不执行

    	//3.获取当前url中的路由规则
    	// dd($request->path());//  request/info
    
    	//4.获取完整的url
    	// dd($request->url());

    	//5.获取客户端的ip
    	// dd($request->ip());

    	//6.获取http协议的端口号
   		dd($request->getPort());

    }

    public function getForm(){
    	return view('request.form');
    }

    public function postParam(Request $request){
    	//获取所有请求的参数
    	// dd($request->all());
    	
    	//获取指定的参数
    	// dd($request->input('name'));

    	//默认值
    	// $name = $request->input('time',time());//对表单中不存在的属性给默认值

    	//检测表单中是否提交name字段并且检测是否为空
    	// if($request->has('bbb')){
    	// 	echo 'cunzai ';
    	// }else{
    	// 	echo 'bucunzai';
    	// }

    	//提取部分参数
    	// dd($request->only(['name','age']));	
    	// dd($request->except('_token'));

    	//获取请求头信息中的值
    	// dd($request->header('Connection'));	
    	// dd($request->header('Host'));	
    	dd($request->header('Cookie'));	
    }

    //加载上传表单
    public function upload(){
    	return view('request.form1');
    } 

    public function postDoupload(Request $request){
    	//完成上传
    	if($request->hasFile('pic')){
    		//将临时目录中的图片移动到指定的位置
    		// $request->file('pic')->move('./uploads/', 'iloveyou.jpg');	
    			
    		//读取配置文件 config 、db hash 类都是在根空间下 
    		$path = \Config::get('app.upload_dir');	
    		//获取一个随机的图片名
    		$picname = md5(time()+rand(0,999));	
    		//获取图片的后缀名
    		$suffix = $request->file('pic')->getClientOriginalExtension();//mime-->image/png	
    		$request->file('pic')->move($path, $picname.'.'.$suffix);	
    	}else{
    		echo '没有上传元素';
    	}	
    }
}
