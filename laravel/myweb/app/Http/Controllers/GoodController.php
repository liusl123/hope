<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GoodController extends Controller
{
     public function getXq($id){
        // dd($id);
       // $vo = DB::table('goods')->where('id',$id)->first();
        $vo = DB::table('goods')->where('id',$id)->first();
        // dd($vo);
        $vc = DB::table('good_xq')->where('id',$id)->first();
       // $co =DB::table('goods')->where('id','>=',1)->value('cate');
        $source = $vc['banben'];//按逗号分离字符串 
        $hello = explode('/',$source); 

        // for($index=0;$index<count($hello);$index++) 
        // { 
        // echo $hello[$index]; 
        // } 
       // dd($hello);// $data = DB::table('goods')->get(); 
         $c = DB::table('cate')->join('activity','cate.cate','=','activity.cate')->select('activity.*','cate.cate')->get();
         // dd($c);
        if( $v = DB::table('goods as g')
        ->join('good_xq as xq','g.id','=','xq.goodid')
        ->select('xq.*','g.*')->where('g.id','=',$id)
        ->get()){
             $reg = '/src=[\'"]?([^\'"]*)[\'"]?/';
             preg_match_all($reg,$vo['con'],$arr);
              $reg = '/src=[\'"]?([^\'"]*)[\'"]?/';
             preg_match_all($reg,$vc['contype'],$arr);
              return view('home.xq',[
              'as'=>$v,
              'aa'=>$c,
              'bb'=>$hello
        // 'aa'=>$arr
        ]);
      }else{
        return back()->with('error','查询失败'); 
      }
       
        // dd($v);
   
    }
}
