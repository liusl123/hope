<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PjphotoController extends Controller
{
    	public function getAdd($id){
   	// dd($id);
   			$vo = DB::table('pj')->where('id',$id)->first();

			// dd($data);
			return view('pjphoto.add',['vo'=>$vo]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsert(Request $request){
			$data= PjphotoController::dealPic($request);
			// dd($newdata);
			 // dd($data);
       	 		$lala=DB::table('pj')->where('id',$request->input("id"))->first();
        		$data['pjid']=$lala['id'];
    		// dd($lala);

			if(DB::table('pjphoto')->insert($data)){
				return redirect('/admin/pjphoto/index')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

      public function dealPic($request){
			
			$data = $request->except('_token');
			//
			for($i=1;$i<6;$i++){
				if($request->hasFile('picname'.$i)){				
					$picname = time().rand(10000,99999).'.'.$request->file('picname'.$i)->getClientOriginalExtension();
					$request->file('picname'.$i)->move(\Config::get('app.upload_dir'),$picname);
					$data['picname'.$i] = ltrim(\Config::get('app.upload_dir').$picname,'.');			
				}				
			}
			return $data;
		}
     public function getIndex(Request $request){
   			 // $vo  =DB::table('goods')->where('id','>=',1)->value('cate');
            // dd($lala);
			$data = DB::table('pjphoto')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',4));
			// dd($data);
		return view('pjphoto.index',['list'=>$data,'request'=>$request->all()]);	
	}
		public function getDel($id){
			//获取要删除的数据
			$data = DB::table('pjphoto')->where('id',$id)->first();
			//dd($res);
			// 如果数据删除成功,name执行图片的删除
			if(DB::table('pjphoto')->where('id',$id)->delete()){
				foreach($data as $k=>$v){
					if(file_exists('.'.$v)){
						unlink('.'.$v);
					}							
				}
				return redirect('/admin/pjphoto/index')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

	public function getEdit($id){
        return view('pjphoto.edit',[
            'vo'=>DB::table('pjphoto')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		$req= PjphotoController::dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('pjphoto')->where('id',$request->input('id'))->first();
			// dd($data);

			if(DB::table('pjphoto')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<6;$i++){
					if($request->hasFile('pjpic'.$i)){
						unlink('.'.$data['pjpic'.$i]);
					}
				}
				return redirect('/admin/pjphoto/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}
}
