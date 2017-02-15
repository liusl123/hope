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
      // $r = DB::table('color')->get();
      // dd($r);
       // $cd = DB::table('goods as g')
       //  ->join('good_xq as xq','g.cate','=','xq.cate')
       //  ->join('color as c','xq.cate','=','c.cate')
       //  ->select('xq.cate','g.cate','c.cate','c.picture')
       //  ->where('c.cate','=',$cate)->get();
        // $w = DB::table('color')->where('cate',$cate)->get();
       // dd($cd['cate']);
        // dd($cd);

     //  dd($cd);
       // $vo = DB::table('goods')->where('id',$id)->first();
        $vo = DB::table('goods')->where('id',$id)->first();
        // dd($r);
        // $vc = DB::table('photo')->get();
        // dd($vc);
       // $co =DB::table('goods')->where('id','>=',1)->value('cate');
       
        // for($index=0;$index<count($hello);$index++) 
        // { 
        // echo $hello[$index]; 
        // } 
       // dd($hello);// $data = DB::table('goods')->get(); 
         $c = DB::table('cate')->join('activity','cate.cate','=','activity.cate')->select('activity.*','cate.cate')->get();
        $e = DB::table('photo')->where('id',$id)->get();
          
         // dd($e);
        $aa = DB::table('good_xq')->where('id',$id)->first();
        $yy = DB::table('color')->where('id',$id)->first();
        $er = DB::table('color')->where('id',$id)->get();
        // dd($yy);
        // dd($arr2[0]);
       
       // foreach($arr2[0] as $k=>$v){
       //    // dd($v);
       //    // $arr2[0][$k]=trim($v,"\"");
        
        
       // }
       // dd($arr2[0]);
       // dd($quan);
        // $aa = DB::table('good_xc')-get();
        // dd($vo);
          //按逗号分离字符串
       
          // dd($hello); 
          // dd($hello);
        $v = DB::table('goods as g')
        ->join('good_xq as xq','g.id','=','xq.goodid')
        ->join('color as c','c.goodid','=','g.id')
        ->join('photo as p','p.goodid','=','g.id')
        ->select('xq.*','g.*','c.*','p.*')->where('g.id','=',$id)
        ->get();
        // dd($v);
          
            $source = $aa['banben']; 
            $hello = explode('/',$source);
            $dada=$hello;
            $qq  =$aa['rongliang'];
            $cc = explode('/',$qq);
            $ww=$cc;
             $ee  =$aa['size'];
            $pp = explode('/',$ee);
            $vv=$pp;
            $dd = $yy['color']; 
            $rr = explode('/',$dd);
            $tt=$rr;
              // dd($arr[1]);
              return view('home.good',[
              'as'=>$v,
              'aa'=>$c,
              'xx'=>$dada,
              'rr'=>$ww,
              'zz'=>$vv,
              'tt'=>$tt,
              'ww'=>$e,
              'pp'=>$er
        ]);
   
}
}