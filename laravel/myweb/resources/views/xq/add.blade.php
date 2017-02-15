@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form enctype="multipart/form-data" action="/admin/xq/insert" class="mws-form" method="post">
    	{{csrf_field()}}
        <input type="hidden" name="id" value="{{$vo['id']}}">
         <div class="mws-form-row">
                        <label class="mws-form-label">商品详情分类</label>
                        <div class="mws-form-item">
                             <select class="small" name="cate" value="0">
                                     @foreach($list as $v)
                                       <option value="{{$v['id']}}">{{$v['cate']}}</option>
                                    @endforeach
                             </select>
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">尺寸</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="size[]" value="4.5"> <label>4.5</label></li>
                                <li><input type="checkbox" name="size[]" value="5.0"> <label>5.0</label></li>
                                <li><input type="checkbox" name="size[]" value="5.5"> <label>5.5</label></li>
                                <li><input type="checkbox" name="size[]" value="6.0"> <label>6.0</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">版本</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="banben[]" value="移动"> <label>移动</label></li>
                                <li><input type="checkbox" name="banben[]" value="联通"> <label>联通</label></li>
                                <li><input type="checkbox" name="banben[]" value="电信"> <label>电信</label></li>
                                <li><input type="checkbox" name="banben[]" value="全网通"> <label>全网通</label></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">容量</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="rongliang[]" value="128G"> <label>128G</label></li>
                                <li><input type="checkbox" name="rongliang[]" value="64G"> <label>64G</label></li>
                                <li><input type="checkbox" name="rongliang[]" value="16G"> <label>16G</label></li>
                                <li><input type="checkbox" name="rongliang[]" value="8G"> <label>8G</label></li>
                            </ul>
                        </div>
                    </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label">服务</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="fuwu[]" value="免修保修一年"> <label>免修保修一年</label></li>
                                <li><input type="checkbox" name="fuwu[]" value="一年以内可以替换"> <label>一年以内可以替换</label></li>
                            </ul>
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