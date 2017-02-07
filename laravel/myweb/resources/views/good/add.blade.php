@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>商品添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">

                    	<form enctype="multipart/form-data" action="/admin/good/insert" class="mws-form" method="post">
                    	{{csrf_field()}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">商品名称</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='goods' value='{{old('goods')}}'>
                    				</div>
                    			</div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">商品分类</label>
                                        <div class="mws-form-item">
                                             <select class="small" name="cate" value="0">
                                                     @foreach($list as $v)
                                                       <option value={{$v['id']}}>{{$v['cate']}}</option>
                                                  @endforeach
                                             </select>
                                        </div>
                                   </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">生产厂家</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='company' value='{{old('company')}}'>
                    				</div>
                    			</div>
                    			<div class="mws-form-row bordered">
                                    <label class="mws-form-label"><font><font>简介</font></font></label>
                                    <div class="mws-form-item">
                                        <textarea rows="" cols="" class="small" name='descr'></textarea>
                                    </div>
                                </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">单价</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='price' value='{{old('price')}}'>
                    				</div>
                    			</div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                             <select class="small" name="state" value='{{old('state')}}'>
                                                       <option value="1">新添加</option>
                                                       <option value="2">在售</option>
                                                       <option value="3">下架</option>  
                                             </select>
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">库存量</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name='store' value='{{old('store')}}'>
                                        </div>
                                   </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">被购买量</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name='num' value='{{old('num')}}'>
                                        </div>
                                   </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label">被点击次数</label>
                                        <div class="mws-form-item">
                                             <input type="text" class="small" name='clicknum' value='{{old('clicknum')}}'>
                                        </div>
                                   </div>
                                    <div class="mws-form-row">
                                        <label class="mws-form-label"><font><font>图片</font></font></label>
                                        <div class="mws-form-item">
                                             <input type="file" name='picname' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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