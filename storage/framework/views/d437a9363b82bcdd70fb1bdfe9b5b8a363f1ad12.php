<html lang="zh" class="">
<head>
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/style1.3.28.4.css')); ?>">
    <style type="text/css">.amap-indoor-map .label-canvas {
            position: absolute;
            top: 0;
            left: 0
        }

        .amap-indoor-map .highlight-image-con * {
            pointer-events: none
        }

        .amap-indoormap-floorbar-control {
            position: absolute;
            margin: auto 0;
            bottom: 165px;
            right: 12px;
            width: 35px;
            text-align: center;
            line-height: 1.3em;
            overflow: hidden;
            padding: 0 2px
        }

        .amap-indoormap-floorbar-control .panel-box {
            background-color: rgba(255, 255, 255, .9);
            border-radius: 3px;
            border: 1px solid #ccc
        }

        .amap-indoormap-floorbar-control .select-dock {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            box-sizing: border-box;
            height: 30px;
            border: solid #4196ff;
            border-width: 0 2px;
            border-radius: 2px;
            pointer-events: none;
            background: linear-gradient(to bottom, #f6f8f9 0, #e5ebee 50%, #d7dee3 51%, #f5f7f9 100%)
        }

        .amap-indoor-map .transition {
            transition: opacity .2s
        }

        ,
        .amap-indoormap-floorbar-control .transition {
            transition: top .2s, margin-top .2s
        }

        .amap-indoormap-floorbar-control .select-dock:after, .amap-indoormap-floorbar-control .select-dock:before {
            content: "";
            position: absolute;
            width: 0;
            height: 0;
            left: 0;
            top: 10px;
            border: solid transparent;
            border-width: 4px;
            border-left-color: #4196ff
        }

        .amap-indoormap-floorbar-control .select-dock:after {
            right: 0;
            left: auto;
            border-left-color: transparent;
            border-right-color: #4196ff
        }

        .amap-indoormap-floorbar-control.is-mobile {
            width: 37px
        }

        .amap-indoormap-floorbar-control.is-mobile .floor-btn {
            height: 35px;
            line-height: 35px
        }

        .amap-indoormap-floorbar-control.is-mobile .select-dock {
            height: 35px;
            top: 36px
        }

        .amap-indoormap-floorbar-control.is-mobile .select-dock:after, .amap-indoormap-floorbar-control.is-mobile .select-dock:before {
            top: 13px
        }

        .amap-indoormap-floorbar-control.is-mobile .floor-list-box {
            height: 105px
        }

        .amap-indoormap-floorbar-control .floor-list-item .floor-btn {
            color: #555;
            font-family: "Times New Roman", sans-serif, "Microsoft Yahei";
            font-size: 16px
        }

        .amap-indoormap-floorbar-control .floor-list-item.selected .floor-btn {
            color: #000
        }

        .amap-indoormap-floorbar-control .floor-btn {
            height: 28px;
            line-height: 28px;
            overflow: hidden;
            cursor: pointer;
            position: relative;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .amap-indoormap-floorbar-control .floor-btn:hover {
            background-color: rgba(221, 221, 221, .4)
        }

        .amap-indoormap-floorbar-control .floor-minus, .amap-indoormap-floorbar-control .floor-plus {
            position: relative;
            text-indent: -1000em
        }

        .amap-indoormap-floorbar-control .floor-minus:after, .amap-indoormap-floorbar-control .floor-plus:after {
            content: "";
            position: absolute;
            margin: auto;
            top: 9px;
            left: 0;
            right: 0;
            width: 0;
            height: 0;
            border: solid transparent;
            border-width: 10px 8px;
            border-top-color: #777
        }

        .amap-indoormap-floorbar-control .floor-minus.disabled, .amap-indoormap-floorbar-control .floor-plus.disabled {
            opacity: .3
        }

        .amap-indoormap-floorbar-control .floor-plus:after {
            border-bottom-color: #777;
            border-top-color: transparent;
            top: -3px
        }

        .amap-indoormap-floorbar-control .floor-list-box {
            max-height: 153px;
            position: relative;
            overflow-y: hidden
        }

        .amap-indoormap-floorbar-control .floor-list {
            margin: 0;
            padding: 0;
            list-style: none
        }

        .amap-indoormap-floorbar-control .floor-list-item {
            position: relative
        }

        .amap-indoormap-floorbar-control .floor-btn.disabled, .amap-indoormap-floorbar-control .floor-btn.disabled *, .amap-indoormap-floorbar-control.with-indrm-loader * {
            -webkit-pointer-events: none !important;
            pointer-events: none !important
        }

        .amap-indoormap-floorbar-control .with-indrm-loader .floor-nonas {
            opacity: .5
        }

        .amap-indoor-map-moverf-marker {
            color: #555;
            background-color: #FFFEEF;
            border: 1px solid #7E7E7E;
            padding: 3px 6px;
            font-size: 12px;
            white-space: nowrap;
            display: inline-block;
            position: absolute;
            top: 1em;
            left: 1.2em
        }

        .amap-indoormap-floorbar-control .amap-indrm-loader {
            -moz-animation: amap-indrm-loader 1.25s infinite linear;
            -webkit-animation: amap-indrm-loader 1.25s infinite linear;
            animation: amap-indrm-loader 1.25s infinite linear;
            border: 2px solid #91A3D8;
            border-right-color: transparent;
            box-sizing: border-box;
            display: inline-block;
            overflow: hidden;
            text-indent: -9999px;
            width: 13px;
            height: 13px;
            border-radius: 7px;
            position: absolute;
            margin: auto;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0
        }

        @-moz-keyframes amap-indrm-loader {
            0% {
                -moz-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -moz-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @-webkit-keyframes amap-indrm-loader {
            0% {
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }

        @keyframes  amap-indrm-loader {
            0% {
                -moz-transform: rotate(0);
                -ms-transform: rotate(0);
                -webkit-transform: rotate(0);
                transform: rotate(0)
            }
            100% {
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -webkit-transform: rotate(360deg);
                transform: rotate(360deg)
            }
        }</style>
    <style type="text/css">[uib-typeahead-popup].dropdown-menu {
            display: block;
        }</style>
    <style type="text/css">.uib-time input {
            width: 50px;
        }</style>
    <style type="text/css">[uib-tooltip-popup].tooltip.top-left > .tooltip-arrow, [uib-tooltip-popup].tooltip.top-right > .tooltip-arrow, [uib-tooltip-popup].tooltip.bottom-left > .tooltip-arrow, [uib-tooltip-popup].tooltip.bottom-right > .tooltip-arrow, [uib-tooltip-popup].tooltip.left-top > .tooltip-arrow, [uib-tooltip-popup].tooltip.left-bottom > .tooltip-arrow, [uib-tooltip-popup].tooltip.right-top > .tooltip-arrow, [uib-tooltip-popup].tooltip.right-bottom > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.top-left > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.top-right > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.bottom-left > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.bottom-right > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.left-top > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.left-bottom > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.right-top > .tooltip-arrow, [uib-tooltip-html-popup].tooltip.right-bottom > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.top-left > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.top-right > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.bottom-left > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.bottom-right > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.left-top > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.left-bottom > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.right-top > .tooltip-arrow, [uib-tooltip-template-popup].tooltip.right-bottom > .tooltip-arrow, [uib-popover-popup].popover.top-left > .arrow, [uib-popover-popup].popover.top-right > .arrow, [uib-popover-popup].popover.bottom-left > .arrow, [uib-popover-popup].popover.bottom-right > .arrow, [uib-popover-popup].popover.left-top > .arrow, [uib-popover-popup].popover.left-bottom > .arrow, [uib-popover-popup].popover.right-top > .arrow, [uib-popover-popup].popover.right-bottom > .arrow, [uib-popover-html-popup].popover.top-left > .arrow, [uib-popover-html-popup].popover.top-right > .arrow, [uib-popover-html-popup].popover.bottom-left > .arrow, [uib-popover-html-popup].popover.bottom-right > .arrow, [uib-popover-html-popup].popover.left-top > .arrow, [uib-popover-html-popup].popover.left-bottom > .arrow, [uib-popover-html-popup].popover.right-top > .arrow, [uib-popover-html-popup].popover.right-bottom > .arrow, [uib-popover-template-popup].popover.top-left > .arrow, [uib-popover-template-popup].popover.top-right > .arrow, [uib-popover-template-popup].popover.bottom-left > .arrow, [uib-popover-template-popup].popover.bottom-right > .arrow, [uib-popover-template-popup].popover.left-top > .arrow, [uib-popover-template-popup].popover.left-bottom > .arrow, [uib-popover-template-popup].popover.right-top > .arrow, [uib-popover-template-popup].popover.right-bottom > .arrow {
            top: auto;
            bottom: auto;
            left: auto;
            right: auto;
            margin: 0;
        }

        [uib-popover-popup].popover, [uib-popover-html-popup].popover, [uib-popover-template-popup].popover {
            display: block !important;
        }</style>
    <style type="text/css">.uib-datepicker-popup.dropdown-menu {
            display: block;
            float: none;
            margin: 0;
        }

        .uib-button-bar {
            padding: 10px 9px 2px;
        }</style>
    <style type="text/css">.uib-position-measure {
            display: block !important;
            visibility: hidden !important;
            position: absolute !important;
            top: -9999px !important;
            left: -9999px !important;
        }

        .uib-position-scrollbar-measure {
            position: absolute !important;
            top: -9999px !important;
            width: 50px !important;
            height: 50px !important;
            overflow: scroll !important;
        }

        .uib-position-body-scrollbar-measure {
            overflow: scroll !important;
        }</style>
    <style type="text/css">.uib-datepicker .uib-title {
            width: 100%;
        }

        .uib-day button, .uib-month button, .uib-year button {
            min-width: 100%;
        }

        .uib-left, .uib-right {
            width: 100%
        }</style>
    <style type="text/css">.ng-animate.item:not(.left):not(.right) {
            -webkit-transition: 0s ease-in-out left;
            transition: 0s ease-in-out left
        }</style>
    <style type="text/css">@charset  "UTF-8";
        [ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak, .ng-hide:not(.ng-hide-animate) {
            display: none !important;
        }

        ng\:form {
            display: block;
        }

        .ng-animate-shim {
            visibility: hidden;
        }

        .ng-anchor {
            position: absolute;
        }</style>
    <meta charset="utf-8">
    <meta name="_token" content="<?php echo e(csrf_token()); ?>"/>
    <title>吃货-开店申请</title>
    <meta name="description" content="吃货-开店申请">
    <meta id="viewport" name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png" type="image/x-icon">
    <base href="/">
    <link href="<?php echo e(asset('css/app.73972d6.css')); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/app.feb75eb.css')); ?>" rel="stylesheet" type="text/css">
    
    <style type="text/css">.fancybox-margin {
            margin-right: 17px;
        }</style>
    <style type="text/css">.amap-container {
            cursor: url(https://webapi.amap.com/theme/v1.3/openhand.cur), default;
        }

        .amap-drag {
            cursor: url(https://webapi.amap.com/theme/v1.3/closedhand.cur), default;
        }
    </style>
    <script src="<?php echo e(asset('js/jquery-3.2.1.js')); ?>"></script>

</head>

<body ng-app="nevermore" class="ng-scope">
<!-- uiView: -->
<ui-view autoscroll="true" class="ng-scope">
    <header class="row ng-scope ng-isolate-scope" show-user="false">
        <div> <!-- ngIf: showUser -->
            <!-- ngIf: !showUser -->
            <a ui-sref="home" class="title ng-scope" ng-if="!showUser" href="/">
                <span>吃货商户中心</span>
            </a><!-- end ngIf: !showUser -->
            <a class="notification-link" ng-click="openNotification()">
                点击查看《廉正告知书》
            </a> <!-- ngIf: showUser -->
            <!-- ngIf: !showUser -->
            <div class="pull-right tips ng-scope" ng-if="!showUser">
                <span>如开店过程遇到问题，可以拨打客服电话：021-80203777</span>
            </div>
            <!-- end ngIf: !showUser -->
        </div>
    </header>
    <div class="steps ng-scope ng-isolate-scope" index="step" isrequireactivity="isRequireActivity">
        <ul> <!-- ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope active">
                <!-- ngIf: $index --> <i class="index ng-binding">1</i>
                门店信息
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">2</i>
                资质信息
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">3</i>
                合作方案
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">4</i>
                配送方案
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">5</i>
                结算信息
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">6</i>
                商品内容
            </li><!-- end ngRepeat: step in steps -->
            <li ng-repeat="step in steps" ng-class="{active: step.index <= index}" class="ng-binding ng-scope">
                <!-- ngIf: $index -->
                <div ng-if="$index" class="split-line ng-scope"></div><!-- end ngIf: $index --> <i
                        class="index ng-binding">7</i>
                活动信息
            </li><!-- end ngRepeat: step in steps --> </ul>
    </div> <!-- uiView: -->


    <div class="main-container ng-scope" ui-view="" autoscroll="true">
        <div class="store-info step-container ng-scope">
            <form name="storeForm" id="storeFormID" novalidate="" action="<?php echo e(url('merchant/register')); ?>" method="post"
                  enctype = "multipart/form-data" class="store-form form-horizontal ng-invalid ng-invalid-require ng-invalid-required ng-valid-maxlength ng-valid-pattern ng-valid-door-pic-input ng-valid-store-pic-input ng-submitted ng-dirty ng-valid-parse"
                  style="" onsubmit="return doSubmit()">
                <?php echo e(csrf_field()); ?>

                <div class="form-group flex">
                    <label for="store-name" class="control-label"> <b class="required">*</b>
                        账号 </label>
                    <div class="control-content">
                        <input type="text" onblur="checkMername()" name="mername"/>

                        <small class="control-label">
                            <div id="div_mername"></div>
                        </small>

                    </div>
                </div>
                <div class="form-group flex">
                    <label for="store-name" class="control-label"> <b class="required">*</b>
                        密码 </label>
                    <div class="control-content">
                        <input type="password" name="password" onblur="checkPass()"/>

                        <small class="control-label">
                            <div id="div_password"></div>
                        </small>
                    </div>
                </div>
                <div class="form-group flex">
                    <label for="store-name" class="control-label"> <b class="required">*</b>
                        确认密码 </label>
                    <div class="control-content">
                        <input type="password" name="repassword" onblur="checkRepass()"/>

                        <small class="control-label">
                            <div id="div_repassword"></div>
                        </small>
                    </div>
                </div>
                <div class="form-group flex">
                    <label for="store-name" class="control-label"> <b class="required">*</b>
                        门店名称 </label>
                    <div class="control-content">
                        <input type="text" name="shoptitle" onblur="checkShoptitle()"/>
                        <small class="control-label">
                            <div id="div_shoptitle"></div>
                        </small>
                    </div>
                </div>

                <div class="form-group flex">
                    <label for="store-name" class="control-label"> <b class="required">*</b>外卖电话 </label>
                    <div class="control-content">
                        <input type="text" name="phone" onblur="checkPhone()"/>
                        <small class="control-label">
                            <div id="div_phone"></div>
                        </small>
                    </div>
                </div>
                <div class="form-group flex">
                    <label for="contact-name" class="control-label"> <b class="required">*</b>真实姓名 </label>
                    <div class="control-content">
                        <input type="text" name="username" onblur="checkUsername()" />
                        <small class="control-label">
                            <div id="div_username"></div>
                        </small>
                    </div>
                </div>

                <div class="form-group flex">
                    <label for="contact-name" class="control-label"> <b class="required">*</b>身份证号码 </label>
                    <div class="control-content">
                        <input type="text" name="identity" onblur="checkIdentity()"/>
                        <small class="control-label">
                            <div id="div_identity"></div>
                        </small>
                    </div>
                </div>
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                    

                    
                        
                        
                            
                                   
                        
                        
                            
                                   
                        
                                                                 
                                    
                                    
                        
                                                                 
                                    
                                    
                        
                                                                 
                                    
                                    
                        
                                                                 
                                    
                                    
                        
                        
                                                                 
                                    
                                    
                        
                    
                
                
                
                    
                    
                        
                             
                            
                                
                                    
                                           
                                           
                                           
                                
                                
                                    
                                           
                                           
                                           
                                    
                                
                                
                                    
                                    
                                         
                                        
                                               
                                               
                                               
                                        
                                        
                                            
                                            
                                        
                                
                            
                        
                    
                

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                
                <div class="form-group flex"><label class="control-label">
                        <b class="required">*</b>照片 </label>
                    <div class="control-content">
                        <div class="picture-item ng-isolate-scope" name="" desc=""
                             src="assets/ex-front.png">
                            <div class="name ng-binding">营业执照照片</div>
                            <ng-transclude class="img-container">
                                <div class="img-flow ng-scope ng-isolate-scope ng-empty ng-invalid ng-invalid-required ng-valid-door-pic-input"
                                     name="doorPicInput" ng-model="form.door_pic" mobile="18851457819">
                                    <img ng-class="{ 'show': ngModel &amp;&amp; isUploadStatus !== 1 }" safe-img=""
                                         mobile="18851457819" safe-src="ngModel" class="ng-isolate-scope" src=""
                                         ng-src="">
                                    <input type="file" accept="image/*" name="logoname">
                                    <p class="tip" ng-hide="ngModel || isUploadStatus === 1"><img
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAYCAYAAACbU/80AAAABGdBTUEAALGPC/xhBQAAArRJREFUSA29lj2IE0EUx929TQxaBCxsPPQQTg4CCfnAVomF1x1cdXCF4AeKFmLlIYJYCNqJWghHCgXxKsHCwsJgpRzmw8RGEfzgBMHCSiUmZuPvrXubvWRnd/aQG5h7b97H//9m581cjG0xR61WmyHlFPOoYRj7JH0wGHxGPGUul0qlt2LTHYZuICQTjUbjOvICOROKvD8UdbNQKCwh+4qYDWatAiA16/X6IzLnNmSrF4+LxeI8RdjqkH8eMypA/M1m8wpCl1xS5twc0UNH5BdotVqTvV7vPSipUKRxZyeRSEzncrkv466hJfIL9Pv9RcLjkgtDys0dsgVokQXYtn0kIE/LpJMbWQCNNKnFFhCkkzvWA5z5bs58AbyyAHADcuhWAL6OqQdGGwzpgyo9sUJPfPMnegUQZHDVLpJwGX2nP+h/6WD/APsaV/QG+kBwnQIwmjwyD5Cy87hDHhzVwxSIBfkKj9Ui0nZ6gJ1fjUsuycz5dDq9C/kykElhFC7hFLfRbrf3d7tdeb8TiniV+Rbv/nlxuhhvUHeoggPsvWQyOWPScKdxxiX/SENdWgfNZrMf0L31uj1CJoRbjmA2InDMzSc/STf/9DtorNvYX/htGvqsyXlMaQR6IZAsQ1b1DK6C3bYs6zjLzqhPtRZu+QJx7ngnlUotqQD5Ku8o5K7KH2C3pIDQfxb+JMDXMpnMd79tVGdXr0dtIes12f0z5oGQIM8F+DTX5yFScr5yC56Ik19Je03TPMTbv4elczPErjGqFruqEHgGUO9VDEskbgG/zCbTKQDyg5DfD8sb9cErL2HFpKHqgMZKHgXb5PqecEsPyDjLXHW0rfmzyqbPCZVTAGf5C73M3IovIRxll3N4BV3DMX7L3eE8T1DhYc5pCrmdhE0PMH6D8Qn5nF6p5PP5V36wvySB+WxWUYFgAAAAAElFTkSuQmCC"><br>
                                        点击上传 </p>
                                </div>
                            </ng-transclude>
                            <div class="desc ng-binding"> 营业执照可以加速审核喔！</div>
                            <div class="example"><span>示例</span>
                                <div class="directive-image-preview ng-isolate-scope" src="assets/ex-front.png">
                                    <img class="d-thumbnail" ng-src="assets/ex-front.png" alt="thumbnail"
                                         src="<?php echo e(asset('images/ex_licen.png')); ?>">
                            </div>
                        </div>
                    </div>

                        <div class="picture-item ng-isolate-scope" name="门脸照" desc="一张真实美观的门脸照可以提升店铺形象"
                             src="assets/ex-front.png">
                            <div class="name ng-binding">店铺照片</div>
                            <ng-transclude class="img-container">
                                <div class="img-flow ng-scope ng-isolate-scope ng-empty ng-invalid ng-invalid-required ng-valid-door-pic-input"
                                     name="doorPicInput" ng-model="form.door_pic" mobile="18851457819">
                                    <img ng-class="{ 'show': ngModel &amp;&amp; isUploadStatus !== 1 }" safe-img=""
                                         mobile="18851457819" safe-src="ngModel" class="ng-isolate-scope" src=""
                                         ng-src="">
                                    <input type="file" accept="image/*" name="picname">
                                    <p class="tip" ng-hide="ngModel || isUploadStatus === 1"><img
                                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAYCAYAAACbU/80AAAABGdBTUEAALGPC/xhBQAAArRJREFUSA29lj2IE0EUx929TQxaBCxsPPQQTg4CCfnAVomF1x1cdXCF4AeKFmLlIYJYCNqJWghHCgXxKsHCwsJgpRzmw8RGEfzgBMHCSiUmZuPvrXubvWRnd/aQG5h7b97H//9m581cjG0xR61WmyHlFPOoYRj7JH0wGHxGPGUul0qlt2LTHYZuICQTjUbjOvICOROKvD8UdbNQKCwh+4qYDWatAiA16/X6IzLnNmSrF4+LxeI8RdjqkH8eMypA/M1m8wpCl1xS5twc0UNH5BdotVqTvV7vPSipUKRxZyeRSEzncrkv466hJfIL9Pv9RcLjkgtDys0dsgVokQXYtn0kIE/LpJMbWQCNNKnFFhCkkzvWA5z5bs58AbyyAHADcuhWAL6OqQdGGwzpgyo9sUJPfPMnegUQZHDVLpJwGX2nP+h/6WD/APsaV/QG+kBwnQIwmjwyD5Cy87hDHhzVwxSIBfkKj9Ui0nZ6gJ1fjUsuycz5dDq9C/kykElhFC7hFLfRbrf3d7tdeb8TiniV+Rbv/nlxuhhvUHeoggPsvWQyOWPScKdxxiX/SENdWgfNZrMf0L31uj1CJoRbjmA2InDMzSc/STf/9DtorNvYX/htGvqsyXlMaQR6IZAsQ1b1DK6C3bYs6zjLzqhPtRZu+QJx7ngnlUotqQD5Ku8o5K7KH2C3pIDQfxb+JMDXMpnMd79tVGdXr0dtIes12f0z5oGQIM8F+DTX5yFScr5yC56Ik19Je03TPMTbv4elczPErjGqFruqEHgGUO9VDEskbgG/zCbTKQDyg5DfD8sb9cErL2HFpKHqgMZKHgXb5PqecEsPyDjLXHW0rfmzyqbPCZVTAGf5C73M3IovIRxll3N4BV3DMX7L3eE8T1DhYc5pCrmdhE0PMH6D8Qn5nF6p5PP5V36wvySB+WxWUYFgAAAAAElFTkSuQmCC"><br>
                                        点击上传 </p>
                                </div>
                            </ng-transclude>
                            <div class="desc ng-binding"> 一张真实美观的门脸照可以提升店铺形象</div>
                            <div class="example"><span>示例</span>
                                <div class="directive-image-preview ng-isolate-scope" src="assets/ex-front.png">
                                    <img class="d-thumbnail" ng-src="assets/ex-front.png" alt="thumbnail"
                                         src="<?php echo e(asset('images/ex_licen.png')); ?>">
                                </div>
                            </div>
                        </div>
                </div>
             </div>
            </form>
        </div>
        <div class="footer-btns ng-scope">
            <button class="btn btn-default btn-pre" ui-sref="guide({ id: id })" href="/guide">返回上一步</button>
            <button type="submit" form="storeFormID" class="btn btn-primary btn-next" ng-click="doSubmit()"
                    ng-disabled="data.isSubmitting || !mobile"> 提交并进入下一步
            </button>
        </div>
    </div>
</ui-view>








<script type="text/javascript" src="<?php echo e(asset('js/register.js')); ?>"></script>
</body>
</html>