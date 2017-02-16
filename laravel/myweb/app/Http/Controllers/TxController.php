<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TxController extends Controller
{
    public function getIndex(){
    	return view('tx.index');
    }
}
