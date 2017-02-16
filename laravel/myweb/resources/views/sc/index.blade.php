@extends('layout.headindex')
@section('con')
<div id="content" class="cl">
<div id="j_HomeBanner" class="home-banner">
    <ul class="container">
            <li class="banner-item instage" style="z-index: 9; opacity: 1; display: block;">
                <a class="banner-link" target="_blank" href="https://shop.vivo.com.cn/product/9986">&nbsp;</a>
            <div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/20170206100507124763_original.jpg" usemap="#Mmodule_1486346736943">
        
    </div>
</div>
            </li>
            <li class="banner-item" style="display: none; z-index: 1; opacity: 1;">
                
            <div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/20170213092641361750_original.jpg" usemap="#Mmodule_1486949235798">
        <map class="j_map" name="Mmodule_1486949235798"><area class="j_link" data-coords="219,199,319,249" coords="420.47999999999996,382.08,612.48,478.08" activity-id="31"><area class="j_link" data-coords="333,205,433,255" coords="639.36,393.59999999999997,831.36,489.59999999999997" href="https://shop.vivo.com.cn/product/9966" target="_blank"></map>
    </div>
</div>
            </li>
            <li class="banner-item" style="display: none; z-index: 1; opacity: 1;">
                <a class="banner-link" target="_blank" href="https://shop.vivo.com.cn/product/9965">&nbsp;</a>
            <div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/20161224092230172677_original.jpg" usemap="#Mmodule_1482542554488">
        
    </div>
</div>
            </li>
            <li class="banner-item" style="display: none; z-index: 1; opacity: 1;">
                <a class="banner-link" target="_blank" href="https://shop.vivo.com.cn/product/9967">&nbsp;</a>
            <div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/20161224093756773450_original.jpg" usemap="#Mmodule_1482543481906">
        
    </div>
</div>
            </li>
    </ul>

</div>
<div class="home-content-wrapper">
<div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/2017020609373945166_original.jpg" usemap="#Mmodule_1486345088632">
    </div>
</div>
@foreach($ee as $v)
@for($i=1;$i<2;$i++)
<div class="structure-module full">
    <div class="sm-wrapper">
       <a href="/home/good/xq/{{$v['id']}}"><img class="j_bgImage" data-ratio="1.92" src="{{$v['pic'.$i]}}" usemap="#Mmodule_1486345124565"></a> 
        <map class="j_map" name="Mmodule_1486345124565"><area class="j_link" data-coords="543,144,643,194" coords="1042.56,276.48,1234.56,372.47999999999996" href="https://shop.vivo.com.cn/product/9964" target="_blank"></map>
    </div>
</div>
@endfor
@endforeach
<div class="structure-module full">
    <div class="sm-wrapper">
        <img class="j_bgImage" data-ratio="1.92" src="/sc/2017020616282488593_original.jpg" usemap="#Mmodule_1486369734385">
        
    </div>
