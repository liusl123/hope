<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SyController extends Controller
{
    public function getAdd(){
    	return view('shouye.index');
    }
}
