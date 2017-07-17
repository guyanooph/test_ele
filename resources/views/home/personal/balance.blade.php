 @extends("home.index")
  @section("content")
 
   <div class="profile-panel" role="main">
	 <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
	 <span ng-bind="pageTitle" class="ng-binding">账户余额</span>
	 <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
	 </h3>
	 
	 <div class="profile-panelcontent" ng-transclude="">
	 
	 <div class="balance-summary index ng-scope">
	 <p class="balance-tip">
	 <span class="balance-summary-title">当前账户余额：</span> 
	 <b class="balance-number ng-binding" ng-bind="balance.number">0</b>元</p>
	 <p class="balance-fn">
	 <span class="btn-default balance-btn disabled" tooltip="暂不支持提现，可使用余额消费">提现</span>
	</p>
  </div>
	 
  <div class="balance-detail ng-scope">
  <div class="balance-detail-header">
	 <h2 class="balance-detail-title">账户资产明细</h2>
   <p class="selector-list ng-isolate-scope" selector="" label="分类" data="balance.type" filter-selected="filter.type">
	 <span class="selector-label ng-binding" ng-bind="label">分类</span>
	 <span class="selector-content">
	 <a class="selector-item ng-binding ng-scope active" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">全部</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">充值</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">余额消费</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">第三方支付消费</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">支付失败退款</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">订单退款</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">提现</a>
	</span>
  </p>
	 <p class="selector-list ng-isolate-scope" selector="" label="时间" data="balance.days" filter-selected="filter.days">
	 <span class="selector-label ng-binding" ng-bind="label">时间</span>
	 <span class="selector-content">
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">今天</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">近7天</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">近15天</a>
	 <a class="selector-item ng-binding ng-scope" href="javascript:" ng-repeat="item in data" ng-class="{'active': item.val === selected}" ng-bind="item.key" ng-click="choose(item)">1个月</a>
	 </span>
	 </p>
  </div>
 
	 
  <div class="balance-table">
	<div class="balance-table-row balance-table-title">
	<span class="balance-table-date">创建时间</span> 
	<span class="balance-table-type">交易类型</span> 
	<span class="balance-table-money">金额变更</span> 
	<span class="balance-table-status">余额</span>
	</div>
  </div>
  
		<div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入资产明细..." ng-show="balanceLoading">
		 <img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope">正在载入资产明细.....
		</div>
		 
		<div class="nodata ng-isolate-scope" nodatatip="" ng-if="!balanceLoading &amp;&amp; !records.pageData.length">
		 <p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">暂无记录</p>
		</div>
		 
	</div>
		<div pagination="" pagination-context="records" pagination-data="recordsData" class="ng-scope pagination"><ul></ul>
		</div>
	</div>
</div>
		 
 @endsection 
 