@extends('layout.adminindex')
@section('con')
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form enctype="multipart/form-data" action="/admin/pjxq/insert" class="mws-form" method="post">
    	{{csrf_field()}}
        <input type="hidden" name="id" value="{{$vo['id']}}">
                  <div class="mws-form-row">
                        <label class="mws-form-label">颜色</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="color[]" value="金色"> <label>金色</label></li>
                                <li><input type="checkbox" name="color[]" value="白色"> <label>白色</label></li>
                                <li><input type="checkbox" name="color[]" value="银色"> <label>银色</label></li>
                                <li><input type="checkbox" name="color[]" value="黑色"> <label>黑色</label></li>
                                <li><input type="checkbox" name="color[]" value="粉色"> <label>粉色</label></li>
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>图片一</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pic1' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>图片二</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pic2' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>图片三</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pic3' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>图片四</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pic4' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
    		<div class="mws-button-row">
    			<input type="submit" value="添加" class="btn btn-danger">
    			<input type="reset" value="重置" class="btn ">
    	    </div>
         </form>
    </div>    	
</div>
@endsection