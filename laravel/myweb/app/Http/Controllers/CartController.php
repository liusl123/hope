<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Goods;
// use DB;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

    // 检测购物车中商品是否存在
    public function checkExists($id){
        $carts = session('cart');
        if(empty($carts)) return true;//该商品不存在购物车中
        foreach ($carts as $v) {
            if($v['id']==$id){
                // 该商品存在购物车中
                return false;
            }
        }
        return true;
    }

    //加入购物车
    public function postAdd(Request $request){
        // dd($request->all());
        // $id=$request->input('id');

        $data = $request->only(['id','num','color','picname']);

        // 检测该商品在不在购物车中
        if ($this->checkExists($data['id'])) {
            $request->session()->push('cart',$data);
            // dd(session('cart'));
        }
        return redirect('/home/cart/index'); 
    }

    //显示购物车列表
    public function getIndex(Request $request){
        // dd(session('cart'));
        // session(['cart'=>'']);
        $carts = session('cart');
        $data = [];
        foreach ($carts as $v) {
            
            // $temp = DB::table('goods as g')->join('good_xq as xq','g.id','=','xq.good_id')
            //                        ->select('xq.zping','xq.nume','xq.color','xq.fuwu','xq.size','xq.rongliang','g.goods','g.id','g.goods','g.cate','g.company','g.descr','g.price','g.picname','g.con','g.erji','g.cdq','g.zpg','g.state')
            //                        ->where('xq.good_id','=',$v['id'])
            //                        ->get();
            $temp = Goods::findOrFail($v['id']);
            $temp['num'] = $v['num'];
            $temp['color'] = $v['color'];
            $data[] = $temp;
        }
        // dd($data);
        return view('cart.index',['carts'=>$data]);

    }
    // 商品的删除
    public function getDel(Request $request){
        $id = $request->input('id');
        $carts = session('cart');
        if(empty($carts)) return ;
        foreach ($carts as $k=>$v){
            if($id == $v['id']){
                unset($carts[$k]);
            }
        }
        // 清空购物车
        session(['cart'=>[]]);
        session(['cart'=>$carts]);
    }
    // 更改购物车中商品的数量
    public function getChange(Request $request){
        $carts = session('cart');
        foreach($carts as $k=>$v){
            if($v['id']==$request->input('id')){
                if($request->input('flag')=='jian'){
                    if($carts[$k]['num']==1){
                        return ;
                    }else{
                        $carts[$k]['num']--;
                    }
                }else{
                    $carts[$k]['num']++;
                }

            }
            // if($v['id']==$request->input('id')){
            //     if($request->input('flag')=='jian'){
            //         $carts[$k]['num']--;
            //     }

            // }
            
        }
        // 清空购物车
        session(['cart'=>[]]);
        session(['cart'=>$carts]);
    }
}
