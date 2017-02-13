<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Document</title>
</head>
<body>
	<h4>以post发送ajax请求一个路由</h4>
	<button>发送</button>
	<script type="text/javascript" src='/js/jquery-1.8.3.js'></script>
	<script type="text/javascript">
		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});
	</script>
	<script type="text/javascript">

	$('button:eq(0)').click(function(){
		$.ajax({
			url:'/test',
			type:'post',
			data:{'name':'zhangsan','age':21},
			success:function(mes){
				alert(mes);
			},
		});
	});
	</script>
</body>
</html>