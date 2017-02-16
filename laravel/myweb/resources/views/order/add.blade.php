<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">

    <meta charset="UTF-8">
    
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <title>vivo智能手机官方商城</title>
    <meta name="keywords" content="vivo智能手机官方商城">
    <meta name="description" content="vivo智能手机官方商城">
    <link rel="shortcut icon" href="favicon_7761e1f.ico">


    <!--[if lt IE 9]>
    <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_23e126e.js"></script>
    <![endif]-->


<link media="all" href="/ho/ddtj/index.css" type="text/css" rel="stylesheet">
</head>
<body class="buy-process">
<header id="header">
    <div class="head-search">
        <div class="search-box">
            <form action="https://shop.vivo.com.cn/product/search" method="get"><input autocomplete="off" name="searchKeywordStr" maxlength="20" placeholder="如:x9" value="" type="text"><button type="submit">搜索</button></form><a class="close"></a>
        </div>
    </div>
    <div class="wrapper">
        <nav id="navigator" class="cl">
            <a href="https://shop.vivo.com.cn/index.html" class="vivo-logo"><img src="/ho/ddtj/vivo-logo_865fdf1.png" alt="vivo智能手机官方网站"></a>
            <ul class="cl">
                <li><a href="https://shop.vivo.com.cn/product/phone">手机</a></li>
                <li><a href="https://shop.vivo.com.cn/product/parts">配件</a></li>
                <li><a href="https://shop.vivo.com.cn/vcoins">V币商品</a></li>
                <li><a href="https://shop.vivo.com.cn/helpcenter/service-promise">服务</a></li>
                <li><a href="https://bbs.vivo.com.cn/" target="_top">社区</a></li>
                <li><a href="https://www.vivo.com.cn/" target="_top">官网</a></li>
            </ul>
            <div class="search-user">
                <ul class="top-quick-menu">
                    <li id="j_SearchTrigger" class="search"><a href="javascript:void(0)" rel="nofollow"><b></b></a></li>
                    <li id="j_UserMenuTrigger">
                        <a href="https://shop.vivo.com.cn/my/" class="user"><b><img src="/ho/ddtj/small"></b></a>
                        <ul class="user-menu">
                            <li class="member-center"><a href="https://shop.vivo.com.cn/my/"><i></i>个人中心</a><span class="icon-angular"></span></li>
                            <li class="my-order"><a href="https://shop.vivo.com.cn/my/order"><i></i>我的订单</a></li>
                            <li class="logout"><a href="https://shop.vivo.com.cn/member/logout"><i></i>退出登录</a></li>
                        </ul>
                    </li>
                    <li><a href="https://shop.vivo.com.cn/shoppingcart" class="shoppingcart"><b></b><span class="shopcart-num">1</span></a></li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div id="content" class="cl">
    <div class="wrapper">
        <!--购物车购买流程展示进度条 -->
            <div class="buy-steps step2"></div>
    </div>

    <input id="buyMode" value="1" type="hidden">
    <input id="requestUuid" value="" type="hidden">
    <div class="container">
        <div class="wrapper">
            <dl class="module-list">
                <dt class="module-title">收货人信息</dt>
                <dd class="address-info">
                    <ul class="adress-list">
                        @foreach($address as $v)
                        <li class="address-item J_address-item dianji"  name="address" aid="{{$v['id']}}">
                            <label class="inner">
                                <p>姓名:{{$v['name']}}</p>                              
                                <p>电话:{{$v['phone']}}</p>                              
                                <p class='info'>地址:<span dizhi="{{$v['sheng']}}/{{$v['shi']}}/{{$v['xian']}}"> </span> {{$v['jiedao']}}</p>
                            </label>
                        </li>
                        @endforeach

                        <li class="address-item J_address-item new on" id="use-new-address" name="address">
                            <label class="inner">添加新地址 </label>
                        </li>
                    </ul>
                    <ul class="adress-list">
                    <!-- 执行下单操作 -->
                        <!-- <form action="/order/xiadan" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name='address_id'value=''>
                            <input type="submit" value="执行下单" id="saveAddress " class="btn-blue submit">
                        </form> -->
                        <br>  
                    <!-- 删除下单操作 -->
                        <form action="/home/order/delxiadan" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name='address_id'value=''>
                            <input type="submit" value="删除地址" id="btn-submit" class="btn-blue submit">
                        </form>
                    </ul>    
                   <!--  <form id="shipping-address-new-edit" method="post" onsubmit="return false" novalidate="novalidate" action="/order/doadd"> -->
                    <form action="/home/address/doadd" method="post">
                        {{csrf_field()}}
                        <dl class="address-info-new cl hidden" style="display: none;">
                            <dt><span class="must">*</span>收货人：</dt>
                            <dd><input name="receiverName" value="" type="text"></dd>
                            <dt><span class="must">*</span>所在地区：
                                
                                    <!--层级联动选择框-->
                                <dd><select id="loc_province" name="sheng"style="width:80px;"></select></dd>
                                <dd><select id="loc_city"  name="shi"style="width:100px;"></select></dd>
                                <dd><select id="loc_town" name="xian"style="width:120px;"></select></dd>
                                
                            </dt>
                            <dt><span class="must">*</span>详细地址：</dt>
                            <dd><input class="detail-address" name="jiedao" value="" type="text"></dd>
                            <dt><span class="must">*</span>手机号码：</dt>
                            <dd><input name="mobilePhone" value="" type="text"> 或</dd>
                            <dt class="tel">固定电话：</dt>
                            <dd><input name="telPhone" value="" type="text"></dd>
                            <dt></dt>
                            <dd><label><input name="defaultAddress" type="radio" value="1"> 设为默认地址</label></dd>
                            <dt></dt>
                            <dd>
                                <!-- <button id="saveAddress" class="btn-blue submit" type="button">保存</button> -->
                                <input type="submit" value="保存" id="saveAddress " class="btn-blue submit">
                               
                                <button id="cancelSaveAddress" class="btn-cancel submit" type="button">取消</button>
                            </dd>
                        </dl>
                    </form>
                </dd>

                <dt class="module-title">支付方式<small id="j_payTypeText">已选择：
