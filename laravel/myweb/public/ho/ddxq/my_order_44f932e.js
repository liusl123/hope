$(function(){VIVO_UI.HighLightMyCenterNav("我的订单");var e={init:function(){var e=this;e.clickHighLightBtn(),e.clickHref()},clickHighLightBtn:function(){var e=this;$(".btn-highlight").on("click",function(){var t=$(this).attr("operation"),n=$(this).attr("orderNo"),o=($(this).attr("orderType"),$(this).attr("isDetail"));switch(t){case"comment":location.href=webCtx+"/my/remark/unRemark-prod?orderNo="+n;break;case"settle":$.ajax({url:webCtx+"/my/order/settle",type:"POST",data:{orderNo:n},dataType:"JSON",success:function(t){if(200==t.retCode){var i=t.paraMap;if(null!=i){var r=t.redirect;$("#orderPayform").attr("action",r),$.each(i,function(e,t){$("#orderPayform").append("<input type='hidden' name='"+e+"' value='"+t+"' />")}),$("#orderPayform").submit()}else window.location=t.redirect}else if(900==t.retCode){var a=new Dialog({title:"您的订单已经过期啦,请重新购买商品吧",icon:"warning"});$(".dialog-content").append('<a style="font-size: 18px" href="'+webCtx+'/index.html"><<再去逛逛</a>'),$(".dialog-content").addClass("hrefClass"),a.show()}else{var c=new Dialog({title:"失败",content:t.retMsg,icon:"warning"});c.show(),setTimeout(function(){c.hide(),e.windowLocation(o,n)},3e3)}},error:function(e){0==e.status?LoginConfirm.redirect():window.location.href=webCtx+"/error/forbidden"}});break;case"confirm_receipt":new Dialog({title:"是否确认收货？",confirmBtn:!0,cancelBtn:!0,confirmText:"确定",cancelText:"取消",confirmCallback:function(){$.ajax({url:webCtx+"/my/order/confirmReceipt",type:"POST",data:{orderNo:n},dataType:"JSON",success:function(){e.windowLocation(o,n)},error:function(e){0==e.status?LoginConfirm.redirect():window.location.href=webCtx+"/error/forbidden"}})}})}})},clickHref:function(){var e=this;$(".btn-href").on("click",function(){var t=$(this).attr("operation"),n=$(this).attr("orderNo"),o=$(this).attr("orderType"),i=$(this).attr("isDetail");switch(t){case"cancel":new Dialog({title:"取消订单申请",content:"温馨提示:订单成功取消后无法恢复",icon:"warning",confirmBtn:!0,cancelBtn:!0,confirmText:"确定取消",cancelText:"暂不取消",confirmCallback:function(){$.ajax({url:webCtx+"/my/order/cancel",type:"POST",data:{orderNo:n},dataType:"JSON",success:function(t){if(400==t.retCode){var r=new Dialog({title:"失败",content:"当前订单状态异常，请刷新后重试!",icon:"warning"});r.show(),setTimeout(function(){r.hide(),e.windowLocation(i,n)},3e3)}else if(200==t.retCode)if("02"==o){var a=new Dialog({title:"成功",content:"取消订单提交成功,请等待客服审核!",icon:"success"});a.show(),setTimeout(function(){a.hide(),e.windowLocation(i,n)},3e3)}else{var c=new Dialog({title:"成功",content:"取消订单提交成功!",icon:"success"});c.show(),setTimeout(function(){c.hide(),e.windowLocation(i,n)},3e3)}},error:function(e){0==e.status?LoginConfirm.redirect():window.location.href=webCtx+"/error/forbidden"}})}});break;case"refund_apply":new Dialog({title:"退款/退货申请",icon:"warning",confirmBtn:!0,cancelBtn:!0,confirmText:"确定申请",cancelText:"取消申请",confirmCallback:function(){$.ajax({url:webCtx+"/my/refund/checkApply",type:"POST",data:{orderNo:n},dataType:"JSON",success:function(t){if(200==t.retCode)location.href=webCtx+"/my/refund/apply?orderNo="+n;else{var o=new Dialog({title:"失败",content:t.retMsg,icon:"warning"});o.show(),setTimeout(function(){o.hide(),e.windowLocation(i,n)},3e3)}},error:function(e){0==e.status?LoginConfirm.redirect():window.location.href=webCtx+"/error/forbidden"}})}});break;case"refund_detail":location.href=webCtx+"/my/refund/detail?orderNo="+n}})},windowLocation:function(e,t){location.href=null==e?webCtx+"/my/order":webCtx+"/my/order/detail?orderNo="+t}};e.init()});