<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SjController extends Controller
{
    public function getSj(){
    	$b = DB::table('cate')->join('goods','cate.cate','=','goods.cate')->select('goods.*','cate.cate')->get();
    	return view('sj.index',['vo'=>$b]);
    }
}
