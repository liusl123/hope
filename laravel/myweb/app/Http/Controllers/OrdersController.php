<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function getIndex(){
        $id=2;
        $res= DB::table('orders as o')
         ->join('order_details as od','o.id','=','od.order_id')
         ->join('goods as g','g.id','=','od.goods_id')
         ->select('g.goods','o.*','g.picname','od.color','g.price','od.num')
         ->where('o.user_id','=',$id)
         ->get();
        // dd($res);
    	return view('orders.index',['list'=>$res]);
    }

    public function getShow(Request $request){
        $key = $request->input('key');
    	$num = $request->input('num');   //每页 显示的最大条数
    	$page = ($request->input('page')-1)*$num; //显示的起始位置
    	$data = DB::table('orders')->skip($page)->take($num)->where('username','like','%'.$key.'%')->get();
        $count = DB::table('orders')->where('username','like','%'.$key.'%')->count();
        $maxpage= ceil($count/$num);
        foreach($data as $k=>$v){
            $time=date("Y-m-d H:i:s",$v['addtime']);
            $data[$k]['addtime']=$time;
        }
        $data[count($data)]=$maxpage;
    	echo json_encode($data);
    }

    public function postEdit(Request $request){
        $id= $request->input('editid');
        $val=$request->input('editval');
        $res= DB::table('orders')->where('id',$id)->update(['status'=>$val]);
        if($res>0){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function postDetail(Request $request){
        $id=$request->input('id');
        $data=DB::table('orders')
                                ->join('detail','orders.id','=','detail.orderid')
                                ->join('goods','detail.goodsid','=','goods.id')
                                ->join('type','goods.typeid','=','type.id')    
                                ->select('orders.username','orders.address','orders.phone','detail.nam','detail.num','detail.price','type.tname')
                                ->where('orders.id','=',$id)
                                ->get(); 
        echo json_encode($data);                        
    }

    public function postDel(Request $request){
        $id=$request->input('id');
        $res=DB::table('orders')->where('id',$id)->delete();
        if($res){
            echo 'yes';
        }else{
            echo 'no';
        }
    }

    public function getFahuo($id){
        // echo $id;
        $stauts=2;
        $res=DB::table('orders')->where('order_num',$id)->update(['status'=> $stauts]);
        // $res=DB::table('orders')->where('order_num',$id)->get();
        // dd($res);
         // $res= DB::table('orders')->where('id',$id)->update(['status'=>$val]);
        // $res= DB::table('orders')->get();
        // dd($res);
        if($res){
            // echo "发货成功";
            return back()->with('success','发货成功');
        }else{
            // echo "发货失败";
            return back()->with('error','发货失败');
        }
    }


}