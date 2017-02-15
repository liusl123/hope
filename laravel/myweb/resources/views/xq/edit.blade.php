@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
	<form enctype="multipart/form-data" action="/admin/xq/update" class="mws-form" method="post">
	{{csrf_field()}}
    <input type="hidden" name="id" value='{{$vo['id']}}'>
		<div class="mws-form-inline">      
            <div class="mws-form-row">
                    <div class="mws-form-row">
                        <label class="mws-form-label">尺寸</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('4.5',explode('/',$vo['size']))) checked @endif name="size[]" value="4.5"> <label>4.5</label></li>
                                <li><input type="checkbox" @if(in_array('5.0',explode('/',$vo['size']))) checked @endif name="size[]" value="5.0"> <label>5.0</label></li>
                                <li><input type="checkbox" @if(in_array('5.5',explode('/',$vo['size']))) checked @endif name="size[]" value="5.5"> <label>5.5</label></li>
                                <li><input type="checkbox" @if(in_array('6.0',explode('/',$vo['size']))) checked @endif name="size[]" value="6.0"> <label>6.0</label></li>
                            </ul>
                        </div>
                    </div>
                                         <div class="mws-form-row">
                        <label class="mws-form-label">版本</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('移动',explode('/',$vo['banben']))) checked @endif name="banben[]" value="移动"> <label>移动</label></li>
                                <li><input type="checkbox" @if(in_array('联通',explode('/',$vo['banben']))) checked @endif name="banben[]" value="联通"> <label>联通</label></li>
                                <li><input type="checkbox" @if(in_array('电信',explode('/',$vo['banben']))) checked @endif name="banben[]" value="电信"> <label>电信</label></li>
                                <li><input type="checkbox" @if(in_array('全网通',explode('/',$vo['banben']))) checked @endif name="banben[]" value="全网通"> <label>全网通</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">容量</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('128G',explode('/',$vo['rongliang']))) checked @endif name="rongliang[]" value="128G"> <label>128G</label></li>
                                <li><input type="checkbox" @if(in_array('64G',explode('/',$vo['rongliang']))) checked @endif name="rongliang[]" value="64G"> <label>64G</label></li>
                                <li><input type="checkbox" @if(in_array('16G',explode('/',$vo['rongliang']))) checked @endif name="rongliang[]" value="16G"> <label>16G</label></li>
                                <li><input type="checkbox" @if(in_array('8G',explode('/',$vo['rongliang']))) checked @endif name="rongliang[]" value="8G"> <label>8G</label></li>
                            </ul>
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">服务</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('免修保修一年',explode('/',$vo['fuwu']))) checked @endif name="fuwu[]" value="免修保修一年"> <label>免修保修一年</label></li>
                                <li><input type="checkbox" @if(in_array('一年以内可以替换',explode('/',$vo['fuwu']))) checked @endif name="fuwu[]" value="一年以内可以替换"> <label>一年以内可以替换</label></li>
                            </ul>
                        </div>
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