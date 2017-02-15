@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
	<form enctype="multipart/form-data" action="/admin/good/update" class="mws-form" method="post">
	{{csrf_field()}}
    <input type="hidden" name="id" value='{{$vo['id']}}'>
		<div class="mws-form-inline">
			<div class="mws-form-row">
				<label class="mws-form-label">商品名称</label>
				<div class="mws-form-item">
					<input type="text" class="small" name='goods' value='{{$vo['goods']}}'>
				</div>
			</div>
               <div class="mws-form-row">
                    <label class="mws-form-label">商品分类</label>
                    <div class="mws-form-item">
                         <select class="small" name="cate">
                            @foreach($list as $v)
                                   <option value="{{$v['cate']}}"
                                    @if($vo['cate']==$v['cate'])
                                    selected
                                    @endif 
                                   >{{$v['cate']}}</option>
                              @endforeach
                         </select>
                    </div>
               </div>
			<div class="mws-form-row">
				<label class="mws-form-label">生产厂家</label>
				<div class="mws-form-item">
					<input type="text" class="small" name='company' value='{{$vo['company']}}'>
				</div>
			</div>
			<div class="mws-form-row bordered">
                <label class="mws-form-label">简介</label>
                <div class="mws-form-item">
                   <textarea name="descr" class="small">{{$vo['descr']}}</textarea>
                </div>
            </div>
			<div class="mws-form-row">
				<label class="mws-form-label">单价</label>
				<div class="mws-form-item">
					<input type="text" class="small" name='price' value='{{$vo['price']}}'>
				</div>
			</div>
            <div class="mws-form-row">
                <label class="mws-form-label">状态</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><input type="radio" value='1' name="state" @if($vo['state']=='1')  checked @endif>新添加</li>
                        <li><input type="radio" value='2' name="state" @if($vo['state']=='2') checked @endif>在售</li>
                        <li><input type="radio" value='3' name="state" @if($vo['state']=='3')checked @endif>下架</li>
                    </ul>
                </div>
            </div>
               <div class="mws-form-row">
                    <label class="mws-form-label">库存量</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name='store' value='{{$vo['store']}}'>
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">被购买量</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name='num' value='{{$vo['num']}}'>
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">被点击次数</label>
                    <div class="mws-form-item">
                         <input type="text" class="small" name='clicknum' value='{{$vo['clicknum']}}'>
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['picname']}}" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>图片</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='picname' value='{{$vo['picname']}}' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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