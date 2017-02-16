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
			return back()->with('error','删除失败');
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
			$a = DB::table('admin')->where('id',$id)->first();
		
			if($a['status']=='2'){
				 if(DB::table('admin')->where('id',$id)->delete()){
				 	return redirect('/admin/administrator/index')->with('success','删除成功');
				 }
			}else{
				return back()->with('error','超级管理员不能被删除');
			}	
		}
		 public function getEdit($id){
		// echo '用户的修改';
		// echo "$id";
			$data=DB::table('admin')->where('id',$id)->first();
		// dd($data);
			return view('administrator.edit',['vo'=>$data]);    
		}

		public function postUpdate(Request $request){
		    $data=$request->only('id','name','email','phone');
		   $lala=DB::table('admin')->where('id',$request->input("id"))->first();
		   // dd($lala);
		   if($lala['status']=='2'){
		   		if(DB::table('admin')->where('id',$data['id'])->update($data)){
		   			return redirect('/admin/administrator/index')->with('success','修改成功');
		   		}
		   }else{
		   		return redirect('/admin/administrator/index')->with('error','超级管理员不能被修改');
		   }
		}
	}
