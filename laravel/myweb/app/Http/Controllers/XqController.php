<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class XqController extends Controller
{
    public function getAdd($id){
    	$vco = DB::table('goods')->where('id',$id)->first();
    	// $data['']
        // dd($vo);
        $vo= DB::table('goods')->get();
    	// dd($vo);
    	return view('xq.add',['list'=>$vo,'vo'=>$vco]);
}
    public function postInsert(Request $request){
        

      
        // dd($request->all());
    	$data= XqController::dealRequest($request);
        // dd($data);
        $lala=DB::table('goods')->where('id',$request->input("id"))->first();
        $data['goodid']=$lala['id'];
        // dd($data['goodid']);
        // $data['goodid']==$request->input('id');
        // dd($data);
    	// $data = $request->except('_token');
    	// $lala=DB::table('goods')->where('id',$request->input("id"))->first();
    	// // dd($lala['id']);
    	// $data['goodid']=$lala['id'];
        // dd($data['goodid']);
    	// $res = DB::table('goods')->insert($data);
    	// dd($res);
    	if(DB::table('good_xq')->insert($data)){
            return redirect('/admin/xq/index')->with('success','插入成功');
        }else{
            return back()->with('error','插入失败');
        }
        // dd($data);
     }
     //处理数据方法
     public function dealRequest($request){
        $a=implode('/',$request->input('size'));
         $d=implode('/',$request->input('banben'));
         $e=implode('/',$request->input('fuwu'));
         $f=implode('/',$request->input('rongliang'));
        $data = $request->except('_token');
        $data['size']=$a;
        $data['banben']=$d;
        $data['fuwu']=$e;
        $data['rongliang']=$f;
        return $data;
        
    }
   public function getIndex(Request $request){
   			 // $vo  =DB::table('goods')->where('id','>=',1)->value('cate');

			$data = DB::table('good_xq')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',5));
		return view('xq.index',['list'=>$data,'request'=>$request->all()]);	
	}
	public function getDel($id){
		$vo = DB::table('good_xq')->where('id',$id)->first();
		if(DB::table('good_xq')->where('id',$id)->delete()){
			return redirect('/admin/xq/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
		// dd($id);
        $vo= DB::table('goods')->get();
        return view('xq.edit',[
            'list'=>$vo,
            'vo'=>DB::table('good_xq')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		  $data = $this->dealRequest($request);
        // dd($data);

        //先查出数据,储存起来
        $vo = DB::table('good_xq')->where('id',$request->input('id'))->first();
		if(DB::table('good_xq')->where('id',$request->input('id'))->update($data)){
			return redirect('/admin/xq/index')->with('success','修改成功');
			// echo '啦啦啦';
		}else{
			return back()->with('error','修改失败');
		}
	}
   
}