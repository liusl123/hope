@extends('layout.grzx')

@section('con')
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">



<script type="text/javascript" src="/xgmm/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/xgmm/edit_page.js"></script>
<script type="text/javascript">

	function validateOldPwd()
	{
		var pwd=document.getElementById("old_password1").value;
		if(pwd.length==0)
		{
			herror_stle("old_password1","当前密码不能为空");
			return false;
		}
		return true;
	}

	function validatePwd()
	{
		var b=0;
		var pwd=document.getElementById("new_password1").value;
		if(pwd.length==0)
		{
			herror_stle("new_password1","新密码不能为空");
		}
		else if(pwd.length<6 || pwd.length>16)
		{
			herror_stle("new_password1","请输入6-16位字符");
		}
		else if(!patternPwd.test(pwd))
		{
			herror_stle("new_password1", "密码格式不正确");
		}
		else
		{
			var cpwd=document.getElementById("new_password2").value;
			if(cpwd.length>0)
			{
				if(cpwd!=pwd)
				{
					herror_stle("new_password2", "两次输入的密码不一致");
				}
				else
				{
					b=1;
				}
			}
		}
		if(b==1)
		{
			return true;
		}	
		else
		{
			return false;
		}
	}

	function validateConfirmPwd()
	{
		var b=0;
		var pwd=document.getElementById("new_password1").value;
		var cpwd=document.getElementById("new_password2").value;
		if(cpwd.length==0)
		{
			herror_stle("new_password2","确认新密码不能为空");
		}
		else if(cpwd.length<6 || cpwd.length>16)
		{
			herror_stle("new_password2", "请输入6-16位字符");
		}
		else if(!patternPwd.test(cpwd))
		{
			herror_stle("new_password2", "密码格式不正确");
		}
		else if(cpwd!=pwd)
		{
			herror_stle("new_password2", "两次输入的密码不一致");
		}
		else
		{
			b=1;
		}
		if(b==1)
		{
			return true;
		}	
		else
		{
			return false;
		}
	}

	function sub()
	{
		var check=true;
		check=validateOldPwd() && check;
		check=validatePwd() && check;
		check=validateConfirmPwd() && check;
		if(check)
		{
			var oldpwd=document.getElementById("old_password1").value;
			var newpwd=document.getElementById("new_password1").value;
			var uuid=document.getElementById("uuid").value;
			var oldpwdcode=encodeURIComponent(oldpwd);
			var newpwdcode=encodeURIComponent(newpwd);
			
			// $.ajax({

			// 	url:"/ajax/updateemail",

			// 	data:{'email':email},
			// 	// type:'post',
			// 	success:function(mes){
			// 		// alert(mes); inner("error_phonenum", "手机号不能为空");
			// 		if(mes=='存在'){
			// 			inner("error_email", "邮箱已经注册");
			// 		}else{
						
			// 		}
			// 	}
			// });
			$.ajax({
		 	url:"/login/doxgmm",
				data:"uuid="+uuid+"&oldpwd="+oldpwdcode+"&pwd="+newpwdcode+"&locale=zh_CN",
				// success:function(mes){
		 	// 	alert(mes);
				// }
			success:function(json){
					if(json.stat==="200"){
						$("#old_password1").val("");
						$("#new_password1").val("");
						$("#new_password2").val("");
						$("#prompt").css("color","###"); 
						inner("#prompt", json.msg);
					}else {
		 			herror_stle("old_password1", json.msg);
		 		//	inner("#prompt", json.msg);
		 		}	
		 	},
				error:function(){
	 		// herror_stle("old_password1", "系统出现异常，请联系管理员");
				//	inner("#prompt", "系统出现异常，请联系管理员");
		 	},
				type:"post",
				async: false,
				dataType:"json"
			});	
		}
		// return false;
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
					<input class="completion normal_border" value="" name="oldpass" id="old_password1" type="password">	
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