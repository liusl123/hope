<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta charset="UTF-8">
    
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>个人中心</title>
    <meta name="keywords" content="vivo智能手机官方商城">
    <meta name="description" content="vivo智能手机官方商城">
    <link rel="shortcut icon" href="/grzx/favicon_7761e1f.ico">
    <!-- 后期自己加的css-->
    <link rel="stylesheet" href="/myq.css">
  	<link rel="stylesheet" href="/myw.css">
    <link rel="stylesheet" href="/mye.css">
    <link rel="stylesheet" href="/myr.css">
  	<link rel="stylesheet" href="/myt.css">
  
    
    


    


    <!--[if lt IE 9]>
    <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_23e126e.js"></script>
    <![endif]-->


<link media="all" href="index.css" type="text/css" rel="stylesheet">
</head>
<body class="member-center">
<header id="header">
    <div class="head-search">
        <div class="search-box">
        	<form action="http://shop.vivo.com.cn/product/search" method="get"><input autocomplete="off" name="searchKeywordStr" maxlength="20" placeholder="如:x9" value="" type="text"><button type="submit">搜索</button></form><a class="close"></a>
        </div>
    </div>
    <div class="wrapper">
        <nav id="navigator" class="cl">
        	<a href="http://shop.vivo.com.cn/index.html" class="vivo-logo"><img src="/grzx/vivo-logo_865fdf1.png" alt="vivo智能手机官方网站"></a>
            <ul class="cl">
                <li><a href="http://shop.vivo.com.cn/product/phone">手机</a></li>
                <li><a href="http://shop.vivo.com.cn/product/parts">配件</a></li>
                <li><a href="http://shop.vivo.com.cn/vcoins">V币商品</a></li>
                <li><a href="http://shop.vivo.com.cn/helpcenter/service-promise">服务</a></li>
                <li><a href="https://bbs.vivo.com.cn/" target="_top">社区</a></li>
                <li><a href="https://www.vivo.com.cn/" target="_top">官网</a></li>
            </ul>
            <div class="search-user">
                <ul class="top-quick-menu">
                    <li id="j_SearchTrigger" class="search"><a href="javascript:void(0)" rel="nofollow"><b></b></a></li>
                    <li id="j_UserMenuTrigger">
                    	<a href="#" class="user"><b><img src="/grzx/small"></b></a>
                        <ul class="user-menu">
                        	<li class="member-center"><a href="/login/grzx"><i></i>个人中心</a><span class="icon-angular"></span></li>
                            <li class="my-order"><a href="http://shop.vivo.com.cn/my/order"><i></i>我的订单</a></li>
                            <li class="logout"><a href="/login/logout"><i></i>退出登录</a></li>
                        </ul>
                    </li>
                    <li><a href="http://shop.vivo.com.cn/shoppingcart" class="shoppingcart"><b></b><span class="shopcart-num">0</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header><div id="content" class="cl">
<div class="wrapper">
        <div class="crumbs">您的位置：<a href="http://shop.vivo.com.cn/index.html">首页</a><b></b>会员中心</div>
</div>
<div class="wrapper">
<aside class="menu-bar">
    <ul class="portrait-box">
<!--         <li>
            <a href="http://shop.vivo.com.cn/my/information" title="编辑资料">
            <img src="/grzx/big" width="160">
            </a>
        </li> -->
        <li class="mem-name member-menu-nickName"><i class="icon-mem"></i>
         @if(!empty(session('name'))) 
            {{session('name')}}
        @else 
            游客
        @endif 
        </li>
        <li class="vcoin-info">我的V币：<a href="http://shop.vivo.com.cn/my/vcoin"><span class="red member-vcoin-number">0</span></a> V币</li>
    </ul>
    <dl id="j_MyCenterMenus" class="menu">
        <dt class="menu-title"><i class="icon-deal"></i>交易管理</dt>
        <dd class="menu-item"><a href="/login/grzxwddd">我的订单</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/refund">退款/退货</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/lottery">我的中奖</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/exchange">我的兑换</a></dd>
        <dt class="menu-title"><i class="icon-evaluation"></i>评价管理</dt>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/remark/unRemark-prod">未评价商品</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/remark/all-remark">我的评论</a></dd>
        <dt class="menu-title"><i class="icon-account"></i>我的账户</dt>
        <dd class="menu-item"><a href="/login/grzxgrzl">个人资料</a></dd>
        <dd class="menu-item"><a href="/order/add">收货地址</a></dd>
        <!-- <dd class="menu-item"><a href="/login/grzxshdz">收货地址</a></dd> -->
        <dd class="menu-item"><a href="/login/xgmm">我的密码</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/coupon">我的优惠券</a></dd>
        <dd class="menu-item"><a href="http://shop.vivo.com.cn/my/favorite">我的收藏</a></dd>
    </dl>
