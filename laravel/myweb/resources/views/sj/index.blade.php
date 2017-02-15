@extends('layout.headindex')
@section('con')
<div id="content" class="cl">
        <input type="hidden" name="pageNavMappingIndex" id="pageNavMappingIndex" value="0">

        <div class="wrapper">
            <div class="crumbs">您的位置:<a class="first" href="https://shop.vivo.com.cn/index.html">首页</a><b></b>
                            手机产品
            </div>
        </div>


    <div class="container wrapper">
            <div class="filter">
                <div class="f-line">
                    <dl>
                        <dt class="fl-title fl-item">分类：</dt>
                        <dd class="fl-item on"><a href="https://shop.vivo.com.cn/product/phone">全部</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/phone?category=6">Xplay系列</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/phone?category=57">X系列</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/phone?category=7">Y系列</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/phone?category=116">V系列</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/phone?category=95">其他</a></dd>
                    </dl>
                </div>
                    <div class="f-line">
                        <dl>
                            <dt class="fl-title fl-item">网络制式：</dt>
                            <dd class="fl-item on">
                                <a href="https://shop.vivo.com.cn/product/phone?category=&amp;sortType=&amp;hasStore=">全部</a>
                            </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=12&amp;sortType=&amp;hasStore=">移动4G</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=22&amp;sortType=&amp;hasStore=">电信4G</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=48&amp;sortType=&amp;hasStore=">移动联通双4G</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=50&amp;sortType=&amp;hasStore=">联通4G</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=58&amp;sortType=&amp;hasStore=">全网通</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=80&amp;sortType=&amp;hasStore=">移动3G</a>
                                </dd>
                                <dd class="fl-item ">
                                    <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=81&amp;sortType=&amp;hasStore=">联通3G</a>
                                </dd>
                        </dl>
                    </div>
                <div class="f-line sort">
                    <dl>
                        <dt class="fl-title fl-item">排序：</dt>
                        <dd class="fl-item on">
                            <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;hasStore=">默认</a>
                        </dd>
                        <dd class="fl-item ">
                            <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=price_asc&amp;hasStore=">价格<i class="icon-sort"></i></a>
                        </dd>
                        <dd class="fl-item ">
                            <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=market_time_asc&amp;hasStore=">上架时间<i class="icon-sort"></i></a>
                        </dd>
                        <dd class="fl-item">
                            <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=&amp;hasStore=1">
                            <i class="icon-checkbox "></i>仅看有货</a>
                        </dd>
                    </dl>
                </div>
            </div>
                <div class="list-box">


                            <ul class="prod-list cl">
                            @foreach($vo as $v)
                            <li class="prod-item ">
                                <a target="_blank" href="/home/good/xq/{{$v['id']}}">
                                <div class="figure">
                                    <img src="{{$v['picname']}}" style="position: relative;">
                                </div>
                                <h3 title="X9Plus星空灰版【0首付 花呗12期分期免息】">
                                {{$v['goods']}}
                                </h3>
                                <p class="price">
                                    <dfn>¥</dfn>{{$v['price']}}
                                </p>
                            </a>
                            </li>
                            @endforeach
                            </ul>
                    
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
                    <a target="_blank" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"><img class="lazy" data-src="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/common/online-service_1e5d0b6.png" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"></a>
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
                <a href="javascript:;" class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="./vivo智能手机官方商城_files/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
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
                    <img src="./vivo智能手机官方商城_files/qrcode_6a6b792.png">
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
                    <input id="J_feedback-contact" class="contact-way" type="text" maxlength="50" placeholder="邮箱或者vivo账户 （选填）">
                    <span id="J_feedback-kaptchaButton" class="change-code">看不清，换一张</span>
                    <img id="J_feedback-kaptchaImage" class="code">
                    <input id="J_feedback-securityCode" class="code-input" type="text" placeholder="输入右侧验证码">
                    <p id="J_feedback-validateMsg" class="error">请输入正确的信息</p>
                    <button id="J_feedback-submitButton">提交</button>
                </div>
            </a>
        </li>
        <li class="hide" id="J_backtop" style="display: none;"><a class="backtop"></a></li>
    </ul>
</div><script src="./vivo智能手机官方商城_files/hm.js.下载" async=""></script><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="/sj/jquery.min_6163309.js.下载"></script>
<script src="/sj/jquery.cookie_a5283b2.js.下载"></script>
<script src="/sj/jquery.lazyload_546c1da.js.下载"></script>
<script src="/sj/jquery-placeholder_fb6154c.js.下载"></script>
<script src="/sj/vivo-common_38aa2f0.js.下载"></script>
<script src="/sj/dialog_6a2b3fb.js.下载"></script>
<script src="/sj/vivo-stat_265b49b.js.下载"></script>
<script src="/sj/login_confirm_485e7b4.js.下载"></script>
    <script src="/sj/list-hover_a2668cb.js.下载"></script>

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

</body></html>
@endsection