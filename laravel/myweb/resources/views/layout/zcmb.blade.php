<!-- 注册模板 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--[if IE 6]> 
    <script type="text/javascript" src="/web/js/DD_belatedPNG.js"></script> 
    <script type="text/javascript"> 
    DD_belatedPNG.fix(".logo,.cl li a b,li em"); 
    </script> 
<![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="expires" content="0">
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="pragma" content="no-cache">
<title>vivo帐号注册</title>
<link rel="stylesheet" href="/zc/css/login.css" style="text/css"/>
<script type="text/javascript" src="/zc/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/zc/js/login.js"></script>
<script type="text/javascript">
	function checkEmailOnline()

	{

		var email= $.trim($("#_email").attr("value"));

	    if(email.length == 0 ){

	        inner("error_email", "邮箱不能为空");

	        showErrorIcon("_email", "0");

			return false;

		}

	    else if(!patternEmail.test(email))

	    {

	    	inner("error_email", "请输入有效的邮箱");

	        showErrorIcon("_email", "0");

			return false;

	    }

	    $.ajax({

			url:"/v3/web/checkRegAccount",

			data:"account="+email+"&type=1",

			success:function(json){

				if(json.stat!="200"){

			        inner("error_email", json.msg);

			        showErrorIcon("_email", "0");

					return false;

				}

				else

				{

					showErrorIcon("_email", "1");

					return true;

				}

			},

			error:function(){

				showErrorIcon("_email", "1");

				return true;

				//inner("error_email", "系统出现异常，请联系管理员");

				//showErrorIcon("_email", "0");

			},

			type:"post",

			async: true,

			dataType:"json"

		});

	}



	function checkPhoneOnline()

	{

		var phonenum= $.trim($("#_phonenum").attr("value"));

	    if(phonenum.length == 0 ){

	        inner("error_phonenum", "手机号不能为空");

	        showErrorIcon("_phonenum", "0");

			return false;

		}

	    else if(!patternPhone.test(phonenum))

	    {

	    	inner("error_phonenum", "请输入有效的手机号");

	        showErrorIcon("_phonenum", "0");

			return false;

	    }

	    $.ajax({

			url:"/v3/web/checkRegAccount",

			data:"account="+phonenum+"&type=0",

			success:function(json){

				if(json.stat!="200"){

					inner("error_phonenum", json.msg);

			        showErrorIcon("_phonenum", "0");

					return false;

				}

				else

				{

					showErrorIcon("_phonenum", "1");

					return true;

				}

			},

			error:function(){

				showErrorIcon("_phonenum", "1");

				return true;

				//inner("error_phonenum", "系统出现异常，请联系管理员");

				//showErrorIcon("_phonenum", "0");

			},

			type:"post",

			async: true,

			dataType:"json"

		});

	    //else{

	    //	showErrorIcon("_phonenum", "1");

		//	return true;

		//}

	}



		window.onload=function  () {

			document.getElementById("belaybar").disabled=false;

			change();

			changeIconForPhoneReg();  

		}

		

		function checkForms(){

			var check = true;

			check = checkusername() && check;

			check = checkpassword() && check;

			return check;

		}

		

		function checkusername(){

			var eValue= $.trim($("#_account").attr("value"));

		    if(eValue.length == 0 || eValue == '邮箱/手机号/用户名'){

		        inner("error_account", "帐号不能为空");

		        showErrorIcon("_account", "0");

				return false;

			}else{

				showErrorIcon("_account", "1");

				return true;

			}

		}



		function checkpassword(){//密码格式验证

			var pValue=$.trim($("#_pwd").attr("value"));

			if(pValue==null || pValue==""){

				inner("error_pwd", "密码不能为空");

				showErrorIcon("_pwd", "0");

				return false;

			}else{

				showErrorIcon("_pwd", "1");

				return true;

			}

		}

		

		function getting()

		{

			var btn = document.getElementById("belaybar");

			btn.disabled=true;

			btn.value = "正在获取...";

			$("#belaybar").css({background:"#f5f5f5",color:"#8C8C8C"});

			//alert("getting");

		}



		function over()

		{

			var btn = document.getElementById("belaybar");

			btn.disabled=false;

			btn.value = "获取验证码";

			$("#belaybar").css({background:"#008cd6",color:"#fff"});

		}



		function c(i){

			 var btn = document.getElementById("belaybar");

			 i--;

			 if(i==0){

			  btn.value = "获取验证码";

			  btn.disabled=false;

			  $("#belaybar").css({background:"#008cd6",color:"#fff"});

			  changeIconForPhoneReg();

			 }

			 else{

			  btn.disabled=true;

			  btn.value = "获取("+i+"秒)";

			  $("#belaybar").css({background:"#f5f5f5",color:"#8C8C8C"});

			  setTimeout("c("+i+")",1000);

			 }

			}

		

		function getPhoneCode()

		{

			var phonenum=$("#_phonenum").val();

			var phoneiconcode=$("#_phoneiconcode").val();

			if(!patternPhone.test(phonenum))

			{

				inner("error_phonenum", "请输入正确的手机号");

				showErrorIcon("_phonenum", "0");

				return false;

			}

			else if(phoneiconcode.length==0)

			{

				inner("error_phoneiconcode", "请输入图片验证码");

			}

			else

			{

				getting();

				$.ajax({

					url:"/v3/web/getPhoneCode",

					data:"account="+phonenum+"&code="+phoneiconcode+"&from=Web_VIVOAccount&locale=zh_CN",

					success:function(json){

						if(json.stat!="200"){

							over();

							if(json.stat=="400")

							{

								inner("error_phoneiconcode", json.msg);

								//showErrorIcon("_phoneiconcode", "0");

							}

							else

							{

								inner("error_phonenum", json.msg);

								showErrorIcon("_phonenum", "0");

							}

							

							changeIconForPhoneReg(); 

						}

						else

						{

							//获取验证码成功

							c(60);

						}

					},

					error:function(){

						over();

						inner("error_phonenum", "请求过于频繁，请稍后再试");

						showErrorIcon("_phonenum", "0");

					},

					type:"post",

					async: true,

					dataType:"json"

				});	

			}

			return false;

		}

		

		function checkEmail()

		{

			var email= $.trim($("#_email").attr("value"));

		    if(email.length == 0 ){

		        inner("error_email", "邮箱不能为空");

		        showErrorIcon("_email", "0");

				return false;

			}

		    else if(!patternEmail.test(email))

		    {

		    	inner("error_email", "请输入有效的邮箱");

		        showErrorIcon("_email", "0");

				return false;

		    }

		    showErrorIcon("_email", "1");

		    return true;

		}

		

		function checkPhone()

		{

			var phonenum= $.trim($("#_phonenum").attr("value"));

		    if(phonenum.length == 0 ){

		        inner("error_phonenum", "手机号不能为空");

		        showErrorIcon("_phonenum", "0");

				return false;

			}

		    else if(!patternPhone.test(phonenum))

		    {

		    	inner("error_phonenum", "请输入有效的手机号");

		        showErrorIcon("_phonenum", "0");

				return false;

		    }

		    else{

		    	showErrorIcon("_phonenum", "1");

				return true;

			}

		}

		

		function checkRegPwd(id)

		{

			var pwd= $.trim($("#"+id).attr("value"));

		    if(pwd.length == 0 ){

		        inner("error"+id, "密码不能为空");

		        showErrorIcon(id, "0");

				return false;

			}

		    else if(!patternPwd.test(pwd))

		    {

		    	inner("error"+id, "请输入6-16位字符");

		        showErrorIcon(id, "0");

				return false;

		    }

		    else{

		    	showErrorIcon(id, "1");

				return true;

			}

		}

		function checkRegConfPwd(confpwdid, pwdid)

		{

			var confpwd= $.trim($("#"+confpwdid).attr("value"));

			var pwd= $.trim($("#"+pwdid).attr("value"));

		    if(confpwd.length == 0 ){

		        inner("error"+confpwdid, "密码不能为空");

		        showErrorIcon(confpwdid, "0");

				return false;

			}

		    else if(!patternPwd.test(confpwd))

		    {

		    	inner("error"+confpwdid, "请输入6-16位字符");

		        showErrorIcon(confpwdid, "0");

				return false;

		    }

		    else if(confpwd!=pwd)

		    {

		    	inner("error"+confpwdid, "两次输入的密码不一致");

		        showErrorIcon(confpwdid, "0");

				return false;

		    }

		    else{

		    	showErrorIcon(confpwdid, "1");

				return true;

			}

		}

		

		function checkIconCode(id)

		{

			var code=$("#"+id).val();

			if(code.length == 0)

			{

				inner("error"+id, "请输入图片验证码");

				showErrorIcon(id, "0");

				return false;

			}

			$.ajax({

				url:"/v3/web/vIconCode",

				data:"code="+code+"&from=Web_VIVOAccount&locale=zh_CN&t="+new Date().getTime(),

				success:function(json){

					if(json.stat!="200"){

						inner("error"+id, json.msg);

						showErrorIcon(id, "0");

						changeIconForPhoneReg();

					}

					else

					{

						showErrorIcon(id, "1");

					}

				},

				error:function(){

					// inner("error"+id, "系统出现异常，请联系管理员");

					// showErrorIcon(id, "0");

					// changeIconForPhoneReg();

				},

				type:"post",

				async: true,

				dataType:"json"

			});

			return false;

		}

		function checkEmailIconCode(id)

		{

			var code=$("#"+id).val();

			if(code.length == 0)

			{

				inner("error"+id, "请输入图片验证码");

				showErrorIcon(id, "0");

				return false;

			}

			return true;

		}


		

		function checkPhoneCode(id)

		{

			var code=$("#"+id).val();

			if(code.length == 0)

			{

				inner("error"+id, "请输入手机验证码");

				return false;

			}

			return true;

		}

		

		function phoneRegSub()

		{

			var check = true;

			check=checkPhone() && check;

			check=checkPhoneCode("_phonecode") && check;

			check=checkRegPwd("_phonepwd") && check;

			check=checkRegConfPwd("_phoneconfpwd", "_phonepwd") && check;

			check=checkAgreeProtocol("_isAgreePhone") && check;



			if(!check)

			{

				return false;

			}

			var phonenum=$("#_phonenum").val();

			var pwd=$("#_phoneconfpwd").val();

			var phonecode=$("#_phonecode").val();

			var isAgree=$("#_isAgreePhone").is(":checked");

			var pwdcode = encodeURIComponent(pwd);

			

			$.ajax({

				url:"/v3/web/phoneRegSub",

				data:"account="+phonenum+"&pwd="+pwdcode+"&code="+phonecode+"&isAgree="+isAgree+"&from=Web_VIVOAccount&locale=zh_CN",

				success:function(json){

					if(json.stat!="200"){

						if(json.stat=="517" || json.stat=="518"){

							inner("error_phonecode", json.msg);

							showErrorIcon("_phonecode", "0");

						}else{

							inner("error_phonenum", json.msg);

							showErrorIcon("_phonenum", "0");

						}

					}

					else

					{

						//注册成功

						document.getElementById("form_reg").setAttribute("action", "/v3s2/web/login/login?locale=zh_CN");

						document.getElementById("form_reg").submit();

					}

				},

				error:function(){

					inner("error_phonenum", "系统出现异常，请联系管理员");

					showErrorIcon("_phonenum", "0");

				},

				type:"post",

				async: true,

				dataType:"json"

			});

			return false;

		}

		

		



		function change()

		{

			 document.getElementById("iconcode").src="/login/code?sc="+new Date().getTime();

		}



		 

		function goLogin()

		{

			document.getElementById("form_reg").setAttribute("action", "/v3/web/login/authorize");

			document.getElementById("form_reg").submit();

		}

		

		

		function changeIconForPhoneReg()

		{

			 document.getElementById("_phoneicon").src="/login/code?t=2&sc="+new Date().getTime();

		}



		function checkAgreeProtocol(id) {

			var $isAgree = $('#'+id);

			if (!$isAgree.is(":checked")){

				inner("error"+id, "请同意协议内容");

				return false;

			}else {

				inner("error"+id, "");

			}

			return true;

		}
</script>
</head>
<body >
	
	<div class="banner_bg">
		<a class="logo" href="http://account.vivo.com.cn/" title="vivo智能手机">
			<!-- <img src="/web/images/logo.png"> -->
		</a>
		 
	</div>		
	<div >
		<div class="center">
		 <!-- 占位符 -->
        @section('con')
        @show
		</div>			
	</div>	
</body>
</html>