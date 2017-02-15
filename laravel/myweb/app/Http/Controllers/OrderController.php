<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Goods;
use App\Models\Order_detail;


use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //选择下单地址
    //因为用的不是隐式控制器所以就不用加post(老师用的是显示控制器.为了测试,我们这里还是用隐式)
    //路由代码->Route::controller('/home/cart','CartController')->放到路由组中设置中间件
    // public function getAdd(Request $reuqest){->因为没有表单提交所以的get
    public function getAdd(){

    	$address=AddressController::getAddressById(2);
    	return view('order.add',['address'=>$address]);
    }

    public function getIndexadd(){

        $address=AddressController::getAddressById(2);
        return view('order.indexadd',['address'=>$address]);
    }

    //获取当前用户的购物车中的订单总价
    public function getTotal(){
    	$cart=session('cart');
    	$total=0;
    	foreach($carts as $v){
    		$total+=Goods::findOrFail($v['id'])['price']*$v['num'];
    	}
    	return $total;
    }

    //执行下单
    public function postXiadan(Request $request){
    	// dd($request->all());
    	$oder= new Order;

    	//参数的注入
    	$order->order_num=time().rand(10000,99999);
    	$order->user_id=2;//session获取登陆者的id
    	$order->address_id=$request->input('address_id');
    	$order->total=$this->getTotal();
    	$order->status=0;// 0新订单 1已发货 2已收货

    	if($order->save()){//产生新的订单
    		//获取新订单的id
    		// dd($order->id);
    		$data=[];
    		foreach(session('carts') as $v){
    			$temp['goods_id']=$v['id'];
    			$temp['num']=$v['num'];
    			$temp['order_id']=$order->id;
    			$data[]=$temp;
    		}
    	}    
    }

    public function postDelxiadan(Request $request){
        $id=$request->input('address_id');
        // dd($id);
        $res=DB::table('addresses')->where('id',$id)->delete();

        if($res){
            return redirect('/order/indexadd');
        }else{
            return back();
        }

    }

   
}
