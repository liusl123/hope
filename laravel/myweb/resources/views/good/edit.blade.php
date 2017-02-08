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
                        <label class="mws-form-label">颜色</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('玫瑰金',explode('/',$vo['color']))) checked @endif name="color[]" value="玫瑰金"> <label>玫瑰金</label></li>
                                <li><input type="checkbox" @if(in_array('天空黑',explode('/',$vo['color']))) checked @endif name="color[]" value="天空黑"> <label>天空黑</label></li>
                                <li><input type="checkbox" @if(in_array('金色',explode('/',$vo['color']))) checked @endif name="color[]" value="金色"> <label>金色</label></li>
                                <li><input type="checkbox" @if(in_array('白色',explode('/',$vo['color']))) checked @endif name="color[]" value="白色"> <label>白色</label></li>
                                <li><input type="checkbox" @if(in_array('黄色',explode('/',$vo['color']))) checked @endif name="color[]" value="黄色"> <label>黄色</label></li>
                                <li><input type="checkbox" @if(in_array('蓝色',explode('/',$vo['color']))) checked @endif name="color[]" value="蓝色"> <label>蓝色</label></li>
                                <li><input type="checkbox" @if(in_array('黑色',explode('/',$vo['color']))) checked @endif name="color[]" value="黑色"> <label>黑色</label></li>
                                <li><input type="checkbox" @if(in_array('紫色',explode('/',$vo['color']))) checked @endif name="color[]" value="紫色"> <label>紫色</label></li>
                            </ul>
                        </div>
                    </div>
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
                        <label class="mws-form-label">充电器</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('无线充电器',explode('/',$vo['cdq']))) checked @endif name="cdq[]" value="无线充电器"> <label>无线充电器</label></li>
                                <li><input type="checkbox" @if(in_array('有线充电器',explode('/',$vo['cdq']))) checked @endif name="cdq[]" value="有线充电器"> <label>有线充电器</label></li>
                            </ul>
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">耳机</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('赠耳机',explode('/',$vo['erji']))) checked @endif name="erji[]" value="赠耳机"> <label>赠耳机</label></li>
                                <li><input type="checkbox" @if(in_array('专用耳机',explode('/',$vo['erji']))) checked @endif name="erji[]" value="专用耳机"> <label>专用耳机</label></li>
                                <li><input type="checkbox" @if(in_array('蓝牙耳机',explode('/',$vo['erji']))) checked @endif name="erji[]" value="蓝牙耳机"> <label>蓝牙耳机</label></li>
                                <li><input type="checkbox" @if(in_array('有线耳机',explode('/',$vo['erji']))) checked @endif name="erji[]" value="有线耳机"> <label>有线耳机</label></li>
                            </ul>
                        </div>
                    </div>
                      <div class="mws-form-row">
                        <label class="mws-form-label">自拍杆</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('赠品自拍杆',explode('/',$vo['zpg']))) checked @endif name="zpg[]" value="赠品自拍杆"> <label>赠品自拍杆</label></li>
                                <li><input type="checkbox" @if(in_array('手机自拍杆',explode('/',$vo['zpg']))) checked @endif name="zpg[]" value="手机自拍杆"> <label>手机自拍杆</label></li>
                                <li><input type="checkbox" @if(in_array('无线自拍杆',explode('/',$vo['zpg']))) checked @endif name="zpg[]" value="无线自拍杆"> <label>无线自拍杆</label></li>
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
                        <img src="{{$vo['picname']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>图片</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='picname' value='{{$vo['picname']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
               <div class="mws-form-row">
                                 <label class="mws-form-label">文章内容</label>
                                 <div class="mws-form-item">
                                      <script id="editor"  name='con' type="text/plain" style="width:600px;height:420px;">
                                          {!!$vo['con']!!}
                                      </script>
                                 </div>
                            </div>
		<div class="mws-button-row">
			<input type="submit" value="修改" class="btn btn-danger">
			<input type="reset" value="重置" class="btn ">
	    </div>
     </form>
</div>    	
</div>
<script type="text/javascript">
   var ue = UE.getEditor('editor');
</script>
@endsection