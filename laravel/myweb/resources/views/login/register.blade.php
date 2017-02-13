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
<script type="text/javascript" src="/zc/js/jquery-1.8.3.js"></script>
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

 //    $.ajax({

	// 	url:"/v3/web/checkRegAccount",

	// 	data:"account="+email+"&type=1",

	// 	success:function(json){

	// 		if(json.stat!="200"){

	// 	        inner("error_email", json.msg);

	// 	        showErrorIcon("_email", "0");

	// 			return false;

	// 		}

	// 		else

	// 		{

	// 			showErrorIcon("_email", "1");

	// 			return true;

	// 		}

	// 	},

	// 	error:function(){

	// 		showErrorIcon("_email", "1");

	// 		return true;

	// 		//inner("error_email", "系统出现异常，请联系管理员");

	// 		//showErrorIcon("_email", "0");

	// 	},

	// 	type:"post",

	// 	async: true,

	// 	dataType:"json"

	// });
	 $.ajax({

		url:"/ajax/updateemail",

		data:{'email':email},
		// type:'post',
		success:function(mes){
			// alert(mes); inner("error_phonenum", "手机号不能为空");
			if(mes=='存在'){
				inner("error_email", "邮箱已经注册");
			}else{
				
			}
		}
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

 //    $.ajax({

	// 	url:"/v3/web/checkRegAccount",

	// 	data:"account="+phonenum+"&type=0",

	// 	success:function(json){

	// 		if(json.stat!="200"){

	// 			inner("error_phonenum", json.msg);

	// 	        showErrorIcon("_phonenum", "0");

	// 			return false;

	// 		}

	// 		else

	// 		{

	// 			showErrorIcon("_phonenum", "1");

	// 			return true;

	// 		}

	// 	},

	// 	error:function(){

	// 		showErrorIcon("_phonenum", "1");

	// 		return true;

	// 		//inner("error_phonenum", "系统出现异常，请联系管理员");

	// 		//showErrorIcon("_phonenum", "0");

	// 	},

	// 	type:"post",

	// 	async: true,

	// 	dataType:"json"

	// });

    //else{

    //	showErrorIcon("_phonenum", "1");

	//	return true;

	//}
	 $.ajax({

		url:"/ajax/updatephone",

		data:{'iphone':phonenum},
		// type:'post',
		success:function(mes){
			// alert(mes); inner("error_phonenum", "手机号不能为空");
			if(mes=='存在'){
				inner("error_phonenum", "手机号已经注册");
			}else{
				
			}
		}
		});
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

	    else if(confpwd!=pass)

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

			url:"/login/sendyzm",
			// url:"/v3/web/phoneRegSub",

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
		<p>帐号注册</p>
	</div>		
	<form class="middle_box" id="form_reg" name="form_reg" method="post" action="/login/doregister" autocomplete="off">
		{{csrf_field()}}
		<input type="hidden" name="client_id" value=""/> 
		<input type="hidden" name="redirect_uri" value=""/>
		<div class="hide_out">
			<div class="left">
				<!-- <p class="sub-title">已有帐号?<a class="link" onclick="goLogin();">立即登录</a></p> -->
				<p class="sub-title">已有帐号?<a class="link" href="/login/login";>立即登录</a></p>
				<ul class="register cl">
					<li class="radio">
						<input id="RegisterForm_mode_0" class="radio-style" value="phone" type="radio" name="RegisterForm[mode]" checked="checked" autocomplete="off"/> 
						<label for="RegisterForm_mode_0" class="label-style">用手机注册</label>
						<input id="RegisterForm_mode_1" class="radio-style" value="email" type="radio" name="RegisterForm[mode]" disableautocomplete autocomplete="off"/> 
						<label for="RegisterForm_mode_1" class="label-style">用邮箱注册</label>	
					</li>
				</ul>
			
				<!-- 手机号码注册 -->
				
				<ul class="phoneregister cl" id="phone-reg">
							<li class="vercode li_input">
								<em></em>
								<input class="v_inp" type="text" name="phonecode" placeholder="请输入图片验证码" id="_phoneiconcode" 
								onfocus="inputFocus('_phoneiconcode')" onblur="checkIconCode('_phoneiconcode')"/>
								<span class="code-box">
									<img  title="不区分大小写。看不清楚可以换一个" id="_phoneicon" src="/login/code" alt="" onclick="changeIconForPhoneReg()" /> 
								</span>
								<a class="change-code" onclick="changeIconForPhoneReg()">换一张</a> 
								
								<b class="correct" id="ct"></b>
								 <p class="tip" id="error_phoneiconcode"></p>
								<!-- <p class="tip" id="error_phoneiconcode" style="display: block;">请输入图片验证码</p> -->
							</li>
				
							<li class="phonenumber li_input">
								<em></em>
								<!-- <input class="v_inp" type="text" autocomplete="off"placeholder="请输入手机号" 
								name="account" id="_phonenum" onfocus="inputFocus('_phonenum')" onblur="checkPhoneOnline()"/> -->
								<input class="v_inp" type="text" autocomplete="off" placeholder="请输入手机号" id="_phonenum"  
								name="account" id="_phonenum" onfocus="inputFocus('_phonenum')" onblur="checkPhoneOnline()"/>				
								<!-- <input class="v_inp" type="password" autocomplete="off" placeholder="密码" id="_pwd" name="pwd" -->
							    <!-- onfocus="inputFocus('_pwd')" onblur="inputBlur('_pwd','密码不能为空')"/> -->
								<p class="tip" id="error_phonenum"></p>
								
								<b class="correct"></b>
							</li>
							<!-- <li class="vercode li_input">
								<input id="belaybar" type="button" onclick="getPhoneCode();" value="获取验证码" >
								<input class="v_inp" type="text" placeholder="请输入手机验证码" id="_phonecode"
								onfocus="inputFocus('_phonecode')" onblur="checkPhoneCode('_phonecode')"/>
								<p class="tip" id="error_phonecode"></p>
								<em></em>
								<b class="correct"></b>
							</li> -->
							<li class="psw li_input">
								<em></em>
								<input class="v_inp"  type="password" name='aa' placeholder="请输入密码" id="_phonepwd" 
								onfocus="inputFocus('_phonepwd')" onblur="checkRegPwd('_phonepwd')"/>
								
								<p class="tip" id="error_phonepwd"></p>
								
								<b class="error"></b>
							</li>
							<li class="psw li_input">
								<em></em>
								<input class="v_inp" type="password" name='pass' placeholder="请再输入一次密码" id="_phoneconfpwd" 
								onfocus="inputFocus('_phoneconfpwd')" onblur="checkRegConfPwd('_phoneconfpwd', '_phonepwd')"/>
								<p class="tip" id="error_phoneconfpwd"></p>
								
								<b class="correct"></b>
							</li>
							<li>
								<input name="_isAgreePhone" id="_isAgreePhone" type="checkbox" checked="checked" class="" autocomplete="off"
									onchange="checkAgreeProtocol('_isAgreePhone')">
								<label for="_isAgreePhone" class="check-item">我已阅读并接受</label>
								<a target="_blank" href="/warranty/webprotocol.html" class="check-item text-green">《vivo服务协议》</a>
								<p class="tip" id="error_isAgreePhone"></p>
								<b class="correct"></b>
							</li>
							<li class="login-btn">
								<input type="submit" value="立即注册" class="v_dark_btn sulong_btn" onclick="return phoneRegSub()"/>
							</li>
						</ul>
				<!-- 邮箱注册 -->
				
				<ul class="emailregister cl" id="email-reg">
							<li class="email li_input">
								<em></em>
								<input class="v_inp" name="email" type="text" placeholder="请输入邮箱地址" id="_email"
								onfocus="inputFocus('_email')" onblur="checkEmailOnline()"/>
								<p class="tip" id="error_email"></p>
								
								<b class="correct"></b>
							</li>
							<li class="psw li_input">
								<em></em>
								<input class="v_inp" name="pass" type="password" placeholder="请输入密码" id="_emailpwd" 
								onfocus="inputFocus('_emailpwd')" onblur="checkRegPwd('_emailpwd')"/>
								<p class="tip" id="error_emailpwd"></p>
								
								<b class="error"></b>
							</li>
							<li class="psw li_input">
								<em></em>
								<input class="v_inp" type="password" placeholder="请再输入一次密码" id="_emailconfpwd"
								onfocus="inputFocus('_emailconfpwd')" onblur="checkRegConfPwd('_emailconfpwd', '_emailpwd') "/>
								<p class="tip" id="error_emailconfpwd"></p>
								
								<b class="correct"></b>
							</li>
							<li class="vercode li_input">
								<em></em>
								<input class="v_inp" type="text" name="code" placeholder="请输入验证码" id="_emailcode" 
								onfocus="inputFocus('_emailcode')" onblur="checkEmailIconCode('_emailcode')"/>
								<span class="code-box2">
									<img  title="不区分大小写。看不清楚可以换一个" id="iconcode" src="/login/code" alt="" onclick="change()" /> 
								</span>
								<a class="change-code" onclick="change()">换一张</a> 
								
								<b class="correct" id="ct"></b>
								<p class="tip" id="error_emailcode"></p>
							</li>
							<li>
								<input name="_isAgreeEmail" id="_isAgreeEmail" type="checkbox" checked="checked" class="" autocomplete="off"
									   onchange="checkAgreeProtocol('_isAgreeEmail')">
								<label for="_isAgreeEmail" class="check-item">我已阅读并接受</label>
								<a target="_blank" href="/warranty/webprotocol.html" class="check-item text-green">《vivo服务协议》</a>
								<p class="tip" id="error_isAgreeEmail"></p>
								<b class="correct"></b>
							</li>
							<li class="login-btn">
								<input type="submit" value="提交" class="v_dark_btn sulong_btn"  id="email_sub_id"/>
							</li>
						</ul>
			</div>
			<div class="right">
				<div class="other-method">
					<div class="other-method">
					<p class="sub-title">其他方式登录</p>
					<ul class="cl">
						<li class="qq">
							<a id="qqlogin" href="/v3/web/login/qqLogin?redirect_uri=&client_id="><b></b>QQ帐号</a>
						</li>
						<li class="wechat">
							<a id="wechatlogin" href="/v3/web/login/wechatLogin?redirect_uri=&client_id="><b></b>微信帐号</a>
						</li>
						<li class="sina">
							<a id="sinalogin" href="/v3/web/login/sinaLogin?redirect_uri=&client_id="><b></b>新浪微博</a>
						</li>
						<li class="renren">
							<a id="renrenlogin" href="/v3/web/login/renrenLogin?redirect_uri=&client_id="><b></b>人人帐号</a>
						</li>
					</ul>
				</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
	
	</script>
</body>
</html>