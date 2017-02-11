<?php

namespace App\Http\Controllers;
use DB;
use Hash;
use Illuminate\Http\Request;
use App\Http\Requests\AdministratorRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdministratorController extends Controller
{
    public function getAdd(){
    	return view('administrator.add');
    }
    public function postInsert(AdministratorRequest $request){
    	$data  =$request->except(['_token','repass']);
    	$data['pass'] = Hash::make($data['pass']);
    	$data['token']= str_random(50);
    	$data['status']=2;//1超级管理员 2普通管理员
    	// dd($data);
    	$res = DB::table('admin')->insert($data);
		if($res){
			return redirect('/admin/administrator/index')->with('success','添加成功');
		}else{
			return back()->withInput();
		}
    }
    public function getIndex(Request $request){
		$data = DB::table('admin')->where(function($query) use($request){//use给当前匿名函数引入外部的$request变量
			if($request->input('keyword')!=null){//$query 就是数据库user的模型
				$query->where('name','like','%'.$request->input('keyword').'%')
				->orWhere('email','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',5));
		return view('administrator.index',['list'=>$data,'request'=>$request->all()]);	
	}
	public function getDel($id){
		$res = DB::table('admin')->where('id',$id)->delete();
		if($res){
			return redirect('/admin/administrator/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');
		}
	}
}
