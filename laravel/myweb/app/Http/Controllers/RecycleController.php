<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class RecycleController extends Controller
{
    
    //用户
    public function getUser(Request $request){
        $data = DB::table('user') -> where(function($query) use($request){
            if($request -> input('keyword')!=null){
                $query -> where('name','like','%'.$request -> input('keyword').'%')
                       -> orwhere('email','like','%'.$request -> input('keyword').'%');
            }
        }) -> where('state','0') -> paginate($request -> input('num',5));
        return view('recycle.user',['list' => $data,'request' => $request -> all()]);
    }
    // 用户的删除
    public function getDelu($id){
        $res = DB::table('user')->where('id',$id)->delete();
        if($res){
            return redirect('/admin/recycle/user')->with('success','彻底删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    // 用户的还原
    public function getRestoreu($id){
        $res = DB::table('user')->where('id',$id)->update(['state'=>1]);
        if($res){
            return redirect('/admin/recycle/user')->with('success','用户还原成功');
        }else{
            return back()->with('error','用户还原失败');
        }
    }

    //商品
    // public function getGoods(){
    //     return view('recycle.goods');
    // }
    public function getGoods(Request $request){
        $data = DB::table('goods') -> where(function($query) use($request){
            if($request -> input('keyword')!=null){
                $query -> where('goods','like','%'.$request -> input('keyword').'%')
                       -> orwhere('cate','like','%'.$request -> input('keyword').'%');
            }
        }) -> where('state','4') -> paginate($request -> input('num',5));
        return view('recycle.goods',['list' => $data,'request' => $request -> all()]);
    }
    // 商品的删除
    public function getDelg($id){
        $res = DB::table('goods')->where('id',$id)->delete();
        if ($res) {
            return redirect('/admin/recycle/goods')->with('success','商品删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
    // 商品的还原
    public function getRestoreg($id){
        $res=DB::table('goods')->where('id',$id)->update(['state'=>1]);
        if($res){
            return redirect('/admin/recycle/goods')->with('success','商品还原成功');
        }else{
            return back()->with('error','商品还原失败');
        }
    }
}