</aside>    <article class="content">
<dl>
    <dd class="module-item mem-overview">
        <h1 class="welcome-info">您好，<span class="name">
        @if(!empty(session('name'))) 
            {{session('name')}}
        @else 
            游客
        @endif 
        </span>，欢迎进入会员中心！</h1>
        <ul class="mem-properties">
            <li>我的V币：<a href="http://shop.vivo.com.cn/my/vcoin"><span class="red my-vcoin-number">0</span>V币</a></li>
            <li><a href="http://shop.vivo.com.cn/my/vcoin">查看V币历史 &gt;</a></li>
            <li class="login-time">
            </li>
        </ul>
        <div class="statistic-list">
            <ul>
                <li class="item">未付款订单<a href="http://shop.vivo.com.cn/my/order?status=not_paid">0</a></li>
                <li class="item evaluation">评论和回复<a href="http://shop.vivo.com.cn/my/remark/unRemark-prod">0</a></li>
                <li class="item coupon">优惠券<a href="http://shop.vivo.com.cn/my/coupon"></a></li>
            </ul>
        </div>

        <div class="page-module">
            <h2 class="title">最近的订单</h2>
                <div class="no-record no-order special"><img src="/grzx/no-order-icon_3030d23.png"><span>您还没有订单</span>
                </div>
        </div>
        <div class="page-module">
            <h2 class="title">最近浏览</h2>
            <div class="no-record no-browse-record special" colspan="5"><img src="/grzx/no-browse-record-icon_141eec4.png"><span>您还没有任何浏览记录</span></div>
        </div>
    </dd>
</dl>
    </article>
</div>
</div>
<footer id="footer">
    <div class="shop-agree">
        <div class="wrapper cl">
            <ul class="cl">
                <li><a href="http://shop.vivo.com.cn/helpcenter/transport-cost/" target="_top">
                    <b class="b1"></b>
                    <p><span>0</span>运费购手机</p></a>
                </li>
                <li><a href="http://shop.vivo.com.cn/helpcenter/after-service/" target="_top">
                    <b class="b2"></b>
                    <p><span>30</span>天无理由退换货</p></a>
                </li>
                <li><a href="http://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_top">
                    <b class="b3"></b>
                    <p>电子发票</p></a>
                </li>
                <li class="shop-agree-last"><a href="http://www.vivo.com.cn/service/map.html" target="_top">
                    <b class="b4"></b>
                    <p><span>480</span>余家售后服务中心</p></a>
                </li>
            </ul>
        </div>
    </div>


    <div class="shop-help">
        <div class="wrapper cl">
            <dl>
                <dt><b class="b1"></b>购买流程</dt>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/alipay/" target="_top">· 支付宝支付</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_top">· 发票说明</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/coupon-declare/" target="_top">· 优惠券说明</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/huabei-instalment/" target="_top">· 花呗分期</a></dd>
            </dl>
            <dl>
                <dt><b class="b2"></b>配送方式</dt>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/transport-way/" target="_top">· 配送方式</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/transport-cost" target="_top">· 配送费用</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/sign-notice/" target="_top">· 签收须知</a></dd>
            </dl>
            <dl>
                <dt><b class="b3"></b>服务支持</dt>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/service-promise/" target="_top">· 服务保证</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/after-service/" target="_top">· 售后服务</a></dd>
                <dd><a href="http://www.vivo.com.cn/service/map.html" target="_top">· 售后网点查询</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/broken-screen/" target="_top">· 碎屏宝</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/extend-service/" target="_top">· 手机延保</a></dd>
            </dl>
            <dl>
                <dt><b class="b4"></b>品牌服务</dt>
                <dd><a href="http://www.vivo.com.cn/service-faq_zhineng.html" target="_top">· 常见问题</a></dd>
                <dd><a href="http://www.vivo.com.cn/service.html" target="_top">· 相关下载</a></dd>
                <dd><a href="http://shop.vivo.com.cn/helpcenter/contact-us/" target="_top">· 联系我们</a></dd>
            </dl>
            <dl class="shop-help-last">
                <dt><b class="b5"></b>小V在线时段</dt>
                <dd>周一至周五 08:00-21:00</dd>
                <dd>周六、周日 09:00-18:00</dd>
                <dd class="online-service">
                    <a target="_top" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"><img class="lazy" data-src="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/common/online-service_1e5d0b6.png" src="online-service_1e5d0b6.png" style="display: inline;"></a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="wrapper cl">
            <div class="sns-box">
                成为vivo粉丝:<a href="http://weibo.com/vivomobile" target="_top" class="sina"><b></b></a>
                <a href="http://t.qq.com/vivomobile" target="_top" class="tencent"><b></b></a>
                <a href="http://page.renren.com/vivo?checked=true" target="_top" class="renren"><b></b></a>
                <a href="javascript:;" class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="/grzx/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
            </div>
            <div class="copy-info">
                <a href="http://shop.vivo.com.cn/index.html" class="footer-logo"></a>Copyright ©2011-2016 广东步步高电子工业有限公司<br>版权所有 保留一切权利粤B2-20080267 | <a href="http://www.miitbeian.gov.cn/" target="_top">粤ICP备05100288号</a>
            </div>
        </div>
    </div>
