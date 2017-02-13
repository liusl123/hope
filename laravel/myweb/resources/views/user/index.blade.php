@extends('layout.adminindex')

@section('con')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span><i class="icon-table"></i>用户浏览</span>
    </div>
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <form action="/admin/user/index" method="get">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>Show 
                    <select size="1" name="num" aria-controls="DataTables_Table_1">
                    <option value="5"
                    @if(!empty($request['num']) && $request['num']=='5')
                    selected
                    @endif 
                    
                    >5</option>
                    <option value="10"
                    @if(!empty($request['num']) && $request['num']=='10')
                    selected
                    @endif 
                    
                    >10</option>
                    <option value="15"
                    @if(!empty($request['num']) && $request['num']=='15')
                    selected
                    @endif 
                    
                    >15</option>
                    <option value="25"
                    @if(!empty($request['num']) && $request['num']=='25')
                    selected
                    @endif 
                    
                    >25</option>
                    </select> entries
                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>Search: 
                    <input aria-controls="DataTables_Table_1" type="text" name="keyword">
                    <input aria-controls="DataTables_Table_1" type="submit"  value="搜索">
                    </label>
                </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                    <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 145px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 189px;" aria-label="Browser: activate to sort column ascending">用户名</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 177px;" aria-label="Platform(s): activate to sort column ascending">手机</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 121px;" aria-label="Engine version: activate to sort column ascending">邮箱</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 87px;" aria-label="CSS grade: activate to sort column ascending">状态</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 87px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                    </tr>
                </thead>
                
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                   
                    @foreach($list as $k=>$v)
                        @if($k%2==0)
                        <tr class="odd">
                        @else
                        <tr class="even">
                        @endif
                                <td class="  sorting_1">{{$v['id']}}</td>
                                <td class=" ">{{$v['username']}}</td>
                                <td class=" ">{{$v['phone']}}</td>
                                <td class=" ">{{$v['email']}}</td>
                                <td class=" ">
                                @if($v['status']==0)
                                禁用
                                @else
                                启用
                                @endif
                                </td>
                                <td class=" ">
                                    <a href="/admin/user/del/{{$v['id']}}" class="icon-trash" style="font-size:25px"></a>
                                    &nbsp&nbsp&nbsp&nbsp  
                                    <a href="/admin/user/edit/{{$v['id']}}" class="icon-wrench" style="font-size:25px"></a> 
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries
            </div>
            <div class="dataTables_paginate paging_full_numbers" id="page">
                 {!!$list->appends($request)->render()!!}
            </div>
        </div>
    </div>
</div>
@endsection