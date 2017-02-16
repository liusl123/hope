<?php

namespace App\Http\Controllers;
use App\Http\Requests\ActivityRequest;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    public function getAdd(){
    	return view('activity.add',['list'=>CateController::getCates()]);
    }
	 public function postInsert(ActivityRequest $request){
	 	// dd($request->all());
		$data= ActivityController::dealRequest($request);
		// dd($data);
		$lala=DB::table('cate')->where('id',$request->input("cate"))->first();
		$data['cate']=$lala['cate'];
		// dd($data);
		if(DB::table('activity')->insert($data)){
	        return redirect('/admin/activity/index')->with('success','插入成功');
	    }else{
	        return back()->with('error','插入失败');
	    }
	 }
	   public function dealRequest($request){
        $a=implode('/',$request->input('type'));
     	$data = $request->except('_token');
        $data['type']=$a;
     	if($request->hasFile('pic')){
     		$pic = time().rand(1000,9999).'.'.$request->file('pic')->getClientOriginalExtension();
     		$request->file('pic')->move(\Config::get('app.upload_dir'),$pic);
     		$data['pic'] =trim(\Config::get('app.upload_dir').$pic,'.');
     	}
     	return $data;
    }
     public function getIndex(Request $request){
			$data = DB::table('activity')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('activityname','like','%'.$request->input('keyword').'%')
				->orWhere('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',5));
		return view('activity.index',['list'=>$data,'request'=>$request->all()]);	
	}
	public function getDel($id){
		$vo = DB::table('activity')->where('id',$id)->first();
		if(DB::table('activity')->where('id',$id)->delete()){
			if(file_exists('.'.$vo['pic'])){
				unlink('.'.$vo['pic']);
			}
			return redirect('/admin/activity/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
        return view('activity.edit',[
            'list'=>CateController::getCates(),
            'vo'=>DB::table('activity')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(ActivityRequest $request){
		$a=implode('/',$request->input('type'));
     	$data = $request->except('_token');
        $data['type']=$a;
		// dd($data);
		  $data = $this->dealRequest($request);
        // dd($data);

        //先查出数据,储存起来
        $vo = DB::table('activity')->where('id',$request->input('id'))->first();
        //删除原来的数据
        if(!empty($data['pic'])){  //如果原文章主图被修改         
            // 删除原来的主图      
            if(file_exists('.'.$vo['pic'])){
                unlink('.'.$vo['pic']);
            }
        }
		if(DB::table('activity')->where('id',$request->input('id'))->update($data)){
			return redirect('/admin/activity/index')->with('success','修改成功');
			// echo '啦啦啦';
		}else{
			return back()->with('error','修改失败');
		}
	}
     public function getSy(Request $request){
        // $id=$request->input('id');
        // dd($id);
        $c = DB::table('cate')->join('activity','cate.cate','=','activity.cate')->select('activity.*','cate.cate')->limit('3')->get();
        $b = DB::table('cate')
        ->join('goods','cate.cate','=','goods.cate')
        ->join('photo','goods.id','=','photo.goodid')
        ->select('goods.*','photo.photo5','cate.cate')->limit('3')->get();
        // dd($c);
        // $v = DB::table('lb')->get();
        // dd($b);
        return view('home.index',[
            'vo'=>$c,
            'as'=>$b,
            // 'vc'=>$v
            ]);

    }
}