在线支付                            
                        </small></dt>
                <dd class="delivery-info paymethod-info">
                        <div class="pay-method on" value="online_pay">
在线支付                            <i></i>
                        </div>
                </dd>
                <dt class="module-title">发票信息</dt>
                <dd class="invoice-info">
                    <div class="tax-type on" value="1">个人发票<i></i></div>
                    <div class="tax-type" value="2">公司发票<i></i></div>
                    <label><span class="red">*</span>发票抬头：<input id="tax-title" name="taxTitle" value="" type="text"></label>
                </dd>
            <form action="/home/order/xiadan" method='post'>

                    <dt class="module-title">确认商品</dt>
                    <dd>
                        <div class="prod-list">
                            <table class="order-table" cellpadding="0">
                                <thead>
                                <tr>
                                    <th width="194"></th>
                                    <th style="text-align: left;">商品名称</th>
                                    <th width="124">价格（元）</th>
                                    <th width="146">数量</th>
                                    <th width="146">优惠</th>
                                    <th width="137">赠送V币</th>
                                    <th width="162">小计（元）</th>
                                </tr>
                                </thead>
                                @foreach($data as $v)
                                    <input class="order-commodity-main" skuid="1882" spuid="90" num="1" type="hidden">
                                    <tbody class="prod-item ">
                                        <tr id='{{$v['id']}}' class="prod-line">
                                            <td class="prod-pic">
                                                <a class="figure" href="https://shop.vivo.com.cn/product/90" target="_top"><img src="1882_1481558960471_100x100.png" alt=""></a>
                                            </td>
                                            <td class="prods-info" colspan="2">
                                                <table class="prods-info-table">
                                                    <colgroup>
                                                        <col width="80">
                                                        <col>
                                                        <col width="120">
                                                    </colgroup>
                                                    <tbody>
                                                        <tr class="prod-info">
                                                            <td><img src="{{$v['picname']}}" width="100px" alt=""></td>
                                                            <td class="prod-name">
                                                                <a class="figure" href="https://shop.vivo.com.cn/product/90" target="_top">{{$v['goods']}}</a>
                                                                <br> 颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['price']}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>{{$v['num']}}</td>
                                            <td class="prod-privilege J_promotion-price">
                                                -0.00</td>
                                            <td>{{$v['price']*$v['num']}}</td>
                                            <td class="total-price J_total-price">{{$v['price']*$v['num']}}</td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                            </table>
                        </div>
                        <div class="order-info-box cl">
                            <ul>
                                <li class="coupon-info cl">
                                    <div class="coupon-info-title"><i></i>使用优惠券</div>
                                    <div class="info-box">
                                        <label>选择已有优惠券：<select class="sel-select-coupon">
                                            <option value="">选择优惠券</option>
                                        </select></label>
                                        <label>如果您有通过站外方式获得的优惠券，请在此输入号码：<input class="txt-coupon-num" value="" type="text"></label>
                                        <button id="check_coupon" class="btn-blue">验证优惠码</button>
                                    </div>
                                </li>
                                <li class="order-remark cl">
                                    <div class="info-box">
                                        <label><i></i>订单备注：</label>
                                        <textarea name='commit' id="order-memo" class="tta-order-remark" placeholder="限300字（若有特殊需求，请联系商城在线客服）" rows="1"></textarea>
                                    </div>
                                </li>
                            </ul>
                            <div class="other-info right-box pull-right">
                                <ul>
                                    <li class="order-sum"><label>商品:&nbsp;&nbsp;<em class="red zongshu"></em>件
                                        &nbsp;商品总金额：</label><span>¥<dfn id='zongjia'><input type="hidden" name='total' value="{{$t}}" />{{$t}}</dfn></span>
                                    </li>
                                    <li class="order-sum"><label>优惠：</label><span class="red">-<dfn>¥</dfn><span id="privilege">0.00</span></span>
                                    </li>
                                    <li class="order-sum"><label>运费：</label><span class="red"><dfn>¥</dfn><span id="postAmount">0.00</span></span></li>
                                </ul>
                            </div>
                        </div>

                    </dd>
                    <dt class="real-price-box">
                        <ul class="delivery-address">
                            <li class="item">
                                <label>地址：</label><span id="receiveAddress"></span></li>
                            <li class="item receiver-name"><label>收件人：</label><span id="receivePerson"> </span>
                            </li>
                        </ul>
                        <!-- <label>应付总额</label><span class="real-price red"><dfn>¥</dfn></span> -->
                    </dt>
                </dl>
                <div class="btn-box">
                        {{csrf_field()}}
                        <input type="hidden" name='address_id' value='{{$v['id']}}' />
                        <!-- <input type="hidden" name='total' value='{{$t}}' /> -->
                        
                        <a href="/home/cart/index"><button id="btn-back2shoppingcart" class="btn-cancel" type="button" title="返回购物车">返回购物车</button></a>
                        <button id="btn-submit-order" class="btn-confirm" title="提交订单">提交订单</button>
                    
                </div>
            </form>
            <div>
                <form id="orderPayform" method="post" action="https://shop.vivo.com.cn/order/cart/confirm?uniqueCodes=1_1882"></form>
            </div>
            </dl>
       </div>
    </div>
    <!--content end -->
   <br /><br /> 
