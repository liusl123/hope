@extends('layout.grzx')

@section('con')
<!-- 个人中心个人资料 -->
<form action="/login/xggrzl" method="post">
    <form class="information-form"  novalidate="novalidate"  action="/login/xggrzl" method="post">
        {{csrf_field()}}                                      
        <table class="form-table" >
            <tbody>
                    <tr>            
                        <td>姓名:{{$data['username']}}</td>
                    </tr>
                    <tr>
                       <td>性别:@if($data['sex']==1)
                                    男
                                @else
                                女
                                @endif
                       </td>
                    </tr>
                    <tr>        
                       <td>手机号:{{$data['phone']}}</td>
                    </tr>
                    <tr>        
                       <td>邮箱号:{{$data['email']}}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <!-- <td><button class="btn-blue submit btn-submit" type="submit">保存</button></td> -->
                        <td><input type="submit" value="修改" class="btn-blue submit btn-submit" ></td>
                    </tr>
            </tbody>
        </table>
    </form>
</form> 
</center> 
@endsection