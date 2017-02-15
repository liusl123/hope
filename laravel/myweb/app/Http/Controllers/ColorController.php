<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ColorController extends Controller
{
   public function getAdd($id){
   	// dd($id);
   			$vo = DB::table('goods')->where('id',$id)->first();
			$data =	DB::table('goods')->get();
			// dd($vo);
			return view('color.add',['list'=>$data,'vo'=>$vo]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsert(Request $request){
			$data= ColorController::dealPic($request);
			// dd($newdata);
			 // dd($data);
       	 		$lala=DB::table('goods')->where('id',$request->input("id"))->first();
       	 		// dd($lala);
        		$data['goodid']=$lala['id'];
    		// dd($data['goodid']);

			if(DB::table('color')->insert($data)){
				return redirect('/admin/color/index')->with('success','添加成功');
			}else{
				return back()->with('error','添加失败');
			}

		}

        public function dealPic($request){

         $d=implode('/',$request->input('color'));        // 
        
     	$data = $request->except('_token');
        $data['color']=$d;
        for($i=1;$i<5;$i++){
                if($request->hasFile('pic'.$i)){                
                    $picname = time().rand(10000,99999).'.'.$request->file('pic'.$i)->getClientOriginalExtension();
                    $request->file('pic'.$i)->move(\Config::get('app.upload_dir'),$picname);
                    $data['pic'.$i] = ltrim(\Config::get('app.upload_dir').$picname,'.');          
                }               
            }
     	return $data;
    }
     public function getIndex(Request $request){
   			 // $vo  =DB::table('goods')->where('id','>=',1)->value('cate');
            // dd($lala);
			$data = DB::table('color')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',4));
		return view('color.index',['list'=>$data,'request'=>$request->all()]);	
	}
		public function getDel($id){
		$vo = DB::table('color')->where('id',$id)->first();
		if(DB::table('color')->where('id',$id)->delete()){
                foreach($vo as $k=>$v){
                    if(file_exists('.'.$v)){
                        unlink('.'.$v);
                    }                           
                }
			return redirect('/admin/color/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
		// dd($id);
		$data =	DB::table('goods')->get();
		// dd($data)
        return view('color.edit',[
            'list'=>$data,
            'vo'=>DB::table('color')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		$req= ColorController::dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('color')->where('id',$request->input('id'))->first();
			// dd($data);

			if(DB::table('color')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<5;$i++){
					if($request->hasFile('pic'.$i)){
						unlink('.'.$data['pic'.$i]);
					}
				}
				return redirect('/admin/color/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}
	}



