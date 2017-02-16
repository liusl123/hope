<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SjController extends Controller
{
    public function getSj(){
    	$b = DB::table('photo')->join('goods','photo.goodid','=','goods.id')->select('goods.*','photo.photo5')->get();
    	return view('sj.index',['vo'=>$b]);
    }
}
