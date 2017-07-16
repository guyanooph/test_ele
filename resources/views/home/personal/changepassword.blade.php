 @extends("home.index")
  @section("content")
  
  <div class="profile-panel" role="main">
  <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
  <span ng-bind="pageTitle" class="ng-binding">��������</span>
  <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
  </h3>
  
	  <div class="profile-panelcontent" ng-transclude="">
	  <form class="changepwd ng-scope ng-pristine ng-valid" ng-submit="changePwdSubmit()" novalidate="">
	  <p class="changepwd-tip">
	  ����ô��ʾ�㣺ʹ�ô�Сд��ĸ������������ŵ���ϣ����Դ�������ʺŰ�ȫ��</p>
	  
	<div class="formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" ng-if="!firstSet" form-field="" label="��ǰ����" model="changePwdData" property="currentPwd">
	  <label ng-bind="label" class="ng-binding">��ǰ����</label>
	  <input type="password" name="current" ng-model="changePwdData.currentPwd" placeholder="�����뵱ǰ����" class="ng-scope ng-pristine ng-valid">
	  <div class="formfield-hint">
	  <span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span>
	  </div>
	</div>
	  
	  
	<div class="formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" form-field="" label="������" model="changePwdData" property="newPwd">
	  <label ng-bind="label" class="ng-binding">������</label>
	  <input type="password" name="newPwd" ng-model="changePwdData.newPwd" placeholder="������������" class="ng-scope ng-pristine ng-valid">
	  <div class="formfield-hint">
	  <span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span>
	 </div>
	</div>
	  
	  
	<div class="formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" form-field="" label="ȷ������" model="changePwdData" property="confirmPwd">
		  <label ng-bind="label" class="ng-binding">ȷ������</label>
		  <input type="password" name="confirm" ng-model="changePwdData.confirmPwd" placeholder="���ٴ���������" class="ng-scope ng-pristine ng-valid">
		  <div class="formfield-hint">
		  <span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span>
		  </div>
	</div>
	  
	  
	  <div class="form-group formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" form-field=""><label ng-bind="label" class="ng-binding"></label><button type="submit" class="btn-primary btn-lg ng-scope">ȷ��</button><div class="formfield-hint"><span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span></div>
	  </div>
	  </form>
	  </div>
	  </div>
	  
	  
  
  
     @endsection 