<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActivityxqController extends Controller
{
    
	public function getAdd($id){
   	// dd($id);
   			$vo = DB::table('activity')->where('id',$id)->first();
			return view('activityxq.add',['vo'=>$vo]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsert(Request $request){
			$data= 	ActivityxqController::dealPic($request);
			// dd($data);
			 // dd($data);
       	 		$lala=DB::table('activity')->where('id',$request->input("id"))->first();
        		$data['activityid']=$lala['id'];
    		// dd($data['activityid']);

			if(DB::table('activity_xq')->insert($data)){
				return redirect('/admin/activityxq/index')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

      public function dealPic($request){
			
			$data = $request->except('_token');
			//
			for($i=1;$i<6;$i++){
				if($request->hasFile('activitypic'.$i)){				
					$picname = time().rand(10000,99999).'.'.$request->file('activitypic'.$i)->getClientOriginalExtension();
					$request->file('activitypic'.$i)->move(\Config::get('app.upload_dir'),$picname);
					$data['activitypic'.$i] = ltrim(\Config::get('app.upload_dir').$picname,'.');			
				}				
			}
			return $data;
		}
     public function getIndex(Request $request){
   			 // $vo  =DB::table('activity')->where('id','>=',1)->value('cate');
            // dd($lala);
			$data = DB::table('activity_xq')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',4));
		return view('activityxq.index',['list'=>$data,'request'=>$request->all()]);	
	}
		public function getDel($id){
			//获取要删除的数据
			$data = DB::table('activity_xq')->where('id',$id)->first();
			//dd($res);
			// 如果数据删除成功,name执行图片的删除
			if(DB::table('activity_xq')->where('id',$id)->delete()){
				foreach($data as $k=>$v){
					if(file_exists('.'.$v)){
						unlink('.'.$v);
					}							
				}
				return redirect('/admin/activityxq/index')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

	public function getEdit($id){
        return view('activityxq.edit',[
            'vo'=>DB::table('activity_xq')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		$req= ActivityxqController::dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('activity_xq')->where('id',$request->input('id'))->first();
			// dd($data);

			if(DB::table('activity_xq')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<6;$i++){
					if($request->hasFile('activitypic'.$i)){
						unlink('.'.$data['activitypic'.$i]);
					}
				}
				return redirect('/admin/activityxq/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}
}
