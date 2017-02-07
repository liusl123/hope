<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/ad/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/ad/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/ad/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/ad/css/mws-theme.css" media="screen">

<title>登录</title>
</head>
<body>
    <div id="mws-login-wrapper">
        <div id="mws-login">
            <h1>登录</h1>
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form"><!--  /admin/admin/logincheck  -->

                @if(!empty(session('error')))
                    <div class='mws-form-message error'>
                        <ul>
                            <li>{{session('error')}}</li>
                        </ul>
                    </div>
                @endif
                
                <form class="mws-form" action="/admin/dologin" method="post">
                {{csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item"><!-- 去除required -->
                            <input type="text" name="username" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="pass" class="mws-login-password required" placeholder="密码">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input class="mws-login-code required" type="text" name="code" style='width:40%;margin:10px' placeholder="验证码">
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <img onclick='this.src=this.src+"?id="+Math.random()' src="/code" style="width:40%" alt="" />
                        </div>
                    </div>
                    <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">Remember me</label>
                            </li>
                        </ul>
                    </div>
                    <div class="mws-form-row">
                        <input type="submit" value="登录" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/ad/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/ad/js/libs/jquery.placeholder.min.js"></script>
    <script src="/ad/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/ad/jui/js/jquery-ui-effects.min.js">/ad/</script>

    <!-- Plugin Scripts --><!-- 去除这行代码 -->
    <script src="/ad/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/ad/js/core/login.js"></script>

</body>
</html>