</div>
</div>
</div>
<footer id="footer">
    <div class="shop-agree">
        <div class="wrapper cl">
            <ul class="cl">
                <li><a href="https://shop.vivo.com.cn/helpcenter/transport-cost/" target="_blank">
                    <b class="b1"></b>
                    <p><span>0</span>运费购手机</p></a>
                </li>
                <li><a href="https://shop.vivo.com.cn/helpcenter/after-service/" target="_blank">
                    <b class="b2"></b>
                    <p><span>30</span>天无理由退换货</p></a>
                </li>
                <li><a href="https://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_blank">
                    <b class="b3"></b>
                    <p>电子发票</p></a>
                </li>
                <li class="shop-agree-last"><a href="http://www.vivo.com.cn/service/map.html" target="_blank">
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
                <dd><a href="https://shop.vivo.com.cn/helpcenter/alipay/" target="_blank">· 支付宝支付</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_blank">· 发票说明</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/coupon-declare/" target="_blank">· 优惠券说明</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/huabei-instalment/" target="_blank">· 花呗分期</a></dd>
            </dl>
            <dl>
                <dt><b class="b2"></b>配送方式</dt>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/transport-way/" target="_blank">· 配送方式</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/transport-cost" target="_blank">· 配送费用</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/sign-notice/" target="_blank">· 签收须知</a></dd>
            </dl>
            <dl>
                <dt><b class="b3"></b>服务支持</dt>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/service-promise/" target="_blank">· 服务保证</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/after-service/" target="_blank">· 售后服务</a></dd>
                <dd><a href="http://www.vivo.com.cn/service/map.html" target="_blank">· 售后网点查询</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/broken-screen/" target="_blank">· 碎屏宝</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/extend-service/" target="_blank">· 手机延保</a></dd>
            </dl>
            <dl>
                <dt><b class="b4"></b>品牌服务</dt>
                <dd><a href="http://www.vivo.com.cn/service-faq_zhineng.html" target="_blank">· 常见问题</a></dd>
                <dd><a href="http://www.vivo.com.cn/service.html" target="_blank">· 相关下载</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/contact-us/" target="_blank">· 联系我们</a></dd>
            </dl>
            <dl class="shop-help-last">
                <dt><b class="b5"></b>小V在线时段</dt>
                <dd>周一至周五 08:00-21:00</dd>
                <dd>周六、周日 09:00-18:00</dd>
                <dd class="online-service">
                    <a target="_blank" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"><img class="lazy" data-src="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/common/online-service_1e5d0b6.png" src="online-service_1e5d0b6.png" style="display: inline;"></a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="wrapper cl">
            <div class="sns-box">
                成为vivo粉丝:<a href="http://weibo.com/vivomobile" target="_blank" class="sina"><b></b></a>
                <a href="http://t.qq.com/vivomobile" target="_blank" class="tencent"><b></b></a>
                <a href="http://page.renren.com/vivo?checked=true" target="_blank" class="renren"><b></b></a>
                <a class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="/sc/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
            </div>
            <div class="copy-info">
                <a href="https://shop.vivo.com.cn/index.html" class="footer-logo"></a>Copyright ©2011-2016 广东步步高电子工业有限公司<br>版权所有 保留一切权利粤B2-20080267 | <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备05100288号</a>
            </div>
        </div>
    </div>
</footer>
<div id="side-bar">
    <ul>
        <li><a class="service" id="J_online-service" target="_blank" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"></a></li>
        <li>
            <a class="qrcode">
                <div class="qrcode-container">
                    <img src="qrcode_6a6b792.png">
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
                    <input id="J_feedback-contact" class="contact-way" maxlength="50" placeholder="邮箱或者vivo账户 （选填）" type="text">
                    <span id="J_feedback-kaptchaButton" class="change-code">看不清，换一张</span>
                    <img id="J_feedback-kaptchaImage" class="code">
                    <input id="J_feedback-securityCode" class="code-input" placeholder="输入右侧验证码" type="text">
                    <p id="J_feedback-validateMsg" class="error">请输入正确的信息</p>
                    <button id="J_feedback-submitButton">提交</button>
                </div>
            </a>
        </li>
        <li class="hide" id="J_backtop" style="display: none;"><a class="backtop"></a></li>
    </ul>
</div><script src="about:blank" async=""></script><script>/* Code removed by ScrapBook */</script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>
<script src="/sc/about:blank"></script>

<script>/* Code removed by ScrapBook */</script>

<div id="j_appointStep1" class="dialog-container">
    <i class="icon icon-close"></i>
    <div class="dialog-title">0元预约</div>
    <div class="dialog-content appointment">
        <p class="comment">预约需填写个人信息</p>
        <form class="dialog-form" novalidate="novalidate">
            <div class="dialog-form-item">
                <input class="full" autocomplete="off" id="appointmentMobile" name="appointmentMobile" placeholder="请填写手机号" type="text">
                <div class="info-tip"><img src="icon-warning_f446f02.png">预约成功后，我们将在开售前短信通知您</div>
            </div>
            <button type="button" id="commit-btn" class="btn btn-blue confirm">确认</button>
        </form>
    </div>
</div></body>
</html>
@endsection