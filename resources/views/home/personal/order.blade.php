
@extends("home.index")
 @section("content")

	<div class="profile-panel" role="main">
	<!-- ngIf: pageTitleVisible -->
	<h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope"><span ng-bind="pageTitle" class="ng-binding">近三个月订单</span> <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span></h3>
	<!-- end ngIf: pageTitleVisible -->
	<div class="profile-panelcontent" ng-transclude="">
	<div class="order-fetchtakeout ng-scope ng-isolate-scope" show-fetch-takeout-dialog="">
	<img src="//faas.elemecdn.com/desktop/media/img/takeout.408a87.png"></div>
	<div class="order-extra ng-scope"><a href="/support/question/hotissue" target="_blank">热门问题</a> 
	<a href="//static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank">随时关注订单状态</a></div>
	<div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-show="!orderList"><!-- ngIf: type==='profile' --><img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope"><!-- end ngIf: type==='profile' --> <!-- ngIf: type==='normal' -->正在载入数据...</div><div class="order-nocontent nodata ng-isolate-scope ng-hide" ng-show="orderList &amp;&amp; !orderList.length" nodatatip="" content="暂无记录，现在就去<a href='/place'>订餐</a>吧!"><p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">暂无记录，现在就去<a href="/place">订餐</a>吧!</p></div><table class="order-list ng-scope" ng-show="orderList.length"><thead><tr><th>下单时间</th><th class="order-list-infoth">订单内容</th><th></th><th>支付金额（元）</th><th>状态</th><th>操作</th></tr></thead><tbody><tr></tr><!-- ngRepeat: item in orderList -->
	@foreach($order as $or)
	<tr class="timeline" order-timeline="" ng-repeat="item in orderList">
	<td class="ordertimeline-time">
	<p class="ordertimeline-title ng-binding" ng-bind="item.created_at | parseDate">{{substr($or->create_time,5,5)}}</p>
	<p ng-bind="item.created_at | date:'HH:mm'" class="ng-binding">{{substr($or->create_time,10,6)}}</p>
	<!-- ngIf: item.realStatus !== 5 --> <!-- ngIf: item.realStatus === 5 -->
	<i class="ordertimeline-time-icon icon-uniE65E finish ng-scope" ng-if="item.realStatus === 5"></i>
	<!-- end ngIf: item.realStatus === 5 --></td>

	<td class="ordertimeline-avatar">
	<a ng-href="/shop/1356235" href="/shop/1356235"><img ng-src="//fuss10.elemecdn.com/e/98/0ba95a6f77ff43dbd8a85bf6f1559jpeg.jpeg?imageMogr2/thumbnail/70x70/format/webp/quality/85" src="//fuss10.elemecdn.com/e/98/0ba95a6f77ff43dbd8a85bf6f1559jpeg.jpeg?imageMogr2/thumbnail/70x70/format/webp/quality/85"></a></td>
	<td class="ordertimeline-info">
	<h3 class="ordertimeline-title">
	<a ng-href="/shop/1356235" ng-bind="item.restaurant.name" class="ng-binding" href="/shop/1356235">{{$or->shop_name}}</a> 
	<!-- ngIf: item.is_book --></h3>
	<p class="ordertimeline-info-food">
	<a ng-href="order/id/1210345105240984764" href="order/id/1210345105240984764">
	<span class="ordertimeline-food ng-binding" ng-bind="item.product">{{$or->description}}</span>
	 <!-- ngIf: item.productnamenum > 2 --> 
	 <span class="ordertimeline-info-productnum ng-binding" ng-bind="item.productnum">{{$or->goods_num}}</span>
	  <span>个菜品</span></a></p>
	  <p>订单号: <a ng-href="order/id/1210345105240984764" ng-bind="item.unique_id" class="ng-binding" href="order/id/1210345105240984764">{{$or->id}}</a></p></td>
	  <td class="ordertimeline-amount">
	  <h3 class="ordertimeline-title ordertimeline-price ui-arial ng-binding" ng-bind="item.total_amount.toFixed(2)">{{$or->amount}}</h3>
	  <p ng-bind="item.is_online_paid ? '在线支付' : '货到付款'" class="ng-binding">在线支付</p></td>
	  <td class="ordertimeline-status">
	  <h3 ng-bind="item.statusText" ng-class="{'waitpay': (item.realStatus === 1), 'end': (item.realStatus === 5)}" class="ng-binding end">{{['未付款','已接单','正在配送','已收货','已评论','已取消'][$or->status]}}</h3>
	  <p class="ordertimeline-status-time ng-binding ordertimeline-status-warning" ng-class="{'ordertimeline-status-warning' : item.realStatus !== 1}" ng-bind="statusText"></p></td>
	  <td class="ordertimeline-handle"><a class="ordertimeline-handle-detail" ng-href="perosnal/order/id/{{$or->id}}" href="personal/order/id/{{$or->id}}">订单详情</a> 
	  <!-- ngIf: item.realStatus === 1 --> <!-- ngIf: item.realStatus === 2 --> <!-- ngIf: item.realStatus === 3 --> <!-- ngIf: item.realStatus === 4 --> <!-- ngIf: item.realStatus === 5 -->
        @if($or->status == 3)
	  <a ng-if="item.realStatus === 3" class="ordertimeline-handle-a ng-scope" href="/personal/rateorderform/{{ $or->id }}" ng-click="bundle.restore(item)">请评论</a>
        @else
	  <a ng-if="item.realStatus === 5" class="ordertimeline-handle-a ng-scope" href="javascript:" ng-click="bundle.restore(item)">再来一份</a>
        @endif
	  <!-- end ngIf: item.realStatus === 5 --> <!-- ngIf: item.realStatus === 6 --></td>
	  </tr>
	  @endforeach<!-- end ngRepeat: item in orderList -->
	<!-- end ngRepeat: item in orderList --></tbody></table>
	<div pagination="order" pagination-context="pageContext" pagination-onchange="onOrderPageChange()" class="ng-scope pagination"><ul><li class="current">1</li><li>2</li></ul></div></div></div>
@endsection 
