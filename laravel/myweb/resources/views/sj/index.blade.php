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
                                    <img src="{{$v['photo5']}}" style="position: relative;">
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

@endsection