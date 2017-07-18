<!DOCTYPE html>
<html ng-app="eleme" perf-error="desktop/home/" class="ng-scope">
<head>
	<style type="text/css">@charset "UTF-8";
		[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide {
			display: none !important;
		}

		ng\:form {
			display: block;
		}

		.ng-animate-block-transitions {
			transition: 0s all !important;
			-webkit-transition: 0s all !important;
		}

		.ng-hide-add-active, .ng-hide-remove {
			display: block !important;
		}</style>
	<meta charset="utf-8">
	<meta name="renderer" content="webkit">


	<title ng-bind="SEO.title" class="ng-binding">饿了么-网上订餐_外卖_饿了么订餐官网</title>


	<meta name="format-detection" content="telephone=no, email=no">

	<meta name="application-name" content="饿了么网上订餐">
	<meta name="msapplication-tooltip" content="饿了么网上订餐">
	<meta name="msapplication-starturl" content="./">
	<meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
	<meta name="msapplication-tilecolor" content="#0088ff">
	<meta name="msapplication-task"
	      content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
	<meta name="msapplication-task"
	      content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
	<meta name="msapplication-task"
	      content="name=订单中心;action-uri=http://ele.me/profile?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
	<meta name="msapplication-task"
	      content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
	<meta property="qc:admins" content="2263606250655">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2">

	<link rel="shortcut icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png">
	<link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png" sizes="16x16">
	<link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png" type="image/png" sizes="32x32">
	<link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon.png" type="image/png" sizes="96x96">

	<link href="css/vendor.0cb970.css" rel="stylesheet">

	<link href="css/home.a9ba71.css" rel="stylesheet">


	<!--[if lte IE 8]>
	<script>window.location.href = 'https://h.ele.me/activities/landing';</script><![endif]-->

	<script src="//crayfish.elemecdn.com/www.ele.me@ref/api" data-ref="API_CONFIG"></script>
	<script src="{{asset('js/jquery-1.8.3.min.js')}}" type="text/javascript" crossorigin="anonymous"></script>
	<base href="/home/">
	<meta name="mobile-agent" content="undefined">
	<meta name="description"
	      content="饿了么是中国专业的网上订餐平台，目前已覆盖北京、上海、杭州、广州等300多个城市，提供各类中式、日式、韩式、西式、下午茶、夜宵等优质美食，并提供送餐上门服务，让订餐更加轻松，叫外卖就上饿了么！">
	<meta name="keywords" content="饿了么，网上订餐，外卖，快餐外卖，外卖网">
</head>
<body cute-title=""
      ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}"
      class="hidesidebar whitebody">

