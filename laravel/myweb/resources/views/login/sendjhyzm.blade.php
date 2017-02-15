
@extends('layout.zcmb')

@section('con')

	<div class="hide_out">
			<div class="mid-box">
				<br>
				<br>
				
				<p class="sub-title">您只有激活账号才能登录:</p>
				

				<ul class="cl" id="sle-way">
					<li class="radio">
						  
					</li>
				</ul>
				<ul class="phoneregister cl" id="email-way">
					
					<!-- <li class="vercode">
						您没有绑定过邮箱,请选择其他方式找回密码.
					</li> -->
					

				</ul>
				<!-- 手机号找回 -->
				<ul class="phoneregister cl" id="phone-way" style="display: block;">

					<form action="/login/dosendjhyzm" method="post">
					{{csrf_field()}}
						<li class="vercode"><!-- <input name="phonenum" value="15101629533" id="_phonenum" type="hidden"> <input id="belaybar" onclick="getPhoneCode();" value="获取验证码" type="button"> --> 
						<input class="v_inp" placeholder="请输入手机验证码" name="phonecode" id="_phonecode" onfocus="inputFocus('_phonecode')" onblur="checkIconCode('_phonecode')" type="text">
							<p class="tip" id="error_phonecode"></p> <em></em> <b class="correct"></b></li>
						<li class="form-btn"><input value="提交" class="v_dark_btn sulong_btn" onclick="return sub(2);" type="submit"></li>
					</form>
				</ul>


				<!-- 密保问题找回 -->
				<ul id="select1" style="display: none;">
					
					<!-- <li class="vercode">
						您没有设置过密保问题,请选择其他方式找回密码.
					</li> -->
					
				</ul>

				<!-- 提交 
				<ul class="cl">
					<li class="form-btn">
						<input type="submit" value="提交" class="v_dark_btn sulong_btn" />
					</li>
				</ul>-->
			</div>

		</div>
@endsection