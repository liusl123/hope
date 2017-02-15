@extends('layout.headindex')
@section('con')
<div id="content" class="cl">
<input name="pageNavMappingIndex" id="pageNavMappingIndex" value="0" type="hidden">
<input id="preview" name="preview" value="" type="hidden">
<input id="salePrice" name="salePrice" value="3298" type="hidden">

<div class="wrapper">
    <div class="crumbs">您的位置:<a class="first" href="https://shop.vivo.com.cn/index.html">首页</a><b></b>
                <a href="https://shop.vivo.com.cn/product/phone">手机产品</a>
        <b></b><span>X系列</span></div>
</div>

<div class="prod-container">
    <div class="wrapper">
        <div class="prod-container-top cl">
            <div class="prod-container-left">
                <div id="j_SpecImgs" class="figure">
                    <ul id="bigImgUl">
                      
                            @foreach($ww as $vw)
                             @for($i=1;$i<5;$i++)
                            <li style="display: none; opacity: 0; z-index: 1;"><img src="{{$vw['photo'.$i]}}" alt="商品图片"></li>
                              @endfor
                            @endforeach
                    </ul>
                </div>
                <div id="j_SpecItems" class="spec-items">
                    <ul class="cl" id="smallImgUl">
                    @foreach($ww as $vi)
                     @for($i=1;$i<5;$i++)
                            <li class=""> <a href="javascript:;"> <img src='{{$vi['photo'.$i]}}' alt=''></a></li>
                      @endfor      
                    @endforeach
                    </ul>
                </div>
                    <script type="text/javascript">
                   
                </script>

                <div class="favor">
                    <ul class="cl">
                        <li class="collect"><a id="j_CollectTrigger" href="javascript:;">收藏商品（<span id="favCount">3127</span>人收藏）</a></li>
                        <li class="share" id="J_Share">分享
                            <div class="share-box hidden">
                                <a title="分享到新浪微博" target="_blank" href="http://service.t.sina.com.cn/share/share.php?title=%E3%80%90X9Plus%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88%E3%80%900%E9%A6%96%E4%BB%98%20%E8%8A%B1%E5%91%9712%E6%9C%9F%E5%88%86%E6%9C%9F%E5%85%8D%E6%81%AF%E3%80%91%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A53298.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;url=https://shop.vivo.com.cn/product/9986&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/24/4224_1486346629938hd_530x530.png?1442932368#h" class="sina"><b></b></a>
                                <a title="分享到腾讯微博" target="_blank" href="http://v.t.qq.com/share/share.php?title=%E3%80%90X9Plus%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88%E3%80%900%E9%A6%96%E4%BB%98%20%E8%8A%B1%E5%91%9712%E6%9C%9F%E5%88%86%E6%9C%9F%E5%85%8D%E6%81%AF%E3%80%91%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A53298.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;url=https://shop.vivo.com.cn/product/9986&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/24/4224_1486346629938hd_530x530.png?1442932368#h" class="tencent"><b></b></a>
                                <a id="j_shareToRenren" title="分享到人人网" target="_blank" href="http://widget.renren.com/dialog/share?resourceUrl=https://shop.vivo.com.cn/product/9986;srcUrl=https://shop.vivo.com.cn/&amp;title=%E3%80%90X9Plus%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88%E3%80%900%E9%A6%96%E4%BB%98%20%E8%8A%B1%E5%91%9712%E6%9C%9F%E5%88%86%E6%9C%9F%E5%85%8D%E6%81%AF%E3%80%91%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A53298.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/24/4224_1486346629938hd_530x530.png?1442932368#h" class="renren"><b></b></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @foreach($as as $v)
            <div class="prod-container-right">
                <h1>{{$v['goods']}}</h1>
                <small class="promotion-words">{{$v['descr']}}</small>
                <ul class="summary-price">
                    <li>
                        <span class="now-price"><dfn>¥</dfn>{{$v['price']}}</span>
                    </li>
                    <li>
                        <div class="table-cell"><span class="label">V币</span></div>
                        <div class="table-cell">购买即送3298V币</div>
                    </li>
                        <li>
                             <div class="table-cell"><span class="label">赠品</span></div>
                            <div class="table-cell gift-box">
                                    <span class="gift-item" title="【vivo】配件收纳包" sku-id="4061">
                                        <a href="#" target="_top">{{$v['erji']}}<img src="{{$v['picname']}}"> x 1</a>

                                    </span>
                            </div>
                        </li>

                </ul>
                <form id="prod-detail-form" method="post">
                    <input id="spuId" name="spuId" value="9986" type="hidden">
                    <input id="cmdyCategoryId" name="cmdyCategoryId" value="146" type="hidden">
                    <input id="queryFlag" name="queryFlag" value="1" type="hidden">
                <dl class="prod-params cl" id="j_colors" marketable="1">
                                <dt>版本：</dt>
                                <dd>
                                    <ul class="tags nettype-tags">
                                        <input id="a"  value="3" type="hidden">
                                        @foreach($xx as $k=>$w)
                                            <li class="on">{{$w}}<i></i></li>
                                        @endforeach
                                    </ul>
                                </dd>
                                <dt>容量：</dt>
                                <dd>
                                    <ul class="tags storage-tags">
                                        <input id="b"  value="3" type="hidden">
                                         @foreach($rr as $key=>$wa)
                                            <li class="aa">{{$wa}}<i></i></li>
                                        @endforeach
                                    </ul>
                                </dd>
                                 <dt>尺寸：</dt>
                                <dd>
                                    <ul class="tags storage-tags">
                                        <input id="c"  value="3" type="hidden">
                                        @foreach($zz as $kr=>$cv)
                                            <li class="bb">{{$cv}}<i></i></li>
                                        @endforeach
                                    </ul>
                                </dd>

                            <dt>颜色</dt>
                            <dd>
                                <ul class="tags color-box" spuinstallment="1">
                                <input id="o" value="颜色" type="hidden">
                                @foreach($tt as $kj=>$gb)
                              
                                        <li class="e">{{$gb}}</li>
                                @endforeach
                               
                                </ul>
                            </dd>
                                            <script type="text/javascript" src="/xq/jquery-18.3.js">
                                             </script>
                                             <script type="text/javascript">
                                                    $('.on').each(function(){
                                                $(this).toggle(function(){
                                                    $(this).css('borderColor','#008DD5');
                                                    $('#a').val($(this).text());
                                                },function(){
                                                    $(this).css('borderColor','#DDDDDD'); 
                                                });
                                            })
                                             $('.aa').each(function(){
                                                $(this).toggle(function(){
                                                    $(this).css('borderColor','#008DD5');
                                                    $('#b').val($(this).text());
                                                },function(){
                                                    $(this).css('borderColor','#DDDDDD'); 
                                                });
                                            })
                                             $('.bb').each(function(){
                                                $(this).toggle(function(){
                                                    $(this).css('borderColor','#008DD5');
                                                    $('#c').val($(this).text());
                                                },function(){
                                                    $(this).css('borderColor','#DDDDDD'); 
                                                });
                                            }) 
                                              $('.e').each(function(){
                                                $(this).toggle(function(){
                                                    $(this).css('borderColor','#008DD5');
                                                    $('#c').val($(this).text());
                                                },function(){
                                                    $(this).css('borderColor','#DDDDDD'); 
                                                });
                                            }) 

                                             </script>
                                           
                                       
                                          
                                <dt>服务：</dt>
                                <dd>
                                        <ul class="tags service-tags">
                                                <li name="broken-svc" sku-id="1634" svc-price="99" broken-svc-id="201" title="一年碎屏宝，服务类商品，此款碎屏宝不适配Xplay5机型，购买当天生效，不支持退款" class="broken">
                                                    {{$v['fuwu']}}  <span class="item-price"><dfn>¥</dfn>99</span><i></i>
                                                </li>
                                            <li class="detail"><a target="_blank" href="https://shop.vivo.com.cn/helpcenter/broken-screen">详情&gt;</a></li>
                                        </ul>
                                </dd>
                </dl>
                </form>

                <div class="btns">

                    <button class="btn-next J_buy-button btn-appointment payall-order" type="button" title="加入购物车">加入购物车</button>
                    <p class="count-down-text"></p>

                    <div id="error-msg" class="red hidden"></div>
                </div>

                <div class="activity-tags">
                        <ul>
                            <li class="post-free"></li>
                            <li class="change-arbitrary"></li>
                        </ul>
                </div>

            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="prod-main-info" style="padding-top: 0px;">
    <div class="prod-main-tab">
        <div class="prod-tab-box">
            <ul>
                <li class="tab-information current" v="information"><a href="#">详情<b></b></a></li>
                <li class="tab-parameter" v="parameter"><a href="#">参数<b></b></a></li>
                <li class="tab-evaluate" v="evaluate"><a id="remarkHandler" href="#" prodid="9986">评价<span id="remarkCountSpan"> ( 0 ) </span><b></b></a></li>
                <li class="tab-evaluation" v="evaluation" style="display: none"><a href="#">评测<b></b></a></li>
                <li class="tab-afterservice" v="afterservice"><a href="#">售后服务<b></b></a></li>
            </ul>
        </div>
    </div>
    <div class="prod-main-box">
        <div style="display: block;" class="prod-main-information">
            <div class="section">
            <p><a href="#" target="_top">
           <div class="vc-main-events vc-ev-pic">
            <h2 style="float:left">活动</h2>
            <a class="event-morelink v-gb-ico" style="float:left;margin-top:-15px;" href="http://bbs.vivo.com.cn" target="_blank">更多</a>
            <ul class="cl">
                @foreach($aa as $vc)
                <li>
                     <a href="https://shop.vivo.com.cn/sp/X9Plus" target="_blank">
                        <div class="figure"><img src="{{$vc['pic']}}" style="width:100;height:100" /></div>
                        <h3>@if($vc['state']=='1')
                                新活动
                            @elseif($vc['state']=='2')
                                活动开始
                            @else
                                活动结束
                            @endif
                        {{$vc['activityname']}}</h3>
                        <p>{{$vc['type']}}</p>
                    </a>
                    <strong>商城</strong>
                </li>
                    @endforeach
            </ul>
            </div>
            @foreach($pp as $ty)
             @for($i=1;$i<5;$i++)
           <li> <img src='{{$ty['pic'.$i]}}' title="" alt=""></li>
           @endfor
            @endforeach
            </div>
        </div>
            <div style="display: none;" class="prod-main-parameter">
                <div class="prod-parameter-box">
                    <ul>
                            <li class="c"><h4>CPU</h4><p>高通骁龙八核MSM8976 Pro</p></li>
                            <li><h4>内存（运行内存）</h4><p>6GB RAM（因为安装操作系统占据了部分运存空间，实际可用运存小于6G）</p></li>
                            <li class="c"><h4>ROM</h4><p>64GB ROM（不支持T卡扩展）注：由于手机系统和预装的程序占据了部分存储空间，实际可用存储空间小于64G</p></li>
                            <li><h4>系统</h4><p>Funtouch OS 3.0(基于Android 6.0.1)</p></li>
                            <li class="c"><h4>屏幕尺寸</h4><p>5.88英寸</p></li>
                            <li><h4>屏幕分辨率</h4><p>1920*1080</p></li>
                            <li class="c"><h4>PPI</h4><p>374</p></li>
                            <li><h4>机身厚度</h4><p>162x79x7.49mm</p></li>
                            <li class="c"><h4>电池</h4><p>一体式内置电池</p></li>
                            <li><h4>容量</h4><p>4000mAh</p></li>
                            <li class="c"><h4>支持频段</h4><p>网络类型 双卡双待全网通* <br>2G   GSM ：GSM850/900/1800/1900MHz <br>2G CDMA： 800MHz <br>3G   WCDMA：850/900/1900/2100MHz；<br>3G  TD-SCDMA：1880/2010MHz；<br> 3G  CDMA2000：800MHz   <br>4G   TDD-LTE：B38/B39/B40/B41(100M)；<br> 4G  FDD-LTE：B1/B2/B3/B4/B5/B8  <br>4G+   TDD-LTE：B38/B39/B40/B41（100M）；<br> 4G+  FDD-LTE：B1/B3/  B1+B3 <br>支持移动、联通、电信SIM卡，两张卡不能同时享受4G网络，如卡1使用4G卡，卡2就不能使用4G网络，如果卡2使用4G网络，卡1就不能使用4G网络，数据网络切换手动选择完成置换；不支持两张电信卡同时使用。</p></li>
                            <li><h4>连接支持</h4><p>wifi、蓝牙4.2、USB2.0、GPS定位、OTG</p></li>
                            <li class="c"><h4>功能特色</h4><p>前置2000万柔光双摄|全新第二代柔光灯|先拍照后对焦|HIFI音质|</p></li>
                            <li><h4>摄像头类型</h4><p>前置双摄+后置</p></li>
                            <li class="c"><h4>摄像头</h4><p>后置1600W PDAF+前置2000W FF+800W FF</p></li>
                            <li><h4>视频拍摄</h4><p>支持</p></li>
                            <li class="c"><h4>标配</h4><p>主机 *1 <br>取卡针 *1 <br>有线耳机 *1<br>5V 4.5A闪充充电头 *1<br>闪充数据线<br>透明后盖保护壳 *2<br>柔性钢化膜*1<br>快速入门指南 *1<br>重要信息和保修卡</p></li>
                    </ul>
                </div>
            </div>
        <div style="display: none;" class="prod-main-evaluate">
            <!-- 商品评价开始 -->
        </div>
        <div style="display: none;" class="prod-main-evaluation">
            <div class="section">
            </div>
        </div>