<!-- ngView:  -->
<div ng-view="" role="main" class="ng-scope">
	<div class="map ng-scope" ng-class="{mapmode: mapMode}">
		<div class="container mapcontainer">
			<div map-header=""></div>
			<div class="map-main ng-isolate-scope" ng-class="{mapmode: mapMode}" map-main="" map-mode="mapMode">
				<h2 class="map-logo"><img src="//faas.elemecdn.com/desktop/media/img/map-logo-center.4eb348.png"
				                          alt="eleme"></h2>
				<div class="map-navbar clearfix hasuserinfo" ng-class="{hasuserinfo: $root.user.user_id}">
					<div id="mapCityToggle" map-city="" hide-search-result="hideSearchResult" current-city="currentCity"
					     class="map-city ng-isolate-scope" map-mode="mapMode">
						<a onclick="showcity()" id="the_city" city="北京"  class="mapcity-current ng-binding" href="javascript:" ng-bind="mapCity.current.name"
						   ng-click="mapCity.toggle($event)">北京</a>
						<!-- ngIf: mapCity.showCities -->
                        <!-- 这里放置城市列表，由js获取后台传过来的数据json后，再由js加工输出到这里大概有1万多行。。。 -->
						<!-- end ngIf: mapCity.showCities -->
					</div>
					<div map-search="" hide-search-result="hideSearchResult" current-city="currentCity"
					     map-mode="mapMode" class="map-search ng-isolate-scope">
						<form action="/setlocationsession" method="get" id="search_form" class="mapsearch-inputbar ng-valid ng-dirty" ng-submit="search.showSuggests($event, search.keyword)">
							<input  id="position_search"
									placeholder="请输入你的收货地址（写字楼，小区，街道或者学校）" ng-model="search.keyword"
									ng-keyup="search.showSuggests($event, search.keyword)"
									ng-keydown="search.chooseSuggest($event)" ng-click="search.showSuggests($event)"
									ng-focus="search.showSuggests($event, search.keyword)" class="ng-valid ng-dirty">
                            <input type="hidden" name="address" id="position_input">
							<button class="btn-stress" type="submit">搜 索</button>
						</form>
						<div class="mapsearch-suggestlist ui-scrollbar-light" style="max-height: 348px;">
							<!-- ngIf: search.suggests.length -->
							<!-- ngIf: search.done && !search.suggests.length -->
						</div>
						<!-- ngIf: search.resultshow && !hideSearchResult && mapMode -->
					</div>
				</div>
				<div class="map-content"></div>
			</div>
			<div class="mapfooter" map-footer="">
				<div class="mapfooter-app">
					<div class="mapfooter-app-image"><img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png"
					                                      alt="扫码下载 APP"> <span>扫码下载 APP</span></div>
					<div class="mapfooter-app-text"><p>新用户首次下单</p><strong class="color-stress">最高立减20元</strong>
						<p>立即下载APP，享更多优惠吧！</p></div>
				</div>
				<p class="mapfooter-link"><a href="http://kaidian.ele.me" ubt-click="1434">我要开店</a> <a
							href="/support/about" ubt-click="1435">联系我们</a> <a href="/support/about/agreement"
				                                                               ubt-click="1436">服务条款和协议</a> <a
							href="http://jobs.ele.me" ubt-click="1437">加入我们</a> <a href="//fengniao.ele.me/">蜂鸟配送</a>
				</p>
				<div class="footer-copyright serif">增值电信业务许可证 : <a href="http://www.shca.gov.cn/" target="_blank">沪B2-20150033</a>
					| <a href="http://www.miibeian.gov.cn/" target="_blank">沪ICP备 09007032</a> | <a
							href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823"
							target="_blank">上海工商行政管理</a> Copyright ?2008-2017 上海拉扎斯信息科技有限公司, All Rights Reserved.
				</div>
				<div class="footer-police container"><a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow"
				                                        target="_blank"><img alt="已通过沪公网备案，备案号 310100103568"
				                                                             src="//faas.elemecdn.com/desktop/media/img/picp_bg.e373b3.jpg"
				                                                             height="30"></a></div>
			</div>
		</div>
	</div>
</div>

