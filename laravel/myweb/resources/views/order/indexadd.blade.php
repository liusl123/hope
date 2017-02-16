<!DOCTYPE html>

@extends('layout.grzx')
@section('con')
    
    
    







    <!--[if lt IE 9]>
    <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_23e126e.js"></script>
    <![endif]-->


<link media="all" href="/ddtj/index.css" type="text/css" rel="stylesheet">
</head>
<body class="buy-process">

<div id="content" class="cl">


    <input id="buyMode" value="1" type="hidden">
    <input id="requestUuid" value="" type="hidden">
    <div class="container">
        <div class="wrapper">
            <dl class="module-list">
                <dt class="module-title">收货人信息</dt>
                <dd class="address-info">
                    <ul class="adress-list">
                        @foreach($address as $v)
                        <li class="address-item J_address-item "  name="address" aid="{{$v['id']}}">
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

                        <br>  
                    <!-- 删除下单操作 -->
                        <form action="/order/delxxiadan" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name='address_id'value=''>
                            <input type="submit" value="删除地址" id="saveAddress " class="btn-blue submit">
                        </form>
                    </ul>    
                   <!--  <form id="shipping-address-new-edit" method="post" onsubmit="return false" novalidate="novalidate" action="/order/doadd"> -->
                    <form action="/address/dooadd" method="post">
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
            </dl>
       </div>
    </div>
    <!--content end -->

</div>


</div><script src="/ddtj/hm.js" async=""></script><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="/ddtj/jquery.min_6163309.js"></script>
<script src="/ddtj/jquery.cookie_a5283b2.js"></script>
<script src="/ddtj/jquery.lazyload_546c1da.js"></script>
<script src="/ddtj/jquery-placeholder_fb6154c.js"></script>
<script src="/ddtj/vivo-common_38aa2f0.js"></script>
<script src="/ddtj/dialog_6a2b3fb.js"></script>
<script src="/ddtj/vivo-stat_265b49b.js"></script>
<script src="/ddtj/login_confirm_485e7b4.js"></script>
<script src="/ddtj/region_a46b4bb.js"></script>
<script src="/ddtj/jquery.validate.min_76c74f2.js"></script>
<script src="/ddtj/dialog_6a2b3fb.js"></script>
<script src="/ddtj/view_1c5c771.js"></script>
<script src="/ddtj/view_1c5c7711.js"></script>

<!-- 城市级联 -->
<!-- <script src="/cj/jquery.js"></script> -->
<script src="/cj/area.js"></script>
<script src="/cj/location.js"></script>

<script type="text/javascript">
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

<!-- @endsection -->
