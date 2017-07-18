<!DOCTYPE html>
<html ng-app="eleme" perf-error="desktop/personal/" class="ng-scope"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">
    

    <title ng-bind="SEO.title" class="ng-binding">个人中心_待评价订单 | 饿了么网上订餐</title>

    
    
    <meta name="format-detection" content="telephone=no, email=no">

    <meta name="application-name" content="饿了么网上订餐">
    <meta name="msapplication-tooltip" content="饿了么网上订餐">
    <meta name="msapplication-starturl" content="./">
    <meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-tilecolor" content="#0088ff">
    <meta name="msapplication-task" content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=订单中心;action-uri=http://ele.me/personal?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta property="qc:admins" content="2263606250655">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2">

    <link rel="shortcut icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon.png" type="image/png" sizes="96x96">

    <link href="{{ asset('css/vendor.0cb970.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/personal.d8f427.css') }}" rel="stylesheet">
    

    <!--[if lte IE 8]><script>window.location.href='https://h.ele.me/activities/landing';</script><![endif]-->

    <script src="//crayfish.elemecdn.com/www.ele.me@ref/api" data-ref="API_CONFIG"></script>
	<script src={{ asset('js/jquery-1.8.3.min.js') }}></script>
    <base href="/personal/">
  <meta name="mobile-agent" content="undefined"><meta name="description" content="饿了么是中国专业的网上订餐平台，目前已覆盖北京、上海、杭州、广州等300多个城市，提供各类中式、日式、韩式、西式、下午茶、夜宵等优质美食，并提供送餐上门服务，让订餐更加轻松，叫外卖就上饿了么！"><meta name="keywords" content="饿了么，网上订餐，外卖，快餐外卖，外卖网"></head>
  <body cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}" style="position: relative;">
  
    <div ng-switch="state.type" state="layoutState" class="ng-isolate-scope"><!-- ngSwitchWhen: checkout --><!-- ngSwitchDefault:  --><div ng-switch-default="" topbar-default="" state="state" class="ng-scope ng-isolate-scope"><header class="topbar" role="navigation" ng-class="{shoptopbar: state.type === 'shop'}"><div class="container clearfix"><h1><a href="/" hardjump="" class="topbar-logo icon-logo"><span>饿了么</span></a></h1><a href="/" hardjump="" class="topbar-item topbar-homepage" ng-class="{'focus': $root.locationpath[0] === 'place'}">首页</a> <a href="/personal/order" hardjump="" class="topbar-item" ng-class="{'focus': $root.locationpath[1] === 'order'}">我的订单</a> <a href="//h5.ele.me/service/cooperation/" target="_blank" class="topbar-item cooperation">加盟合作</a><nav class="topbar-nav"><a href="/personal/wenti" hardjump="" class="topbar-nav-link" target="_blank"><i class="topbar-nav-icon icon-service"></i>服务中心</a> <a href="/personal/guize" hardjump="" class="topbar-nav-link" target="_blank">规则中心</a><div class="topbar-nav-link"><i class="topbar-nav-icon icon-mobile"></i>手机应用<div class="dropbox topbar-mobile-dropbox"><span>扫一扫, 手机订餐更方便</span> <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" class="topbar-nav-qrcode" alt="扫一扫下载饿了么手机 App"></div></div><div topbar-personalbox=""><div class="topbar-personalbox"><!-- ngIf: $root.user.avatar && $root.topbarType !== 'checkout' --><img class="topbar-personalbox-avatar ng-scope" ng-src="//fuss10.elemecdn.com/4/ef/70827800a8437d1ae1c0b8194fe41jpeg.jpeg?imageMogr2/thumbnail/26x26/format/webp/quality/85" ng-if="$root.user.avatar &amp;&amp; $root.topbarType !== 'checkout'" alt="个人头像" src="{{ QINIU_PREFIX }}{{ $user->picname }}?imageMogr2/thumbnail/26x26/format/webp/quality/85"><!-- end ngIf: $root.user.avatar && $root.topbarType !== 'checkout' --> <span class="topbar-personalbox-avatar icon-personal ng-hide" ng-show="!$root.user.username"></span> <span ng-show="!$root.user.username" class="ng-hide"><a ng-href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fpersonal%2Forder%2Frate%2F1210298076154399882" target="_blank" href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fpersonal%2Forder%2Frate%2F1210298076154399882">登录/注册</a></span> <span class="topbar-personalbox-wrapper" ng-show="$root.user.username"><!-- ngIf: $root.topbarType === 'checkout' --> <span class="topbar-personalbox-username ng-binding">{{ $user->username }}</span> <!-- ngIf: $root.topbarType === 'checkout' --> <!-- ngIf: $root.topbarType !== 'checkout' --><span class="topbar-personalbox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== 'checkout'"></span><!-- end ngIf: $root.topbarType !== 'checkout' --><div class="dropbox topbar-personalbox-dropbox"><a class="icon-personal" href="/personal" hardjump="">个人中心</a> <a class="icon-star" href="/personal/collect" hardjump="">我的收藏</a> <a class="icon-location" href="/personal/address" hardjump="">我的地址</a> <a class="icon-setting" href="/personal/security" hardjump="">安全设置</a> <a class="icon-logout" href="JavaScript:" ng-click="logout()">退出登录</a></div></span></div></div></nav></div></header></div></div>
    <div class="importantnotification container" role="banner"><!-- ngIf: enable --></div>
    <div class="sidebar" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar"><div class="sidebar-tabs"><div class="toolbar-tabs-middle"><a class="toolbar-btn icon-order toolbar-close" href="/personal/order" hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order"><!-- ngIf: sidebarCount.uncompletedOrder > 0 --></a><div class="toolbar-separator"></div><a class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum" href="JavaScript:" template="cart" ng-class="{'focus': (activeTemplate === 'cart' &amp;&amp; isSidebarOpen), 'toolbar-cartbtn-shownum': foodCount.count}" ubt-click="390">购物车<!-- ngIf: foodCount.count --><i class="toolbar-cartnum ng-binding ng-scope" ng-if="foodCount.count" ng-bind="foodCount.count">4</i><!-- end ngIf: foodCount.count --></a><div class="toolbar-separator"></div><a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:" template="message" ng-class="{'focus': (activeTemplate === 'message' &amp;&amp; isSidebarOpen), 'toolbar-open': user, 'modal-hide': user}" tooltip="我的信息" tooltip-placement="left" ubt-click="392"><!-- ngIf: messageCount.count --></a></div><div class="toolbar-tabs-bottom"><div class="toolbar-btn icon-QR-code"><div class="dropbox toolbar-tabs-dropbox"><a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank"><img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" alt="下载手机应用"><p>下载手机应用</p><p class="icon-QR-code-bonus">即可参加分享红包活动</p></a></div></div><a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部" href="JavaScript:" tooltip-placement="left" style="visibility: hidden;"></a></div></div><div class="sidebar-content"><!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+ activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' --></div></div>
    <!-- ngView:  --><div ng-view="" role="main" class="ng-scope">
	<div class="unrated personal-container container" personal-container="" page-name="order-unrated" page-title="待评价订单" page-subtitle="带(<span class='stress'>*</span>)标志为必填项">
	<div class="clearfix">
	<div class="location" ng-style="{visibility: geohash ? '' : 'hidden'}" role="navigation" location="">
	<span>当前位置:</span>
	<span class="location-current">
	<a class="inherit ng-binding" ng-href="/place/wx4eqy3w3mce5" ubt-click="401" ng-bind="place.name || place.address" href="/place/wx4eqy3w3mce5">{{ $location['address'] }}</a>
	</span>
	
	<span class="location-change location-hashistory" ng-class="{ 'location-hashistory': user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length > 0 }">
	<a ng-href="/home" ubt-click="400" hardjump="" href="/home">[切换地址]</a>
	<ul class="dropbox location-dropbox" ubt-visit="398">
	<li class="arrow"></li>
	
	<li class="changelocation">
	</li>
	</ul>
	</span>
	<span ng-transclude=""><i class="icon-arrow-right ng-scope"></i><span class="ng-binding ng-scope">待评价订单</span>
	</span>
	</div>
	
	<div search-input=""></div></div><ul class="personal-sidebar" role="navigation" personal-sidebar=""><li class="personal-sidebar-section"><h2 class="personal-sidebar-sectiontitle" ng-class="{ active: pageName === 'personal' }"><i class="icon-line-home"></i><a href="/personal">个人中心</a></h2></li><li class="personal-sidebar-section"><h2 class="personal-sidebar-sectiontitle"><i class="icon-line-order"></i>我的订单</h2><ul><li ng-class="{ active: pageName === 'order' }"><a href="/personal/order">近三个月订单</a></li><li ng-class="{ active: pageName === 'order-unrated' }" class="active"><a href="/personal/orderunrated">待评价订单<!-- ngIf: unratedNumber --></a></li><li ng-class="{ active: pageName === 'order-refunding' }"><a href="/personal/order/refund">退单记录</a></li></ul></li><li class="personal-sidebar-section"><h2 class="personal-sidebar-sectiontitle"><i class="icon-yen"></i>我的资产</h2><ul><li ng-class="{ active: pageName === 'hongbao' }"><a href="/personal/hongbao">我的红包</a></li><li ng-class="{ active: pageName === 'balance' }"><a href="/personal/balance">账户余额</a></li><li ng-class="{ active: pageName === 'points' }"><a href="/personal/points">我的积分</a></li></ul></li><li class="personal-sidebar-section"><h2 class="personal-sidebar-sectiontitle"><i class="icon-line-personal"></i>我的资料</h2><ul><li ng-class="{ active: pageName === 'info' }"><a href="/personal/info">个人资料</a></li><li ng-class="{ active: pageName === 'address' }"><a href="/personal/address">地址管理</a></li><li ng-class="{ active: pageName === 'security-center' }"><a href="/personal/security">安全中心</a></li><li ng-class="{ active: pageName === 'changepassword' }"><a href="/personal/security/changepassword">修改密码</a></li></ul></li><li class="personal-sidebar-section"><h2 class="personal-sidebar-sectiontitle" ng-class="{ active: pageName === 'favor' }"><a href="/personal/favor"><i class="icon-order-favor"></i>我的收藏</a></h2></li></ul>
	
	
	
	
	
	<div class="personal-panel" role="main"><!-- ngIf: pageTitleVisible --><h3 ng-if="pageTitleVisible" class="personal-paneltitle ng-scope"><span ng-bind="pageTitle" class="ng-binding">待评价订单</span> <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">带(<span class="stress">*</span>)标志为必填项</span></h3><!-- end ngIf: pageTitleVisible --><div class="personal-panelcontent" ng-transclude=""><!-- ngIf: fetched && !unrated --><div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入未评价订单" ng-hide="fetched"><!-- ngIf: type==='personal' --><img ng-if="type==='personal'" src="//faas.elemecdn.com/desktop/media/img/personal-loading.4984fa.gif" alt="正在加载" class="ng-scope"><!-- end ngIf: type==='personal' --> <!-- ngIf: type==='normal' -->正在载入未评价订单</div><!-- ngIf: unrated --><div ng-if="unrated" class="unrated-orderinfo ng-scope"><div class="unrated-orderinfo-item"><a ng-href="/shop/1987286" href="/shop/1987286"><img ng-src="//fuss10.elemecdn.com/c/c4/7d19d4ce51daffcb10d96b559863djpeg.jpeg?imageMogr2/thumbnail/48x48/format/webp/quality/85" alt="韩式炸鸡料理店" src="//fuss10.elemecdn.com/c/c4/7d19d4ce51daffcb10d96b559863djpeg.jpeg?imageMogr2/thumbnail/48x48/format/webp/quality/85"></a><div class="rstinfo"><h3><a class="color-normal ng-binding" ng-href="/shop/1987286" ng-bind="unrated.rstName" href="/shop/1987286">韩式炸鸡料理店</a></h3><p><span ng-bind="unrated.foodConcat" class="ng-binding">炸鸡三拼大份-原味.蒜香.火辣酱1份 / 香芋地瓜丸-一份12个1份等</span>共<span class="stress ng-binding" ng-bind="unrated.foodQuantity">4</span>个菜品</p></div></div><span class="unrated-orderinfo-item ng-binding" ng-bind="'下单时间：' + (unrated.created_at | date:'yyyy-MM-dd HH:mm:ss')">下单时间：2017-07-13 16:52:56</span> <a class="unrated-orderinfo-item favor" href="javascript:" ng-click="favorRst()" ng-class="isFavor &amp;&amp; 'active'"><i class="icon-line-star"></i>收藏商家</a></div><!-- end ngIf: unrated --><!-- ngIf: unrated --><div ng-if="unrated" class="unrated-rate ng-scope">
	
	
	
	
	<div class="unrated-ratelist">
		<span class="unrated-ratelist-label">
			<span>*</span>商家服务
		</span>
		<div class="unrated-ratelist-content rate ng-isolate-scope" rate="" config="rateServiceConfig" value="rate.service" isreadonly="stableRate.service.value">
			<p class="rate-star star level0" ng-class="{readonly: isreadonly, star: starStyle}"><!-- ngIf: label --> 
				<span ng-click="doRate($event)" ng-mouseover="doRate($event)" ng-mouseleave="doRate($event)" data-level="0">
					<a onclick="mouseClick(this)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="icon-star-rate" href="javascript:" data-level="1" ng-class="{active : rateLevel >= 1}"></a> 
					<a onclick="mouseClick(this)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="icon-star-rate" href="javascript:" data-level="2" ng-class="{active : rateLevel >= 2}"></a> 
					<a onclick="mouseClick(this)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="icon-star-rate" href="javascript:" data-level="3" ng-class="{active : rateLevel >= 3}"></a> 
					<a onclick="mouseClick(this)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="icon-star-rate" href="javascript:" data-level="4" ng-class="{active : rateLevel >= 4}"></a> 
					<a onclick="mouseClick(this)" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)" class="icon-star-rate" href="javascript:" data-level="5" ng-class="{active : rateLevel >= 5}"></a>
				</span> <!-- ngIf: config.tipText --><span ng-if="config.tipText" class="active rate-star-text ng-binding ng-scope" ng-bind="config.tipText[rateLevel]">点击星星打分</span><!-- end ngIf: config.tipText -->
			</p><!-- ngIf: config.mutiContent -->
			<div id="shop_yijian" ng-if="config.mutiContent" class="rate-content ng-scope ng-hide" ng-show="config.mutiContent &amp;&amp; value.value > 0" ng-hide="copyVal.value || copyVal.text === ''">
				<textarea ng-attr-placeholder="config.placeholder[rateLevel - 1]" ng-model="value.text" class="ng-pristine ng-valid" placeholder="请说出你的意见，我们又不改。。。"></textarea>
			</div><!-- end ngIf: config.mutiContent --><!-- ngIf: !config.mutiContent --><!-- ngIf: copyVal.text -->
		</div>
	</div>
	<script>
		var des = ["点击星星打分","极差","失望","一般","满意","惊喜"];
		var index = 0;
		/*
		function mouseOver(ob){
			//alert("a");
			$(ob).parent().parent().attr("class","rate-star star level"+($(ob).index()+1));
			$(ob).attr("class","icon-star-rate active");
			var ind = $(ob).index();
			$(ob).parent().next().html(des[ind+1]);
			
			
			$(ob).prevAll().each(function(){
				$(this).attr("class","icon-star-rate active");
			});
		}
		
		function mouseOut(ob){
			$(ob).parent().parent().attr("class","rate-star star level0");
			$(ob).attr("class","icon-star-rate");
			$(ob).nextAll().each(function(){
				$(this).attr("class","icon-star-rate");
			});
			$(ob).parent().next().html(des[0])
			
		}
		*/
		
		
		function mouseClick(ob){
			//alert("a");
			$(ob).parent().parent().attr("class","rate-star star level"+($(ob).index()+1));
			$(ob).addClass("active");
			var ind = $(ob).index();
			$(ob).parent().next().html(des[ind+1]);
			
			
			$(ob).prevAll().each(function(){
				$(this).addClass("active");
			});
			
			$(ob).nextAll().each(function(){
				$(this).removeClass("active");
			});
			
			//$(ob).parent().parent().next().attr("class", "rate-content ng-scope");
			$(ob).parent().parent().next().removeClass("ng-hide");
			
			$(ob).parent().attr("data-level",ind+1)
		}
		
		function rodertime(ob){
			var span_index = $(ob).index();
			$(ob).parent().parent().next().html(span_index * 30 + "分钟");
			$("#tuo").css("left",span_index*25+"%");
			$("#tuo2").css("width",span_index*25+"%");
		}
		
		
		
		
		function doSubmit(){
		var PARAM = {
			order_id:"",
			shop_rate:"",
			shop_content:"",
			food_foodid_rate:"",
			food_foodid_content:""
		}
		var aa = document.create("form");
		document.body.appendChild(aa);
		aa.action = "";
		aa.method = post;
		aa.style = "display:none";
		for(var i in PARAM){
			var input = document.create("input");
			input.type = "text";
			input.name = i;
			input.value = PARAM[i];
			aa.append(input);
		}
		
		aa.submit();
		
		document.body.removeChild(aa);
		}
	</script>
	
	
	<!-- ngIf: unrated.canRateCourier --><div class="unrated-ratelist divider"><span class="unrated-ratelist-label"><span>*</span>送餐速度</span><div class="unrated-ratelist-content timeslider ng-isolate-scope" timeslider="" time="rate.time" isreadonly="stableRate.time"><div class="timeslider-main"><div id="tuo2" class="timeslider-progress" ng-style="{width: percent + '%'}" style="width: 0%;"></div>
	
	<i id="tuo" class="icon-uniE003 timeslider-handle writeable" ng-style="{left: percent + '%'}" ng-class="{writeable: !isreadonly}" style="left: 0%;"></i>
	
	<p class="timeslider-part writeable" ng-class="{writeable: !isreadonly}">
	<span onclick="rodertime(this)" ng-click="dealTime(0)">0</span> 
	<span onclick="rodertime(this)" ng-click="dealTime(25)">0.5h</span> 
	<span onclick="rodertime(this)" ng-click="dealTime(50)">1h</span> 
	<span onclick="rodertime(this)" ng-click="dealTime(75)">1.5h</span> 
	<span onclick="rodertime(this)" ng-click="dealTime(100)">2h</span>
	</p>
	</div>
	<span class="timeslider-time ng-binding" ng-bind="time ? time + '分钟' : '请评价送餐速度'" ng-class="{notime: !time}">0分钟</span></div></div>
	
	
	
	<div class="unrated-ratelist food"><span class="unrated-ratelist-label">评价菜品</span>
	
	<div class="unrated-ratelist-content"><!-- ngRepeat: food in rate.orderItems --><div class="rate ng-isolate-scope" ng-repeat="food in rate.orderItems" rate="" label="food.name" config="rateFoodConfig" value="rate.orderItems[$index].rate" isreadonly="stableRate.orderItems[$index].rate.value"><p class="rate-star level4" ng-class="{readonly: isreadonly, star: starStyle}"><!-- ngIf: label --><span class="rate-name ng-binding ng-scope" ng-if="label" ng-bind="label">炸鸡三拼大份-原味.蒜香.火辣酱</span><!-- end ngIf: label --> 
	
	<span ng-click="doRate($event)" ng-mouseover="doRate($event)" ng-mouseleave="doRate($event)" data-level="0">
	<a onclick="mouseClick(this)" class="icon-star-good" href="javascript:" data-level="1" ng-class="{active : rateLevel >= 1}"></a> 
	<a onclick="mouseClick(this)" class="icon-star-good" href="javascript:" data-level="2" ng-class="{active : rateLevel >= 2}"></a> 
	<a onclick="mouseClick(this)" class="icon-star-good" href="javascript:" data-level="3" ng-class="{active : rateLevel >= 3}"></a> 
	<a onclick="mouseClick(this)" class="icon-star-good" href="javascript:" data-level="4" ng-class="{active : rateLevel >= 4}"></a> 
	<a onclick="mouseClick(this)" class="icon-star-good" href="javascript:" data-level="5" ng-class="{active : rateLevel >= 5}"></a>
	</span> <!-- ngIf: config.tipText --><span ng-if="config.tipText" class="active rate-star-text ng-binding ng-scope" ng-bind="config.tipText[rateLevel]">满意</span><!-- end ngIf: config.tipText --></p><!-- ngIf: config.mutiContent --><!-- ngIf: !config.mutiContent --><div ng-if="!config.mutiContent" class="rate-content simple ng-scope ng-hide" ng-show="!config.mutiContent &amp;&amp; value.value > 0" ng-hide="copyVal.value || value.value === 0"><textarea ng-attr-placeholder="config.placeholder[rateLevel - 1]" ng-model="value.text" class="ng-pristine ng-valid" placeholder="把好吃的地方说出来，帮助小伙伴选择"></textarea></div><!-- end ngIf: !config.mutiContent --><!-- ngIf: copyVal.text --></div><!-- end ngRepeat: food in rate.orderItems -->
	
	<!-- end ngRepeat: food in rate.orderItems --><!-- end ngRepeat: food in rate.orderItems --><!-- end ngRepeat: food in rate.orderItems --></div></div><div class="unrated-ratelist offset"><button onclick="doSubmit()" class="btn-primary btn-lg" ng-click="rateSubmit()">提交评价</button> <!-- ngIf: !canotRateNext --><!-- ngIf: !unrated.rate_info.rated_point && unrated.rate_info.total_rating_point --><p class="unrated-intro ng-scope" ng-if="!unrated.rate_info.rated_point &amp;&amp; unrated.rate_info.total_rating_point">评价后可获得<span class="unrated-tip ng-binding" ng-bind="unrated.rate_info.total_rating_point">1681</span>积分哦</p><!-- end ngIf: !unrated.rate_info.rated_point && unrated.rate_info.total_rating_point --></div></div><!-- end ngIf: unrated --></div></div></div></div>
	
	
	
	
	
	
    <footer class="footer" role="contentinfo"><div class="container clearfix"><div class="footer-link"><h3 class="footer-link-title">用户帮助</h3><a class="footer-link-item" href="/support/center" target="_blank">服务中心</a> <a class="footer-link-item" href="/support/question/default" target="_blank">常见问题</a></div><div class="footer-link"><h3 class="footer-link-title">商务合作</h3><a class="footer-link-item" href="//kaidian.ele.me" target="_blank">我要开店</a> <a class="footer-link-item" href="/support/about/jiameng" target="_blank">加盟指南</a> <a class="footer-link-item" href="/support/about/contact" target="_blank">市场合作</a> <a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">开放平台</a></div><div class="footer-link"><h3 class="footer-link-title">关于我们</h3><a class="footer-link-item" href="/support/about" target="_blank">饿了么介绍</a> <a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">加入我们</a> <a class="footer-link-item" href="/support/about/contact" target="_blank">联系我们</a> <a class="footer-link-item" href="/support/rules/default" target="_blank">规则中心</a></div><div class="footer-contect"><div class="footer-contect-item">24小时客服热线 : <a class="inherit" href="tel:10105757">10105757</a></div><div class="footer-contect-item">意见反馈 : <a class="inherit" href="mailto:feedback@ele.me">feedback@ele.me</a></div><div class="footer-contect-item">关注我们 :<div href="JavaScript:" class="icon-wechat" ubt-click="402"><div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402"><img src="//faas.elemecdn.com/desktop/media/img/wexinqc100@2x.393ade.png" alt="微信号: elemeorder"><p>微信号: elemeorder</p><p>饿了么网上订餐</p></div></div><a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank"></a></div></div><div class="footer-mobile"><a href="https://h.ele.me/landing" target="_blank"><img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" class="footer-mobile-icon" alt="扫一扫下载饿了么手机 App"></a><div class="footer-mobile-content"><h3>下载手机版</h3><p>扫一扫,手机订餐方便</p></div></div><div class="footer-copyright serif"><h5 class="owner">所有方：上海拉扎斯信息科技有限公司</h5><p>增值电信业务许可证 : <a href="http://www.shca.gov.cn/" target="_blank">沪B2-20150033</a> | <a href="http://www.miibeian.gov.cn/" target="_blank">沪ICP备 09007032</a> | <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823" target="_blank">上海工商行政管理</a> Copyright ©2008-2017 ele.me, All Rights Reserved.</p></div><div class="footer-police container"><a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank"><img alt="已通过沪公网备案，备案号 310100103568" src="//faas.elemecdn.com/desktop/media/img/picp_bg.e373b3.jpg" height="30"></a></div></div></footer>
  

  
  
  

</body></html>
