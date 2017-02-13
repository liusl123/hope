<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h4>以post方式发送ajax请求一个路由</h4>
	<button>请求</button>
	<!--生成一个_token-->
	{{csrf_field()}}
	<p>html中的绝对路径：域名解析的目录</p>	
	<script type="text/javascript" src='/js/jquery-1.8.3.js'></script>
	<script type="text/javascript">
		$('button:eq(0)').click(function(){
			$.ajax({
				url:'/test',//请求的路由规则
				type:'post',
				data:{'_token':$('input:eq(0)').val()},
				success:function(mes){

				}
			});
		});
	</script>
</body>
</html>