@extends('layout.adminindex')
@section('con')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>用户修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">

                    	<form action="/admin/administrator/update" class="mws-form" method="post">
                    	{{csrf_field()}}
                         <input type="hidden" name="id" value="{{$vo['id']}}">
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">姓名</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='name' value='{{$vo['name']}}'>
                    				</div>
                    			</div>
                    			<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">邮箱</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='email' value='{{$vo['email']}}'>
                    				</div>
                    			</div>
                    			<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">电话</label>
                    				<div class="mws-form-item">
                    					<input type="text" class="small" name='phone' value='{{$vo['phone']}}'>
                    				</div>
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