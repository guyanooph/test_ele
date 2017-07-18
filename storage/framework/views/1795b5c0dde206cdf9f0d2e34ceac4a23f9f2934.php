<?php $__env->startSection("content"); ?>
<div class="profile-panel" role="main"><!-- ngIf: pageTitleVisible --><h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope"><span ng-bind="pageTitle" class="ng-binding">更改邮箱</span> <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span></h3><!-- end ngIf: pageTitleVisible --><div class="profile-panelcontent" ng-transclude=""><ol class="instruction-steps ng-isolate-scope" instruction-steps="" steps-data="steps" current-step="currentStep"><!-- ngRepeat: step in steps --><li class="instruction-step ng-scope" ng-class="{'waiting': step.number > current}" ng-repeat="step in steps"><!-- ngIf: step.number >= current --><span class="status ng-scope icon-dot" ng-class="{'icon-dot': step.number === current, 'icon-circle': step.number > current}" ng-if="step.number >= current"><var ng-bind="step.number" class="ng-binding">1</var></span><!-- end ngIf: step.number >= current --> <!-- ngIf: step.number < current --> <span class="step-text ng-binding" ng-bind="step.text">验证原邮箱</span></li><!-- end ngRepeat: step in steps --><li class="instruction-step ng-scope waiting" ng-class="{'waiting': step.number > current}" ng-repeat="step in steps"><!-- ngIf: step.number >= current --><span class="status ng-scope icon-circle" ng-class="{'icon-dot': step.number === current, 'icon-circle': step.number > current}" ng-if="step.number >= current"><var ng-bind="step.number" class="ng-binding">2</var></span><!-- end ngIf: step.number >= current --> <!-- ngIf: step.number < current --> <span class="step-text ng-binding" ng-bind="step.text">绑定新邮箱</span></li><!-- end ngRepeat: step in steps --><li class="instruction-step ng-scope waiting" ng-class="{'waiting': step.number > current}" ng-repeat="step in steps"><!-- ngIf: step.number >= current --><span class="status ng-scope icon-circle" ng-class="{'icon-dot': step.number === current, 'icon-circle': step.number > current}" ng-if="step.number >= current"><var ng-bind="step.number" class="ng-binding">3</var></span><!-- end ngIf: step.number >= current --> <!-- ngIf: step.number < current --> <span class="step-text ng-binding" ng-bind="step.text">修改成功</span></li><!-- end ngRepeat: step in steps --></ol><!-- ngIf: currentStep === 1 --><div ng-if="currentStep === 1" security-verify-form="" link="step1Link" class="ng-scope ng-isolate-scope"><form class="security-service ng-pristine ng-valid" ng-submit="link.submit()" novalidate=""><!-- ngIf: link.serviceText --><p class="service-text ng-binding ng-scope" ng-if="link.serviceText" ng-bind="link.serviceText">为保障你的账号安全，请先帮助我们验证你的身份！</p><!-- end ngIf: link.serviceText --><!-- ngIf: link.field --><!-- ngIf: link.origin --><div class="field-default formfield ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" ng-if="link.origin" form-field="" label="已绑定邮箱"><label ng-bind="label" class="ng-binding">已绑定邮箱</label><span class="field-default-value default-mobile ng-binding ng-scope" ng-bind="link.origin.content">wtz032****@sina.com</span><div class="formfield-hint"><span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span></div></div><!-- end ngIf: link.origin --><!-- ngIf: link.verify.type === 'mobile' --><!-- ngIf: link.verify.type === 'email' --><div class="formfield form-field-verifymobile ng-isolate-scope" ng-class="{ 'validate-error': model.$hintTypes[property] === 'error' }" ng-if="link.verify.type === 'email'" email-verify-field="" label="验证码" model="link.verify.link" property="validate_code" link="link.verify.link" start-verify="link.verify.startVerify" start-count=""><label ng-bind="label" class="ng-binding">验证码</label><input name="validate_code" ng-model="link.validate_code" class="ng-pristine ng-valid"><button type="button" ng-class="{ 'disabled': audio === 'running' }" countdown="" status="count" mode="text" time="60" tpl="?time秒 重新发送" started-once-text="获取验证码" ng-click="getToken()" class="ng-isolate-scope">获取验证码</button><div class="formfield-hint"><span ng-class="{ 'icon-dot-error': model.$hintTypes[property] === 'error', 'icon-dot-warning': model.$hintTypes[property] === 'warning' }" ng-bind="model.$hints[property]" class="ng-binding"></span> <span class="verifymobile-msg" ng-hide="count === 'running'">为保障账号安全，请先对你的身份进行验证</span> <span class="verifymobile-msg ng-hide" ng-show="count === 'running'">请在您绑定的邮箱中查找验证码</span></div></div><!-- end ngIf: link.verify.type === 'email' --><div class="form-group"><button type="submit" class="btn-primary btn-lg security-submit ng-binding" ng-bind="link.submitText">下一步</button></div></form></div><!-- end ngIf: currentStep === 1 --><!-- ngIf: currentStep === 2 --><div class="security-service security-notice ng-scope ng-hide" ng-show="currentStep === 3"><img src="//faas.elemecdn.com/desktop/media/img/security-success.3730bf.png" alt="" class="notice-img"><h4 class="notice-title">恭喜，邮箱已绑定成功！</h4><p class="notice-text">绑定邮箱为：<span class="highlight ng-binding" ng-bind="user.email">wtz0324@sina.com</span>，你以后可以使用本邮箱地址登陆饿了么</p><p class="notice-text">5s 后返回安全中心 <a ng-href="/personal/security" href="/personal/security">立即返回</a></p></div></div></div>
<?php $__env->stopSection(); ?> 
<?php echo $__env->make("home.index", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>