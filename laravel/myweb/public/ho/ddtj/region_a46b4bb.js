window.jQuery&&!function(n){function e(e){e&&n.extend(this,{provinces:webCtx+"/region/provinces/json",cityAreas:webCtx+"/region/city-areas/json",container:null},e),this.Els=n(this.container).find("select"),this.init()}n.extend(e.prototype,{init:function(){this.data={province:null,area:[]},this.getProvince()},render:function(e,t){var i=this.Els[e];n(i).html(this.getOptions(t)).show(),this.handleEvent(i,e),this.value&&(n(i).val(this.value[e]),2==e&&(this.value=null)),n(i).trigger("change")},handleEvent:function(e,t){var i=this;return 2==t||n(e).data("handled")?!1:(n(e).data("handled",!0),void n(e).on("change",function(){var a=i.Els.eq(0).find("option:selected").attr("code");return"_NULL_"===n(e).val()?void n(e).nextAll().hide():void(0==t?i.render(1,i.getAreas(a)):n.each(i.data.area[a],function(t,a){a.n==n(e).val()&&i.render(2,a.c)}))}))},getOptions:function(e){var t=[];return t.push('<option value="_NULL_">请选择</option>'),"undefined"!=typeof e[0].code?n.each(e,function(n,e){t.push('<option code="'+e.code+'" value="'+e.name+'">'+e.name+"</option>")}):"undefined"!=typeof e[0].n?n.each(e,function(n,e){t.push('<option value="'+e.n+'">'+e.n+"</option>")}):n.each(e,function(n,e){t.push('<option value="'+e+'">'+e+"</option>")}),t.join("")},getProvince:function(){var e=this;n.ajax({url:e.provinces,dataType:"json",success:function(n){e.data.provinces=n,e.render(0,n)}})},getAreas:function(e){var t=this;return t.data.area[e]||n.ajax({url:t.cityAreas,data:{p:e},async:!1,success:function(n){t.data.area[e]=n}}),t.data.area[e]},setValue:function(n){this.value=n,this.Els.eq(0).val(n[0]).trigger("change")}}),window.Region=e}(window.jQuery);