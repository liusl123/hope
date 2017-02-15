@extends('layout.grzx')

@section('con')
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">



<script type="text/javascript" src="/xgmm/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/xgmm/jquery-1.8.3.js"></script>
<script type="text/javascript" src="/xgmm/edit_page.js"></script>

<script type="text/javascript">
	     function checkEmailOnline(){

        var oldpwd=document.getElementById("old_password1").value; 
        // alert(oldpwd);  
            // var oldpwd=document.getElementById("old_password1").value;
            $.ajax({

            url:"/ajax/oldpwd",

            data:{'oldpwd':oldpwd},
            // type:'post',
            success:function(mes){
                // alert(mes); 
                if(mes=='是'){
                	// alert(mes); 
               		// herror_stle("old_password1","当前密码不能为空");
                }else{
                    alert('输入原密码错误'); 
               		// $('.oldpwd_spann').attr("display","inline");
                }
            }
            });

    }
</script>

<title>vivo帐号中心</title>

<link media="all" href="/xgmm/index_1.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div class="compile_topimg_cont">
		<div class="title">修改密码</div>
		<div class="hide_box" id="security_question2">					        
			<form id="" onsubmit="return sub();" action="/login/doxgmm" method="post" class="compile_topimg_middle">
				{{csrf_field()}}
				<div class="hang_bg"> 
					<span class="front_word">旧密码：</span>
					
					<input class="completion normal_border" value="" name="oldpass" id="old_password1" onblur="checkEmailOnline()" type="password">	
					<span class="error_word wrong_ico" id="oldpwd_span" style="display: none;">旧密码不能为空</span>									
				</div>
				<div class="hang_bg"> 
					<span class="front_word">新密码：</span>
					<input class="completion normal_border" value="" name="username" id="new_password1" type="password">	
					<span class="error_word wrong_ico" id="pwd_span" style="display: none;">新密码不能为空</span>
				</div>
				<div class="hang_bg"> 
					<span class="front_word">确认新密码：</span>
					<input class="completion normal_border" value="" name="username" id="new_password2" type="password">	
					<span class="error_word wrong_ico" id="cpwd_span" style="display: none;">确认新密码不能为空</span>
				</div>
				<div class="error_box" id="prompt" style="display: block;"></div>
				<div class="hang_bg">
					<input title="" onclick="return sub()" value="修&nbsp;改" class="login_bt3 but_left2 but_top" name="gt" id="submit" type="submit">
				</div>
				<input name="uuid" id="uuid" value="2fc3fa0a-d2dd-48cd-8822-3ecbb1d84eac" type="hidden">	
			</form>
			</div>
		</div>




</body>
</html>


@endsection