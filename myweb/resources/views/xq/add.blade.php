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
    	<form enctype="multipart/form-data" action="/admin/xq/insert" class="mws-form" method="post">
    	{{csrf_field()}}
                   <div class="mws-form-row">
                        <label class="mws-form-label">颜色</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="color[]" value="玫瑰金"> <label>玫瑰金</label></li>
                                <li><input type="checkbox" name="color[]" value="天空黑"> <label>天空黑</label></li>
                                <li><input type="checkbox" name="color[]" value="金色"> <label>金色</label></li>
                                <li><input type="checkbox" name="color[]" value="白色"> <label>白色</label></li>
                                <li><input type="checkbox" name="color[]" value="黄色"> <label>黄色</label></li>
                                <li><input type="checkbox" name="color[]" value="蓝色"> <label>蓝色</label></li>
                                <li><input type="checkbox" name="color[]" value="黑色"> <label>黑色</label></li>
                                <li><input type="checkbox" name="color[]" value="紫色"> <label>紫色</label></li>
                            </ul>
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
                        <label class="mws-form-label">赠品</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" name="zping[]" value="vivo充电器"> <label>vivo充电器</label></li>
                                <li><input type="checkbox" name="zping[]" value="vivo耳机"> <label>vivo耳机</label></li>
                                <li><input type="checkbox" name="zping[]" value="vivo充电宝"> <label>vivo充电宝</label></li>
                                <li><input type="checkbox" name="zping[]" value="vivo自拍杆"> <label>vivo自拍杆</label></li>
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
                    <div class="mws-form-row">
                        <label class="mws-form-label">商品内容</label>
                        <div class="mws-form-item">
                          <script id="editor"  name='contype' type="text/plain" style="width:600px;height:420px;"></script>
                        </div>
                    </div>

                     <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>图片</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='pictype' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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