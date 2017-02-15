@extends('layout.grzx')
@section('con')   
<article class="content">
    <dl id="member-order-list">
        <dt class="module-title">我的订单</dt>
        <dd class="module-item">
            <ul class="statistic-tags">
                <li class='on'><a>全部</a></li>
                <li><a>待付款</a></li>
                <li><a>待收货</a></li>
                <li><a>已完成</a></li>
                <li><a>已关闭</a></li>
            </ul>

            <div class="list-caption">
                <div class="col col0">商品</div>
                <div class="col col1">数量</div>
                <div class="col col2">价格</div>
                <div class="col col3">状态</div>
                <div class="col col4">操作</div>
            </div>
            <div class='kengsi' style='display:block'>
                @foreach($data as $v)
                    @if($v['status'] < 4)
                        <table class="order-table quanbu"  >
                            <colgroup>
                                <col width="155">
                                <col>
                                <col class="col1">
                                <col class="col2">
                                <col class="col3">
                                <col class="col4">
                            </colgroup>
                            <tbody>
                            <tr>

                                <th colspan="6" class="order-title">
                                    <ul>
                                        <li class="order-number">订单号：<a href="https://shop.vivo.com.cn/my/order/detail?orderNo=17021461040751412697">{{$v['order_num']}}</a>
                                        </li>
                                        <li class="order-time">成交时间:
                                            {{$v['created_at']}}
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            </tbody>

                            <tbody>
                                <tr class="order-line">
                                    <td colspan="4">
                                        <table class="order-sub-table">
                                            <colgroup>
                                                <col width="155">
                                                <col>
                                                <col class="col1">
                                                <col class="col2">
                                            </colgroup>

                                            <tbody class="prod-item ">
                                            <tr class="prod-line">
                                                <td class="prod-pic">
                                                    <a class="figure" href="" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                                </td>
                                                <td colspan="3">
                                                    <table class="prods-info-table">
                                                        <colgroup>
                                                            <col width="80">
                                                            <col>
                                                            <col width="66">
                                                            <col width="108">
                                                        </colgroup>
                                                        <tbody>

                                                        <tr class="prod-info">
                                                            <td class="prod-name" colspan="2">
                                                                <a href="" target="_top">{{$v['goods']}}</a>
                                                                    <br>颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['num']}}</td>
                                                            <td>
                                                                    {{$v['price']}}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td class="status">
                                        @if($v['status']==0)
                                            待付款
                                        @elseif($v['status']==1)
                                            已付款
                                        @elseif($v['status']==2)
                                            待收货
                                        @elseif($v['status']==3)
                                            已完成
                                        @endif
                                    </td>
                                    <td class="operation">
                                        <ul>
                                            <li><a href="/home/order/shou/{{$v['id']}}">确认收货</a></li>
                                            <li><a href="/home/order/del/{{$v['id']}}">删除订单</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr id='{{$v['id']}}' class="operation-line">
                                    <td colspan="6">
                                        总计：<span class="">
                                            <dfn>¥</dfn>{{$v['num']*$v['price']}}
                                           </span>
                                        (含运费：<dfn>¥</dfn>0.00
                                        优惠：
                                        <dfn>¥</dfn>0.00
                                        )
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach 
            </div> 

            <div class='kengsi' style='display:none'>
                @foreach($data as $v)
                    @if($v['status'] == 0)
                        <table class="order-table quanbu"  >
                            <colgroup>
                                <col width="155">
                                <col>
                                <col class="col1">
                                <col class="col2">
                                <col class="col3">
                                <col class="col4">
                            </colgroup>
                            <tbody>
                            <tr>

                                <th colspan="6" class="order-title">
                                    <ul>
                                        <li class="order-number">订单号：<a href="">{{$v['order_num']}}</a>
                                        </li>
                                        <li class="order-time">成交时间:
                                            {{$v['created_at']}}
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            </tbody>

                            <tbody>
                                <tr class="order-line">
                                    <td colspan="4">
                                        <table class="order-sub-table">
                                            <colgroup>
                                                <col width="155">
                                                <col>
                                                <col class="col1">
                                                <col class="col2">
                                            </colgroup>

                                            <tbody class="prod-item ">
                                            <tr class="prod-line">
                                                <td class="prod-pic">
                                                    <a class="figure" href="" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                                </td>
                                                <td colspan="3">
                                                    <table class="prods-info-table">
                                                        <colgroup>
                                                            <col width="80">
                                                            <col>
                                                            <col width="66">
                                                            <col width="108">
                                                        </colgroup>
                                                        <tbody>

                                                        <tr class="prod-info">
                                                            <td class="prod-name" colspan="2">
                                                                <a href="" target="_top">{{$v['goods']}}</a>
                                                                    <br>颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['num']}}</td>
                                                            <td>
                                                                    {{$v['price']}}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td class="status">
                                        @if($v['status']==0)
                                            待付款
                                        @elseif($v['status']==1)
                                            已付款
                                        @elseif($v['status']==2)
                                            待收货
                                        @elseif($v['status']==3)
                                            已完成
                                        @endif
                                    </td>
                                    <td class="operation">
                                        <ul>
                                            <li><a href="/home/order/shou/{{$v['id']}}">确认收货</a></li>
                                            <li><a href="/home/order/del/{{$v['id']}}">删除订单</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr id='{{$v['id']}}' class="operation-line">
                                    <td colspan="6">
                                        总计：<span class="">
                                            <dfn>¥</dfn>{{$v['num']*$v['price']}}
                                           </span>
                                        (含运费：<dfn>¥</dfn>0.00
                                        优惠：
                                        <dfn>¥</dfn>0.00
                                        )
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach 
            </div>

            <div class='kengsi' style='display:none'>
                @foreach($data as $v)
                    @if($v['status'] == 1 || $v['status'] == 2)
                        <table class="order-table quanbu"  >
                            <colgroup>
                                <col width="155">
                                <col>
                                <col class="col1">
                                <col class="col2">
                                <col class="col3">
                                <col class="col4">
                            </colgroup>
                            <tbody>
                            <tr>

                                <th colspan="6" class="order-title">
                                    <ul>
                                        <li class="order-number">订单号：<a href="https://shop.vivo.com.cn/my/order/detail?orderNo=17021461040751412697">{{$v['order_num']}}</a>
                                        </li>
                                        <li class="order-time">成交时间:
                                            {{$v['created_at']}}
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            </tbody>

                            <tbody>
                                <tr class="order-line">
                                    <td colspan="4">
                                        <table class="order-sub-table">
                                            <colgroup>
                                                <col width="155">
                                                <col>
                                                <col class="col1">
                                                <col class="col2">
                                            </colgroup>

                                            <tbody class="prod-item ">
                                            <tr class="prod-line">
                                                <td class="prod-pic">
                                                    <a class="figure" href="https://shop.vivo.com.cn/product/208" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                                </td>
                                                <td colspan="3">
                                                    <table class="prods-info-table">
                                                        <colgroup>
                                                            <col width="80">
                                                            <col>
                                                            <col width="66">
                                                            <col width="108">
                                                        </colgroup>
                                                        <tbody>

                                                        <tr class="prod-info">
                                                            <td class="prod-name" colspan="2">
                                                                <a href="https://shop.vivo.com.cn/product/208" target="_top">{{$v['goods']}}</a>
                                                                    <br>颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['num']}}</td>
                                                            <td>
                                                                    {{$v['price']}}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td class="status">
                                        @if($v['status']==0)
                                            待付款
                                        @elseif($v['status']==1)
                                            已付款
                                        @elseif($v['status']==2)
                                            待收货
                                        @elseif($v['status']==3)
                                            已完成
                                        @endif
                                    </td>
                                    <td class="operation">
                                        <ul>
                                            <li><a href="/home/order/shou/{{$v['id']}}">确认收货</a></li>
                                            
                                            <li><a href="/home/order/del/{{$v['id']}}">删除订单</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr id='{{$v['id']}}' class="operation-line">
                                    <td colspan="6">
                                        总计：<span class="">
                                            <dfn>¥</dfn>{{$v['num']*$v['price']}}
                                           </span>
                                        (含运费：<dfn>¥</dfn>0.00
                                        优惠：
                                        <dfn>¥</dfn>0.00
                                        )
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach 
            </div>

            <div class='kengsi' style='display:none'>
                @foreach($data as $v)
                    @if($v['status'] == 3)
                        <table class="order-table quanbu"  >
                            <colgroup>
                                <col width="155">
                                <col>
                                <col class="col1">
                                <col class="col2">
                                <col class="col3">
                                <col class="col4">
                            </colgroup>
                            <tbody>
                            <tr>

                                <th colspan="6" class="order-title">
                                    <ul>
                                        <li class="order-number">订单号：<a href="https://shop.vivo.com.cn/my/order/detail?orderNo=17021461040751412697">{{$v['order_num']}}</a>
                                        </li>
                                        <li class="order-time">成交时间:
                                            {{$v['created_at']}}
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            </tbody>

                            <tbody>
                                <tr class="order-line">
                                    <td colspan="4">
                                        <table class="order-sub-table">
                                            <colgroup>
                                                <col width="155">
                                                <col>
                                                <col class="col1">
                                                <col class="col2">
                                            </colgroup>

                                            <tbody class="prod-item ">
                                            <tr class="prod-line">
                                                <td class="prod-pic">
                                                    <a class="figure" href="https://shop.vivo.com.cn/product/208" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                                </td>
                                                <td colspan="3">
                                                    <table class="prods-info-table">
                                                        <colgroup>
                                                            <col width="80">
                                                            <col>
                                                            <col width="66">
                                                            <col width="108">
                                                        </colgroup>
                                                        <tbody>

                                                        <tr class="prod-info">
                                                            <td class="prod-name" colspan="2">
                                                                <a href="https://shop.vivo.com.cn/product/208" target="_top">{{$v['goods']}}</a>
                                                                    <br>颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['num']}}</td>
                                                            <td>
                                                                    {{$v['price']}}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td class="status">
                                        @if($v['status']==0)
                                            待付款
                                        @elseif($v['status']==1)
                                            已付款
                                        @elseif($v['status']==2)
                                            待收货
                                        @elseif($v['status']==3)
                                            已完成
                                        @endif
                                    </td>
                                    <td class="operation">
                                        <ul>
                                            <li><a href="/home/order/shou/{{$v['id']}}">确认收货</a></li>
                                            
                                            <li><a href="/home/order/del/{{$v['id']}}">删除订单</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr id='{{$v['id']}}' class="operation-line">
                                    <td colspan="6">
                                        总计：<span class="">
                                            <dfn>¥</dfn>{{$v['num']*$v['price']}}
                                           </span>
                                        (含运费：<dfn>¥</dfn>0.00
                                        优惠：
                                        <dfn>¥</dfn>0.00
                                        )
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach 
            </div>

            <div class='kengsi' style='display:none'>
                @foreach($data as $v)
                    @if($v['status'] == 4)
                        <table class="order-table quanbu"  >
                            <colgroup>
                                <col width="155">
                                <col>
                                <col class="col1">
                                <col class="col2">
                                <col class="col3">
                                <col class="col4">
                            </colgroup>
                            <tbody>
                            <tr>

                                <th colspan="6" class="order-title">
                                    <ul>
                                        <li class="order-number">订单号：<a href="https://shop.vivo.com.cn/my/order/detail?orderNo=17021461040751412697">{{$v['order_num']}}</a>
                                        </li>
                                        <li class="order-time">成交时间:
                                            {{$v['created_at']}}
                                        </li>
                                    </ul>
                                </th>
                            </tr>
                            </tbody>

                            <tbody>
                                <tr class="order-line">
                                    <td colspan="4">
                                        <table class="order-sub-table">
                                            <colgroup>
                                                <col width="155">
                                                <col>
                                                <col class="col1">
                                                <col class="col2">
                                            </colgroup>

                                            <tbody class="prod-item ">
                                            <tr class="prod-line">
                                                <td class="prod-pic">
                                                    <a class="figure" href="https://shop.vivo.com.cn/product/208" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                                </td>
                                                <td colspan="3">
                                                    <table class="prods-info-table">
                                                        <colgroup>
                                                            <col width="80">
                                                            <col>
                                                            <col width="66">
                                                            <col width="108">
                                                        </colgroup>
                                                        <tbody>

                                                        <tr class="prod-info">
                                                            <td class="prod-name" colspan="2">
                                                                <a href="https://shop.vivo.com.cn/product/208" target="_top">{{$v['goods']}}</a>
                                                                    <br>颜色：{{$v['color']}}
                                                            </td>
                                                            <td>{{$v['num']}}</td>
                                                            <td>
                                                                    {{$v['price']}}
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>


                                    </td>
                                    <td class="status">
                                        @if($v['status']==0)
                                            待付款
                                        @elseif($v['status']==1)
                                            已付款
                                        @elseif($v['status']==2)
                                            待收货
                                        @elseif($v['status']==3)
                                            已完成
                                        @else
                                            已关闭
                                        @endif
                                    </td>
                                    <td class="">
                                        <ul>
                                            <li><a href="/home/order/shou/{{$v['id']}}">确认收货</a></li>
                                            
                                            <li><a href="/home/order/del/{{$v['id']}}">删除订单</a></li>
                                        </ul>
                                    </td>
                                </tr>


                                <tr id='{{$v['id']}}' class="operation-line">
                                    <td colspan="6">
                                        总计：<span class="">
                                            <dfn>¥</dfn>{{$v['num']*$v['price']}}
                                           </span>
                                        (含运费：<dfn>¥</dfn>0.00
                                        优惠：
                                        <dfn>¥</dfn>0.00
                                        )
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                @endforeach 
            </div>
        </dd>
    </dl>

    <div>
        <form action="https://shop.vivo.com.cn/my/order" id="orderPayform" method="post"></form>
    </div>


    <div class="span12 clearfix">

    </div>
</article>

<script src='/ho/ddxq/jquery-1.8.3.js'></script>
<script type="text/javascript">
    $('.statistic-tags').each(function(){
        $(this).find('li').click(function(){
            $('li').attr('class','off');
            $(this).attr('class','on');
            var index = $(this).index();
            $('.kengsi').css('display','none');
            $('.kengsi:eq('+index+')').css('display','block');
        });
    });
</script>
@endsection
