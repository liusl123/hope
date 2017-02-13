<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

<!-- 设置昵称 -->

<title>vivo 帐号</title>

<script type="text/javascript" src="/sznc/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="/sznc/login.js"></script><!--[if lte IE 7]>
<div style="color: #474747;padding: 8px 35px 8px 14px;background-color: #FCF8E3;border: 1px solid #FBEED5;line-height: 1.5;text-align: center;">
    <strong>注意！</strong>
    本网站不支持IE8以下的浏览器，为了获得更快、更安全的浏览体验，我们建议您使用
    <a href="http://www.google.com/chrome" target="_blank">chrome</a>！
    或者
    <a href="http://firefox.com.cn/" target="_blank">火狐</a>浏览器
</div>
<![endif]-->

<script type="text/javascript">
	//javascript:window.history.forward(1); 
	function toIsVivoLogin()
	{
		document.getElementById("login_form").setAttribute("action", "/v3s2/web/login/toIsVivoLogin");
		document.getElementById("login_form").submit();
	}

	function checknickname(){
		var eValue= $.trim($("#_nickname").attr("value"));
	    if(eValue.length == 0){
	        inner("error_nickname", "昵称不能为空");
	        showErrorIcon("_nickname", "0");
			return false;
		}
	   return  formatName("_nickname");
	}
	function addNickname(){
		var check = true;
		check = checknickname() && check;
		if(!check){
			return false;
		}
		var openid= $.trim($("#openid").attr("value"));
		var nickname = $.trim($("#_nickname").attr("value"));
		var rk = $.trim($("#rk").attr("value"));
		openid=encodeURIComponent(openid);
		rk=encodeURIComponent(rk);
		$.ajax({
			url:"/v3s2/web/login/addNickname",
			data:"openid="+openid+"&nickname="+nickname+"&rk="+rk,
			success:function(json){
				if(json.stat == 200){
					document.getElementById("login_form").setAttribute("action", "/v3s2/web/login/loginSuccess");
					document.getElementById("login_form").submit();
				}else{
					inner("error_nickname", json.msg);
					showErrorIcon("error_nickname", "0");
					return false;
				}	
			},
			error:function(){
				inner("error_nickname", "系统出现异常，请联系管理员！");
				showErrorIcon("error_nickname", "0");
			},
			type:"post",
			async: true,
			dataType:"json"
		});
		return false;
	}
</script>

<link media="all" href="/sznc/index.css" type="text/css" rel="stylesheet">
</head>
<body>

	
	<div class="banner_bg">
		<div class="black-mask"></div>
		<a class="logo" href="#" title="vivo智能手机">
		</a>
		<p>填写昵称</p>
	</div>
	<div class="nav-bg">
		<ul class="nav-ul">
			<li>
				
				<a href="#" class="d-a-st a-blue">
					<span class="serial serial-bg1">1</span> vivo帐号
				</a>
				
				 <div class="state-bg3"></div>
			</li>
			<li>
				<div class="d-a-st a-blue">
					<span class="serial serial-bg1">2</span> 填写昵称
				</div>
				 <div class="state-bg2"></div>
			</li>
			<li>
				<div class="d-a-st">
					<span class="serial">3</span> 登录成功
				</div>
				 <div class="state-bg1"></div>
			</li>
		</ul>
	</div>
	<form class="middle_box" id="login_form" action="/login/sznc" method="post" namespace="/v3s2" name="form">
		 {{csrf_field()}}
		<div class="hide_out">
			<div class="mid-box">
				<div class="fieldset-section">
					<p class="sub-title">填写官网昵称 </p>
					<ul class="slogin cl">
						<li class="username li_input">
							<em></em>
							<input class="v_inp" placeholder="填写昵称" value=""  name="nickname" id="_nickname" onfocus="inputFocus('_nickname')" onblur="inputBlur('_nickname','昵称不能为空')" type="text">
							<p class="tip" id="error_nickname">昵称不能为空！</p>
							<b class="correct"></b>
						</li>

						<li class="login-btn2">
							<input class="v_dark_btn sulong_btn" value="提 交"  type="submit">
						</li>
					</ul>
				</div>

			</div>
		</div>
		<input name="client_id" value="" id="client_id" type="hidden"> 
		<input name="redirect_uri" value="" id="redirect_uri" type="hidden">
		<input name="openid" value="/x4W6pID3AY39lRyEoxHCT5MKp8WGXwR" id="openid" type="hidden">
		<input name="rk" value="42824e1311488f7b7d665e873b6e86ac" id="rk" type="hidden">
	</form>

<!-- ----------------------------------------------------------------------------- -->

    <!-- 遮罩层 -->
    <div class="black_overlay"></div>

<!-- ---------------------------------------------------------------- -->

	<!-- 什么是vivo帐号 -->
	<div id="what-v-account" class="popup">
        <div class="close-bt">
            <img src="/sznc/close-ico.png" alt="">
        </div>
        <div class="popup-main">
        	<p class="v-title">什么是官网帐号？</p>
        	<p>用于登录官方网站，官方商城，官方社区，vivo乐园的帐号。</p>
        	<div class="i-now-bt v_dark_btn">我知道了</div>
        </div>
    </div>

 

</body>
</html>
