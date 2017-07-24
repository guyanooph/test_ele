<!DOCTYPE HTML>
<html>
<head>
<style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">

    <title ng-bind="SEO.title" class="ng-binding">{{ $ob->shopname }}  {{ $ob->address }}-饿了么网上订餐</title>

    
    <meta name="format-detection" content="telephone=no, email=no">

    <meta name="application-name" content="饿了么网上订餐">
    <meta name="msapplication-tooltip" content="饿了么网上订餐">
    <meta name="msapplication-starturl" content="./">
    <meta name="msapplication-tileimage" content="=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-tilecolor" content="#0088ff">
    <meta name="msapplication-task" content="name=切换地区;action-uri=http://ele.me/home;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=我要订餐;action-uri=http://ele.me?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=订单中心;action-uri=http://ele.me/profile?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta name="msapplication-task" content="name=寻求帮助（HELP）;action-uri=http://ele.me/support?from=IE;icon-uri=http://static11.elemecdn.com/apple-touch-icon.png?v=2">
    <meta property="qc:admins" content="2263606250655">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="apple-touch-icon-precomposed" href="https://static2.ele.me/apple-touch-icon.png?v=2">

    <link rel="shortcut icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-16x16.png" type="image/png" sizes="16x16">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png" type="image/png" sizes="32x32">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon.png" type="image/png" sizes="96x96">

    <link href="{{ asset('css/vendor.0cb970.css') }}" rel="stylesheet">
    
    <link href="{{ asset('css/main.5e33c3.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-1.8.3.min.js') }}" type="text/javascript" crossorigin="anonymous"></script>
    <base href="/">
  <meta name="mobile-agent" content="format=html5;url=https://h5.ele.me/shop/#id=150045824">
  <meta name="description" content="兄弟小馆位于北京市北京经济技术开发区荣华中路7号院4幢1028、1029，主要美食有煎鸡蛋、三鲜炒饭、辣白菜、馒头、鱼香肉丝饭等，了解更多美食外卖，上饿了么网上订餐">
  <meta name="keywords" content="兄弟小馆外卖，兄弟小馆菜单，兄弟小馆电话"></head>





<body cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}" class="hidesidebar" lim:visitorcapacity="1" style="position: relative;">



<!-- 加载用户名，头像，我的订单连接 -->
<div ng-switch="state.type" state="layoutState" class="ng-isolate-scope">
<div ng-switch-default="" topbar-default="" state="state" class="ng-scope ng-isolate-scope">
<header class="topbar shoptopbar" role="navigation" ng-class="{shoptopbar: state.type === 'shop'}">
<div class="container clearfix"><h1>
<a href="/shoplist" hardjump="" class="topbar-logo icon-logo"><span>饿了么</span></a></h1>
<a href="/shoplist" hardjump="" class="topbar-item topbar-homepage" ng-class="{'focus': $root.locationpath[0] === 'place'}">首页</a>
 <a href="/personal/order/refund" hardjump="" class="topbar-item" ng-class="{'focus': $root.locationpath[1] === 'order'}">我的订单</a> 
 <a href="//h5.ele.me/service/cooperation/" target="_blank" class="topbar-item cooperation">加盟合作</a><nav class="topbar-nav">
 <a href="/support/center" hardjump="" class="topbar-nav-link" target="_blank">
 <i class="topbar-nav-icon icon-service"></i>服务中心</a> 
 <a href="/support/rules/default" hardjump="" class="topbar-nav-link" target="_blank">规则中心</a>
 <div class="topbar-nav-link"><i class="topbar-nav-icon icon-mobile"></i>手机应用<div class="dropbox topbar-mobile-dropbox">
 <span>扫一扫, 手机订餐更方便</span>
 <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" class="topbar-nav-qrcode" alt="扫一扫下载饿了么手机 App"></div></div>
 <div topbar-profilebox="">


<div class="topbar-profilebox">