<footer id="footer">
    <div class="shop-agree">
        <div class="wrapper cl">
            <ul class="cl">
                <li><a href="https://shop.vivo.com.cn/helpcenter/transport-cost/" target="_top">
                    <b class="b1"></b>
                    <p><span>0</span>运费购手机</p></a>
                </li>
                <li><a href="https://shop.vivo.com.cn/helpcenter/after-service/" target="_top">
                    <b class="b2"></b>
                    <p><span>30</span>天无理由退换货</p></a>
                </li>
                <li><a href="https://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_top">
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
                <dd><a href="https://shop.vivo.com.cn/helpcenter/alipay/" target="_top">· 支付宝支付</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/invoice-declare/" target="_top">· 发票说明</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/coupon-declare/" target="_top">· 优惠券说明</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/huabei-instalment/" target="_top">· 花呗分期</a></dd>
            </dl>
            <dl>
                <dt><b class="b2"></b>配送方式</dt>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/transport-way/" target="_top">· 配送方式</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/transport-cost" target="_top">· 配送费用</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/sign-notice/" target="_top">· 签收须知</a></dd>
            </dl>
            <dl>
                <dt><b class="b3"></b>服务支持</dt>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/service-promise/" target="_top">· 服务保证</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/after-service/" target="_top">· 售后服务</a></dd>
                <dd><a href="http://www.vivo.com.cn/service/map.html" target="_top">· 售后网点查询</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/broken-screen/" target="_top">· 碎屏宝</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/extend-service/" target="_top">· 手机延保</a></dd>
            </dl>
            <dl>
                <dt><b class="b4"></b>品牌服务</dt>
                <dd><a href="http://www.vivo.com.cn/service-faq_zhineng.html" target="_top">· 常见问题</a></dd>
                <dd><a href="http://www.vivo.com.cn/service.html" target="_top">· 相关下载</a></dd>
                <dd><a href="https://shop.vivo.com.cn/helpcenter/contact-us/" target="_top">· 联系我们</a></dd>
            </dl>
            <dl class="shop-help-last">
                <dt><b class="b5"></b>小V在线时段</dt>
                <dd>周一至周五 08:00-21:00</dd>
                <dd>周六、周日 09:00-18:00</dd>
                <dd class="online-service">
                    <a target="_top" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&amp;aty=0&amp;a=0&amp;curl=&amp;ty=1"><img class="lazy" data-src="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/common/online-service_1e5d0b6.png" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsQAAA7EAZUrDhsAAAANSURBVBhXYzh8+PB/AAffA0nNPuCLAAAAAElFTkSuQmCC"></a>
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
                <a href="javascript:;" class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="/ddtj/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
            </div>
            <div class="copy-info">
                <a href="https://shop.vivo.com.cn/index.html" class="footer-logo"></a>Copyright ©2011-2016 广东步步高电子工业有限公司<br>版权所有 保留一切权利粤B2-20080267 | <a href="http://www.miitbeian.gov.cn/" target="_top">粤ICP备05100288号</a>
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
                    <img src="/ddtj/qrcode_6a6b792.png">
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
</div><script src="/ddtj/hm.js" async=""></script><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="/ho/ddtj/jquery.min_6163309.js"></script>
<script src="/ho/ddtj/jquery.cookie_a5283b2.js"></script>
<script src="/ho/ddtj/jquery.lazyload_546c1da.js"></script>
<script src="/ho/ddtj/jquery-placeholder_fb6154c.js"></script>
<script src="/ho/ddtj/vivo-common_38aa2f0.js"></script>
<script src="/ho/ddtj/dialog_6a2b3fb.js"></script>
<script src="/ho/ddtj/vivo-stat_265b49b.js"></script>
<script src="/ho/ddtj/login_confirm_485e7b4.js"></script>
<script src="/ho/ddtj/region_a46b4bb.js"></script>
<script src="/ho/ddtj/jquery.validate.min_76c74f2.js"></script>
<script src="/ho/ddtj/dialog_6a2b3fb.js"></script>
<script src="/ho/ddtj/view_1c5c771.js"></script>
<script src="/ho/ddtj/view_1c5c7711.js"></script>

