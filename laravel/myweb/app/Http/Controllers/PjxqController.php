<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PjxqController extends Controller
{
     public function getAdd($id){
   	// dd($id);
   			$vo = DB::table('pj')->where('id',$id)->first();
			return view('pjxq.add',['vo'=>$vo]);
		}

		/*
			执行商品颜色插入
			/admin/val/insertcolor
		*/
		public function postInsert(Request $request){
			$data= PjxqController::dealPic($request);
			// dd($newdata);
			 // dd($data);
       	 		$lala=DB::table('pj')->where('id',$request->input("id"))->first();
       	 		// dd($lala);
        		$data['pjid']=$lala['id'];
    		// dd($data['goodid']);

			if(DB::table('pjxq')->insert($data)){
				return redirect('/admin/pjxq/index')->with('success','添加成功');
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
			$data = DB::table('pjxq')->where(function($query) use($request){
			if($request->input('keyword')!=null){
				$query->where('id','like','%'.$request->input('keyword').'%');
			}
		})->paginate($request->input('num',4));
		return view('pjxq.index',['list'=>$data,'request'=>$request->all()]);	
	}
		public function getDel($id){
		$vo = DB::table('pjxq')->where('id',$id)->first();
		if(DB::table('pjxq')->where('id',$id)->delete()){
                foreach($vo as $k=>$v){
                    if(file_exists('.'.$v)){
                        unlink('.'.$v);
                    }                           
                }
			return redirect('/admin/pjxq/index')->with('success','删除成功');
		}else{
			return back()->with('error','删除失败');	
		}

	}
	public function getEdit($id){
		// dd($id);
		
		// dd($data)
        return view('pjxq.edit',[
            'vo'=>DB::table('pjxq')->where('id',$id)->first()
            ]);
    }

	public function postUpdate(Request $request){
		// dd($request->all());
		$req= PjxqController::dealPic($request);
			// dd($req);
			//获取修改商品的原图片数据
			$data = DB::table('pjxq')->where('id',$request->input('id'))->first();
			// dd($data);

			if(DB::table('pjxq')->where('id',$request->input('id'))->update($req)){
				for($i=1;$i<5;$i++){
					if($request->hasFile('pic'.$i)){
						unlink('.'.$data['pic'.$i]);
					}
				}
				return redirect('/admin/pjxq/index')->with('success','修改成功');
			}else{
				return back()->with('error','修改失败');
			}
						

		}
		public function getPj($id){
			// dd($id);
			$a = DB::table('pjphoto as pp')
			->join('pj','pp.pjid','=','pj.id')
			->join('pjxq as xq','xq.pjid','=','pj.id')
			->select('xq.*','pp.*','pj.*')
			->where('pj.id','=',$id)
			->get();
			$b = DB::table('pjxq')->where('id',$id)->first();
			$v =DB::table('good_xq')->first();
			// dd($v);
			 $dd = $b['color']; 
            $rr = explode('/',$dd);
            $tt=$rr;
            // dd($tt);
			// dd($b);
			// dd($b);
			// dd($a);
			return view('pjxq.pj',['vo'=>$a,'vv'=>$tt,'cc'=>$v]);
		}

}
