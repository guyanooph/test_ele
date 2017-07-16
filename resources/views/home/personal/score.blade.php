 @extends("home.index")
  @section("content")
  
  <div class="profile-panel" role="main"><!-- ngIf: pageTitleVisible -->
  <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
  <span ng-bind="pageTitle" class="ng-binding">我的积分</span>
  <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
  </h3>
	  
	<div class="profile-panelcontent" ng-transclude="">
	<div class="points-summary index ng-scope">
	 <p class="points-tip"><span>当前账户积分：</span>
	  <b class="points-number ng-binding" ng-bind="points">2176</b>分
	</p>
	  <p class="points-link">
	  <a class="btn-link" href="/personal/huoqu" target="_blank">如何获得积分？</a>
	</p>
  </div>
	  
	  <h4 class="points-detailtitle ng-scope">最近30天积分记录</h4>
	  
	  <div class="points-detail ng-scope">
	  <div class="points-table">
	  <div class="points-table-row points-table-title">
	  <span class="points-table-createtime">创建时间</span> 
	  <span class="points-table-delta">积分变化</span> 
	  <span class="points-table-detail">详情</span>
	</div>
	  
	 <div class="points-table-row ng-scope" ng-repeat="record in records.pageData">
	 <span class="points-table-createtime">
	 <span class="points-table-createtime-date ng-binding" ng-bind="record.created_at | date : 'yyyy-MM-dd'">2017-07-13</span>
	 <span class="points-table-createtime-time ng-binding" ng-bind="record.created_at | date : 'HH:mm:ss'">12:44:05</span>
	 </span>
	 <span class="points-table-delta ng-binding color-security" ng-class="{'color-security': record.delta > 0}" ng-bind="record.delta > 0 ? ('+' + record.delta) : record.delta">+1000</span> <span class="points-table-detail ng-binding" ng-bind="record.change_type | pointsTypeMask">系统处理</span>
	 </div>
  </div>
	  
	  <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入积分记录..." ng-show="pointsLoading">
	  <img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope">正在载入积分记录...
	 </div>
 </div>
	 
	 <div pagination="" pagination-context="records" pagination-data="recordsData" class="ng-scope pagination"><ul></ul>
	 </div>
   </div>
 </div>
 
   @endsection 
   
   