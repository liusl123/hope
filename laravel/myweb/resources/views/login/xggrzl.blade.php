@extends('layout.grzx')

@section('con')
<!-- 个人中心个人资料 -->
<center>
<form action="/login/doxggrzl" method="post">
    <form class="information-form"  novalidate="novalidate" action="/login/doxggrzl" method="post">
    	{{csrf_field()}}
        <table class="form-table" >
            <tbody>
                    <tr>            
                        <td>姓名:<input type="text" name="name"></td>
                        
                    </tr>
                    <tr>
                       <td>性别：<input type="radio" name="sex" value="1">男
                            <input type="radio" name="sex" value="0">女
                        </td>  
                    </tr>
                    <tr>        
                       <td>手机号:<input type="text" name="iphone"></td>
                    </tr>
                    <tr>        
                       <td>邮箱号:<input type="text" name="iemail"></td>
                    </tr>
                    <tr>
                        <!-- <td><button class="btn-blue submit btn-submit" type="submit">保存</button></td> -->
                        <td></td>
                        <td><input type="submit" value="保存" class="btn-blue submit btn-submit" ></td>
                    </tr>
            </tbody>
        </table>
    </form>
</form>        
</center> 
@endsection