@extends('layout.adminindex')
@section('con')
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form enctype="multipart/form-data" action="/admin/photo/insert" class="mws-form" method="post">
    	{{csrf_field()}}
        <input type="hidden" name="id" value="{{$vo['id']}}">
                  <div class="mws-form-row">
                        <label class="mws-form-label">商品分类</label>
                        <div class="mws-form-item">
                             <select class="small" name="cate" value="0">
                                     @foreach($list as $v)
                                       <option value="{{$v['id']}}">{{$v['cate']}}</option>
                                    @endforeach
                             </select>
                        </div>
                   </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>详情图片一</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='photo1' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>详情图片二</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='photo2' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>详情图片三</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='photo3' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>详情图片四</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='photo4' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>主图</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='photo5' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    	    </div>
         </form>
    </div>    	
</div>
<script type="text/javascript">
var ue = UE.getEditor('editor');
</script>
@endsection