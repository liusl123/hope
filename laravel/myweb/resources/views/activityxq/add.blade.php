@extends('layout.adminindex')
@section('con')
	<div class="mws-panel-header">
    	<span>商品添加</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form enctype="multipart/form-data" action="/admin/activityxq/insert" class="mws-form" method="post">
    	{{csrf_field()}}
        <input type="hidden" name="id" value="{{$vo['id']}}">
                     <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动详情图片一</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='activitypic1' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动详情图片二</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='activitypic2' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动详情图片三</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='activitypic3' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动详情图片四</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='activitypic4' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
                        </div>
                   </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动详情图片五</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" name='activitypic5' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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