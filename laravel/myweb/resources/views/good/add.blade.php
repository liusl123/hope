@extends('layout.adminindex')
@section('con')
<script type="text/javascript" charset="utf-8" src="/ue/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/ue/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/ue/lang/zh-cn/zh-cn.js"></script>
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
                                       <option value="{{$v['id']}}">{{$v['cate']}}</option>
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
                        <label class="mws-form-label">耳机</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="erji[]" value="赠耳机"> <label>赠耳机</label></li>
                                <li><input type="checkbox" name="erji[]" value="专用耳机"> <label>专用耳机</label></li>
                                <li><input type="checkbox" name="erji[]" value="蓝牙耳机"> <label>蓝牙耳机</label></li>
                                <li><input type="checkbox" name="erji[]" value="有线耳机"> <label>有线耳机</label></li>
                                <li><input type="checkbox" name="erji[]" value="赠品自拍杆"> <label>赠品自拍杆</label></li>
                                <li><input type="checkbox" name="erji[]" value="手机自拍杆"> <label>手机自拍杆</label></li>
                                <li><input type="checkbox" name="erji[]" value="无线自拍杆"> <label>无线自拍杆</label></li>
                                  <li><input type="checkbox" name="erji[]" value="无线充电器"> <label>无线充电器</label></li>
                                <li><input type="checkbox" name="erji[]" value="有线充电器"> <label>有线充电器</label></li>
                            </ul>
                        </div>
                    </div>
                   <div class="mws-form-row">
                        <label class="mws-form-label">库存量</label>
                        <div class="mws-form-item">
                             <input type="text" class="small" name='store' value='{{old('store')}}'>
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品内容</label>
                        <div class="mws-form-item">
                          <script id="editor"  name='con' type="text/plain" style="width:600px;height:420px;"></script>
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
<script type="text/javascript">
var ue = UE.getEditor('editor');
</script>
@endsection