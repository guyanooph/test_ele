 @extends("home.index")
  @section("content")
  
  <div class="profile-panel" role="main">
  <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
  <span ng-bind="pageTitle" class="ng-binding">安全中心</span>
  <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
  </h3>
  
	  <div class="profile-panelcontent" ng-transclude="">
	  <div class="security-level ng-scope">
	  <span>安全等级：</span>
	  <div class="security-level-bar"><span class="security-level-progress low" ng-style="{'width': level.width, 'background-color': level.color}" style="width: 100%; background-color: rgb(148, 200, 82);"></span>
	 </div>
	  <span class="security-level-text ng-binding" ng-bind="level.text" ng-style="{'color': level.color}" style="color: rgb(148, 200, 82);">高</span>
	  <span class="security-level-tip">建议你启动全部安全设置，以保障账户及资金安全！</span>
	</div>
	  
	  
	  <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入安全信息..." ng-show="securityLoading">
	  <img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope">正在载入安全信息...
	  </div>
	  
	  
	  <div class="security-type ng-scope" ng-repeat="item in securityType">
	  <span class="child security-type-icon">
	  <i ng-class="item.status ? 'security-type-icon-ok icon-dot-check' : 'security-type-icon-warn icon-dot-warning'" class="security-type-icon-ok icon-dot-check"></i>
	  </span>
	  <span class="child security-type-name ng-binding" ng-class="item.status || 'security-type-name-weak'" ng-bind="item.name">登录密码</span>
	  <div class="child security-type-tip">
	  <p ng-bind="item.text.text" class="ng-binding">互联网存在被盗风险，建议您定期更改密码以保护安全。</p>
	  </div>
	  <span class="child security-type-linkcon">
	  <a class="security-type-link ng-binding btn-link" target="" ng-href="/personal/changepassword" ng-class="item.status ? 'btn-link' : 'btn-stress'" ng-bind="item.text.link" href="/personal/changepassword">更改密码</a>
	  </span>
	</div>
	  
	  
	  <div class="security-type ng-scope" ng-repeat="item in securityType">
	  <span class="child security-type-icon">
	  <i ng-class="item.status ? 'security-type-icon-ok icon-dot-check' : 'security-type-icon-warn icon-dot-warning'" class="security-type-icon-ok icon-dot-check"></i>
	  </span>
	  <span class="child security-type-name ng-binding" ng-class="item.status || 'security-type-name-weak'" ng-bind="item.name">手机验证</span>
	  <div class="child security-type-tip">
	  <p ng-bind="item.text.text" class="ng-binding">已绑定手机 137****6524</p>
	  </div>
	  <span class="child security-type-linkcon">
	  <a class="security-type-link ng-binding btn-link" target="" ng-href="/personal/changemobile/" ng-class="item.status ? 'btn-link' : 'btn-stress'" ng-bind="item.text.link" href="/personal/changemobile/">更改手机</a>
	  </span>
	  </div>
	  
	  
	  <div class="security-type ng-scope" ng-repeat="item in securityType">
	  <span class="child security-type-icon">
	  <i ng-class="item.status ? 'security-type-icon-ok icon-dot-check' : 'security-type-icon-warn icon-dot-warning'" class="security-type-icon-ok icon-dot-check"></i>
	  </span>
	  <span class="child security-type-name ng-binding" ng-class="item.status || 'security-type-name-weak'" ng-bind="item.name">邮箱激活</span>
	  <div class="child security-type-tip">
	  <p ng-bind="item.text.text" class="ng-binding">已绑定邮箱 ht1***@163.com</p>
	  <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore" ng-bind-html="item.text.textMore | toTrusted">验证后可用户快速找回密码，接受账户提醒邮件。</p>
	  </div>
	  <span class="child security-type-linkcon"><a class="security-type-link ng-binding btn-link" target="" ng-href="/personal/changeemail" ng-class="item.status ? 'btn-link' : 'btn-stress'" ng-bind="item.text.link" href="/personal/changeemail">更改邮箱</a>
	 </span>
   </div>
	  
	  
	 <div class="security-type ng-scope" ng-repeat="item in securityType">
	 <span class="child security-type-icon">
	 <i ng-class="item.status ? 'security-type-icon-ok icon-dot-check' : 'security-type-icon-warn icon-dot-warning'" class="security-type-icon-ok icon-dot-check"></i>
	 </span>
	 <span class="child security-type-name ng-binding" ng-class="item.status || 'security-type-name-weak'" ng-bind="item.name">支付额度</span>
	 <div class="child security-type-tip">
	 <p ng-bind="item.text.text" class="ng-binding">已设定支付额 50 元</p>
	 <p class="security-type-tip-more ng-binding ng-scope" ng-if="item.text.textMore" ng-bind-html="item.text.textMore | toTrusted">如果当日在线订餐金额超出支付额度，手机验证后才可以付款。</p>
	 </div>
	 <span class="child security-type-linkcon">
	 <a class="security-type-link ng-binding btn-link" target="" ng-href="/profile/security/modifypay" ng-class="item.status ? 'btn-link' : 'btn-stress'" ng-bind="item.text.link" href="/personal/modifypay">更改额度</a>
	 </span>
	 
	</div>
  </div>
</div>

    @endsection 
	
	