@if(empty($user))
                            <!-- ngIf: $root.user.avatar && $root.topbarType !== 'checkout' --> 
                                <span class="topbar-profilebox-avatar icon-profile" ng-show="!$root.user.username"></span> 
                                <span ng-show="!$root.user.username" class="">
                                    <a ng-href="{{ url('/login')}}" target="_blank" href="{{ url('/login') }}">登录/注册</a>
                                </span>
                                <span class="topbar-profilebox-wrapper ng-hide" ng-show="$root.user.username"><!-- ngIf: $root.topbarType === 'checkout' --> 
                                    <span class="topbar-profilebox-username ng-binding"></span> <!-- ngIf: $root.topbarType === 'checkout' --> <!-- ngIf: $root.topbarType !== 'checkout' -->
                                    <span class="topbar-profilebox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== 'checkout'"></span><!-- end ngIf: $root.topbarType !== 'checkout' -->
                                    <div class="dropbox topbar-profilebox-dropbox">
                                        <a class="icon-profile" href="/personal" hardjump="">个人中心</a>
                                        <a class="icon-star" href="/personal/favor" hardjump="">我的收藏</a>
                                        <a class="icon-location" href="/personal/address" hardjump="">我的地址</a>
                                        <a class="icon-setting" href="/personal/security" hardjump="">安全设置</a>
                                        <a class="icon-logout" href="/logout" ng-click="logout()">退出登录</a>
                                    </div>
                                </span>
                            @else
                                <img class="topbar-profilebox-avatar ng-scope" ng-src="//fuss10.elemecdn.com/4/ef/70827800a8437d1ae1c0b8194fe41jpeg.jpeg?imageMogr2/thumbnail/26x26/format/webp/quality/85" ng-if="$root.user.avatar &amp;&amp; $root.topbarType !== 'checkout'" alt="个人头像" src="{{ QINIU_PREFIX }}{{ $user->picname }}?imageMogr2/thumbnail/26x26"><!-- end ngIf: $root.user.avatar && $root.topbarType !== 'checkout' -->
                                <span class="topbar-profilebox-avatar icon-profile ng-hide" ng-show="!$root.user.username"></span>
                                <span ng-show="!$root.user.username" class="ng-hide"><a ng-href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2F" target="_blank" href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2F">登录/注册</a>
                                </span>
                                <span class="topbar-profilebox-wrapper" ng-show="$root.user.username"><!-- ngIf: $root.topbarType === 'checkout' -->
                                    <span class="topbar-profilebox-username ng-binding">{{ $user->username }}</span> <!-- ngIf: $root.topbarType === 'checkout' --> <!-- ngIf: $root.topbarType !== 'checkout' -->
                                    <span class="topbar-profilebox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== 'checkout'"></span><!-- end ngIf: $root.topbarType !== 'checkout' -->
                                    <div class="dropbox topbar-profilebox-dropbox"><a class="icon-profile" href="{{ url('/personal') }}" hardjump="">个人中心</a> <a class="icon-star" href="{{ url('/personal/collect') }}" hardjump="">我的收藏</a> <a class="icon-location" href="{{ url('/personal/address') }}" hardjump="">我的地址</a> <a class="icon-setting" href="{{ url('/personal/security') }}" hardjump="">安全设置</a> <a class="icon-logout" href="{{ url('/logout') }}" ng-click="logout()">退出登录</a>
                                    </div>
                                </span>
                            @endif


</div>
</div></nav></div></header></div></div>







<div class="importantnotification container" role="banner"></div>








<div class="sidebar ng-hide" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar">
<div class="sidebar-tabs"><div class="toolbar-tabs-middle">
<a class="toolbar-btn icon-order toolbar-close" href="/profile/order" hardjump=""
 tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order"></a><div class="toolbar-separator"></div>
 <a class="toolbar-cartbtn icon-cart toolbar-open" href="JavaScript:" template="cart" 
 ng-class="{'focus': (activeTemplate === 'cart' &amp;&amp; isSidebarOpen), 
 'toolbar-cartbtn-shownum': foodCount.count}" ubt-click="390">购物车</a>
 <div class="toolbar-separator"></div>
 <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:" 
 template="message" ng-class="{'focus': (activeTemplate === 'message' &amp;&amp; isSidebarOpen),
 'toolbar-open': user, 'modal-hide': user}" tooltip="我的信息" tooltip-placement="left" ubt-click="392"></a></div>
 <div class="toolbar-tabs-bottom"><div class="toolbar-btn icon-QR-code">
 <div class="dropbox toolbar-tabs-dropbox">
 <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank">
 <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" alt="下载手机应用"><p>下载手机应用</p>
 <p class="icon-QR-code-bonus">即可参加分享红包活动</p></a></div></div>
 <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部"
 href="JavaScript:" tooltip-placement="left" style="visibility: hidden;"></a></div></div>
 <div class="sidebar-content"></div></div>


<div ng-view="" role="main" class="ng-scope">


<!-- 商家信息 -->
<div class="shopguide ng-isolate-scope" shop-guide="" data="shop" isdisabled="shop.disabled">
<div class="container" ng-show="shop" itemscope="" itemtype="http://schema.org/Restaurant">
<div class="shopguide-info"><meta itemprop="url" content="https://www.ele.me/shop/150045824">
<img ng-src="//fuss10.elemecdn.com/d/42/b2c1317cc18fdb9cfcfab618c02fapng.png?imageMogr2/thumbnail/95x95/format/webp/quality/85" 
 alt="兄弟小馆" itemprop="image" src="//fuss10.elemecdn.com/d/42/b2c1317cc18fdb9cfcfab618c02fapng.png?imageMogr2/thumbnail/95x95/format/webp/quality/85">
