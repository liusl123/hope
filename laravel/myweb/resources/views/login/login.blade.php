<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/dl/css/login.css" style="text/css">

<script type="text/javascript" src="/dl/js/login.js"></script>
<script type="text/javascript">
</script>

<title>vivo帐号登录</title>
</head>
<body >
	<a class="banner_bg" href="https://shop.vivo.com.cn/product/9948?source=vivo">
	<!--	<a class="logo" href="http://shop.vivo.com.cn/product-863.html?hmsr=X5Pro_3G_Login&hmmd=pic&hmpl=&hmkw=&hmci=" title="vivo智能手机">
		</a>-->
	<!--  	<p>帐号登录</p>-->
	</a>
	<div class="middle_box">
		<div class="hide_out">
			<div class="left">
				<!-- 登录 -->
				<div class="fieldset-section"  >				        
					<form id="login_form" name="form" onsubmit="return sub(1);" action="/login/dologin" method="post">
					{{csrf_field()}}
					<input type="hidden" name="client_id" value="5"/> 
					<input type="hidden" name="redirect_uri" value="http://www.vivo.com.cn/auth.php?referer=http%3A%2F%2Fwww.vivo.com.cn%2Fproduct.html"/>
					<p class="sub-title">使用邮箱/手机号登录</p>
					<ul class="slogin cl">
						<li class="username li_input">
							<em></em>
							<input class="v_inp" type="text" placeholder="邮箱/手机号" name="account" id="_account"			 
							 onfocus="inputFocus('_account')" onblur="inputBlur('_account','帐号不为为空')" value=""/>
							<p class="tip" id="error_account"></p>
							<b class="correct"></b>
						</li>
						<li class="psw li_input">
							<em></em>
							<input class="v_inp" type="password" autocomplete="off" placeholder="密码" id="_pwd" name="pwd"
							 onfocus="inputFocus('_pwd')" onblur="inputBlur('_pwd','密码不能为空')"/>
							 
							<p class="tip" id="error_pwd" ></p>
							
							

							<b class="error"></b>
						</li>
						<li id='uu'class="username li_input">
						<p ><center>{{session('error')}}</center></p>
						</li>
						<li class="login-btn">
							<input class="v_dark_btn sulong_btn" type="submit"  value="立即登录"/>
						</li>
						<li class="forgot">
							<span class="v_checkbox current">
								<span class="remember"></span>两周内自动登录
							</span> 
							<a  href="/login/forget"class="forgot-pwd" onclick="sub(3);">忘记密码?</a>
							<!-- <input type="hidden" val="no_forgot"  id="forgot_hide"/> -->
							<input type="hidden" value="0" id="remember" name="remember"/>
						</li>
						<!-- <li class="form-btn">
							<!-- <a class="v_light_btn sulong_btn" >注册vivo帐号</a> -->
						<!--	<input class="v_light_btn sulong_btn" type="submit" value="注册vivo帐号"/>		
						</li> -->
					</ul>
					</form>
					<form id="login_form" name="form" onsubmit="return sub(1);" action="/login/register" method="get">
						{{csrf_field()}}
						<ul class="slogin cl">
							<li class="form-btn">
								<!-- <a class="v_light_btn sulong_btn" href="" >注册vivo帐号</a>-->
								<input type="submit" class="v_light_btn sulong_btn" value="注册vivo帐号">
							</li>
						</ul>	
					</form>
				</div>
			</div>
			<div class="right">
				<div class="other-method">
					<p class="sub-title">其他方式登录</p>
					<ul class="cl">
						<li class="qq">
							<a id="qqlogin" href="/v3/web/login/qqLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>QQ帐号</a>
						</li>
						<li class="wechat">
							<a id="wechatlogin" href="/v3/web/login/wechatLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>微信帐号</a>
						</li>
						<li class="sina">
							<a id="sinalogin" href="/v3/web/login/sinaLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>新浪微博</a>
						</li>
						<li class="renren">
							<a id="renrenlogin" href="/v3/web/login/renrenLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>人人帐号</a>
						</li>
						<li class="vivoserver">
							<a  onclick="javascript:window.open('http://kefu.vivo.com.cn/robot-vivo/');" target="#" class=""><b></b>在线客服</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="/dl/js/jquery-1.8.3.js"></script>
	<script type="text/javascript">
	
	// 	function checkEmailOnline()

	// 	{

	// 		var email= $.trim($("#_email").attr("value"));

	// 	    if(email.length == 0 ){

	// 	        inner("error_email", "邮箱不能为空");

	// 	        showErrorIcon("_email", "0");

	// 			return false;

	// 		}

	// 	    else if(!patternEmail.test(email))

	// 	    {

	// 	    	inner("error_email", "请输入有效的邮箱");

	// 	        showErrorIcon("_email", "0");

	// 			return false;

	// 	    }

	// 	 //    $.ajax({

	// 		// 	url:"/v3/web/checkRegAccount",

	// 		// 	data:"account="+email+"&type=1",

	// 		// 	success:function(json){

	// 		// 		if(json.stat!="200"){

	// 		// 	        inner("error_email", json.msg);

	// 		// 	        showErrorIcon("_email", "0");

	// 		// 			return false;

	// 		// 		}

	// 		// 		else

	// 		// 		{

	// 		// 			showErrorIcon("_email", "1");

	// 		// 			return true;

	// 		// 		}

	// 		// 	},

	// 		// 	error:function(){

	// 		// 		showErrorIcon("_email", "1");

	// 		// 		return true;

	// 		// 		//inner("error_email", "系统出现异常，请联系管理员");

	// 		// 		//showErrorIcon("_email", "0");

	// 		// 	},

	// 		// 	type:"post",

	// 		// 	async: true,

	// 		// 	dataType:"json"

	// 		// });
	// 		 $.ajax({

	// 			url:"/ajax/updateemail",

	// 			data:{'email':email},
	// 			// type:'post',
	// 			success:function(mes){
	// 				// alert(mes); inner("error_phonenum", "手机号不能为空");
	// 				if(mes=='存在'){
	// 					inner("error_email", "邮箱已经注册");
	// 				}else{
						
	// 				}
	// 			}
	// 			});

	// 	}
	// 	function checkPhoneOnline()

	// 	{

	// 		var phonenum= $.trim($("#_phonenum").attr("value"));

	// 	    if(phonenum.length == 0 ){

	// 	        inner("error_phonenum", "手机号不能为空");

	// 	        showErrorIcon("_phonenum", "0");

	// 			return false;

	// 		}

	// 	    else if(!patternPhone.test(phonenum))

	// 	    {

	// 	    	inner("error_phonenum", "请输入有效的手机号");

	// 	        showErrorIcon("_phonenum", "0");

	// 			return false;

	// 	    }

	// 	 //    $.ajax({

	// 		// 	url:"/v3/web/checkRegAccount",

	// 		// 	data:"account="+phonenum+"&type=0",

	// 		// 	success:function(json){

	// 		// 		if(json.stat!="200"){

	// 		// 			inner("error_phonenum", json.msg);

	// 		// 	        showErrorIcon("_phonenum", "0");

	// 		// 			return false;

	// 		// 		}

	// 		// 		else

	// 		// 		{

	// 		// 			showErrorIcon("_phonenum", "1");

	// 		// 			return true;

	// 		// 		}

	// 		// 	},

	// 		// 	error:function(){

	// 		// 		showErrorIcon("_phonenum", "1");

	// 		// 		return true;

	// 		// 		//inner("error_phonenum", "系统出现异常，请联系管理员");

	// 		// 		//showErrorIcon("_phonenum", "0");

	// 		// 	},

	// 		// 	type:"post",

	// 		// 	async: true,

	// 		// 	dataType:"json"

	// 		// });

	// 	    //else{

	// 	    //	showErrorIcon("_phonenum", "1");

	// 		//	return true;

	// 		//}
	// 		 $.ajax({

	// 			url:"/ajax/updatephone",

	// 			data:{'iphone':phonenum},
	// 			// type:'post',
	// 			success:function(mes){
	// 				// alert(mes); inner("error_phonenum", "手机号不能为空");
	// 				if(mes=='存在'){
	// 					inner("error_phonenum", "手机号已经注册");
	// 				}else{
						
	// 				}
	// 			}
	// 			});
	// 	}
	</script>
</body>
</html>

