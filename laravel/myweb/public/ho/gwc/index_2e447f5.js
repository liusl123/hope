$(function(){
    var e,
    i={},
    t={
        init:function(){
            e=this,
            e.initEvent(),
            e.initPageView(),
            e.calculateTotal()
        },
        initEvent:function(){
            $(".J_goShopping").on("click",function(){
                window.location=webCtx+"/index.html"
            }),
            $(".J_viewCheckAll").on("click.checkAll",function(){
                $(this).hasClass("invalid")||($(this).hasClass("checked")?($(".J_viewCheckAll").removeClass("checked"),
                $(".J_viewCheckBox").removeClass("checked")):($(".J_viewCheckAll").addClass("checked"),
                $(".J_viewCheckBox").each(function(){
                    $(this).hasClass("invalid")||$(this).addClass("checked")
                })),
                e.calculateTotal())}
                ),
            $(".J_viewCheckBox").on("click.checkView",function(){
                $(this).hasClass("invalid")||($(this).hasClass("checked")?($(this).removeClass("checked"),
                $(".J_viewCheckAll").removeClass("checked")):$(this).addClass("checked"),
                e.changAllStatus(),
                e.calculateTotal())
            });
            var t;
            $(".J_servicePanel").hover(function(){
                var e=$(this),i=e.closest(".J_viewTBody"),
                n=[];
                t=setTimeout(function(){
                    e.find(".J_servicePopup").slideDown("fast"),e.find(".J_serviceItem").removeClass("on"),
                    i.find(".J_selServiceInfo").each(function(){
                        var i=$(this).attr("data-name"),
                        t=$(this).attr("data-skuId");
                        n.push(i),
                        e.find("li[data-skuId="+t+"]").addClass("on")}),
                        e.find(".J_serviceTip").text("已选："+n.join(","))
                },300)},
            function(){
                clearTimeout(t),
                e.closeServicePanel($(this))
            }),
            $(".J_serviceCancelBtn").on("click",function(){
                e.closeServicePanel($(this).closest(".J_servicePanel"))
            }),
            $(".J_serviceItem").on("click",function(){
                $(this).hasClass("on")?$(this).removeClass("on"):($(this).hasClass("broken")?$(".broken").removeClass("on"):$(".delay").removeClass("on"),
                $(this).addClass("on"));
                var e=$(this).closest(".J_servicePanel"),
                i=[];
                e.find(".on").each(function(){
                    i.push($(this).text())
                }),
                e.find(".J_serviceTip").text("已选："+i.join(","))
            }),
            $(".J_serviceConfirmBtn").on("click",function(){
                if(!$(this).hasClass("invalid")){
                    var i=$(this).closest(".J_viewTBody"),
                    t=i.find(".J_gitServiceTable"),
                    n=t.find(".J_servicePanel"),
                    a=t.find(".J_selServiceTr");
                    e.closeServicePanel(n);
                    for(var o={
                        submitUrl:"/shoppingcart/cartEdit",
                        isAsync:!0,
                        selectedServiceList:function(i){
                            var t=[];
                            return i.find("li.on").each(function(){
                                var i=e.initSimpleSku($(this).find(".J_serviceInfo"));
                                i.className=12==i.categoryId?"service-item-broken":"service-item-delay",
                                t.push(i)}),
                            t},
                        dealResult:function(n){
                            if(200==n.retCode){
                                e.changeViewStatus(i,0,"",null),e.changAllStatus(),a.remove();
                                for(var o=0;o<s.length;o++)t.append(template("J_template_service",s[o]));
                                return void e.calculateViewAndTotalAmount(i)
                            }
                            if(n.retMsg.match("^{(.+:.+,*){1,}}$")){
                                var c=$.parseJSON(n.retMsg);
                                e.changeViewStatus(i,c.operate,c.tip,c.msg)
                            }else e.changeViewStatus(i,2,"",n.retMsg)
                        }
                    },
                    c=e.groupConfirmParameter(i),
                    s=o.selectedServiceList(n),
                    r=[],l=0;l<s.length;l++)r.push(s[l].skuId);
                    c.sSkuIds=r,e.confirmSimpleAjax(c,o)
                }
            }),
            // $(".J_reduceNum").on("click",function(){
            //     if(!$(this).hasClass("invalid")){
            //         var i=$(this).closest(".J_viewTBody"),
            //         t=i.find(".J_viewNum"),
            //         n=parseInt(t.val());
            //         1>=n||e.changeViewNum($(this).closest(".J_viewTBody"),-1)
            //     }
            // }),
            // $(".J_addNum").on("click",function(){
            //     if(!$(this).hasClass("invalid")){
            //         var i=$(this).closest(".J_viewTBody"),
            //         t=i.find(".J_viewNum"),
            //         n=parseInt(t.val());
            //         return n>=3?void new Dialog({
            //             confirmBtn:!0,content:"温馨提示:商品数量不可以超过3件！"
            //         }).show():void e.changeViewNum(i,1)
            //     }
            // }),
            // $(".J_viewNum").on("blur",function(){
            //     if(!$(this).hasClass("invalid")){
            //         var i=parseInt($(this).val());
            //         isNaN(i)&&($(this).val(1),
            //         new Dialog({
            //             confirmBtn:!0,
            //             content:"温馨提示:请填写数字！"
            //         }).show()),
            //         0>=i&&($(this).val(1),
            //         new Dialog({
            //             confirmBtn:!0,content:"温馨提示:请填写正整数！"
            //         }).show()),
            //         i>3&&($(this).val(1),
            //         new Dialog({
            //             confirmBtn:!0,content:"温馨提示:商品数量不可以超过3件！"
            //         }).show()),
            //         e.changeViewNum($(this).closest(".J_viewTBody"),null)
            //     }
            // }),
            $(".J_delSingle").on("click",function(){
                var i=$(this).closest(".J_viewTBody"),
                t=i.find(".J_viewInfo").attr("data-uniqueCode"),
                n={uniqueCodes:t},
                a={
                dialogTitle:"提示信息",
                dialogContent:"确定将该商品从购物车中删除吗？",
                dialogConfirm:function(){
                    var t={
                        submitUrl:"/home/cart/del",
                        isAsync:!0,
                        dealResult:function(t){
                            if(200==t.retCode)return e.noneViewRefreshPage(1),
                            i.remove(),
                            e.calculateTotal(),
                            e.refreshShopCartNumFromCookie(),
                            void e.changAllStatus();
                            if(t.retMsg.match("^{(.+:.+,*){1,}}$")){
                                var n=$.parseJSON(t.retMsg);
                                e.changeViewStatus(i,n.operate,n.tip,n.msg)
                            }else e.changeViewStatus(i,2,null,t.retMsg)
                        }
                    };
                    e.confirmSimpleAjax(n,t)
                }
            };
            e.confirmDialogSimple(n,a)
        }),$(".J_delMultiple").on("click",function(){var t=$(".J_viewCheckBox.checked");if(0==t.length)return void new Dialog({confirmBtn:!0,cancelBtn:!0,title:"至少选中一种商品",icon:"warning"});var n=[],a=[];t.each(function(){var e=$(this).attr("data-uniqueCode");n.push(e),$(this).closest(".J_viewTBody").find(".J_favorite").length>0&&a.push(i[e].mainSku.skuId)});var o={uniqueCodes:n},c={dialogTitle:"是否删除商品？",dialogConfirmText:"删除",dialogCancelText:"移入收藏夹",dialogContent:"您可以选中移到我的收藏，或删除商品",dialogConfirm:function(){var i={submitUrl:"/shoppingcart/cartDel",isAsync:!0,dealResult:function(i){if(200==i.retCode&&e.refreshPage(),i.retMsg.match("^{(.+:.+,*){1,}}$")){var t=$.parseJSON(i.retMsg);e.changeViewStatus(null,t.operate,null,t.msg)}else e.changeViewStatus(null,null,null,i.retMsg)}};e.confirmSimpleAjax(o,i)},dialogCancel:function(){if(!LoginConfirm.isLogin())return void LoginConfirm.redirect();if(a.length>0){var i={submitUrl:"/my/favorite/add",isAsync:!0,dealResult:function(){}};e.confirmSimpleAjax({goodsIds:a},i)}c.dialogConfirm()}};e.confirmDialogNormal({uniqueCodes:n},c)}),$(".J_favorite").on("click",function(){if(!LoginConfirm.isLogin())return void LoginConfirm.redirect();var t=$(this).attr("data-skuId"),n=$(".J_favorite[data-skuId="+t+"]"),a=$(this).attr("data-uniqueCode"),o={submitUrl:"/my/favorite/add",isAsync:!0,dealResult:function(){var e=new Dialog({content:"收藏成功",icon:"success"});e.show(),setTimeout(function(){e.hide()},3e3),n.replaceWith($("<span>已收藏</span>"))}};e.confirmSimpleAjax({goodsId:i[a].mainSku.skuId},o)}),$(".J_favoriteMultiple").on("click",function(){var t=$(".J_viewCheckBox.checked");if(0==t.length)return void new Dialog({confirmBtn:!0,cancelBtn:!0,title:"至少选中一种商品",icon:"warning"});if(!LoginConfirm.isLogin())return void LoginConfirm.redirect();var n=[],a=[];t.each(function(){var e=$(this).attr("data-uniqueCode");n.push(e),$(this).closest(".J_viewTBody").find(".J_favorite").length>0&&a.push(i[e].mainSku.skuId)});var o={dialogTitle:"是否移入收藏夹？",dialogContent:"移动后选中商品将不在购物车中显示",dialogConfirm:function(){if(a.length>0){var i={submitUrl:"/my/favorite/add",isAsync:!0,dealResult:function(){}};e.confirmSimpleAjax({goodsIds:a},i)}this.delConfirm()},delConfirm:function(){var i={submitUrl:"/shoppingcart/cartDel",isAsync:!0,dealResult:function(i){if(200==i.retCode&&e.refreshPage(),i.retMsg.match("^{(.+:.+,*){1,}}$")){var t=$.parseJSON(i.retMsg);e.changeViewStatus(null,t.operate,null,null)}else e.changeViewStatus(null,null,null,i.retMsg)}};e.confirmSimpleAjax({uniqueCodes:n},i)}};e.confirmDialogSimple({uniqueCodes:n},o)}),
$(".J_btnConfirm").on("click",function(){
    var i=$(".J_viewCheckBox.checked");
    if(0==i.length)return void new Dialog({
        confirmBtn:!0,cancelBtn:!0,title:"至少选中一种商品",icon:"warning"
    });
    var t=[],n=[],a=!0,o=!0;i.each(function(){
        var i=$(this).closest(".J_viewTBody");
        n.push($(this).attr("data-uniqueCode"));
        var c={
            submitUrl:"/shoppingcart/sufficient",
            isAsync:!0,
            dealResult:function(t){
                if(200==t.retCode)return void e.changeViewStatus(i,0,null,null);
                if(t.retMsg.match("^{(.+:.+,*){1,}}$")){
                    o=!1;var n=$.parseJSON(t.retMsg);
                    return void e.changeViewStatus(i,n.operate,n.tip,null)
                }a=!1
            }
        };
        t.push(e.confirmSimpleAjax(e.groupConfirmParameter(i),c))
    }),
    $.when.apply(null,t).done(function(){
        return e.changAllStatus(),
        a?o?void(window.location.href=webCtx+"/order/cart/confirm?uniqueCodes="+n):void new Dialog({
            confirmBtn:!0,content:"温馨提示:您所选购的部分商品暂时不能购买！"
        }).show():void new Dialog({
            confirmBtn:!0,content:"温馨提示:当前服务器太忙，请稍后重试！"
        }).show()})
})},
            changeViewStatus:function(i,t,n,a){
            	if(null!=i)var o=i.find(".J_operate"),c=i.find(".J_viewCheckBox"),s=i.find(".J_viewNum"),r=i.find(".J_tip");
            	null!=n&&(""==n?(r.text(""),r.hide()):(r.text(n),r.show())),
            	null!=a&&new Dialog({
            		confirmBtn:!0,
            		content:"温馨提示:"+a
            	}).show(),
            	0==t&&(o.removeClass("invalid"),
            	s.removeAttr("readonly")),
            	1==t&&(o.addClass("invalid"),
            		c.removeClass("checked"),
            		s.attr("readonly","readonly")),
            	2==t&&c.removeClass("checked"),
            	3==t&&(new Dialog({
            		confirmBtn:!0,
            		content:"温馨提示:登录状态变更，即将刷新页面！",
            		confirmCallback:function(){
            			e.refreshPage()
            		}
            	}).show(),
            	setTimeout(function(){
            		e.refreshPage()
            	},3e3))
            },
           	changAllStatus:function(){var e=!0,i=!0,t=$(".J_viewCheckAll");$(".J_viewCheckBox").each(function(){$(this).hasClass("invalid")||(i=!1,$(this).hasClass("checked")||(e=!1))}),(i||!e)&&t.removeClass("checked"),i&&t.addClass("invalid"),!i&&e&&t.addClass("checked")},noneViewRefreshPage:function(i){$(".J_viewTBody").length<=i&&e.refreshPage()},refreshPage:function(){window.location.href=webCtx+"/shoppingcart"},changeViewNum:function(i,t){var n=i.find(".J_viewNum"),a=!0,o=parseInt(n.val());if(null!=t){var c=o+t;c=c>3?3:c,c=1>c?1:c,a=c!=o,o=c}if(a){var s=e.groupConfirmParameter(i);s.num=o;var r={submitUrl:"/shoppingcart/cartEdit",isAsync:!0,dealResult:function(t){if(200==t.retCode)n.val(o),e.changeViewStatus(i,0,"",null),e.calculateViewAndTotalAmount(i);else if(t.retMsg.match("^{(.+:.+,*){1,}}$")){var a=$.parseJSON(t.retMsg);e.changeViewStatus(i,a.operate,a.tip,a.msg)}else e.changeViewStatus(i,null,null,t.retMsg);e.changAllStatus(),e.refreshShopCartNumFromCookie()}};e.confirmSimpleAjax(s,r)}},closeServicePanel:function(e){e.find(".J_servicePopup").stop(!0,!0).slideUp("fast")},confirmSimpleAjax:function(e,i){return $.ajax({url:webCtx+i.submitUrl,type:"POST",async:i.isAsync,traditional:!0,data:e,success:function(e){i.dealResult(e)}})},confirmDialogSimple:function(e,i){new Dialog({confirmBtn:!0,cancelBtn:!0,title:i.dialogTitle,content:i.dialogContent,icon:"warning",confirmCallback:function(){i.dialogConfirm(e)}}).show()},confirmDialogNormal:function(e,i){new Dialog({confirmBtn:!0,cancelBtn:!0,title:i.dialogTitle,confirmText:i.dialogConfirmText,cancelText:i.dialogCancelText,content:i.dialogContent,icon:"warning",confirmCallback:function(){i.dialogConfirm(e)},cancelCallback:function(){i.dialogCancel(e)}}).show()},groupConfirmParameter:function(e){var t=e.find(".J_viewInfo").attr("data-uniqueCode"),n=i[t],a=parseInt(e.find(".J_viewNum").val()),o=[];e.find(".J_selServiceInfo").each(function(){o.push($(this).attr("data-skuId"))});var c=[];if(2==n.cartType)for(var s=0;s<n.bundleList.length;s++)c.push(n.bundleList[s].skuId);return{cartType:n.cartType,num:a,skuId:n.mainSku.skuId,sSkuIds:o,suiteCode:n.suiteCode,bSkuIds:c}},refreshShopCartNumFromCookie:function(){$("body").trigger("cartProductNumChangeEvent")},calculateViewAndTotalAmount:function(i){e.calculateViewAmount(i,null),e.calculateTotal()},
           	calculateViewAmount:function(t,n){
           		null==n&&(n=i[t.find(".J_viewInfo").attr("data-uniqueCode")]);
           		var a,o=0,c=0,s=0,r=parseInt(t.find(".J_viewNum").val());
           		o+=n.viewVcoin,
           		c+=n.viewMarketPrice,
           		s+=n.viewSalePrice,
           		t.find(".J_selServiceInfo").each(function(){
           			var i=e.initSimpleSku($(this));
           			o+=i.vcoin,
           			c+=i.salePrice,
           			s+=i.salePrice}),
           			o*=r,
           			c*=r,
           			s*=r,
           			a=c-s,
           			t.find(".J_viewMarketPrice").val(c.toFixed(2)),
           			t.find(".J_viewDiscount").text(a.toFixed(2)),
           			t.find(".J_viewVcoin").text(o),
           			t.find(".J_viewSalePrice").text(s.toFixed(2))
           		},
           	calculateTotal:function(){
           		var e,i=0,t=0,n=0;
           		$(".J_viewCheckBox.checked").each(function(){
       				var e=$(this).closest(".J_viewTBody"),a=parseInt(e.find(".J_viewNum").val());
       				t+=e.find(".J_mainInfo,.J_bundleInfo").length*a,
       				n+=parseFloat(e.find(".J_viewMarketPrice").val()),
       				i+=parseFloat(e.find(".J_viewSalePrice").text())
       			}),
       			e=n-i,
       			$("#J_totalMarketPrice").text(n.toFixed(2)),
           		$("#J_totalSalePrice").text(i.toFixed(2)),
           		$("#J_totalDiscount").text(e.toFixed(2)),
           		$("#J_totalSkuNum").text(t)
           	},
           	initPageView:function(){$(".J_viewTBody").each(function(){var t=$(this),n=e.initView(t);e.initSkuView(t,n),i[n.uniqueCode]=n}),e.changAllStatus()},initSkuView:function(i,t){e.calculateViewAmount(i,t);var n=t.suiteStatus;(1==t.cartType||0==n)&&(n=e.checkSimpleSkuStatus(t.mainSku));var a=e.getTipByStatus(t.cartType,t.viewStore,n);0!=n?e.changeViewStatus(i,1,a,null):(e.changeViewStatus(i,0,a,null),i.find(".J_viewCheckBox").addClass("checked")),t.viewStatus=n},checkSimpleSkuStatus:function(e){return 0==e.disabled?4:0==e.marketable?3:0==e.fullpay?6:0==e.store?2:0},getTipByStatus:function(e,i,t){var n=null;return 1==e?6==t?n="商品已更新！":2==t?n="无库存！":3==t?n="已下架！":4==t?n="商品已删除！":5>=i&&(n="仅剩"+i+"件！"):0!=t&&(1==t?n="套餐已更新！":2==t?n="套餐无库存！":3==t?n="套餐内商品已下架！":4==t?n="套餐内商品已删除！":6==t&&(n="套餐内商品已更新！")),n},initView:function(e){var i,t=this,n={},a=e.find(".J_viewInfo"),o=0,c=0,s=0;n.uniqueCode=a.attr("data-uniqueCode"),n.cartType=a.attr("data-cartType"),n.mainSku=t.initSimpleSku(e.find(".J_mainInfo")),1==n.cartType&&(o+=n.mainSku.vcoin),c+=n.mainSku.marketPrice,s+=n.mainSku.salePrice,i=n.mainSku.store;var r=[];e.find(".J_giftInfo").each(function(){var e=t.initSimpleSku($(this));r.push(e)}),n.giftList=r;var l=[];if(e.find(".J_serviceInfo").each(function(){l.push(t.initSimpleSku($(this)))}),n.serviceList=l,2==n.cartType){n.suiteCode=a.attr("data-suiteCode"),n.suiteDiscount=parseFloat(a.attr("data-suiteDiscount")),n.suiteVcoin=parseInt(a.attr("data-suiteVcoin")),n.suiteStatus=a.attr("data-suiteStatus"),o+=n.suiteVcoin,s-=n.suiteDiscount;var u=[];e.find(".J_bundleInfo").each(function(){var e=t.initSimpleSku($(this));c+=e.marketPrice,s+=e.salePrice,i<e.store&&(i=e.store),u.push(e)}),n.bundleList=u}return n.viewStore=i,n.viewVcoin=o,n.viewMarketPrice=c,n.viewSalePrice=s,n},initSimpleSku:function(e){var i=[];return i.skuId=e.attr("data-skuId"),i.name=e.attr("data-name"),i.salePrice=parseFloat(e.attr("data-salePrice")),i.marketPrice=parseFloat(e.attr("data-marketPrice")),i.vcoin=parseInt(e.attr("data-vcoin")),i.marketable=e.attr("data-marketable"),i.disabled=e.attr("data-disabled"),i.fullpay=e.attr("data-fullpay"),i.store=e.attr("data-store"),i.categoryId=e.attr("data-categoryId"),i}};t.init()});