<div class="shopguide-info-wrapper"><div>
<h1 title="兄弟小馆" ng-class="{hastip: shop.tip}" itemprop="name" class="ng-binding hastip">{{ $ob->shopname }}</h1>
<span ng-if="shop.tip" ng-style="{'background-color': shop.tip.bgColor}" class="shopguide-tip ng-binding ng-scope"
 style="background-color: rgb(192, 192, 192);">商家休息</span>
<a ng-href="/shop/150045824/info" href="/shop/150045824/info"></a></div>
<p class="shopguide-info-rate">
<div class="starrating icon-star ng-isolate-scope" title="评分{{ $ob->rate }}分" rate-star="" rating="shop.rating">
<span class="icon-star" ng-style="{ width: (rating * 20) + '%' }" style="width: 92%;"></span></div>
 (<a ng-href="/shop/150045824/rate" class="ng-binding" href="/shop/150045824/rate">{{ $ob->rate }}</a>) 
 <span class="ng-binding">月售{{ $ob->month_num }}单</span></p>
 <p></p></div>
 <div class="shopguide-info-extra"><ul>
 <li class="shopguide-extra-item shopguide-extra-compete ng-scope" ng-if="shopRatingScore">
 <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
 <h2 class="color-stress ng-binding" itemprop="ratingValue">{{ $ob->rate }}</h2>
 <meta itemprop="bestRating" content="5">
 <meta itemprop="reviewCount" content="2366"><p>综合评价<br>
 <span class="color-mute ng-binding">高于周边商家</span>
 <span class="color-stress ng-binding ng-scope" ng-if="shopRatingScore.compare_rating">51.9%</span>
 </p></div>
 <div><p>服务态度<div class="starrating icon-star ng-isolate-scope" title="评分4.7分" rate-star="" rating="shopRatingScore.service_score">
 <span class="icon-star" ng-style="{ width: (rating * 20) + '%' }" style="width: 93.494%;"></span></div> 
 <span class="color-stress ng-binding">{{ $ob->rate }}分</span></p>
 <p>菜品评价<div class="starrating icon-star ng-isolate-scope" title="评分4.6分" rate-star="" rating="shopRatingScore.food_score">
 <span class="icon-star" ng-style="{ width: (rating * 20) + '%' }" style="width: 92.1634%;"></span></div>
 <span class="color-stress ng-binding">{{ $ob->rate }}分</span></p></div></li>
 <li class="shopguide-extra-item ng-binding ng-scope" ng-if="shop.description" itemprop="description">{{ $ob->desc }}</li>
 <li class="shopguide-extra-item address">
 <p itemscope="" itemprop="streetAddress" itemtype="http://schema.org/PostalAddress">
 <span class="label">商家地址：{{ $ob->address }}</span><br/>
 <span class="label">商家描述：</span><span class="ng-binding">{{ $ob->desc }}</span>
 <span class="ng-binding"></span>
 <meta itemprop="telephone" content="15830461171 15801421533"></p>
 <p><span class="label">营业时间：</span> 
 <span itemprop="openingHours" class="ng-binding">??? </span></p></li>
 <li class="shopguide-extra-item">
 <p class="shopguide-extra-delivery">由<span class="ng-binding">{{ $ob->shopname }}</span>提供配送服务</p></li></ul></div></div>
 <div class="shopguide-server">
<span ng-hide="shop.id == 656683" class=""><em>起送价</em>
 <em class="shopguide-server-value ng-binding">{{ $ob->givemoney }}元</em>
</span>
 <span ng-hide="shop.id == 656683" class=""><em>配送费</em>
 <em class="shopguide-server-value ng-binding">配送费¥ {{ $ob->money }}</em>
</span>
 <span ng-hide="shop.id == 656683" class=""><em>平均送达速度</em> 
 <em class="shopguide-server-value ng-binding">{{ $ob->service_time }}分钟</em>
</span></div>
@if(!$collect)
 <a class="shopguide-favor" onclick="addcollet(this,{{ $ob->shopid }})" href="javascript:" ng-click="favor()">
 <i ng-if="!isFavorShop" class="icon-favorite ng-scope"></i>
 <span ng-if="!isFavorShop"  class="ng-scope">收藏</span></a></div></div>
@else
 <a class="shopguide-favor" onclick="addcollet(this,{{ $ob->shopid }})" href="javascript:" ng-click="favor()">
 <i ng-if="!isFavorShop" class="icon-unfavorite ng-scope"></i>
 <span ng-if="!isFavorShop"  class="ng-scope">已收藏</span></a></div></div>
