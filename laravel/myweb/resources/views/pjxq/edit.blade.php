@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
<span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
<form enctype="multipart/form-data" action="/admin/pjxq/update" class="mws-form" method="post">
{{csrf_field()}}
<input type="hidden" name="id" value='{{$vo['id']}}'>
<div class="mws-form-row">
<label class="mws-form-label">颜色</label>
<div class="mws-form-item clearfix">
<ul class="mws-form-list inline">
  <li><input type="checkbox" @if(in_array('金色',explode('/',$vo['color']))) checked @endif name="color[]" value="金色"> <label>金色</label></li>
  <li><input type="checkbox" @if(in_array('白色',explode('/',$vo['color']))) checked @endif name="color[]" value="白色"> <label>白色</label></li>
  <li><input type="checkbox" @if(in_array('银色',explode('/',$vo['color']))) checked @endif name="color[]" value="银色"> <label>银色</label></li>
  <li><input type="checkbox" @if(in_array('黑色',explode('/',$vo['color']))) checked @endif name="color[]" value="黑色"> <label>黑色</label></li>
  <li><input type="checkbox" @if(in_array('粉色',explode('/',$vo['color']))) checked @endif name="color[]" value="玫瑰金"> <label>粉色</label></li>
</ul>
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label">图片一</label>
<div class="mws-form-item">
<img src="{{$vo['pic1']}}" width="220" height="120" alt="">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label"><font><font>图片一</font></font></label>
<div class="mws-form-item">
<input type="file" name='pic1' value='{{$vo['pic1']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label">图片二</label>
<div class="mws-form-item">
<img src="{{$vo['pic2']}}" width="220" height="120" alt="">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label"><font><font>图片三</font></font></label>
<div class="mws-form-item">
<input type="file" name='pic2' value='{{$vo['pic2']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label">图片三</label>
<div class="mws-form-item">
<img src="{{$vo['pic3']}}" width="220" height="120" alt="">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label"><font><font>图片三</font></font></label>
<div class="mws-form-item">
<input type="file" name='pic3' value='{{$vo['pic3']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label">图片四</label>
<div class="mws-form-item">
<img src="{{$vo['pic4']}}" width="220" height="120" alt="">
</div>
</div>
<div class="mws-form-row">
<label class="mws-form-label"><font><font>图片四</font></font></label>
<div class="mws-form-item">
<input type="file" name='pic4' value='{{$vo['pic4']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
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