<script>
    function select(ob) {
        document.getElementById("position_input").value = ob.firstChild.innerHTML;
        $("#search_form").append("<input type='hidden' name='position' value='" + ob.firstChild.attributes[0].textContent + "' />");
        $("#search_form").append("<input type='hidden' name='city' value='" + $("#the_city").attr("city") + "' />");
        $("#search_form").append("<input type='hidden' name='address' value='" + ob.firstChild.attributes[1].textContent + "' />");
        $("div.mapsearch-suggestlist ul").remove();
        $("#search_form").submit();
    }
    
    var city_data = null;

    function showcity(){
        if(document.getElementById("city_list")){
            $("#city_list").remove();
        }else{
            var str_city="<div id=\"city_list\" class=\"mapcity-dialog ng-scope\" ng-if=\"mapCity.showCities\" ng-click=\"stopPropagation($event)\"><div class=\"mapcity-container ui-scrollbar-light\" style=\"max-height: 152px;\"><div class=\"mapcity-header\"><div class=\"mapcity-breadcrumb\"><span class=\"highlight\">选城市</span> &gt; 定位置 &gt; 叫外卖</div><h3>请选择你所在的城市</h3></div><div class=\"mapcity-guess\"><div class=\"mapcity-quickguess\"><span class=\"highlight\">猜你在</span> <button type=\"button\" name=\"button\" ng-bind=\"mapCity.guess.name\" ng-click=\"mapCity.changeCity(mapCity.guess)\" class=\"ng-binding\">北京</button></div><div class=\"mapcity-search\"><input name=\"name\" placeholder=\"请输入城市\" ng-model=\"queryText\" ng-keydown=\"mapCity.chooseFromQuery($event)\" class=\"ng-pristine ng-valid\"><!-- ngIf: mapCity.suggests.length && queryText --></div></div><!-- ngIf: mapCity.groups.$resolved --><div class=\"mapcity-list ng-scope\" ng-if=\"mapCity.groups.$resolved\"><!-- ngRepeat: (key, group) in mapCity.groups track by key -->";
            if(!city_data){
                $.ajax({
                    url:"http://mainsite-restapi.ele.me/shopping/v1/cities",
                    dataType:"json",
                    async:false,
                    success:function(data){
                        city_data = data;
                    },
                })
            }
            for(var i in city_data){
                str_city += "<dl ng-repeat=\"(key, group) in mapCity.groups track by key\" class=\"ng-scope\"><dt class=\"highlight ng-binding\" ng-bind=\"key\">" + i + "</dt>";
                for(var j=0;j<city_data[i].length;j++){
                    str_city += "<dd ng-repeat=\"city in group\" class=\"ng-scope\"><a onclick=\"select_city(this)\" href=\"javascript:\" ng-bind=\"city.name\" ng-click=\"mapCity.changeCity(city)\" class=\"ng-binding\">" + city_data[i][j].name + "</a></dd>";
                }
                str_city += "</dl>";
            }
            str_city += "</div></div></div>"; 
            $("#mapCityToggle").append(str_city);
        }
    }

    function select_city(obj) {
        document.getElementById("the_city").innerHTML = obj.innerHTML;
		$("#the_city").attr("city", obj.innerHTML)
        $("#city_list").remove();
    }


    $(function () {
        var key_1 = "";
        var key_2 = "";
        setInterval(function(){
            key_2 = $("#position_search").val();
            if(key_2 === key_1){
               // 
            }else if(key_2 === ""){
                $("div.mapsearch-suggestlist ul").remove();
            }else if(key_2 !== ""){
                //alert(document.getElementById("the_city").innerHTML);
                $.ajax({
                    url:"http://restapi.amap.com/v3/place/text?key=b24b6f5004d3b68d10bf4a0364db7a4f&keywords=" + key_2 + "&city=" + document.getElementById("the_city").innerHTML,
                    dataType:"json",
                    success:function(data){
                        $("div.mapsearch-suggestlist ul").remove();
                        var str = "<ul ng-if=\"search.suggests.length\" ng-class=\"{mapmode: mapMode}\" class=\"ng-scope\"><!-- ngRepeat: suggest in search.suggests track by $index -->";
                        for(var i=0;i<data.pois.length;i++){
                            str += "<li onclick='select(this)' ng-repeat=\"suggest in search.suggests track by $index\" ng-class=\"{suggestlight: search.suggestLight === $index}\" ng-click=\"search.chooseAction(suggest)\" ng-mouseenter=\"search.suggestLight = $index\" class=\"ng-scope\"><p location=\"" + data.pois[i].location + "\" address=\"" + data.pois[i].address + "\" class=\"suggest-name ng-binding\" ng-bind=\"suggest.name\">" + data.pois[i].name + "</p><p class=\"suggest-addr\"><span ng-bind=\"suggest.address\" class=\"ng-binding\">" + data.pois[i].address + "</span><!-- ngIf: suggest.count --><span ng-if=\"suggest.count\" ng-bind=\"' 附近有' + suggest.count + '家商家'\" class=\"ng-binding ng-scope\"> 附近有522家商家</span><!-- end ngIf: suggest.count --></p></li>";
                        }
                        str += "</ul>";
                        $("div.mapsearch-suggestlist").append(str);
                    },
                });
                key_1 = key_2;
            }
        }, 33);

        
    });

    

</script>
</body>
</html>