@endif
<script>
    function addcollet(e,shopid){
        if($(e).children("i").hasClass("icon-favorite")){
            $.ajax({
                url:"/personal/addcollect",
                data:"shopid="+shopid,
                type:"GET",
                datatype:"json",
                success:function(data){
                    var data = $.parseJSON(data);
                    if(data.res){
                        alert("添加成功");
                        $(e).children("i").removeClass("icon-favorite");
                        $(e).children("i").addClass("icon-unfavorite");
                        $(e).children("span.ng-scope").html("已收藏");
                    }else{
                        alert("添加失败");
                    }
                },
            });
        }else{
             $.ajax({
                url:"/personal/removecollect",
                data:"shopid="+shopid,
                type:"GET",
                datatype:"json",
                success:function(data){
                    var data = $.parseJSON(data);
                    if(data.res){
                        $(e).children("i").removeClass("icon-unfavorite");
                        $(e).children("i").addClass("icon-favorite");
                        $(e).children("span.ng-scope").html("收藏");
                        alert("取消收藏成功");
                    }else{
                        alert("取消失败");
                    }
                },
            });
           
        }
    }
</script>


<!-- 中间栏 -->
<div shop-nav="" data="shop" filter-data="shop.filter" display-type="shop.displayType" 
shop-action="shopAction" class="ng-scope ng-isolate-scope">
<div class="shopnav"><div class="container clearfix"><div class="shopnav-left">
<a class="shopnav-tab active" href="/shop/150045824" ng-class="{active: shop.tab === 'index'}">所有商品</a>
<a class="shopnav-tab" href="/shop/150045824/rate" ng-class="{active: shop.tab === 'rate'}">评价</a> 
<a class="shopnav-tab" href="/shop/150045824/info" ng-class="{active: shop.tab === 'info'}">商家资质</a> 
<span class="shopnav-filter ng-scope" ng-if="shopAction === 'menu'">
<a href="javascript:" ng-click="filter('default')" 
ng-class="{active: filterData === 'default'}" class="active">默认排序</a>
 <a href="javascript:" ng-click="filter('-rating')" 
 ng-class="{active: filterData === '-rating'}">评分 <i class="icon-uniE02D"></i></a> 
 <a href="javascript:" ng-click="filter('-month_sales')"
 ng-class="{active: filterData === '-month_sales'}">销量 <i class="icon-uniE02D"></i></a> 
 <a href="javascript:" ng-click="filter('-price')" ng-class="{active: filterData === '-price' || 
 filterData === 'price'}">价格 <i class="icon-uniE02D" ng-hide="filterData === 'price'"></i>
 <i class="icon-uniE02C ng-hide" ng-show="filterData === 'price'"></i></a>
 <span><a class="shopnav-filter-display icon-grid active" href="javascript:" title="以网格形式显示菜单" 
 ng-click="changeDisplayType('grid')" ng-class="{active: displayType === 'grid'}"></a>
 <a class="shopnav-filter-display icon-list" href="javascript:" title="以列表形式显示菜单" 
 ng-click="changeDisplayType('list')" ng-class="{active: displayType === 'list'}"></a></span></span></div>
 <div class="shopnav-search">
 <form class="place-search ng-pristine ng-valid" role="search" ng-submit="search()">
 <button class="place-search-btn icon-search" ubt-click="403" 
 ng-attr-ubt-data-keyword="" title="搜索商家或美食" ubt-data-keyword=""></button>
 <label for="globalsearch">搜索商家或美食</label>
 <input id="globalsearch" class="place-search-input ng-pristine ng-valid" ng-model="searchText"
 autocomplete="" placeholder="搜索商家,美食..."></form></div></div></div></div>



