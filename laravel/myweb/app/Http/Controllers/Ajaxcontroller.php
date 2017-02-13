<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AjaxController extends Controller
{
    //查询手机号是否已经注册
    public function getUpdatephone(){
    	$phone=$_GET['iphone'];
    	// echo $phone;
    	$res=DB::table('user')->where('phone',$phone)->count();
    	if($res){
    		echo "存在";
    	}else{
    		echo "不存在";
    	}
    	// echo "hahahaha";
    }
    //查询邮箱号是否已经注册
    public function getUpdateemail(){
    	$email=$_GET['email'];
    	// echo $phone;
    	$res=DB::table('user')->where('email',$email)->count();
    	if($res){
    		echo "存在";
    	}else{
    		echo "不存在";
    	}
    	// echo "hahahaha";
    }
}