<div style="display: none;" class="prod-main-afterservice">
    <div class="prod-afterservice-box wrapper">
        <ul class="cl">
            <li class="return">
                <b></b>
                <h3>30天无理由退换货</h3>
                <p>购机签收30天内，如产品出现质量问题，凭售后检测单包邮退换货；如果使用不满意，机器无人为损坏且赠品发票齐全，也可申请退换货处理，运费自付。<br>所有换货后的机器只享受行业标准签收7天内无理由退货、30天内出现质量问题包换的权益。
                </p>
            </li>

            <li class="b1">
                <b></b>
                <h3>退机服务</h3>
                <p>属于退机的机器直接退回原购买点，即vivo官方商城，商城售后收到机器后，确认符合退机条件，即安排财务将顾客购机款退回原付款账户。<br>
                    <span>退货地址：广东省东莞市长安镇沙头村东大路151号vivo电商仓库（邮编：523861）<br>收件人：vivo电商仓库<br>联系电话：4007161118 </span></p>
            </li>
            <li class="b3">
                <b></b>
                <h3>换机服务</h3>
                <p>为了给您提供更优质的服务，官方商城发售的手机自收货之日起30天内出现质量问题都可以联系在线客服，凭售后检测单申请退换货，运费由我们承担！ 或由您自付运费，寄回委托客服送修检测，确认后为您换机。</p>
            </li>
            <li class="b2">
                <b></b>
                <h3>全国联网三包服务</h3>
                <p>由于产品本身出现性能故障（见国家规定的《移动电话机商品性能故障表》）， 顾客凭有效发票和有效三包凭证按照三包规定享受三包服务：自售出之日起7日退换货，一个月内包换，一年内保修。三包细则查询：<a href="https://shop.vivo.com.cn/helpcenter/service-promise" target="_top">http://shop.vivo.com.cn/helpcenter/service-promise</a></p>
            </li>
            <li class="b5">
                <b></b>
                <h3>vivo售后服务点查询</h3>
                <p>您可以直接进入手机设置—更多设置—售后服务，查询就近的售后服务点；手机无法开机的情况下，可以在下面页面，完成查询：<a href="http://www.vivo.com.cn/service/map.html" target="_top">http://www.vivo.com.cn/service/map.html</a></p>
            </li>

        </ul>
    </div>