<div class="shopmain clearfix container ng-scope">

	<!-- 菜品 -->
	<div ng-if="shopAction === 'menu'"shop-menu="" shop-cache="shopCache" filter-data="shop.filter" 
	display-type="shop.displayType" class="shopmenu ng-isolate-scope" perf-click="desktop/201">
		
		
		
		<div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-show="loading">
		<img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" 
		alt="正在加载" class="ng-scope">正在载入数据...</div>
		
		
		
		<!--分类-->
	<div ng-show="!loading &amp;&amp; !searchEnv" class="shopmenu-nav ng-isolate-scope" sticky="" sticky-class="sticky" sticky-body-class="shopmenu-nav-sticky" sticky-fn="shopNavSticky">
	@foreach ($type_list as $type)
	<a href="javascript:" ng-repeat="category in categorys" ng-click="scrollToCategory(category)" ng-class="{active: currentCategory.id === category.id}" class="ng-binding ng-scope active">{{ $type->title }}</a>
	@endforeach
	</div>
		
		
		<!-- 菜 -->
		<div ng-show="!loading" class="shopmenu-main grid" 
		ng-class="{grid: displayType === 'grid', list: displayType === 'list'}" style="margin-top: 165px;">
			
			
			
			<!-- 只是一个分类（需要遍历分类表，加载多个） -->
			@foreach ( $type_list as $type)
			<div class="shopmenu-list clearfix ng-scope" ng-repeat="category in categorys">
			
			<h3 class="shopmenu-title ng-binding">{{ $type->title }} <span class="shopmenu-des ng-binding">大家喜欢吃，才叫真好吃。</span></h3>
			@foreach($type->food as $cp)
				<div class="shopmenu-food ng-isolate-scope" ng-class="{noimg: !food.image_path}" id="534306490" ng-repeat="food in category.foods" shop-menu-item="" food="food" shop="shopCache">
				<span class="col-1 ng-scope" ng-if="food.image_path">
				<a href="javascript:" ng-click="showInfo(food)">
				<img ng-src="//fuss10.elemecdn.com/4/0c/48ecf64ee7c95655cfb6e8a684142jpeg.jpeg?imageMogr2/thumbnail/100x100/format/webp/quality/85" alt="煎鸡蛋的图片" src="//fuss10.elemecdn.com/4/0c/48ecf64ee7c95655cfb6e8a684142jpeg.jpeg?imageMogr2/thumbnail/100x100/format/webp/quality/85"></a></span>
				<div class="col-2 shopmenu-food-main"><h3 class="shopmenu-food-name ui-ellipsis ng-binding">{{ $cp->title }}</h3>
				<p class="color-mute ui-ellipsis ng-binding" tooltip=""></p>
				<p><div class="starrating icon-star ng-isolate-scope" title="评分{{ $cp->rate }}分" rate-star="" rating="food.rating">
				<span class="icon-star" ng-style="{ width: (rating * 20) + '%' }" style="width: 86.2%;"></span></div>
				<span class="color-mute ng-binding">({{ $cp->foodrate }})</span> <span class="color-mute ng-binding">月售{{ $cp->num }}份</span></p></div>
				<span class="col-3 shopmenu-food-price color-stress ng-binding">{{ $cp->price }}<small class="ng-binding"></small></span>
				<span class="col-4"><div shop-cartbutton="" food="food" ng-hide="shop.id == '656683'" class="ng-isolate-scope">
				<div ng-if="!menuFood.hasSpec" class="ng-scope">
				<button onclick="addShopcart(this,1)" foodid="{{ $cp->id }}" class="shop-cartbutton ng-binding ng-scope" ng-if="!cartItem.quantity &amp;&amp; menuFood.stock" ng-click="cartItem.add($event)">加入购物车</button>
				</div></div></span></div>
			@endforeach
			
			</div>
			@endforeach
			<div shop-cart="" cart-link="cartLink" ng-hide="shopCache.id == 656683" class="ng-isolate-scope">
			
    			<div class="shop-cart">
    			
        			<div class="shop-cartbasket" id="shopbasket" style="top: -44px; height: auto;">
        			    <div shop-groupswitcher="" cart="shopCart" class="ng-isolate-scope">
        			        <div class="shop-grouphead single" ng-class="{ single: shopCart.vm.groups.length === 1 }">
        			
        			            <a href="javascript:" class="icon-cart-add ng-scope" ng-if="shopCart.vm.groups.length === 1" ng-click="addGroup()" tooltip="添加购物车"></a>
        			
        			            <div class="shop-groupguidetip ng-scope" ng-if="showGuide &amp;&amp; shopCart.vm.groups.length === 1">快去选购吧！ 
                                    <a class="icon-close" ng-click="closeGuide()"></a>
        			            </div>
        			
        			            <div class="shop-grouphead-row">购物车
        			                <a href="javascript:" ng-click="shopCart.clearGroup(shopCart.currentGroupIndex)">[清空]</a>
                                </div>
        			        </div>
        		        </div>

                        @if(!$shopcart['shopcart'])
        			    <div id="emptycart" class="shop-cartbasket-empty ng-scope" ng-if="!shopCart.vm.groups[shopCart.currentGroupIndex].length">
        			        <div class="icon-cart"></div>
                            <p>购物车是空的，赶紧选购吧</p>
                        </div>
                        @else
                        @foreach($shopcart['shopcart'] as $id=>$food)    
                        <div foodid="{{ $id }}" ng-repeat="item in shopCart.vm.groups[shopCart.currentGroupIndex]" class="shop-cartbasket-tablerow ng-scope" entityid="547033283">
                            <div class="cell itemname ng-binding" ng-bind="item.name" title="{{ $food['food']->title }}">
                                {{ $food['food']->title }}
                            </div>
                            <div class="cell itemquantity">
                                <button foodid="{{ $id }}" onclick="addShopcart(this,-1)" ng-click="shopCart.subEntity(item, $event)">-</button><input ng-model="item.quantity" ng-blur="shopCart.updateFromInput(item, item.quantity)" class="ng-pristine ng-valid" value="{{ $food['num'] }}"><button foodid="{{ $id }}" onclick="addShopcart(this,1)" ng-click="shopCart.addEntity(item, $event)">+</button>
                            </div>
                            <div class="cell itemtotal ng-binding" ng-bind="'¥' + ((item.price * item.quantity).toFixed(2) | number)">
                                ￥{{ $food['food']->price * $food['num'] }}
                            </div>
                        </div>
                        @endforeach
                        @endif

        			</div>
    			
                    @if(!$shopcart['shopcart'])
    			    <div onclick="shopcartToggle(this)" class="shop-cartfooter" ng-click="shopCart.toggleCart()">
    			        <span class="icon-cart shop-carticon"></span>
    			        <div class="shop-cartfooter-text extras ng-binding" ng-bind-html="shopCart.vm.picewiseText">配送费￥ {{ $ob->givemoney }}</div>
    			        <button  class="shop-cartfooter-checkout ng-binding disabled" ng-class="{disabled: shopCart.vm.button.name !== 'CAN_ORDER'}"
    			ng-disabled="shopCart.vm.button.disabled" ng-bind="shopCart.vm.button.text" 
    			ng-click="checkout($event)" >购物车是空的</button>
                    </div>
                    @elseif( $shopcart['total'] < $shopcart['givemoney'] )
                    <div onclick="shopcartToggle(this)" class="shop-cartfooter" ng-click="shopCart.toggleCart()">
    			        <span class="icon-cart shop-carticon"></span>
                        <p class="shop-cartfooter-text price ng-binding ng-scope" ng-if="shopCart.vm.quantity > 0" ng-bind="shopCart.vm.total | number">{{ $shopcart['total'] }}</p>
    			        <div class="shop-cartfooter-text extras ng-binding" ng-bind-html="shopCart.vm.picewiseText">配送费￥ {{ $ob->givemoney }}</div>
    			        <button  class="shop-cartfooter-checkout ng-binding disabled" ng-class="{disabled: shopCart.vm.button.name !== 'CAN_ORDER'}"
    			ng-disabled="shopCart.vm.button.disabled" ng-bind="shopCart.vm.button.text" 
    			ng-click="checkout($event)" >还差{{ $shopcart['givemoney'] - $shopcart['total'] }}元起送</button>
                    </div>
                    @else
                    <div onclick="shopcartToggle(this)" class="shop-cartfooter" ng-click="shopCart.toggleCart()">
   			            <span class="icon-cart shop-carticon"></span>
                        <p class="shop-cartfooter-text price ng-binding ng-scope" ng-if="shopCart.vm.quantity > 0" ng-bind="shopCart.vm.total | number">{{ $shopcart['total'] }}</p>
   			            <div class="shop-cartfooter-text extras ng-binding" ng-bind-html="shopCart.vm.picewiseText">配送费￥ {{ $ob->givemoney }}</div>
   			            <button onclick="javascrip:window.location.href='/{{ $ob->shopid }}/ordercheckout'" class="shop-cartfooter-checkout ng-binding " ng-class="{disabled: shopCart.vm.button.name !== 'CAN_ORDER'}"
   			ng-disabled="shopCart.vm.button.disabled" ng-bind="shopCart.vm.button.text" 
   			ng-click="checkout($event)" >去结算</button>
                   </div>
                   @endif


    			    <div class="shop-carthelper-opener" ng-class="{show: shopCart.cartHelper.show}" ng-click="showCartHelper()"></div>
    			    <div class="shop-carthelper ng-isolate-scope" id="shophelper" shop-cart-helper="" group="shopCart.cartHelper.group" cart="shopCart">
    			        <div class="shopcarhelper-title clearfix">
                            <span>凑一凑</span>
    			            <em>轻松凑满起送价</em>
                            <a href="javascript:" ng-click="closeCartHelper()">[ 关闭 ]</a>
                        </div>
    			        <div class="shopcarthelper-container ui-scrollbar-light"></div>
                    </div>
    			    <div class="shop-flyitem"></div>
                </div>
			</div>
			
			<script>
                function shopcartToggle(e){
                    if($(e).prev().css("top") == "0px"){
                        $(e).prev().attr("style","top:-208px; height: auto;");
                    }else{
                        $(e).prev().attr("style","top:0px; height: auto;")
                    }
                }
                
                function addShopcart(e,m){
                    var foodid = e.getAttribute('foodid');
                    $.ajax({
                        url:"/addtocart/"+ {{ $ob->shopid }} + "/" + foodid,
                        type:"get",
                        data:"m=" + m,
                        datatype:"json",
                        success:function(data){
                            var data = $.parseJSON(data);
                            //$("#shopbasket").append("<p></p>");
                            var select = "div[foodid='" + foodid + "']";
                            if(data.num<=0 && data.status==1){
                                alert("a");
        			            $aps = "<div id='emptycart' class=\"shop-cartbasket-empty ng-scope\" ng-if=\"!shopCart.vm.groups[shopCart.currentGroupIndex].length\"><div class=\"icon-cart\"></div><p>购物车是空的，赶紧选购吧</p></div>"
                                $(select).parent().append($aps);
                                $(select).remove();
                            }else if(data.status==1){
                                alert("b");
                                var select_2 = select + " input";
                                $(select_2).val(data.num);
                                $(select).parent().children("div.itemtotal").html("¥"+(data.num*data.price));
                            }else if(data.status==0){
                                alert("c");
                                var item = "<div foodid=\""+data.id+"\" ng-repeat=\"item in shopCart.vm.groups[shopCart.currentGroupIndex]\" class=\"shop-cartbasket-tablerow ng-scope\" entityid=\"547033283\"><div class=\"cell itemname ng-binding\" ng-bind=\"item.name\" title=\""+ data.title +"\">"+ data.title +"</div><div class=\"cell itemquantity\"><button onclick=\"addShopcart(this,-1)\" ng-click=\"shopCart.subEntity(item, $event)\"  foodid='"+ data.id +"'  >-</button><input ng-model=\"item.quantity\" ng-blur=\"shopCart.updateFromInput(item, item.quantity)\" class=\"ng-pristine ng-valid\" value=\"" + data.num + "\"><button foodid='"+ data.id +"' onclick=\"addShopcart(this,1)\" ng-click=\"shopCart.addEntity(item, $event)\">+</button></div><div class=\"cell itemtotal ng-binding\" ng-bind=\"'¥' + ((item.price * item.quantity).toFixed(2) | number)\">￥"+ data.price * data.num +"</div></div>";
                                alert(item);
                                $("#emptycart").addClass("ng-hide");
                                $("#shopbasket").append(item);
                            }
                        },
                        error:function(){
                            alert("失败了");
                        }
                    });
                }
            </script>
			
			<div class="dialog" role="dialog" dialog="ITEMINFO" style="display: none;">
			<div class="dialog-close icon-close"></div><div class="dialog-content" ng-transclude="">
			<div shop-iteminfo="" item-info="itemInfo" class="ng-scope ng-isolate-scope"><div class="shop-iteminfo">
			<div class="iteminfo-imagegroup"><img class="mainimage" ng-src="" alt="的图片">
			<div ng-show="imagesPath.length > 1" class="ng-hide">
			<a href="javascript:" ng-click="showImageNext(-4)" class="imagegroup-ctrl icon-profile-left-arrow"></a>
			<ul class="imagelist"></ul>
			<a href="javascript:" ng-click="showImageNext(4)" class="imagegroup-ctrl icon-profile-right-arrow"></a></div></div>
			<section class="iteminfo-info"><h5 ng-bind="itemInfo.name" class="ng-binding"></h5>
			<p ng-show="!!itemInfo.description" class="description ng-binding ng-hide" ng-bind="itemInfo.description"></p>
			<div class="iteminfo-cartitem"><div class="iteminfo-price"><span class="price"><span class="yen">￥</span>
			<span class="price ng-binding" 
			ng-bind="(itemInfo.original_price || itemInfo.price) + (itemInfo.specfoods_id.length > 1 ? '起' : '')"></span></span></div></div>
			<div class="iteminfo-rate"><ul class="rategroup"></ul>
			<div pagination="" pagination-context="ratePageContext" pagination-pagesize="3" class=" pagination"><ul>
			</ul></div></div></section></div></div></div></div>
			
		</div>
		
		
	</div>

	<!-- 公告 -->
	<div class="shopmain-right ng-isolate-scope" shop-bulletin="" data="shop">
	<div class="shopbulletin"><div class="shopbulletin-section">
	<h3 class="shopbulletin-section-title">商家公告</h3>
	<p class="shopbulletin-content ng-binding">{{ $ob->desc }}</p>
	<div class="shopbulletin-delivery"><h4>配送说明：</h4>
	<p class="ng-binding">配送费￥ {{ $ob->money }}</p></div>
	<ul class="shopbulletin-supports"><li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
	<span ng-style="{'background-color': '#' + support.icon_color}" class="ng-binding" 
	style="background-color: rgb(153, 153, 153);">保</span> 
	已加入“外卖保”计划，食品安全有保障</li><li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
	<span ng-style="{'background-color': '#' + support.icon_color}" class="ng-binding" 
	style="background-color: rgb(153, 153, 153);">票</span> 
	该商家支持开发票，开票订单金额50.0元起，请在下单时填写好发票抬头</li>
	<li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
	<span ng-style="{'background-color': '#' + support.icon_color}"
	class="ng-binding" style="background-color: rgb(87, 169, 255);">准</span>
	准时必达，超时秒赔</li></ul>
	<a href="" class="shopcomplaint" ng-click="testLogin()">举报商家</a></div>
	<div class="dialog" role="dialog" dialog="complaintDialog" style="display: none;">
	<div class="dialog-close icon-close"></div>
	<div class="dialog-content" ng-transclude="">
	<h5 class="complaint-title ng-scope">举报商家</h5>
	<form ng-submit="complaint()" class="ng-scope ng-pristine ng-valid"><label class="complaint-field">
	<textarea class="shopcomplaint-textarea ng-pristine ng-valid" ng-model="complaintObj.text" rows="6" cols="40">
	</textarea></label>
	<div class="complaint-field"><button type="submit" class="btn-primary">提交</button>
	</div></form></div></div></div></div>


