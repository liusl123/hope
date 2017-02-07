<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<style type="text/css">
	#one{
		margin-top:100px;
	}
</style>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="/yz/css/login.css" style="text/css">

<script type="text/javascript" src="/yz/js/jquery-1.7.2.min.js"></script>

<script type="text/javascript" src="/yz/js/login.js"></script>

<script type="text/javascript">



function checkForms(){

	var check = true;

	check = checkusername() && check;

	check = checkpassword() && check;

	return check;

}



function isEmail(str){

	if(str.indexOf("@")>0){

		return true;

	}else{

		return false;

	}

}



function checkusername(){

	var eValue= $.trim($("#_account").attr("value"));

    if(eValue.length == 0 || eValue == '邮箱/手机号/用户名'){

        inner("error_account", "帐号不能为空");

        showErrorIcon("_account", "0");

		return false;

	}else{

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

		return true;

	}

}



function sub(type)

{

	if(type==1)

	{

		if(checkForms())

		{

			document.getElementById("login_form").setAttribute("action", "/v3s2/web/login/login");

			document.getElementById("login_form").submit();

		}

	}

	else if(type==2)

	{

		document.getElementById("login_form").setAttribute("action", "/v3/web/reg");

		document.getElementById("login_form").submit();

	}

	else if(type==3)

	{

		document.getElementById("login_form").setAttribute("action", "/v3/web/findpwd/findPwd");

		document.getElementById("login_form").submit();

	}

	return false;

}

window.onload=function() {

	var stat = "";	

	var msg = "";

	if(stat.length!=0)

	{

		if(stat=="522" || stat=="400")

		{

			inner("error_account", msg);

			showErrorIcon("_account", "0");

		}

		else if(stat=="523")

		{

			inner("error_pwd", msg);

			showErrorIcon("_pwd", "0");

		}

	}

};



</script>

<!--[if IE 6]> 

    <script type="text/javascript" src="/web/js/DD_belatedPNG.js"></script> 

    <script type="text/javascript"> 

    DD_belatedPNG.fix(".logo,.cl li a b,li em"); 

    </script> 

<![endif]-->

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

<div id="one">				        

<form id="login_form" name="form" onsubmit="return sub(1);" action="/v3/web/login/login" method="post">


					<input type="hidden" name="client_id" value="5"/> 

					<input type="hidden" name="redirect_uri" value="http://www.vivo.com.cn/auth.php?referer=http%3A%2F%2Fwww.vivo.com.cn%2Fproduct.html"/>

					<p class="sub-title"></p>

					<ul class="slogin cl">

							<li class="username li_input">

								<em></em>

								<input class="v_inp" type="text" placeholder="手机号" name="phone" id="_account"

								 onfocus="inputFocus('_account')" onblur="inputBlur('_account','电话不能为空')" value=""/>

								<p class="tip" id="error_account"></p>

								<b class="correct"></b>

							</li>
							<li class="login-btn">

								<input class="v_dark_btn sulong_btn" type="submit"  value="立即发送短信验证"/>

							</li>
							<li class="form-btn">

								<a class="v_light_btn sulong_btn" onclick="sub(2);" >注册vivo帐号</a>		

							</li>

					</ul>

					</form>

</div>
				</div>

			</div>



			<div class="right">

				<div class="other-method">

					<p class="sub-title">其他方式登录</p>

					<ul class="cl">

						<li class="qq">

							<a id="qqlogin" href="/yz/v3/web/login/qqLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>QQ帐号</a>

						</li>

						<li class="wechat">

							<a id="wechatlogin" href="/yz/v3/web/login/wechatLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>微信帐号</a>

						</li>

						<li class="sina">

							<a id="sinalogin" href="/yz/v3/web/login/sinaLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>新浪微博</a>

						</li>

						<li class="renren">

							<a id="renrenlogin" href="/yz/v3/web/login/renrenLogin?redirect_uri=http%3A%2F%2Fwww.vivo.com.cn%2Fauth.php%3Freferer%3Dhttp%253A%252F%252Fwww.vivo.com.cn%252Fproduct.html&client_id=5"><b></b>人人帐号</a>

						</li>



						<li class="vivoserver">

							<a  onclick="javascript:window.open('http://kefu.vivo.com.cn/robot-vivo/');" target="#" class=""><b></b>在线客服</a>

						</li>

					</ul>

				</div>

			</div>



		</div>



	</div>



</body>



</html>

