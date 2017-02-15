<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<title>vivo收银台</title>

<link rel="shortcut icon" type="image/x-icon" href="/ho/syt/favicon.ico">
<link rel="icon" type="image/x-icon" href="/ho/syt/favicon.ico">

<link rel="stylesheet" type="text/css" href="/ho/syt/index.css" media="all">
</head>
<body>
  
	<div id="head">
	    <!--页头登录订单信息-->
	    <div class="login-bar">
	        <ul class="p-right fr">
	            <li style="margin-right: 15px; margin-left: 15px;">vivo欢迎您，<a onclick="myInfoCenter()">123玩家</a></li>
	            <li style="margin-right: 15px; margin-left: 15px;"><a onclick="exit()">退出登录</a></li>
	            <li style="margin-right: 15px; margin-left: 15px;"><a onclick="myOrders()">我的订单</a></li>
	            <li style="margin-right: 15px; margin-left: 10px;"><a onclick="helpCenter()">帮助中心</a></li>
	        </ul>
	    </div>
	</div>

    <!--收银台logo-->
    <div class="cash-logo"><div class="w"><img src="/ho/syt/casher-logo.png"></div></div>
 
	<div class="main w">
		<!--订单基本信息-->
	
		<!--订单基本信息-->
		<div class="order-info clearfix">
			<div class="order-p-right">
				<div class="order-info-less clearfix">
					<div class="order-id fl">
                        <p class="orderid-d">订单提交成功，请您尽快付款！</p>
                        <p class="orderid-cancle">请您在提交订单后<span>72小时</span>内完成支付，否则订单自动会取消。</p>
                    </div>
                    <div class="order-total fr">
                        <!-- <p>应付金额<span>¥68.00</span>元</p> -->

                        <a href='/home/order/xq'>订单详情</a>
                    </div>
				</div>

				<!--订单详情-->
                <div class="order-details">
                    <!-- <ul>
                        <li>商品名称：<span class="val">【vivo】原装旅行充电器-2000mA  白色  x1</span></li>
                        <li>交易金额：<span class="val">68.00元</span></li>
                        <li>购买时间：<span class="val">2017-02-14 16:57:20</span></li>
                        <li>收&nbsp;货&nbsp;人&nbsp;：<span class="val">刘石磊</span></li>
                        <li>联系方式：<span class="val">15101629566</span></li>
                        
                        <li>收货地址：<span class="val">北京市北京市昌平区回龙观文化西路育荣教育园区</span></li>
                        
                    </ul> -->
                </div>
			</div>
		</div>


        
        <form id="payChannelForm" action="https://pay.vivo.com.cn/webpay/payorder/channel.oo" method="post">
	        <input id="tradeOrderNum" name="tradeOrderNum" value="2017021416572077900011122378" type="hidden">
	        <input id="payChannel" name="payChannel" value="1" type="hidden">
	        <input id="hb_fq_num" name="hb_fq_num" value="" type="hidden">
	        <input id="sp" name="sp" value="" type="hidden">
	        <input id="eachPrinAndFee" name="eachPrinAndFee" value="" type="hidden">
	    </form>
        
		<!--付款方式-->
		<div class="pay-way-outer">
			<div class="pay-wraper">
				<div class="rec-alipay clearfix">
					<div class="p-alipay pay-item selected" ordertag="0"><a id="pay-alipay" onclick="changePayChannel(1)"></a></div>
					<div class="other-pay"><span>其他支付方式</span></div>
					<!-- <div class="order-total">支付<span>¥68.00</span>元</div> -->
				</div>
				<div class="other-paylist">
					<ul class="clearfix">
						<li class="p-alipay-qr pay-item" ordertag="1"><a id="pay-alipay-qr" onclick="changePayChannel(5)"></a></li>
						<li class="p-weixin-qr pay-item" ordertag="2"><a id="pay-weixin-qr" onclick="changePayChannel(2)"></a></li>
						<li class="p-cft pay-item" ordertag="3"><a id="pay-cft" onclick="changePayChannel(3)"></a></li>
						<li class="p-yl pay-item" ordertag="4"><a id="pay-yl" onclick="changePayChannel(4)"></a></li>
                        
					</ul>
					
				</div>
			</div>
			
			<div class="pay-btn-wrap clearfix">
                <form action="/home/order/upload">
                    <input type="hidden" name='id' value='{{$temp['order_id']}}' />
                    <button type='submit' class="pay-btn" >前往支付</button>
                </form>
                
            </div>
			
		</div>
	</div>

<div id="overlay">
	<div class="pay-in-progress-wrap">
	<div class="pay-in-progress">
		<div class="close-btn" onclick="closeOverlayDiv()"></div>
		<div class="notice">请您在新打开的支付平台页面进行支付，支付完成前请不要关闭该窗口</div>
		<div class="suc-other-wrap">
			<a class="paysuccess" onclick="myOrders()">已完成支付</a><a class="otherpayment" onclick="chooseOtherPayType()">选择其他支付方式</a>
		</div>
		<a class="paygowrong" onclick="payHelpCenter()" target="_blank">支付遇到问题？</a>
	</div>
	</div>
	
	
    
</div>


<div id="footer" class="footer-copyright">
    <div class="copyright">
    	COPYRIGHT © 1996-2015 vivo MOBILE COMMUNICATION CO.LTD.ALL RIGHTS RESERVED. 粤ICP备05100288号
    </div>
	<div class="sns-box">
                成为vivo粉丝:<a href="http://weibo.com/vivomobile" target="_top" class="sina"><b></b></a>
                <a href="http://t.qq.com/vivomobile" target="_top" class="tencent"><b></b></a>
                <a href="#" class="qzone" style="display:none"><b></b></a>
                <a href="http://page.renren.com/vivo?checked=true" target="_top" class="renren"><b></b></a>
                <a href="#" class="weixin"><b></b><div class="vivo-weixin-overbox"><b></b></div></a>
    </div>
</div>


</body>
</html>
