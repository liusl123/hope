@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
	<form enctype="multipart/form-data" action="/admin/photo/update" class="mws-form" method="post">
	{{csrf_field()}}
    <input type="hidden" name="id" value='{{$vo['id']}}'>
             <div class="mws-form-row">
                    <label class="mws-form-label">商品分类</label>
                    <div class="mws-form-item">
                         <select class="small" name="cate" disabled>
                            @foreach($list as $v)
                                   <option value="{{$vo['cate']}}"
                                    @if($vo['cate']==$v['cate'])
                                    selected
                                    @endif 
                                   >{{$vo['cate']}}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">详情图片一</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['photo1']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>详情图片一</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='photo1' value='{{$vo['photo1']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">详情图片二</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['photo2']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>详情图片二</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='photo2' value='{{$vo['photo2']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">详情图片三</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['photo3']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>详情图片三</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='photo3' value='{{$vo['photo3']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">详情图片四</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['photo4']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>详情图片四</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='photo4' value='{{$vo['photo4']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">主图</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['photo5']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>主图</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='photo5' value='{{$vo['photo5']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
              <div class="mws-button-row">
                  <input type="submit" value="修改" class="btn btn-danger">
                  <input type="reset" value="重置" class="btn ">
              </div>
            </form>
          </div>      
          </div>
@endsection