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
       $vo = DB::table('goods')->where('id',$id)->first();
       // dd($vo);// $data = DB::table('goods')->get();
        $v = DB::table('goods as g')
        ->join('good_xq as xq','g.id','=','xq.id')
        ->select('xq.banben','xq.zping','xq.nume','xq.color','xq.fuwu','xq.size','xq.rongliang','g.id','g.goods','g.cate','g.company','g.descr','g.price','g.picname','g.con','g.erji','g.cdq','g.zpg','g.state')
        ->where('xq.id','<=',$id)
        ->get();
         $reg = '/src=[\'"]?([^\'"]*)[\'"]?/';
         preg_match_all($reg,$vo['con'],$arr);
        // dd($arr);
     return view('home.xq',[
        'as'=>$v,
        'aa'=>$arr
        ]);
    }
}
