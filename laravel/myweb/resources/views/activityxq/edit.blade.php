@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
<div class="mws-panel-header">
	<span>商品添加</span>
</div>
<div class="mws-panel-body no-padding">
	<form enctype="multipart/form-data" action="/admin/activityxq/update" class="mws-form" method="post">
	{{csrf_field()}}
    <input type="hidden" name="id" value='{{$vo['id']}}'>
                <div class="mws-form-row">
                    <label class="mws-form-label">活动详情图片一</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['activitypic1']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>活动详情图片一</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='activitypic1' value='{{$vo['activitypic1']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">活动详情图片二</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['activitypic2']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>活动详情图片二</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='activitypic2' value='{{$vo['activitypic2']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">活动详情图片三</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['activitypic3']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>活动详情图片三</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='activitypic3' value='{{$vo['activitypic3']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">活动详情图片四</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['activitypic4']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>活动详情图片四</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='activitypic4' value='{{$vo['activitypic4']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">活动详情图片</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['activitypic5']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                    <label class="mws-form-label"><font><font>活动详情图片</font></font></label>
                    <div class="mws-form-item">
                         <input type="file" name='activitypic5' value='{{$vo['activitypic5']}}' class="fileinput-preview" style="width:100;" readonly="readonly" placeholder="No file selected...">
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