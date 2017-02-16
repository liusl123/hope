<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PhotoController extends Controller
{
	public function getAdd($id){
   	// dd($id);
   			$vo = DB::table('good_xq')->where('id',$id)->first();

			$data =	DB::table('goods')->get();
			// dd($vo);
			return view('photo.add',['list'=>$data,'vo'=>$vo]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsert(Request $request){
				$data= PhotoController::dealPic($request);
			// dd($newdata);
			 // dd($data);
       	 		$lala=DB::table('good_xq')->where('id',$request->input("id"))->first();
        		$data['goodid']=$lala['goodid'];
    		// dd($data['goodid']);

			if(DB::table('photo')->insert($data)){
				return redirect('/admin/photo/index')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

      public function dealPic($request){
			
			$data = $request->except('_token');
			//
			for($i=1;$i<6;$i++){
				if($request->hasFile('photo'.$i)){				
					$picname = time().rand(10000,99999).'.'.$request->file('photo'.$i)->getClientOriginalExtension();
					$request->file('photo'.$i)->move(\Config::get('app.upload_dir'),$picname);
					$data['photo'.$i] = ltrim(\Config::get('app.upload_dir').$picname,'.');			
				}				
			}
			return $data;
		}
     public function getIndex(Request $request){
   			 // $vo  =DB::table('goods')->where('id','>=',1)->value('cate');
            // dd($lala);
			$data = DB::table('photo')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',4));
		return view('photo.index',['list'=>$data,'request'=>$request->all()]);	
	}
		public function getDel($id){
			//获取要删除的数据
			$data = DB::table('photo')->where('id',$id)->first();
			//dd($res);
			// 如果数据删除成功,name执行图片的删除
			if(DB::table('photo')->where('id',$id)->delete()){
				foreach($data as $k=>$v){
					if(file_exists('.'.$v)){
						unlink('.'.$v);
					}							
				}
				return redirect('/admin/photo/index')->with('success','删除成功');
			}else{
				return back()->with('error','删除失败');
			}

		}

	public function getEdit($id){
		$data =	DB::table('photo')->get();
        return view('photo.edit',[
            'list'=>$data,
            'vo'=>DB::table('photo')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		$req= PhotoController::dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('photo')->where('id',$request->input('id'))->first();
			// dd($data);

			if(DB::table('photo')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<6;$i++){
					if($request->hasFile('photo'.$i)){
						unlink('.'.$data['photo'.$i]);
					}
				}
				return redirect('/admin/photo/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}
	}

