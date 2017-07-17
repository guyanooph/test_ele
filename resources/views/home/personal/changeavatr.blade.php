@extends("home.index")
 @section("content")
<div class="profile-panel" role="main">
<!-- ngIf: pageTitleVisible -->
<h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
<span ng-bind="pageTitle" class="ng-binding">个人资料</span> 
<span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
</h3>
<!-- end ngIf: pageTitleVisible -->
<div class="profile-panelcontent" ng-transclude="">
<form class="avatar-form ng-scope ng-pristine ng-valid" method="post" action="//mainsite-restapi.ele.me/v1/user/avatar" enctype="multipart/form-data" target="avatar_target">
<p><button class="btn-upload btn-lg">上传图片</button> 
<input type="file" name="avatar" cropper-source="avatar" cropper-file-types="jpg,jpeg,png" avatar-file=""> 支持小于2M的JPG和PNG图片</p>
<div class="avatar-previewcontainer clearfix">
<div class="avatar-imgcontainer source ng-isolate-scope" cropper="avatar" cropper-context="cropContext">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="noavatar" alt="默认头像">
<div class="cropper" style="display: none;">
<div class="mask"></div>
<div class="resizer">
<div class="wrapper"><img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"></div>
<div class="ord-n resize-bar"></div><div class="ord-s resize-bar"></div><div class="ord-w resize-bar"></div>
<div class="ord-e resize-bar"></div>
<div class="ord-nw resize-handle"></div>
<div class="ord-n resize-handle"></div>
<div class="ord-ne resize-handle"></div>
<div class="ord-w resize-handle"></div>
<div class="ord-e resize-handle"></div>
<div class="ord-sw resize-handle"></div>
<div class="ord-s resize-handle"></div>
<div class="ord-se resize-handle"></div>
</div></div></div>
<div class="avatar-largewrapper">
<div class="avatar-imgcontainer large" cropper-preview="avatar">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="noavatar" alt="默认头像"></div>
<p>大尺寸</p></div><div>
<div class="avatar-imgcontainer middle" cropper-preview="avatar">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="noavatar" alt="默认头像"></div>
<p>中尺寸</p>
<div class="avatar-imgcontainer small" cropper-preview="avatar">
<img src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" class="noavatar" alt="默认头像"></div>
<p>小尺寸</p></div></div>
<input type="hidden" name="x" value=""> 
<input type="hidden" name="y" value=""> 
<input type="hidden" name="w" value=""> 
<input type="hidden" name="h" value=""> 
<button class="btn-submit btn-primary btn-lg" ng-disabled="!avatarFile || cropContext.width <= 0" disabled="disabled">保存头像</button> 
<a class="btn-cancel btn-lg" ng-click="cancelImage()">取消</a></form>
<iframe name="avatar_target" frameborder="0" class="avatar-postframe ng-scope" src="about:blank" avatar-post-target=""></iframe>
</div></div> 
 @endsection 