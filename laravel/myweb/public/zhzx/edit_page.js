
  	function cod(e){
	    var Delaytime = 60;
	    e.disabled= true;
	    var Delayval = window.setInterval(SetRemainTime, 1000);
	    function SetRemainTime() {
	    	if (Delaytime > 0) {
	    		$(e).css("background","#ededed");
	    		e.value = "获取验证码(" + Delaytime +"秒)";
	    		Delaytime = Delaytime - 1;
	    		
	    	} else {
	        	window.clearInterval(Delayval);
	        	e.value = "获取验证码";
	        	e.removeAttribute("disabled");
	        	$(e).css("background","#ccc");
	        }
	    }
	}

  	var patternName=/^(?!_)(?!.*?_$)[a-zA-Z0-9_]{3,15}|[\u4e00-\u9fa5]{2,7}$/;
	var patternPhone = /^((\+86)|(86))?(1)\d{10}$/; 
	var patternEmail = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var patternPwd=/^[a-zA-Z0-9~!@#$%^&*()=+-\_\|.\?\/\\\[\]{};:'",<>]{6,16}$/;
  	
  	function inner ( tagname , content) {
 		var objs=$(tagname);
 		 objs.html(content);
 		objs.show();
    }
  	
  	

//后台验证成功时的样式
function hright_stle(id,content) {
	$("#"+id).removeClass("error_border").addClass("normal_border");	
	$("#"+id).siblings(".error_word").show().removeClass("wrong_ico").addClass("right_ico").html(content);  	
}

//后台失败时的样式
function herror_stle(id,content) {
	$("#"+id).removeClass("normal_border").addClass("error_border");	 
    $("#"+id).siblings('.error_word').show().removeClass("right_ico").addClass("wrong_ico").html(content); 	
}
  	
  	

	
	function normalt_stle (e) {
		$(e).removeClass("error_border").addClass("normal_border");	
		$(e).siblings(".error_word").hide();
	}
	
	
	function right_stle (e,content) {
		$(e).removeClass("error_border").addClass("normal_border");	
		$(e).siblings(".error_word").show().removeClass("wrong_ico").addClass("right_ico").html(content);  	
	}

	
	function error_stle (e,content) {
		$(e).removeClass("normal_border").addClass("error_border");	 
	    $(e).siblings('.error_word').show().removeClass("right_ico").addClass("wrong_ico").html(content); 	
	}

	//判断之前是否有设置密保
	 $(document).ready(function(){
		if (1<0) {
			$("#security_question2").show();
			$("#security_question2").siblings('.hide_box').hide();
		} else{
			$("#security_question1").show();
			$("#security_question1").siblings('.hide_box').hide();
			
		};
	})

	 // 进入设置密保问题
	function in_set () {
		location.href = "security_question.html";	
		 return false;
	}

	// 如果是绑定手机号
	function iner_pasd () {
		location.href = "enter_password.html";	
		 return false;
	}
	// 如果是绑定邮箱
	function iner_pasd2 () {
		location.href = "enter_password2.html";	
		 return false;
	}

	// 进入设置修改绑定手机号
	function iner_x () {
		location.href = "recompose_phone.html";	
		 return false;
	}

	// 进入设置修改绑定邮箱
	function iner_x2 () {
		location.href = "recompose_email.html";	
		 return false;
	}

	// 进入绑定邮箱
	function iner_email () {
		location.href = "comin_email.html";	
		 return false;
	}

	
    function email () {
    	var str=$(".email").html();
		var arr=str.split("@");  
		var all_email=arr[1];  
		var get_email=all_email.substring  (0,3); 
		switch(get_email){
			case "sin":
			  window.open("http://mail.sina.com.cn");
			  break;
			case "yea":
			  window.open("http://www.yeah.net");
			  break;
			case "yah":
			  window.open("http://mail.cn.yahoo.com");
			  break;
			case "qq.":
			  window.open("http://mail.qq.com/");
			  break;
			case "139":
			  window.open("http://mail.10086.cn");
			  break;
			case "21c":
			  window.open("http://mail.21cn.com");
			  break;
			case "soh":
			  window.open("http://mail.sohu.com");
			  break;
			  case "126":
			  window.open("http://mail.126.com");
			  break;
			case "gma":
			  window.open("https://accounts.google.com/ServiceLogin?service=mail&continue=https://mail.google.com/mail/&hl=zh-CN#__utma=29003808.993752852.1382081171.1382081171.1382081171.1&__utmb=29003808.0.10.1382081171&__utmc=29003808&__utmx=-&__utmz=29003808.1382081171.1.1.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=(not%20provided)&__utmv=-&__utmk=193873262");
			  break;
			case "fox":
			  window.open("http://mail.qq.com/cgi-bin/loginpage?t=fox_loginpage&sid=,2,zh_CN&r=b5ea9ae5ee13f0d80054e5dca9010f40");
			  break;
			case "hot":
			 window.open("http://login.live.com");
			  break;
			default:
			    window.open("http://mail.163.com");
		}
		return false;  

 	}

$(function  () {
	$(".completion:first").focus();

	$("dd a").click(function  () {
		$("dd a").css("color","#4f4e4e").find("span").removeClass("a_span");
		$(".left dd").removeClass("dd_bg");
		$(this).css("color","#fff").parent().addClass("dd_bg").find("span").addClass("a_span");		
	})


	function checkpasd (e,content1,content2) {
		$(e).focus(function  () {
			normalt_stle(this);
			inner("#prompt", "");
		})
		$(e).blur(function  () {		
			var vals=$.trim($(this).val());
			if (vals) {
				normalt_stle(this);
			} else{
				var font_wor=$(this).siblings(".front_word,.front_word2").html()
				if (font_wor) {
					var arr=font_wor.split("：")[0];   
					var reg=/&nbsp;+/g; 
					var new_word=arr.replace(reg,"");
					error_stle($(this),new_word+content2);
				} else{
					error_stle($(this),"内容"+content2);
				};
			};	
		})		
	}
	checkpasd(".completion","","不能为空");


	//自定义问题
	/**
	$(".state").change(function  () {
		var sle_vals=$.trim($(this).val());
		if (sle_vals=="zidingyi") {
			$(this).parent().siblings('.custom1').show();
		} else{
			$(this).parent().siblings('.custom1').hide();
		};
	});*/
	
})