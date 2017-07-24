<!DOCTYPE html>
<html ng-app="eleme" perf-error="desktop/" class="ng-scope"><head><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide{display:none !important;}ng\:form{display:block;}.ng-animate-block-transitions{transition:0s all!important;-webkit-transition:0s all!important;}.ng-hide-add-active,.ng-hide-remove{display:block!important;}</style>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit">


    <title ng-bind="SEO.title" class="ng-binding">饿了么-网上订餐_外卖_饿了么订餐官网</title>



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
    

    <!--[if lte IE 8]><script>window.location.href='https://h.ele.me/activities/landing';</script><![endif]-->
    <script type="text/javascript" src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
    <base href="/">
  <meta name="mobile-agent" content="undefined"><meta name="description" content="饿了么是中国专业的网上订餐平台，目前已覆盖北京、上海、杭州、广州等300多个城市，提供各类中式、日式、韩式、西式、下午茶、夜宵等优质美食，并提供送餐上门服务，让订餐更加轻松，叫外卖就上饿了么！"><meta name="keywords" content="饿了么，网上订餐，外卖，快餐外卖，外卖网"></head>
  
<body cute-title="" ng-class="{hidesidebar: layoutState &amp;&amp; layoutState.hideSidebar, smallbody: layoutState.smallBody, whitebody: layoutState.whiteBody}" style="position: relative;" class="hidesidebar">
  
    <div ng-switch="state.type" state="layoutState" class="ng-isolate-scope">
        <!-- ngSwitchWhen: checkout -->
        <header class="carttopbar" ng-switch-when="checkout" topbar-checkout="" state="state">
            <div class="carttopbar-nav container clearfix">
                <span class="carttopbar-nav-path">当前位置：<a ng-href="/place/wx4spk2nqhf" ng-bind="$root.place.name || $root.place.address" class="ng-binding" href="/place/wx4spk2nqhf">{{ $location['address'] }}</a> <i class="icon-arrow-right"></i> <a class="inherit ng-binding" ng-href="/shop/1244889" ng-bind="state.rstName" ng-show="state.rstName" href="/shoplist/{{$ob->shopid}}">{{$ob->shopname}}</a> <i class="icon-arrow-right" ng-show="state.rstName"></i> 订单信息</span>
                <div topbar-profilebox="">
                    <div class="topbar-profilebox"><!-- ngIf: $root.user.avatar && $root.topbarType !== 'checkout' -->
                        <img class="topbar-profilebox-avatar ng-scope" ng-src="//fuss10.elemecdn.com/4/ef/70827800a8437d1ae1c0b8194fe41jpeg.jpeg?imageMogr2/thumbnail/26x26" ng-if="$root.user.avatar &amp;&amp; $root.topbarType !== 'checkout'" alt="个人头像" src="//fuss10.elemecdn.com/4/ef/70827800a8437d1ae1c0b8194fe41jpeg.jpeg?imageMogr2/thumbnail/26x26">
                        <!-- end ngIf: $root.user.avatar && $root.topbarType !== 'checkout' --> 
                        <span class="topbar-profilebox-avatar icon-profile ng-hide" ng-show="!$root.user.username"></span>
                        <span ng-show="!$root.user.username" class="ng-hide">
                            <a ng-href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fcart%2Fcheckout" target="_blank" href="//h5.ele.me//login/#redirect=https%3A%2F%2Fwww.ele.me%2Fcart%2Fcheckout">登录/注册</a>
                        </span> 
                        <span class="topbar-profilebox-wrapper" ng-show="$root.user.username"><!-- ngIf: $root.topbarType === 'checkout' --> 
                            <span class="topbar-profilebox-username ng-binding">{{ $user->username }}</span> 
                            <!-- ngIf: $root.topbarType === 'checkout' --> <!-- ngIf: $root.topbarType !== 'checkout' -->
                            <span class="topbar-profilebox-btn icon-arrow-down ng-scope" ng-if="$root.topbarType !== 'checkout'"></span>
                            <!-- end ngIf: $root.topbarType !== 'checkout' -->
                            <div class="dropbox topbar-profilebox-dropbox">
                                <a class="icon-profile" href="/personal" hardjump="">个人中心</a> 
                                <a class="icon-star" href="/personal/collect" hardjump="">我的收藏</a> 
                                <a class="icon-location" href="/personal/address" hardjump="">我的地址</a> 
                                <a class="icon-setting" href="/personal/security" hardjump="">安全设置</a> 
                                <a class="icon-logout" href="/logout" ng-click="logout()">退出登录</a>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </header><!-- ngSwitchDefault:  -->
    </div>
    

    <div class="importantnotification container" role="banner">
        <!-- ngIf: enable -->
    </div>
    <div class="sidebar ng-hide" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar">
        <div class="sidebar-tabs">
            <div class="toolbar-tabs-middle">
                <a class="toolbar-btn icon-order toolbar-close" href="/profile/order" hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order"><!-- ngIf: sidebarCount.uncompletedOrder > 0 --></a>
                <div class="toolbar-separator">
                </div>
                <a class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum" href="JavaScript:" template="cart" ng-class="{'focus': (activeTemplate === 'cart' &amp;&amp; isSidebarOpen), 'toolbar-cartbtn-shownum': foodCount.count}" ubt-click="390">购物车<!-- ngIf: foodCount.count --><i class="toolbar-cartnum ng-binding ng-scope" ng-if="foodCount.count" ng-bind="foodCount.count">4</i><!-- end ngIf: foodCount.count --></a>
                <div class="toolbar-separator"></div>
                <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:" template="message" ng-class="{'focus': (activeTemplate === 'message' &amp;&amp; isSidebarOpen), 'toolbar-open': user, 'modal-hide': user}" tooltip="我的信息" tooltip-placement="left" ubt-click="392"><!-- ngIf: messageCount.count --></a>
            </div>
            <div class="toolbar-tabs-bottom">
                <div class="toolbar-btn icon-QR-code">
                    <div class="dropbox toolbar-tabs-dropbox">
                        <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank">
                            <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" alt="下载手机应用">
                            <p>下载手机应用</p>
                            <p class="icon-QR-code-bonus">即可参加分享红包活动</p>
                        </a>
                    </div>
                </div>
                <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部" href="JavaScript:" tooltip-placement="left" style="visibility: hidden;"></a>
            </div>
        </div>
        <div class="sidebar-content"><!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+ activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' -->
        </div>
    </div>
    <!-- ngView:  -->
    <div ng-view="" role="main" class="ng-scope">
    
    <div class="checkoutguide ng-isolate-scope" checkout-guide="" guide="guide">
        <div class="container"><a class="checkoutguide-logo icon-logo" href="/"></a> 
            <span class="checkoutguide-text ng-binding" ng-bind="guide.text">订单信息</span><!-- ngIf: guide.step -->
            <div class="checkoutguide-content step2" ng-if="guide.step">
                <span class="checkoutguide-item active" ng-class="{active: guide.step >= 1}">选择商品</span> 
                <span class="checkoutguide-item active" ng-class="{active: guide.step >= 2}">确认订单信息</span> 
                <span class="checkoutguide-item" ng-class="{active: guide.step >= 3}">成功提交订单</span>
                <p class="checkoutguide-line">
                    <span class="line line1"></span> 
                    <span class="line line2"></span> 
                    <span class="line line3"></span> 
                    <span class="line line4"></span>
                </p>
            </div><!-- end ngIf: guide.step -->
        </div>
    </div>
    
    @if( $shopcart['shopcart'] )
    <div id="order_info" class="container clearfix ng-scope"><!-- ngIf: loading --><!-- ngIf: !loading && nofood --><!-- ngIf: !loading && !nofood -->
        <div ng-if="!loading &amp;&amp; !nofood" class="checkout-cart ng-scope ng-isolate-scope" checkout-cart="cart">
            <div class="checkoutcart-container">
                <div class="checkoutcart-title"><h2>订单详情</h2><a ng-href="/shop/{{ $ob->shopid }}" href="/shoplist/{{ $ob->shopid }}">&lt; 返回商家修改</a></div>
                    <div class="checkoutcart-tablerow tablehead">
                        <div class="cell itemname">商品</div>
                        <div class="cell itemquantity">份数</div>
                        <div class="cell itemtotal">小计（元）</div>
                    </div>
                    <!-- ngRepeat: basket in cart.vm.group --><!-- ngIf: basket.length -->
                    <dl ng-if="basket.length" ng-repeat="basket in cart.vm.group" class="checkoutcart-group ng-scope">
                        <dt ng-bind="$index + 1 + '号购物车'" class="checkoutcart-grouptitle ng-binding">1号购物车</dt><!-- ngRepeat: item in basket -->

                        @foreach ( $shopcart['shopcart'] as $id => $food )
                        <dd ng-repeat="item in basket" class="ng-scope">
                            <div class="checkoutcart-tablerow">
                                <div class="cell itemname ng-binding" ng-bind="item.name" title="{{ $food['food']->title }}">{{ $food['food']->title }}</div>
                                <div class="cell itemquantity">
                                    <button  foodid="{{ $id }}" onclick="addShopcart(this,-1)"   ng-click="cart.sub(item)">-</button><input ng-model="item.quantity" ng-change="cart.update(item)" ng-blur="cart.blur(item)" class="ng-pristine ng-valid" value="{{ $food['num'] }}"><button  foodid="{{ $id }}" onclick="addShopcart(this,1)"   ng-click="cart.add(item)">+</button>
                                </div>
                                <div class="cell itemtotal ng-binding" ng-bind="'¥' + (item.price * item.quantity | number:2)">¥{{ $food['total'] }}</div>
                            </div>
                        </dd><!-- end ngRepeat: item in basket -->
                        @endforeach

                    </dl><!-- end ngIf: basket.length --><!-- end ngRepeat: basket in cart.vm.group --><!-- ngIf: cart.vm.extra || cart.vm.records -->
                    <ul ng-if="cart.vm.extra || cart.vm.records" class="ng-scope"><!-- ngRepeat: item in cart.vm.extra -->
                        <li ng-repeat="item in cart.vm.extra" class="checkoutcart-tablerow extra ng-scope">
                            <div class="cell itemname">
                                <span ng-bind="item.name" title="配送费" class="ng-binding">配送费</span> <!-- ngIf: item.name === '配送费' -->
                                <span ng-if="item.name === '配送费'" class="icon-circle-help ng-scope" tooltip="" tooltip-placement="left"></span><!-- end ngIf: item.name === '配送费' -->
                            </div>
                            <div class="cell itemquantity"></div>
                            <div class="cell itemtotal ng-binding" ng-class="{minus: item.price < 0}" ng-bind="'¥' + (item.price | number:2)">¥{{ $shopcart['money'] }}</div>
                        </li><!-- end ngRepeat: item in cart.vm.extra --><!-- ngRepeat: item in cart.vm.records -->
                    </ul><!-- end ngIf: cart.vm.extra || cart.vm.records -->
                    <div class="checkoutcart-total color-stress">¥
                        <span class="num ng-binding" ng-bind="cart.vm.total | number: 2">{{ $shopcart['total'] + $shopcart['money'] }}</span>
                    </div>
                    <div class="checkoutcart-totalextra">共 
                        <span ng-bind="cart.pieces" class="ng-binding">{{ $shopcart['num'] }}</span> 份商品<!-- ngIf: cart.vm.benefit -->
                    </div>
                </div>
            </div><!-- end ngIf: !loading && !nofood --><!-- ngIf: !loading && !nofood -->


            <div ng-if="!loading &amp;&amp; !nofood" class="checkout-content ng-scope">
                <div class="checkout-select ng-isolate-scope" checkout-address="" checkout-data="checkoutData" address-list="addressList" address="address" isbaisheng="isBaishengRst">
                    <h2>收货地址 <a ng-show="addressList.length" class="checkout-addaddress" href="javascript:" ng-click="addAddress()">添加新地址</a></h2><!-- ngIf: !addressList.length -->
                    <ul ng-hide="!addressList.length" class="checkout-address-list" ng-class="{ showmore: showMoreAddress, showfirst: noInitAddress }"><!-- ngRepeat: item in addressList -->

                        @if( empty($addressList) )
                        <a onclick="" class="checkout-noaddress ng-scope" ng-if="!addressList.length" href="javascript:" ng-click="addAddress()">+ 添加新地址</a>
                        @else
                        @foreach( $addressList as $k=>$address )
                        @if($k==0)
                        <li class="checkout-address ng-scope active" ng-repeat="item in addressList" ng-click="selectAddress($event, item)" ng-class="{active: address.id === item.id}" ng-mouseenter="selectAddress($event, item)"><i class="checkout-address-icon icon-location-line"></i>
                            <div class="checkout-address-info">
                                <p ng-bind="item.name + [' ', ' 先生 ', ' 女士 '][item.sex] + item.phone" class="ng-binding">{{ $address['name']." ".['', ' 先生 ', '女士 '][$address['sex']]." ".$address['phone'] }}</p>
                                <p class="color-weak ng-binding" ng-bind="item.address + item.address_detail">{{ $address['address'] }}</p>
                            </div>
                            <div class="checkout-address-edit"><a href="javascript:" ng-click="editAddress($event, item)">修改</a> <a href="javascript:" ng-click="removeAddress($event, item)">×</a>
                            </div><!-- ngIf: !item.st_geohash --><!-- ngIf: !item.is_deliverable -->
                        </li><!-- end ngRepeat: item in addressList -->
                        @else
                        <li class="checkout-address ng-scope" ng-repeat="item in addressList" ng-click="selectAddress($event, item)" ng-class="{active: address.id === item.id}" ng-mouseenter="selectAddress($event, item)"><i class="checkout-address-icon icon-location-line"></i>
                            <div class="checkout-address-info">
                                <p ng-bind="item.name + [' ', ' 先生 ', ' 女士 '][item.sex] + item.phone" class="ng-binding">{{ $address['name']." ".['', ' 先生 ', '女士 '][$address['sex']]." ".$address['phone'] }}</p>
                                <p class="color-weak ng-binding" ng-bind="item.address + item.address_detail">{{ $address['address'] }}</p>
                            </div>
                            <div class="checkout-address-edit"><a href="javascript:" ng-click="editAddress($event, item)">修改</a> <a href="javascript:" ng-click="removeAddress($event, item)">×</a>
                            </div><!-- ngIf: !item.st_geohash --><!-- ngIf: !item.is_deliverable -->
                            <p ng-if="!item.is_deliverable" ng-show="!item.is_deliverable" class="checkout-address-needupgrade ng-scope">地址超出配送范围</p><!-- end ngIf: !item.is_deliverable --><!-- ngIf: item.st_geohash && item.poi_type === 1 && isbaisheng -->
                        </li><!-- end ngRepeat: item in addressList -->
                        @endif
                        @endforeach
                        @endif

                        <a class="checout-showmoreaddress" href="javascript:" ng-click="showMoreAddress = true" ng-show="!showMoreAddress &amp;&amp; addressList.length > 1">显示更多地址<i class="icon-arrow-down"></i></a>
                        <a class="checout-showmoreaddress ng-hide" href="javascript:" ng-click="showMoreAddress = false" ng-show="showMoreAddress &amp;&amp; addressList.length > 1">收起<i class="icon-arrow-up"></i></a>
                    </ul>
                </div>
                <div class="checkout-select">
                    <h2 class="checkout-title">付款方式<span class="color-tip checkout-pay-tip">推荐使用在线支付，不用找零，优惠更多</span></h2>
                    <ul class="clearfix"><!-- ngRepeat: pay in payList -->
                        <li class="checkout-pay ng-scope active" ng-repeat="pay in payList" ng-click="selectPay(pay.id, pay.disabled)" ng-class="{active: payId === pay.id, disabled: pay.disabled}" tooltip="">
                            <p ng-bind="pay.title" class="ng-binding">在线支付</p>
                            <p class="color-mute ng-binding" ng-bind="pay.tip">支持微信、支付宝、QQ钱包及大部分银行卡</p></li><!-- end ngRepeat: pay in payList --><li class="checkout-pay ng-scope disabled" ng-repeat="pay in payList" ng-click="selectPay(pay.id, pay.disabled)" ng-class="{active: payId === pay.id, disabled: pay.disabled}" tooltip="该商家仅支持在线支付">
                            <p ng-bind="pay.title" class="ng-binding">货到付款</p>
                            <p class="color-mute ng-binding" ng-bind="pay.tip">送货上门后再付款</p>
                        </li><!-- end ngRepeat: pay in payList -->
                    </ul>
                </div>
                <div class="checkout-select"><h2 class="checkout-title">选择优惠</h2>
                    <p class="checkout-info">
                        <span class="checkout-infolabel">使用红包</span> 
                        <span class="color-mute">无可用红包<!-- ngIf: checkout.hongbaoCount --></span>
                    </p>
                    <p class="checkout-info">
                        <span class="checkout-infolabel">使用优惠券</span> 
                        <span class="color-mute">网站不支持<em class="color-stress">（仅手机客户端可用）</em></span>
                    </p>
                </div>
                <div class="checkout-select">
                    <h2 class="checkout-title">其他信息</h2>
                    <div class="checkout-info">
                        <span class="checkout-infolabel">配送方式</span> 
                        <span>本订单由<a ng-bind="' [' + delivery + '] '" class="ng-binding"> [{{ $ob->shopname }}] </a>提供配送</span>
                    </div>
                    <div class="checkout-info" ng-show="showDeliverTime">
                        <span class="checkout-infolabel">送达时间</span>
                        <div class="formselect ng-isolate-scope" formselect="" data="bookTimes" choosed="time" selectfn="updateDeliverTime">
                            <span class="formselect-value ng-binding">立即送达</span>
                            <div class="formselect-data ui-scrollbar-light"><!-- ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope active">立即送达<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">17:15 - 17:30<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">17:30 - 17:45<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">17:45 - 18:00<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">18:00 - 18:15<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">18:15 - 18:30<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">18:30 - 18:45<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">18:45 - 19:00<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">19:00 - 19:15<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">19:15 - 19:30<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">19:30 - 19:45<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">19:45 - 20:00<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">20:00 - 20:15<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">20:15 - 20:30<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">20:30 - 20:45<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                                <span ng-repeat="item in data" ng-click="select($event, item)" ng-class="{active: (selected === item &amp;&amp; !item.disabled), disabled: item.disabled}" class="ng-binding ng-scope">20:45 - 21:00<i class="icon-check"></i></span><!-- end ngRepeat: item in data -->
                            </div>
                            <i class="icon-arrow-down"></i>
                        </div>
                    </div>
                    <div class="checkout-info">
                        <span class="checkout-infolabel">发票信息</span> 
                        <span class="checkout-invoice" ng-mouseenter="toggleInvoice($event)" ng-mouseleave="toggleInvoice($event)">
                            <input class="checkout-input ng-pristine ng-valid" placeholder="仅在饿了么 APP 中支持开发票哦" ng-disabled="!checkoutData.invoice.is_available" ng-model="invoiceRef.invoiceValue" ng-change="updateInvoice(invoiceRef.invoiceValue)" disabled="disabled">
                            <ul class="checkout-invoice-list ng-hide" ng-show="showInvoice"><!-- ngRepeat: item in invoices --></ul>
                        </span>
                    </div>
                    <div class="checkout-info">
                        <span class="checkout-infolabel">订单备注</span> 
                        <span><input class="checkout-input ng-pristine ng-valid" ng-model="note" ng-change="updateDescription(note)"></span>
                    </div>
                </div>
                <div>
                    <button onclick="submitOrder()" quicksubmit-trigger="" submit-visable="checkout.submitVisable" class="btn-stress btn-lg ng-binding ng-isolate-scope" ng-disabled="orderButton.disabled" ng-bind="orderButton.text" ng-click="orderSubmit()">确认下单</button>
                    <div class="checkout-dapp">
                        <p class="checkout-dapp-tip">扫码下载APP<br>APP下单立享优惠</p><i class="icon-qrcode checkout-dapp-qrcode"></i> <i class="icon-uniE029 checkout-dapp-arrow"></i> <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" alt="扫一扫下载饿了么手机 App">
                    </div>
                </div>
            </div><!-- end ngIf: !loading && !nofood -->
            @else
            <div class="container clearfix ng-scope"><!-- ngIf: loading --><!-- ngIf: !loading && nofood -->
                <div class="nodata ng-isolate-scope" ng-if="!loading &amp;&amp; nofood" nodatatip="" content="你的购物车是空的，去<a href='/place'>下单</a>吧">
                    <p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">你的购物车是空的，去<a href="/place">下单</a>吧</p>
                </div><!-- end ngIf: !loading && nofood --><!-- ngIf: !loading && !nofood --><!-- ngIf: !loading && !nofood -->
            </div>
            @endif
        </div>
        <div class="checkout-quicksubmit ng-scope ng-hide" ng-hide="checkout.submitVisable || nofood">
            <div class="container">
                <span class="quick-text">应付金额 
                    <span class="yen">¥</span>
                    <span class="total ng-binding" ng-bind="cartView.vm.total">30</span>
                </span>
                <button onclick="submitOrder()" class="btn-stress btn-lg ng-binding" ng-disabled="orderButton.disabled" ng-bind="orderButton.text" ng-click="orderSubmit()">确认下单</button>
            </div>
        </div>
    </div>
    <script typt="text/javascript">
        //var  url = "/" + {{ $ob->shopid }} + "/addorder";
        /*
        var  url = "/addorder";
        var  userid = {{ $user->id }}; //用户id
        var  shopid = {{ $ob->shopid }}; //商家id
        var  shop_name = "{{ $ob->shopname }}"; //商家名
        var  shop_phone = "{{ $ob->phone }}"; //商家电话
        var  goods_num = {{ $shopcart['num'] }}; //商品总数
        var  addressid = 1; //收货地址
        var  amount = {{ $shopcart['total'] }}; //总金额
        var  status = 1; //订单状态
        var  delivery_fee = {{ $shopcart['money'] }}; //配送费
        var  lunch_box_fee = 5; //餐盒费
        var  service_time = '18:00'; //送达时间
        var  pay = 1; //支付方式
        var  distribution = 1; //配送方式
        var  invoice_info = '无'; //发票信息
        var  remark = '备注'; //备注
        var  _food_num_price_1 = "1_3_3_1";
        var  _food_num_price_2 = "2_4_4_2";
        */

        var url = "/" + {{ $ob->shopid }} + "/addorder";
        var addressid = 1;
        var service_time = "18:30";
        var pay = 1;
        var remark = "备注";

        var params = {addressid:addressid, service_time:service_time, pay:pay, remark:remark}
 
        function submitOrder(){
            var n = 0;
            var temp = document.createElement("form");
            document.body.appendChild(temp);
            temp.action = url;
            temp.method = "POST";
            temp.style.display = "none";
            for(var i in params){
                var input = document.createElement("input");
                input.value = params[i];
                input.type = "text";
                input.name = i;
                temp.appendChild(input);
            }
            //alert(n);
            var crsf = document.createElement("input");
            crsf.name = "_token";
            crsf.value = "{{ csrf_token() }}";
            crsf.type = "hidden";
            temp.appendChild(crsf);
            temp.submit();
        }


    </script>
    <script>
        function addShopcart(e,m){
            var foodid = e.getAttribute('foodid');
            var empty_notice= "<div class=\"container clearfix ng-scope\"><!-- ngIf: loading --><!-- ngIf: !loading && nofood --><div class=\"nodata ng-isolate-scope\" ng-if=\"!loading &amp;&amp; nofood\" nodatatip=\"\" content=\"你的购物车是空的，去<a href='/place'>下单</a>吧\"><p class=\"nodata-container ng-binding\" ng-bind-html=\"content | toTrusted\">你的购物车是空的，去<a href=\"/place\">下单</a>吧</p></div><!-- end ngIf: !loading && nofood --><!-- ngIf: !loading && !nofood --><!-- ngIf: !loading && !nofood --></div>";
            $.ajax({
                url:"/addtocart/"+  {{$ob->shopid}}  + "/" + foodid,
                type:"get",
                data:"m=" + m,
                datatype:"json",
                success:function(data){
                    var data = $.parseJSON(data);
                    if(data.num<=0 && data.status==1){
                        alert($(e).parent().parent().parent().parent().children().length);
                        if($(e).parent().parent().parent().parent().children().length == 2){
                            //$("#order_info").after(empty_notice)
                            //$("#order_info").parent().append("<div>asdlfasdf</div>")
                            //$("#order_info").remove();
                            document.getElementById("order_info").remove();
                        }else{
                            $(e).parent().parent().parent().remove();
                            //$("#order_info").remove();
                        }
                    }else if(data.status==1){
                        $(e).parent().children('input:first').val(data.num);
                        $(e).parent().next().html("¥"+(data.num*data.price));
                        //$(e).parent().parent().parent().next().next().children("span:first").html({{ $shopcart['total'] + $shopcart['money'] }});
                        //alert(data.time);//
                        $(e).parent().parent().parent().parent().next().next().children("span:first").html(data.total + {{ $shopcart['money'] }});
                    }
                },
                error:function(){
                    alert("失败了");
                }
            });
        }   
    </script>

    <footer class="footer" role="contentinfo">
        <div class="container clearfix">
            <div class="footer-link">
                <h3 class="footer-link-title">用户帮助</h3>
                <a class="footer-link-item" href="/support/center" target="_blank">服务中心</a>
                <a class="footer-link-item" href="/support/question/default" target="_blank">常见问题</a>
            </div>
            <div class="footer-link">
                <h3 class="footer-link-title">商务合作</h3>
                <a class="footer-link-item" href="//kaidian.ele.me" target="_blank">我要开店</a>
                <a class="footer-link-item" href="/support/about/jiameng" target="_blank">加盟指南</a>
                <a class="footer-link-item" href="/support/about/contact" target="_blank">市场合作</a>
                <a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">开放平台</a>
            </div>
            <div class="footer-link">
                <h3 class="footer-link-title">关于我们</h3>
                <a class="footer-link-item" href="/support/about" target="_blank">饿了么介绍</a>
                <a class="footer-link-item" href="http://jobs.ele.me/" target="_blank">加入我们</a>
                <a class="footer-link-item" href="/support/about/contact" target="_blank">联系我们</a>
                <a class="footer-link-item" href="/support/rules/default" target="_blank">规则中心</a>
            </div>
            <div class="footer-contect">
                <div class="footer-contect-item">24小时客服热线 : <a class="inherit" href="tel:10105757">10105757</a>
                </div>
                <div class="footer-contect-item">意见反馈 : <a class="inherit" href="mailto:feedback@ele.me">feedback@ele.me</a>
                </div>
                <div class="footer-contect-item">关注我们 :
                    <div href="JavaScript:" class="icon-wechat" ubt-click="402">
                        <div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
                            <img src="//faas.elemecdn.com/desktop/media/img/wexinqc100@2x.393ade.png" alt="微信号: elemeorder">
                            <p>微信号: elemeorder</p>
                            <p>饿了么网上订餐</p>
                        </div>
                    </div>
                    <a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank"></a>
                </div>
            </div>
            <div class="footer-mobile">
                <a href="https://h.ele.me/landing" target="_blank">
                    <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" class="footer-mobile-icon" alt="扫一扫下载饿了么手机 App">
                </a>
                <div class="footer-mobile-content">
                    <h3>下载手机版</h3>
                    <p>扫一扫,手机订餐方便</p>
                </div>
            </div>
            <div class="footer-copyright serif">
            <h5 class="owner">所有方：上海拉扎斯信息科技有限公司</h5>
            <p>增值电信业务许可证 : <a href="http://www.shca.gov.cn/" target="_blank">沪B2-20150033</a> | <a href="http://www.miibeian.gov.cn/" target="_blank">沪ICP备 09007032</a> | <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823" target="_blank">上海工商行政管理</a> Copyright ©2008-2017 ele.me, All Rights Reserved.</p>
        </div>
        <div class="footer-police container"><a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank"><img alt="已通过沪公网备案，备案号 310100103568" src="//faas.elemecdn.com/desktop/media/img/picp_bg.e373b3.jpg" height="30"></a>
        </div>
    </div>
    </footer>
  

  
  
    <script src="//crayfish.elemecdn.com/www.ele.me/home"></script>
  
  

</body></html>
