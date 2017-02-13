@extends('layout.homeindex')
@section('con')
<div id="content" class="cl">
    <div class="wrapper">
        <div class="buy-steps"></div>
    </div>
    <div class="container">
        <div class="wrapper">
            <div class="prod-list">
                <table class="order-table J_shopCart" cellpadding="0">
                    <thead>
                        <tr>
                            <th class="td-check" width="60">
                                <i class="checkbox J_viewCheckAll " ></i>
                            </th>
                            <th style="text-align: left;" width="160"><label for="J_checkAll" onclick="quanxuan()">全选</label></th>
                            <th style="text-align: left;">商品名称</th>
                            <th width="120">价格（元）</th>
                            <th width="120">数量</th>
                            <th width="120">优惠</th>
                            <th width="110">赠送V币</th>
                            <th width="128">小计（元）</th>
                            <th width="115">操作</th>
                        </tr>
                    </thead>
                    <form action="/home/orders/index" method='post'>
                        <tbody class="prod-item">
                            @foreach($carts as $v)
                                <tr id="{{$v['id']}}" class="prod-line">
                                    <td class="td-check">
                                        <input class="J_viewInfo" data-uniquecode="1_4020" data-carttype="1" data-suitecode="" data-suitediscount="" data-suitevcoin="" data-suitestatus="" type="hidden">
                                        <i class="checkbox J_viewCheckBox J_operate " data-uniquecode="1_4020"></i>
                                    </td>

                                    <td class="prod-pic">
                                        <a class="figure" href="https://shop.vivo.com.cn/product/249?colorSkuid=4020" target="_top"><img src="{{$v['picname']}}" alt=""></a>
                                    </td>
                                    <td class="prods-info" colspan="2">
                                        <input class="J_mainInfo" data-skuid="4020" data-saleprice="85" data-marketprice="85" data-vcoin="85" data-marketable="1" data-disabled="1" data-fullpay="1" data-store="1244" value="4020" type="hidden">
                                        <table class="prods-info-table J_gitServiceTable">
                                            <colgroup>
                                                <col width="80">
                                                <col>
                                                <col width="120">
                                            </colgroup>
                                            <tbody>
                                                <tr class="prod-info">
                                                    <td class="prod-name" colspan="2">
                                                        <a class="figure" href="https://shop.vivo.com.cn/product/249?colorSkuid=4020" target="_top">{{$v['goods']}}</a>
                                                        <br>{{$v['color']}}
                                                    </td>
                                                    <td><span>{{$v['price']}}</span></td><!--价格-->
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <span  class="number-box">
                                            <a class="reduce-num J_reduceNum J_operate" >-</a>
                                            <input class="prod-num J_viewNum J_operate" min="1" value="{{$v['num']}}" title="请输入购买量" type="text">
                                            <a class="add-num J_addNum J_operate" >+</a>
                                        </span>
                                        <span class="help-line J_tip" style="display: none;"></span>
                                    </td>
                                    <td class="J_viewDiscount">0.00</td><!--优惠-->
                                    <td class="J_viewVcoin"><span>{{$v['price']*$v['num']}}</span></td>    <!--vb-->
                                    <td class="total-price J_viewSalePrice">{{$v['price']*$v['num']}}</td><!--小计--> 
                                    <td>
                                        <input value="85.00" class="J_viewMarketPrice" type="hidden">
                                        <a class="favorite J_favorite" data-skuid="4020" data-uniquecode="1_4020">收藏</a>
                                         | <a onclick="del({{$v['id']}})" class="J_delSingle" data-uniquecode="1_4020">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </form>
                </table>
                <ul class="price-list">
                    <li class="">商品总价：<span class="price"><dfn>¥</dfn><span id="zongjia"></span></span></li>
                    <li class="discount-price">优惠：<span class="price">-<dfn>¥</dfn><span id="youhui"></span></span></li>
                </ul>
                <div class="option-box">
                    <div class="option-operation">
                        <ul>
                            <li><i class="checkbox J_viewCheckAll"></i> &nbsp; &nbsp;全选</li>
                            <li><a class="J_delMultiple" href="javascript:void(0);">删除选中的商品</a></li>
                            <li><a class="J_favoriteMultiple" href="javascript:void(0);">移入收藏夹</a></li>
                        </ul>
                    </div>
                    <div class="">已选商品<em><span id=""></span></em>件，合计（不含运费）：<span class=""><dfn>¥</dfn><span id=""></span></span>
                    </div>
                </div>
                <script type="text/javascript" src='/ho/gwc/jquery-1.8.3.js'></script>
                <script type="text/javascript">
                    // 优惠
                    function youhui(){
                        var newyh= $('.J_viewDiscount').html();
                        $('#youhui').html(newyh);
                    }
                    youhui();
                    // 实现全选操作
                    // function quanxuan(){
                    //     $('.J_viewCheckAll').each(function(){
                    //         $('.J_viewCheckBox').attrt('checked',ture);
                    //     });
                    // }
                    // 实现按钮的加减
                    $('.reduce-num').each(function(){
                        // 显现减操作
                        $(this).click(function(){
                            var num = parseInt($(this).next('input').val());
                            if(num == 1) return;
                            num--;
                            $(this).next('input').val(num);
                            // 改变小计
                            var newxiaoji = num*parseInt($(this).parents('span').parents('td').prev('td').find('span').html());
                            $(this).parents('span').parents('td').next('td').next('td').next('td').html(newxiaoji);
                            $(this).parents('span').parents('td').next('td').next('td').find('span').html(newxiaoji);
                            // 更改总计
                            count();
                            // 发送ajax更改后台购物车
                            var id = $(this).parents('span').parents('tr').attr('id');
                            sendAjax(id,'jian');
                        });
                    });
                    $('.add-num').each(function(){
                        // 实现加操作
                        $(this).click(function(){
                            var num = parseInt($(this).prev('input').val());
                            num++;
                            $(this).prev('input').val(num);
                            // 改变小计
                            var newxiaoji = num*parseInt($(this).parents('span').parents('td').prev('td').find('span').html());
                            $(this).parents('span').parents('td').next('td').next('td').next('td').html(newxiaoji);
                            $(this).parents('span').parents('td').next('td').next('td').find('span').html(newxiaoji);
                            // 更改总计
                            count();
                            // 发送ajax更改后台购物车
                            var id = $(this).parents('span').parents('tr').attr('id');
                            sendAjax(id,'jia');
                        });
                    });
                    // 发送ajax更改商品数量
                    function sendAjax(id,flag){
                        $.ajax({
                            url:'/home/cart/change',
                            data:{'id':id,'flag':flag},
                            success:function(){
                                // 不需要返回值
                            }
                        });
                    }
                    // 删除购物车中的商品
                    function del(id){
                        // 发送ajax-> 商品的删除
                        $.ajax({
                            url:'/home/cart/del',
                            data:{'id':id},
                            success:function(){
                                // 删除当前数据
                                $('#'+id).remove();
                                count();
                            }
                        });
                    }
                    // 总价的计算
                    function count(){
                        var coun = 0;
                        $('.prod-line').each(function(){
                            var xiaoji = parseFloat($(this).find('.J_viewSalePrice').html());
                            // console.log(xiaoji);
                            coun+=xiaoji;     
                        });
                        $('#zongjia').html(coun);
                    }
                    count();
                </script>
                <div class="btn-box">
                    <form action="/home/orders/index" method='post'>
                        <button class="btn-cancel J_goShopping" href="/home/goods/index.html" title="继续购物">继续购物</button>
                        {{csrf_field()}}
                        <input type="hidden" name='id' value='{{$v['id']}}' />
                        <input type="hidden" name='color' value='{{$v['color']}}' />
                        <input type="hidden" name='price' value='{{$v['price']}}' />
                        <input type="hidden" name='num' value='{{$v['num']}}' />
                        <button class="btn-confirm btn-submit J_btnConfirm" href="javascript: void(0);" title="去结算">去结算
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection