@extends("home.index")
 @section("content")
 <div class="profile-panel" role="main">
 <div class="profile-panelcontent" ng-transclude="">
 <div class="tabnavigation higher ng-scope">
 <a ng-class="{'active': index === 'effective'}" class="tabnavigation-navitem active" ng-click="changeTab('effective')">可用红包</a>
 
 <button class="btn-primary hongbao-exchangebtn" dialog-trigger="exchangehongbao">兑换红包</button>
 </div>
 
 <div class="hongbao-container ng-scope" ng-class="{'expired':isExpired}">
 <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入红包信息..." ng-show="hongbaoLoading">
 <img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope">正在载入红包信息...</div>
 <ul class="hongbao-list clearfix">
 <li class="hongbaoblock ng-scope" ng-repeat="data in pageContext.pageData">
 <div class="hongbaoblock-count">
 <span class="hongbaoblock-amount">
 <em class="ng-binding">2</em>
 <em class="ng-binding">.0</em></span>
 <p class="hongbaoblock-condition ng-binding">任意金额可用</p></div>
 <h3 class="hongbaoblock-name ng-binding">新用户专属</h3>
 <div class="hongbaoblock-intro"><p>仅限手机客户端使用</p>
 <p class="ng-binding">2017-07-13<i class="to">至</i>2017-08-12</p>
  </div>
 </li>
 
 
 <li class="hongbaoblock ng-scope" ng-repeat="data in pageContext.pageData">
 <div class="hongbaoblock-count">
 <span class="hongbaoblock-amount">
 <em class="ng-binding">5</em>
 <em class="ng-binding">.0</em>
 </span>
 <p class="hongbaoblock-condition ng-binding">任意金额可用</p>
 </div>
 <h3 class="hongbaoblock-name ng-binding">会员专享</h3>
 <div class="hongbaoblock-intro"><p>仅限手机客户端使用</p>
 <p class="ng-binding">2017-07-27<i class="to">至</i>2017-08-09</p>
 </div>
 </li>
 
 
 <li class="hongbaoblock ng-scope" ng-repeat="data in pageContext.pageData">
 <div class="hongbaoblock-count">
 <span class="hongbaoblock-amount">
 <em class="ng-binding">8</em>
 <em class="ng-binding">.0</em>
 </span>
 <p class="hongbaoblock-condition ng-binding">任意金额可用</p>
 </div>
 <h3 class="hongbaoblock-name ng-binding">超级会员专享</h3>
 <div class="hongbaoblock-intro"><p>仅限手机客户端使用</p>
 <p class="ng-binding">2017-07-27<i class="to">至</i>2017-08-09</p>
 </div>
 </li>
 
    </ul>
  </div>
	<div pagination="" pagination-context="pageContext" pagination-data="index === 'effective' ? effective : expired" pagination-pagesize="15" class="ng-scope pagination">
	<ul></ul>
  </div>

	<div class="exchangedialog dialog ng-scope" role="dialog" dialog="exchangehongbao" style="display: none;">
	<div class="dialog-close icon-close"></div>
	<div class="dialog-content" ng-transclude="">
	<h3 class="ng-scope">输入兑换码，兑换红包！</h3>
	<form class="ng-scope ng-pristine ng-valid">
	<div class="formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" form-field="" model="exChangeData" property="exchange_code">
	<label ng-bind="label" class="ng-binding"></label>
	<input placeholder="请输入兑换码" ng-model="exChangeData.exchange_code" class="ng-scope ng-pristine ng-valid">
	<div class="formfield-hint">
	<span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding">
	   </span>
	  </div>
	</div>


	<div class="captchafield formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" model="exChangeData" property="captcha_code" form-field="">
	<label ng-bind="label" class="ng-binding"></label>
	<input placeholder="请输入验证码" ng-model="exChangeData.captcha_code" class="ng-scope ng-pristine ng-valid">
	<img ng-src="//mainsite-restapi.ele.me/v1/captchas/5a79f93707ef27ff02c11b00c232d26609f361b4" ng-show="captchaURL" ng-click="changeCaptcha()" class="ng-scope" src="//mainsite-restapi.ele.me/v1/captchas/5a79f93707ef27ff02c11b00c232d26609f361b4">
	<a href="JavaScript:" ng-click="changeCaptcha()" class="ng-scope">看不清换一张</a>
	<div class="formfield-hint">
	<span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding">
	  </span>
	 </div>
	</div>

	<div>
<button class="btn-primary btn-lg ng-binding" ng-class="{ 'submiting': submiting }" ng-click="exChangeSubmit()" ng-bind="submiting ? '兑换中...': '确定'">确定</button>
      </div>
     </form>
    </div>
   </div>
 </div>
</div>
 
 

 @endsection 