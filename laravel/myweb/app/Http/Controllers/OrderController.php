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
    public function getAdd(Request $request){
        // dd(session('cart'));
        // dd($request->input('t'));
        $t = $request->input('t');
    	$address=AddressController::getAddressById(session('id'));
        $carts = session('cart');
        $data = [];
        foreach($carts as $v){
            $temp = Goods::findOrFail($v['id']);
            $temp['num'] = $v['num'];
            $temp['color'] = $v['color'];
            $temp['picname'] = $v['picname'];
            $data[] = $temp;
        }
    	return view('order.add',['t'=>$t,'data'=>$data,'address'=>$address]);
    }


    public function getIndexadd(){
        // dd(session('id'));
        $address=AddressController::getAddressById(session('id'));
        return view('order.indexadd',['address'=>$address]);
    }


    //获取当前用户的购物车中的订单总价
    public function getTotal(){
    	$carts=session('cart');
    	$total=0;
    	foreach($carts as $v){
    		$total+=Goods::findOrFail($v['id'])['price']*$v['num'];
    	}
    	return $total;
    }

    //执行下单
    public function postXiadan(Request $request){
    	// dd($request->input('commit'));
    	$order= new Order;

    	//参数的注入
    	$order->order_num=time().rand(10000,99999);
    	$order->user_id=session('id');//session获取登陆者的id
    	$order->address_id=$request->input('address_id');
    	$order->total=$this->getTotal();
        $order->commit=$request->input('commit');
    	$order->status=0;// 0新订单 1已发货 2已收货

    	if($order->save()){//产生新的订单
    		//获取新订单的id
    		// dd($order->id);
    		$data=[];
    		foreach(session('cart') as $v){
    			$temp['goods_id']=$v['id'];
    			$temp['num']=$v['num'];
    			$temp['order_id']=$order->id;
                $temp['color']=$v['color'];
    			$data[]=$temp;
                // dd($data);
    		}
            Order_detail::insert($data);
    	} 
        return view('order.syt',['temp'=>$temp]);    
    }

    public function postDelxiadan(Request $request){
        $id=$request->input('address_id');
        // dd($id);
        $res=DB::table('addresses')->where('id',$id)->delete();

        if($res){

           

            return redirect('/home/order/add');

        }else{
            return back();
        }
    }

    //并行的系统不能删除
    public function postDelxxiadan(Request $request){
        $id=$request->input('address_id');
        // dd($id);
        $res=DB::table('addresses')->where('id',$id)->delete();

        if($res){

           

            return redirect('/order/indexadd');

        }else{
            return back();
        }
    }

    public function getShoujian(Request $request){
        $id = $request->input('id');
        $data = DB::table('addresses')->where('id',$id)->first();

        if($data){
           echo json_encode($data);
        }
    }

    public function getXq(){
        // $id = session('id');//存入session的用户id
        $id = session('id');
        $data = DB::table('orders as o')
         ->join('order_details as od','o.id','=','od.order_id')
         ->join('goods as g','g.id','=','od.goods_id')
         ->select('g.goods','o.*','g.picname','od.color','g.price','od.num')
         ->where('o.user_id','=',$id)
         ->get();
        return view('order.xq',['data'=>$data]);
    }

    public function getUpload(Request $request){
        $id = $request->input('id');
        DB::table('orders')->where('id',$id)->update(['status'=>1]);
        return redirect('/home/order/xq');
    }

    public function getDel($id){
        $data = DB::table('orders')->where('id',$id)->first();
        if($data['status']==3){
            DB::table('orders')->where('id',$id)->update(['status'=>5]);
            return redirect('/home/order/xq');
        }else{
            return redirect('/home/order/xq');
        }
    }

    public function getShou($id){
        $data = DB::table('orders')->where('id',$id)->first();
        if($data['status']==2){
            DB::table('orders')->where('id',$id)->update(['status'=>3]);
            return redirect('/home/order/xq');
        }else{
            return redirect('/home/order/xq');
        }
    }
}
