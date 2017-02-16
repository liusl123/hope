<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class XiController extends Controller
{
    public function getXi($id){
    	$c = DB::table('color')->where('id',$id)->get();
    	// dd($c);
    	return view('sp.xi',['vo'=>$c]);
    }
}
