@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form enctype="multipart/form-data" action="/admin/pj/insert" class="mws-form" method="post">
    	{{csrf_field()}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">配件名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='pjname' value='{{old('pjname')}}'>
    				</div>
    			</div>
                   <div class="mws-form-row">
                        <label class="mws-form-label">配件分类</label>
                        <div class="mws-form-item">
                             <select class="small" name="cate" value="0">
                                     @foreach($list as $v)
                                       <option value="{{$v['id']}}">{{$v['cate']}}</option>
                                    @endforeach
                             </select>
                        </div>
                   </div>
    			<div class="mws-form-row bordered">
                    <label class="mws-form-label"><font><font>配件简介</font></font></label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" class="small" name='descr'></textarea>
                    </div>
                </div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">配件单价</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name='price' value='{{old('price')}}'>
    				</div>
    			</div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">配件状态</label>
                        <div class="mws-form-item">
                             <select class="small" name="state" value='{{old('state')}}'>
                                       <option value="1">新添加</option>
                                       <option value="2">在售</option>
                                       <option value="3">下架</option>  
                             </select>
                        </div>
                   </div>
                   <div class="mws-form-row">
                        <label class="mws-form-label">配件库存量</label>
                        <div class="mws-form-item">
                             <input type="text" class="small" name='kucun' value='{{old('kucun')}}'>
                        </div>
                   </div>
                     <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>配件图片</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pjpic' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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