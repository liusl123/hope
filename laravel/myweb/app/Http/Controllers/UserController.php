<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller

{
  
    public function getAdd(){
        return view('user.add');
    }
    public function postInsert(Request $request){
        $this->validate($request, [
        'username' => 'required|unique:user',
        'name' => 'required',
        'pass'=>'required',
        'repass'=>'same:pass|required',
        'email'=>'required',
        'phone'=>'required',
   
    ],[
        'username.required' => '账户是必填的',
        'username.unique' => '账户已存在',
        'name.required'  => '姓名是必填的',
        'pass.required'=>'密码是必填的',
        'repass.same'=>'两次密码必须一致',
        'repass.required'=>'重复密码必须存在',
        'email.required'=>'邮箱必须存在',
        'phone.required'=>'手机是必填的',
    ]
    );
        $data=$request->except(['_token','repass']);
        $res=DB::table('user')->insert($data);
        if($res){
           return redirect('/admin/user/index')->with('success','插入成功');
        }else{
            return back()->with('error','插入失败');
        }
    }

    //用户的浏览
   public function getIndex(Request $request){
    // $res=$request->all();

    $data=DB::table('user')->where(function($query) use($request){
        if($request->input('keyword')!=null){
        $query->where('username','like','%'.$request->input('keyword').'%')
        ->orwhere('email','like','%'.$request->input('keyword').'%');
    }
    })->paginate($request->input('num',5));
    // $data=DB::table('user')->paginate(3);
    // dd($data);
    // var_dump($request->input('num'));
    return view('user.index',['list'=>$data,'request'=>$request->all()]);
   }
   //用户的删除
   public function getDel($id){
    // echo '用户的删除';
    // echo "$id";
    $res=DB::table('user')->where('id',$id)->delete();
    if($res){
        return redirect("/admin/user/index")->with('success','删除成功');
    }else{
        return redirect("/admin/user/index")->with('error','删除失败');
    }
   }
   //用户的修改
   public function getEdit($id){
    // echo '用户的修改';
    // echo "$id";
    $data=DB::table('user')->where('id',$id)->first();
    // dd($data);
    return view('user.edit',['list'=>$data]);    
   }

   public function postUpdate(Request $request){
        $data=$request->only('id','email','status');
        // dd($data);
        $res=DB::table('user')->where('id',$data['id'])->update($data);
        if($res){

            return redirect('/admin/user/index')->with('success','修改成功');
        }else{
            return redirect('/admin/user/index')->with('error','修改失败');
        }
   }
}
