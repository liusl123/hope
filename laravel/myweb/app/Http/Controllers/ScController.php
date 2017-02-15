<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ScController extends Controller
{
    public function getIndex(){
    	// dd($id);
    	
        $c = DB::table('cate')->join('activity','cate.cate','=','activity.cate')->select('activity.*','cate.cate')->get();
    	$b = DB::table('cate')->join('goods','cate.cate','=','goods.cate')->select('goods.*','cate.cate')->get();
        // $e = DB::table('photo')->get();
        $f = DB::table('color')->get();
        // dd($f);
 
 		 $a = DB::table('good_xq')->get();
    	return view('sc.index',[
    		'vo'=>$c,
    		'vc'=>$b,
    		'aa'=>$a,
            // 'cc'=>$e,
            'ee'=>$f
    		]);
    }
}

     