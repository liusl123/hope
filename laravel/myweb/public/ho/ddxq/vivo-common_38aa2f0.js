var VIVO_UI={};window.jQuery&&!function(e){VIVO_UI.mask=function(){e("body > .mask").length||e("body").append("<div class='mask'></div>"),e("body > .mask").show()},VIVO_UI.unmask=function(){e("body > .mask").hide()},VIVO_UI.middle=function(e){e&&e.length&&e.css({top:"50%","margin-top":-(e.outerHeight()/2)})},VIVO_UI.HighLightNav=function(t){e("#navigator > ul li").removeClass("current").eq(t).addClass("current")},VIVO_UI.HighLightMyCenterNav=function(t){e(".menu-bar .menu-item a").each(function(a,n){return e.trim(e(n).text())===t?(e(this).parent().addClass("on"),!1):void 0})}}(window.jQuery),$(function(){!function(){var e=$("#header"),t=e.find(".head-search"),a=t.find("input"),n=$("#j_SearchTrigger"),c=t.find("a.close"),i=!0;n.on("click",function(){return i?(t.slideDown(300),a.focus().val(""),i=!1):t.stop().slideUp(300,function(){$(this).css({display:"none"}),i=!0}),!1}),c.on("click",function(){return n.click(),!1}),$("#j_UserMenuTrigger").hover(function(){$(this).find(".user-menu").show()},function(){$(this).find(".user-menu").hide()})}(),function(){var e=($("#header .wrapper").width(),$(document.documentElement)),t=$(document.body),a=$("#J_online-service"),n=$("#J_feedback"),c=$("#J_feedback-container"),i=$("#J_feedback-typeSelect"),o=$("#J_feedback-validateMsg"),s=$("#J_backtop"),d=s.prev(),r="active",l="clicked",u="last";$("#side-bar li > a").on("mouseenter",function(){c.is(":hidden")&&$(this).addClass(r)}).on("mouseleave",function(){c.is(":hidden")&&$(this).removeClass(r)}),$(window).on("scroll",function(){var e=$(this).scrollTop();e>500?(d.removeClass(u),s.addClass(u).fadeIn("fast")):s.fadeOut("fast",function(){s.removeClass(u),d.addClass(u)})}),a.on("click",function(){a.trigger("mouseleave")});var f={init:function(){var e=this;e.initEvent()},initEvent:function(){var e=this;$("#J_feedback-kaptchaImage,#J_feedback-kaptchaButton").click(function(){e.changeKaptchaImage()}),i.change(function(){e.selectFeedbackType()}),n.on("click",function(t){t.target===n[0]&&(n.addClass(l),c.fadeIn("fast"),e.changeKaptchaImage())}),$("#J_feedback-close").on("click",function(){e.closeFeedback()}),e.confirmFeedback()},selectFeedbackType:function(){var e=$("#J_feedback-typeSelect").find("option:selected").text();e||(e=$("#J_feedback-typeSelect").find("option[selected='selected']").text()),$("#J_feedback-typeDesc").text(e)},closeFeedback:function(){c.fadeOut("fast",function(){n.removeClass(r).removeClass(l)})},clearFeedback:function(){var e=this;c.find("textarea,input[type='text'],select").val(""),e.selectFeedbackType(),e.changeKaptchaImage()},changeKaptchaImage:function(){$("#J_feedback-kaptchaImage").attr("src",webCtx+"/captcha/kaptcha.jpg?"+Math.floor(100*Math.random()))},buildVaildateFeedbackDto:function(e){var t=i.val();if(0>=t||t>5)return"请选择问题类型！";e.feedbackType=t;var a=$("#J_feedback-content").val();if(0==a.replace(/\ +/g,"").length)return"请输入建议或问题！";if(a.length>200||a.length<5)return"建议或问题限5-200字符！";e.content=a;var n=$("#J_feedback-contact").val();if(n.length>50)return"联系方式限50字符！";e.contact=n;var c=$("#J_feedback-securityCode").val();return 0==c.replace(/\ +/g,"").length?"请输入验证码！":void(e.securityCode=c)},confirmFeedback:function(){var e=this;$("#J_feedback-submitButton").on("click",function(){var t={},a=e.buildVaildateFeedbackDto(t);return a?(o.html(a),void o.css("visibility","visible")):(o.html(""),o.css("visibility","hidden"),void $.ajax({url:webCtx+"/feedback/confirm",type:"POST",data:t,success:function(t){200==t.retCode?(e.clearFeedback(),new Dialog({title:"提交成功，感谢您的反馈！",icon:"success",confirmBtn:!0,confirmCallback:function(){e.closeFeedback()}})):(o.html(t.retMsg),o.css("visibility","visible")),500==t.retCode&&e.changeKaptchaImage()}}))})}};f.init(),s.on("click",function(){t.animate({scrollTop:0},500),e.animate({scrollTop:0},500)})}(),function(){$(".pagination .j_go").length&&$(".pagination .j_go").on("click",function(){var e=$(this).attr("data-url"),t=$(this).attr("data-total"),a=$(this).parent().find("input").val();a&&/^\d+$/.test(a)&&parseInt(a)<=t&&(location.href=e.replace("PAGENUM",a))})}(),$("img[data-src]").length&&$.fn.lazyload&&$("img[data-src]").lazyload({data_attribute:"src"}),$("input, textarea").});placeholder({customClass:"my-placeholder"})