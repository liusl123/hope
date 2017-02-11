<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class XqController extends Controller
{
    public function getAdd(){
    	return view('xq.add');
}
    public function postInsert(Request $request){
        

      
        // dd($request->all());
    	$data= XqController::dealRequest($request);
    	// $data = $request->except('_token');
        // dd($data);
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
         $b=implode('/',$request->input('color'));
         $c=implode('/',$request->input('zping'));
         $d=implode('/',$request->input('banben'));
         $e=implode('/',$request->input('fuwu'));
         $f=implode('/',$request->input('rongliang'));
        // $request->size=implode('/',$request->input('size'));
        // 
        
     	$data = $request->except('_token');

        $data['size']=$a;
        $data['color']=$b;
        $data['zping']=$c;
        $data['banben']=$d;
        $data['fuwu']=$e;
        $data['rongliang']=$f;
        // dd($data);
        // dd($data);
     	// dd($request->hasFile('picname'));  
     	//如果有图片上传
     	if($request->hasFile('pictype')){
     		// echo 'aaa';exit;
     		$pic = time().rand(1000,9999).'.'.$request->file('pictype')->getClientOriginalExtension();

     		$request->file('pictype')->move(\Config::get('app.upload_dir'),$pic);
     		$data['pictype'] =trim(\Config::get('app.upload_dir').$pic,'.');
     	}
     	// $data['con']=$data['editorValue'];
     	// unset($data['editorValue']);
     	 // dd($data);
     	return $data;
    }
   public function getIndex(Request $request){
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
			if(file_exists('.'.$vo['pictype'])){
				unlink('.'.$vo['pictype']);
			}
            $reg = '/src=[\'"]?([^\'"]*)[\'"]?/';
            preg_match_all($reg,$vo['contype'],$arr);
            foreach($arr[1] as $path){
                if(file_exists('.'.$path)){
                    unlink('.'.$path);
                }
            }
			return redirect('/admin/xq/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
        return view('xq.edit',[
            'list'=>CateController::getCates(),
            'vo'=>DB::table('good_xq')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		  $data = $this->dealRequest($request);
        // dd($data);

        //先查出数据,储存起来
        $vo = DB::table('good_xq')->where('id',$request->input('id'))->first();
        // $baba=DB::table('cate')->where('id',$request->input('pid'))->first();
        // $b=DB::table('cate')->where();
        // dd($lala['cate']);
        // $data['id']=$baba['pid'];
        // dd($vo);
        //删除原来的数据
        if(!empty($data['pictype'])){  //如果原文章主图被修改         
            // 删除原来的主图      
            if(file_exists('.'.$vo['pictype'])){
                unlink('.'.$vo['pictype']);
            }
        }
        $reg = '/src=[\'"]?([^\'"]*)[\'"]?/';
        preg_match_all($reg,$vo['contype'],$arr1);
        preg_match_all($reg,$data['contype'],$arr2);
        // dd($arr1);
        $res = $arr1==$arr2?true:false;
        
        if(!$res){      
            foreach($arr1[1] as $path){
                if(file_exists('.'.$path)){
                    unlink('.'.$path);
                }
            }
        }
		// dd($data);
		if(DB::table('good_xq')->where('id',$request->input('id'))->update($data)){
			return redirect('/admin/xq/index')->with('success','修改成功');
			// echo '啦啦啦';
		}else{
			return back()->with('error','修改失败');
		}
	}
   
}