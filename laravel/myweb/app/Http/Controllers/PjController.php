<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PjController extends Controller
{
       public function getAdd(){
    	return view('pj.add',[
                'list'=>CateController::getCates()
            ]);
}
    public function postInsert(Request $request){
        

      

    	$data= PjController::dealRequest($request);
    	// $data = $request->except('_token');
    	$lala=DB::table('cate')->where('id',$request->input("cate"))->first();
    	// dd($lala['cate']);
    	$data['cate']=$lala['cate'];
        // dd($data['cate']);
    	// $res = DB::table('goods')->insert($data);
    	// dd($res);
    	if(DB::table('pj')->insert($data)){
            return redirect('/admin/pj/index')->with('success','插入成功');
        }else{
            return back()->with('error','插入失败');
        }
        // dd($data);
     }
     //处理数据方法
     public function dealRequest($request){

     	$data = $request->except('_token');

        // dd($data);
        // dd($data);
     	// dd($request->hasFile('picname'));  
     	//如果有图片上传
     	if($request->hasFile('pjpic')){
     		// echo 'aaa';exit;
     		$pic = time().rand(1000,9999).'.'.$request->file('pjpic')->getClientOriginalExtension();

     		$request->file('pjpic')->move(\Config::get('app.upload_dir'),$pic);
     		$data['pjpic'] =trim(\Config::get('app.upload_dir').$pic,'.');
     	}
     	// $data['con']=$data['editorValue'];
     	// unset($data['editorValue']);
     	 // dd($data);
     	return $data;
    }
   public function getIndex(Request $request){
			$data = DB::table('pj')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%')
				->orWhere('pjname','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',5));
		return view('pj.index',['list'=>$data,'request'=>$request->all()]);	
	}
	public function getDel($id){
		$vo = DB::table('pj')->where('id',$id)->first();
		if(DB::table('pj')->where('id',$id)->delete()){
			if(file_exists($vo['pjpic'])){
				unlink($vo['pjpic']);
			}
			return redirect('/admin/qj/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
        return view('pj.edit',[
            'list'=>CateController::getCates(),
            'vo'=>DB::table('pj')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		  $data = $this->dealRequest($request);
        // dd($data);

        //先查出数据,储存起来
        $vo = DB::table('pj')->where('id',$request->input('id'))->first();
        // $baba=DB::table('cate')->where('id',$request->input('pid'))->first();
        // $b=DB::table('cate')->where();
        // dd($lala['cate']);
        // $data['id']=$baba['pid'];
        // dd($vo);
        //删除原来的数据
        if(!empty($data['pjpic'])){  //如果原文章主图被修改         
            // 删除原来的主图      
            if(file_exists($vo['pjpic'])){
                unlink($vo['pjpic']);
            }
        }
		if(DB::table('pj')->where('id',$request->input('id'))->update($data)){
			return redirect('/admin/pj/index')->with('success','修改成功');
			// echo '啦啦啦';
		}else{
			return back()->with('error','修改失败');
		}
	}
    public function getPj(){
        $b = DB::table('pjphoto')->join('pj','pjphoto.pjid','=','pj.id')->select('pj.*','pjphoto.*')->get();
        // dd($b);
            return view('pj.pj',['vc'=>$b]);
        }
   
}
