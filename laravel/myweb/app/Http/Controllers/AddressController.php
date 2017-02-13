<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    //
    public static function getAddressById($uid){//$uid 谁登陆谁就是用这个id
    	// dd($uid);
    	return Address::where('user_id','=',$uid)->get();
    }

     public function postDoadd(Request $request){
    	// echo "执行添加下单";
    	// dd($request->all());
    	$address=new Address;
    	$address->sheng=$request->input('sheng');
    	$address->shi=$request->input('shi');
    	$address->xian=$request->input('xian');
    	$address->jiedao=$request->input('jiedao');
    	$address->phone=$request->input('mobilePhone');
    	$address->name=$request->input('receiverName');
    	$address->user_id=2;
    	$address->isdefault=$request->input('defaultAddress',0);

    	if($address->save()){
    		return back();
    	}
    }
}
