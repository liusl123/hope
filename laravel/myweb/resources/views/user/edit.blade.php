 @extends('layout.adminindex')

 @section('con')
<div class="mws-panel grid_8">
                  
                    <div class="mws-panel-header">
                         <span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                         <form class="mws-form" action="/admin/user/update" method="post">
                              {{csrf_field()}}
                              <input type="hidden" name="id" value="{{$list['id']}}">
                              <div class="mws-form-inline">

                                   <div class="mws-form-row">
                                        <label class="mws-form-label">邮箱</label>
                                        <div class="mws-form-item">
                                             <input class="small" type="text"name="email" value="{{$list['email']}}">
                                        </div>
                                   </div>
                                   <div class="mws-form-row">
                                        <label class="mws-form-label">状态</label>
                                        <div class="mws-form-item">
                                             <select name="status" class="small">
                                                  <option value="0"@if($list['status']=='0') selected @endif>禁用</option>
                                                  <option value="1"@if($list['status']=='1') selected @endif>启用</option>
                                             </select>
                                        </div>
                                   </div>
                              </div>
                              <div class="mws-button-row">
                                   <input value="修改" class="btn btn-danger" type="submit">
                                   <input value="重置" class="btn " type="reset">
                              </div>
                         </form>
                    </div>         
</div>
 @endsection