<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h4>form请求路由</h4>
	<!--使用系统函数-->
	{{--time()--}}
	<form action="/test" method='post'>
		<!--使用laravel封装的函数 输出一个隐藏域 目的防止跨域攻击-->
		{{csrf_field()}}
		<input type="submit" value='请求'>
	</form>
</body>
</html>