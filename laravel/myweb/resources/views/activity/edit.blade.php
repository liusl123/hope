@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
  <div class="mws-panel-header">
      <span>活动修改</span>
    </div>
    <div class="mws-panel-body no-padding">
      <form enctype="multipart/form-data" action="/admin/activity/update" class="mws-form" method="post">
      {{csrf_field()}}
       <input type="hidden" name="id" value='{{$vo['id']}}'>
        <div class="mws-form-inline">
          <div class="mws-form-row">
            <label class="mws-form-label">活动名称</label>
            <div class="mws-form-item">
              <input type="text" class="small" name='activityname' value='{{$vo['activityname']}}'>
            </div>
          </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">商品图片</label>
                    <div class="mws-form-item">
                        <img src="{{$vo['pic']}}" width="220" height="120" alt="">
                    </div>
               </div>
                <div class="mws-form-row">
                        <label class="mws-form-label"><font><font>活动图片</font></font></label>
                        <div class="mws-form-item">
                             <input type="file" value='{{$vo['pic']}}' name='pic' class="fileinput-preview" style="width:50%;" readonly="readonly" placeholder="No file selected...">
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
          <div class="mws-form-row bordered">
                    <label class="mws-form-label"><font><font>活动信息</font></font></label>
                    <div class="mws-form-item">
                        <textarea rows="" cols="" class="small" name='nows'>{{$vo['nows']}}</textarea>
                    </div>
                </div>
                    <div class="mws-form-row">
                <label class="mws-form-label">活动状态</label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li><input type="radio" value='1' name="state" @if($vo['state']=='1')  checked @endif>新活动</li>
                        <li><input type="radio" value='2' name="state" @if($vo['state']=='2') checked @endif>活动开始</li>
                        <li><input type="radio" value='3' name="state" @if($vo['state']=='3')checked @endif>活动结束</li>
                    </ul>
                </div>
            </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">活动类型</label>
                        <div class="mws-form-item clearfix">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" @if(in_array('幸运大抽奖',explode('/',$vo['type']))) checked @endif name="type[]" value="幸运大抽奖"> <label>幸运大抽奖</label></li>
                                <li><input type="checkbox" @if(in_array('vivo品出好品味',explode('/',$vo['type']))) checked @endif name="type[]" value="vivo品出好品味"> <label></label>vivo品出好品味</li>
                                <li><input type="checkbox" @if(in_array('初冬送好礼',explode('/',$vo['type']))) checked @endif name="type[]" value="初冬送好礼"> <label></label>初冬送好礼</li>
                                <li><input type="checkbox" @if(in_array('免息购买',explode('/',$vo['type']))) checked @endif name="type[]" value="免息购买"> <label></label>免息购买</li>
                                <li><input type="checkbox" @if(in_array('分期购买免利息',explode('/',$vo['type']))) checked @endif name="type[]" value="分期购买免利息"> <label></label>分期购买免利息</li>
                                <li><input type="checkbox" @if(in_array('更多活动敬请期待',explode('/',$vo['type']))) checked @endif name="type[]" value="更多活动敬请期待~"> <label></label>更多活动敬请期待~</li>
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