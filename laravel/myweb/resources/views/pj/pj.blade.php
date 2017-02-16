@extends('layout.headindex');
@section('con')

	<div class="container wrapper">
            <div class="filter">
                <div class="f-line">
                    <dl>
                        <dt class="fl-title fl-item">分类：</dt>
                        <dd class="fl-item on"><a href="https://shop.vivo.com.cn/product/parts">全部</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=72">智能外设/移动存储</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=9">耳机/音箱</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=8">移动电源/充电器/数据线</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=73">保护壳/保护膜</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=137">箱包/自拍杆</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=12">碎屏宝</a></dd>
                                <dd class="fl-item "><a href="https://shop.vivo.com.cn/product/parts?category=96">其他</a></dd>
                    </dl>
                </div>
                <div class="f-line sort">
                    <dl>
                        <dt class="fl-title fl-item">排序：</dt>
                        <dd class="fl-item on">
							<a href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;hasStore=">默认</a>
						</dd>
                        <dd class="fl-item ">
							<a href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=price_asc&amp;hasStore=">价格<i class="icon-sort"></i></a>
						</dd>
                        <dd class="fl-item ">
							<a href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=market_time_asc&amp;hasStore=">上架时间<i class="icon-sort"></i></a>
						</dd>
                        <dd class="fl-item">
							<a href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=&amp;hasStore=1">
							<i class="icon-checkbox "></i>仅看有货</a>
						</dd>
                    </dl>
                </div>
            </div>
				<div class="list-box">


                            <ul class="prod-list cl">
                            @foreach($vc as $v)
							<li class="prod-item ">
                                <a target="_blank" href="/home/pjxq/pj/{{$v['id']}}">
								<div class="figure">
									<img src="{{$v['picname5']}}" style="position: relative; top: 0px;">
								</div>
								<h3 title="【vivo】闪充充电器-9V/2A快充">
								{{$v['pjname']}}
								</h3>
								<p class="price">
									<dfn>¥</dfn>{{$v['price']}}
								</p>
                            </a>
							</li>
                            @endforeach
                            </ul>
					
                </div>

		<nav class="pagination">

                        <a class="num current" href="javascript:void(0)">1</a>
                        <a class="num" href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=&amp;hasStore=&amp;searchKeywordStr=&amp;pageNum=2&amp;pageSize=12">2</a>
                        <a class="num" href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=&amp;hasStore=&amp;searchKeywordStr=&amp;pageNum=3&amp;pageSize=12">3</a>
				<a class="next" href="https://shop.vivo.com.cn/product/parts?category=&amp;netType=&amp;sortType=&amp;hasStore=&amp;searchKeywordStr=&amp;pageNum=2&amp;pageSize=12"></a>
            <label><input class="go-num" type="text"> / 3</label><a data-total="3" data-url="/product/parts?category=&amp;netType=&amp;sortType=&amp;hasStore=&amp;searchKeywordStr=&amp;pageNum=PAGENUM&amp;pageSize=12" class="go j_go" href="javascript:void(0)"></a>
		</nav>

	</div>
</div>
@endsection