
@extends('layout.zcmb')

@section('con')
	<!-- 重置密码 -->
	<div class="hide_out">
			<div class="mid-box">
				<ul class="emailregister cl" style="display:block;">
					<form action="/login/update" method="post">
					{{csrf_field()}}
					<br>
					<br>
					<br>
						<li class="psw li_input">
							<em></em>
							<input class="v_inp" placeholder="请输入新密码" name="resetpwd" id="_resetpwd" onfocus="inputFocus('_resetpwd')" onblur="checkResetPwd('_resetpwd')" type="password">
							<p class="tip" id="error_resetpwd" style="display: none;">密码不能为空</p>
							
							<b class="error" style="display: inline-none;"></b>
						</li>
						<li class="psw li_input">
							<em></em>
							<input class="v_inp" placeholder="请再次输入新密码" id="_confresetpwd" onfocus="inputFocus('_confresetpwd')" onblur="checkResetConfPwd('_confresetpwd', '_resetpwd')" type="password">
							<p class="tip" id="error_confresetpwd"></p>
							
							<b class="correct"></b>
						</li>

						<li class="login-btn">
							<input value="提交" class="v_dark_btn sulong_btn" onclick="return sub();" type="submit">
						</li>
					</form>
				</ul>
			</div>
		</div>
		<script type="text/javascript">
		$.('#error_resetpwd').blur(function(){
			$(this).style.display='block';
		});
		</script>
@endsection