</div>


		<!-- 侧 -->
		<div class="sidetools" side-tools="">
		<a href="http://kaidian.ele.me" class="sidetools-item icon-visit-history" target="_blank"
		 title="我要开店" tooltip="我要开店" tooltip-placement="left"></a>
		<div class="sidetools-item icon-qrcode">
		<img class="sidetools-qrcode" src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" 
		alt="扫描二维码免费下载手机App"></div>
		<a href="JavaScript:" class="sidetools-item icon-service" title="在线客服" tooltip="在线客服" 
		tooltip-placement="left" online-service="" target="_blank" style="visibility: visible;"></a>
		<a href="/shoplist/1" class="sidetools-item icon-arrow-up" title="回到顶部" tooltip="回到顶部"
		 tooltip-placement="left" ng-click="backToTop()"></a></div>

 
</div>


		<footer class="footer" role="contentinfo"><div class="container clearfix"><div class="footer-link">
		<h3 class="footer-link-title">用户帮助</h3>
		<a class="footer-link-item" href="/support/center" target="_blank">服务中心</a>
		<a class="footer-link-item" href="/support/question/default" target="_blank">常见问题</a></div>
		<div class="footer-link"><h3 class="footer-link-title">商务合作</h3>
		<a class="footer-link-item" href="//kaidian.ele.me" target="_blank">我要开店</a>
		<a class="footer-link-item" href="/support/about/jiameng" target="_blank">加盟指南</a>
		<a class="footer-link-item" href="/support/about/contact" target="_blank">市场合作</a> 
		<a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">开放平台</a></div>
		<div class="footer-link"><h3 class="footer-link-title">关于我们</h3>
		<a class="footer-link-item" href="/support/about" target="_blank">饿了么介绍</a> 
		<a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">加入我们</a>
		<a class="footer-link-item" href="/support/about/contact" target="_blank">联系我们</a>
		<a class="footer-link-item" href="/support/rules/default" target="_blank">规则中心</a></div>
		<div class="footer-contect"><div class="footer-contect-item">
		24小时客服热线 : <a class="inherit" href="tel:10105757">10105757</a></div><div class="footer-contect-item">
		意见反馈 : <a class="inherit" href="mailto:feedback@ele.me">feedback@ele.me</a></div>
		<div class="footer-contect-item">
		关注我们 :<div href="JavaScript:" class="icon-wechat" ubt-click="402">
		<div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
		<img src="//faas.elemecdn.com/desktop/media/img/wexinqc100@2x.393ade.png" alt="微信号: elemeorder">
		<p>微信号: elemeorder</p><p>饿了么网上订餐</p></div></div>
		<a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank"></a></div></div>
		<div class="footer-mobile"><a href="https://h.ele.me/landing" target="_blank">
		<img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" class="footer-mobile-icon"
		alt="扫一扫下载饿了么手机 App"></a>
		<div class="footer-mobile-content"><h3>下载手机版</h3><p>扫一扫,手机订餐方便</p></div></div>
		<div class="footer-copyright serif"><h5 class="owner">所有方：上海拉扎斯信息科技有限公司</h5>
		<p>增值电信业务许可证 : <a href="http://www.shca.gov.cn/" target="_blank">沪B2-20150033</a> | 
		<a href="http://www.miibeian.gov.cn/" target="_blank">沪ICP备 09007032</a> | 
		<a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823"
		target="_blank">上海工商行政管理</a>
		Copyright ?2008-2017 ele.me, All Rights Reserved.</p></div>
		<div class="footer-police container">
		<a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank">
		<img alt="已通过沪公网备案，备案号 310100103568" src="//faas.elemecdn.com/desktop/media/img/picp_bg.e373b3.jpg"
		height="30">
		</a></div></div></footer>


	<script src="//crayfish.elemecdn.com/www.ele.me/home"></script>
	<script src="//v2.live800.com/live800/chatClient/textStatic.js"></script>
	
  </body>
</html>
