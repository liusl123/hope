@extends('layout.adminindex')
@section('con')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>商品订单页面</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        		<form action="/admin/good/index">
                        	<div id="DataTables_Table_1_length" class="dataTables_length">
		                       <label>Show 
		                    		<select size="1" name="num" size='1' aria-controls="DataTables_Table_1">
			                        <option value="5"
			                        @if(!empty($request['num']) && $request['num']=='5')
			                        selected
			                        @endif>5</option>
			                        <option value="10"
			                        @if(!empty($request['num']) && $request['num']=='10')
			                        selected
			                        @endif>10</option>
			                        <option value="25"
			                        @if(!empty($request['num']) && $request['num']=='25')
			                        selected
			                        @endif>25</option>
			                        <option value="50"
			                        @if(!empty($request['num']) && $request['num']=='50')
			                        selected
			                        @endif>50</option>
		                        </select> entries
		                       </label>
                        	</div>
                        <div class="dataTables_filter" id="DataTables_Table_1_filter">
                        	<label>Search:
                        	 <input type="text" value='@if(!empty($requset['keyword'])){{$requset['keyword']}}@endif' name="keyword" aria-controls="DataTables_Table_1">
                        </label>
                        	<input type="submit" class="btn btn-primary" value="搜索">
                        </div>
                       </form>
                       <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                            <thead>
                                <tr role="row">
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 208px;">订单ID</th>
	                                	                               	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">商品图片</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 208px;">商品名称</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">总价</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">订单创建时间</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">订单备注</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">状态</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">操作</th>
	                               </tr>
                            </thead>
                            
                       <tbody role="alert" aria-live="polite" aria-relevant="all">
                       	@foreach($list as $k=>$v)
                       	@if($k%2==0)
                       		<tr class="odd">
                       	@else
                       		<tr class="even">
                       	@endif
	                        <td class=" ">{{$v['order_num']}}</td>
	       
	                        <td class=" "><img src="{{ $v['picname'] }}" alt=""></td>
	                       	<td class=" ">{{$v['goods']}}</td>
	                        
	                        <td class=" ">{{$v['total']}}</td>
	                        <td class=" ">{{$v['created_at']}}</td>
	                        
	                        <td class=" ">{{$v['commit']}}</td>
	                        <td class=" ">
	                        			@if($v['status']==0)
											未付款
	                        			@elseif($v['status']==1)
	                        				已付款
	                        			@elseif($v['status']==2)
	                        				已发货
	                        			@elseif($v['status']==3)
	                        				已收货
	                        			@else
	                        				已关闭
	                        			@endif
	                        </td>
	                        <td>
	                        	<a href="/admin/orders/fahuo/{{$v['order_num']}}" class='' >执行发货</a>
	                    
	                        </td>
                        </tr>
                       	@endforeach
                       </tbody>
                       </table>
                       	<div class="dataTables_paginate paging_full_numbers" id="page">
	        				
                            </div>
                       </div>
                 </div>
    </div>
@endsection