</div>    </div>

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
                <a href="javascript:;" class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="X9Plus%20%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88_files/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
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
                    <img src="X9Plus%20%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88_files/qrcode_6a6b792.png">
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
</div><script src="X9Plus%20%E6%98%9F%E7%A9%BA%E7%81%B0%E7%89%88_files/hm.js" async=""></script><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="/xq/jquery.js"></script>
<script src="/xq/jquery_003.js"></script>
<script src="/xq/jquery_002.js"></script>
<script src="/xq/jquery-placeholder_fb6154c.js"></script>
<script src="/xq/vivo-common_38aa2f0.js"></script>
<script src="/xq/dialog_6a2b3fb.js"></script>
<script src="/xq/vivo-stat_265b49b.js"></script>
<script src="/xq/login_confirm_485e7b4.js"></script>
<script>
    var imgHost = "https://swsdl.vivo.com.cn/vivoshop/";
    var skuImageJsonStr = '([{"bigPic":"commodity/24/4224_1486346629938hd_530x530.png","hdPic":"commodity/24/4224_1486346629938hd_1080x1080.png","imageNo":"1486346629938hd","imageType":"","skuId":"4224","smallPic":"commodity/24/4224_1486346629938hd_250x250.png","thumbnailPic":"commodity/24/4224_1486346629938hd_100x100.png"},{"bigPic":"commodity/24/4224_1486346631134hd_530x530.png","hdPic":"commodity/24/4224_1486346631134hd_1080x1080.png","imageNo":"1486346631134hd","imageType":"","skuId":"4224","smallPic":"commodity/24/4224_1486346631134hd_250x250.png","thumbnailPic":"commodity/24/4224_1486346631134hd_100x100.png"},{"bigPic":"commodity/24/4224_1486346631796hd_530x530.png","hdPic":"commodity/24/4224_1486346631796hd_1080x1080.png","imageNo":"1486346631796hd","imageType":"","skuId":"4224","smallPic":"commodity/24/4224_1486346631796hd_250x250.png","thumbnailPic":"commodity/24/4224_1486346631796hd_100x100.png"},{"bigPic":"commodity/24/4224_1486346632597hd_530x530.png","hdPic":"commodity/24/4224_1486346632597hd_1080x1080.png","imageNo":"1486346632597hd","imageType":"","skuId":"4224","smallPic":"commodity/24/4224_1486346632597hd_250x250.png","thumbnailPic":"commodity/24/4224_1486346632597hd_100x100.png"}])';
    var skuImageJson = eval(skuImageJsonStr);
    var fullpaySkuIdSet = "4224";
    var spuInstallment = "1";
    var isSecondBuy = false;
    var maxNumberPerUser = 3;
</script>
<script src="/xq/simpleStorage_f115cd4.js"></script>
<script src="/xq/view_cbc6422.js"></script>
<script src="/xq/view-hist_823c137.js"></script>
<script src="/xq/dialog_6a2b3fb.js" type="text/javascript"></script>

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