<!-- 城市级联 -->
<!-- <script src="/cj/jquery.js"></script> -->
<script src="/ho/cj/area.js"></script>
<script src="/ho/cj/location.js"></script>

<script type="text/javascript">
    
    // 寻找收件人
    $('.dianji').each(function(){
        $(this).click(function(){
            var id = $(this).attr('aid');

            $.ajax({
                url:'/home/order/shoujian',
                data:{'id':id},
                dataType:'json',
                success:function(mes){
                    // alert($(mes).attr('id'));
                    $('#receivePerson').html($(mes).attr('name'));
                    $('#receiveAddress').html($(mes).attr('sheng')+'/'+$(mes).attr('shi')+'/'+$(mes).attr('xian')+'/'+$(mes).attr('jiedao'));
                    $(document).ready(function(){
                        showLocation();

                        //显示id对应的地址
                        $('#receiveAddress').each(function(){
                            var info=$(this).html();
                            var res=change(info);
                            $('#receiveAddress').html(res);
                        });

                        function change(info){
                            var arr = info.split('/');

                            var xx = new Location();
                            var xx = xx.items;
                            var sheng = xx[0][arr[0]];
                            var shi = xx[0+','+arr[0]][arr[1]];
                            var xian = xx[0+','+arr[0]+','+arr[1]][arr[2]];
                            var jiedao = arr[3];

                            return sheng+shi+xian+jiedao;
                        }

                    });
                }
            });
        });
    });
    // 修改总价
    // function count(){
    //     var coun = 0;
    //     $('.prod-line').each(function(){
    //         var xiaoji = parseFloat($(this).find('.prods-info').next('td').html())*parseFloat($(this).find('prod-name').next('td').html());
    //         coun+=xiaoji;     
    //     });
    //     alert(coun);
    //     $('#zongjia').html(coun);
    // }
    // count();
    
    // 修改数量
    function num(){
        var num = 0;
        $('.prod-line').each(function(){
            var newnum = parseFloat($(this).find('.prods-info').next('td').html());
            num += newnum; 
        });
        $('.zongshu').html(num);
    }
    num(); 
    $(document).ready(function(){
        showLocation();

        //显示id对应的地址
        $('.info').each(function(){
            var info=$(this).find('span').attr('dizhi');
            var res=change(info);
            $(this).find('span').html(res);
        });

        function change(info){
            var arr=info.split('/');
            var xx=new Location();
            var xx=xx.items;
            var sheng=xx[0][arr[0]];
            var shi=xx[0+','+arr[0]][arr[1]];
            var xian=xx[0+','+arr[0]+','+arr[1]][arr[2]];

            return sheng+shi+xian;
        }

    });
    var c = $('#order-memo').html();
    $('#tijiao').next('input').attr('value',c);
    var t =  $('#zongjia').html();
    $('#tijiao').next('input').next('input').attr('value',t);
</script>
<script>
    // 基础邮费
    var basePostFee = parseInt(5);
    // 真实邮费
    var postFee = parseInt(0);
    // 是否按金额免邮
    var isBaseOnAmount = "true";
    // 金额免邮基本点
    var baseAmount = "68";
</script>

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
