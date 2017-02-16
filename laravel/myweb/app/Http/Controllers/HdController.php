<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HdController extends Controller
{
     public function getXi($id){
    	$c = DB::table('activity_xq')->where('id',$id)->get();
    	// dd($c);
    	return view('hd.xi',['vo'=>$c]);
    }
}
