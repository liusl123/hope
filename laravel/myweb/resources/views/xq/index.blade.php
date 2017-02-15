@extends('layout.adminindex')
@section('con')
	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>商品浏览页面</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                        		<form action="/admin/xq/index">
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
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 208px;">ID</th>
	                               	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">类别ID</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 208px;">版本</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">服务</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">尺寸</th>
	                                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 101px;">容量</th>
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
	                        <td class=" ">{{$v['id']}}</td>
	                        <td class=" ">{{$v['cate']}}</td>
	                        <td class=" ">{{$v['banben']}}</td>
	                        <td class=" ">{{$v['fuwu']}}</td>
	                        <td class=" "
							@if($v['size']=='4.5')
							4.5
							@elseif($v['size']=='5.0')
							5.0
							@elseif($v['size']=='5.5')
							5.5
							@else
							6.0
							@endif
	                        >{{$v['size']}}</td>
	                        <td class=" ">{{$v['rongliang']}}</td>
	                        <td>
	                        	<a href="/admin/xq/del/{{$v['id']}}" class='icon-trash' style="font-size:20px;color:yellowgreen"></a>
	                        	&nbsp;&nbsp;
	                        	<a href="/admin/xq/edit/{{$v['id']}}" class='icon-wrench' style="font-size:20px;color:yellowgreen"></a>
	                        	&nbsp;&nbsp;
	                        	<a href="/admin/photo/add/{{$v['id']}}" class='icon-edit' style="font-size:20px;color:yellowgreen"></a>
	                        </td>
                        </tr>
                       	@endforeach
                       </tbody>
                       </table>
                       	<div class="dataTables_paginate paging_full_numbers" id="page">
	        					{!!$list->appends($request)->render()!!}
                            </div>
                       </div>
                 </div>
           </div>
@endsection