
@extends('layout.zcmb')

@section('con')
	<!-- 找回密码 -->
	<!-- 发送激活短信 -->
	<div class="hide_out">
			<div class="mid-box">
				<br>
				<br>

				<p class="sub-title">请填写要手机号接收激活验证码</p>
				<ul class="cl">
				<center>
					<form action="/login/sendjhyzm" method="post">
					{{csrf_field()}}
					<li class="username li_input">
							<em></em>						
							<input class="v_inp" placeholder="请输入手机号" name="account" id="_account" onfocus="inputFocus('_account')" onblur="inputBlur('_account','帐号不能为空')" type="text">
							<p class="tip" id="error_account"></p>
							
							<b class="correct"></b>
						</li>
						<li class="login-btn">
							<input value="提交获取验证码" class="v_dark_btn sulong_btn" type="submit">
						</li>
					</form>
				</center>
				</ul>
			</div>

		</div>
@endsection