</footer>
<div id="side-bar">
    <ul>
        <li><a class="service" id="J_online-service" target="_top" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"></a></li>
        <li>
            <a class="qrcode">
                <div class="qrcode-container">
                    <img src="/grzx/qrcode_6a6b792.png">
                    <p>支付宝扫码<br>关注享最新活动福利</p>
                </div>
            </a>
        </li>
        <li class="last">
            <a class="feedback" id="J_feedback">
                <div class="feedback-container" id="J_feedback-container">
                    <span class="close" id="J_feedback-close"></span>
                    <p class="title">意见反馈</p>
                    <div class="problem-container">
                        <p id="J_feedback-typeDesc" class="problem">请选择问题类型</p>
                        <select id="J_feedback-typeSelect">
                            <option value="0" disabled="disabled" selected="selected">请选择问题类型</option>
                            <option value="1">购物流程（页面浏览、下单、支付等）</option>
                            <option value="2">服务问题（物流时效、客服态度、退换货、售后维修等）</option>
                            <option value="3">商品质量（手机、配件问题）</option>
                            <option value="4">优化建议（活动、服务、购物体验等）</option>
                            <option value="5">其他问题</option>
                        </select>
                    </div>
                    <textarea id="J_feedback-content" class="" maxlength="200" placeholder="请输入您的建议或具体问题，我们将不断改进。"></textarea>
                    <input id="J_feedback-contact" class="contact-way" maxlength="50" placeholder="邮箱或者vivo账户 （选填）" value="" type="text">
                    <span id="J_feedback-kaptchaButton" class="change-code">看不清，换一张</span>
                    <img id="J_feedback-kaptchaImage" class="code">
                    <input id="J_feedback-securityCode" class="code-input" placeholder="输入右侧验证码" value="" type="text">
                    <p id="J_feedback-validateMsg" class="error">请输入正确的信息</p>
                    <button id="J_feedback-submitButton">提交</button>
                </div>
            </a>
        </li>
        <li class="hide" id="J_backtop" style="display: none;"><a class="backtop"></a></li>
    </ul>
</div><script src="/grzx/hm.js" async=""></script><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="/grzx/jquery.min_6163309.js"></script>
<script src="/grzx/jquery.cookie_a5283b2.js"></script>
<script src="/grzx/jquery.lazyload_546c1da.js"></script>
<script src="/grzx/jquery-placeholder_fb6154c.js"></script>
<script src="/grzx/vivo-common_38aa2f0.js"></script>
<script src="/grzx/dialog_6a2b3fb.js"></script>
<script src="/grzx/vivo-stat_265b49b.js"></script>
<script src="/grzx/login_confirm_485e7b4.js"></script>
<script src="/grzx/query-vcoin_32d1f89.js"></script>

<script src="/grzxgrzl/jquery.validate.min_76c74f2.js"></script>
<script src="/grzxgrzl/dialog_6a2b3fb.js" type="text/javascript"></script>
<script src="/grzxgrzl/region_a46b4bb.js"></script>
<script src="/grzxgrzl/calendar_e0577ca.js"></script>
<script src="/grzxgrzl/chinese.birthday.selector_724b59a.js"></script>
<script src="/grzxgrzl/member-detail_f3c5ed8.js" type="text/javascript"></script>


<script>
    //百度统计代码
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?0a38f90134ba281b974d46dfeec121e0";
        hm.async = true;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

</body>
</html>
