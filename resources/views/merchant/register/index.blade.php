<html lang="zh" class="">
<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style1.3.28.4.css') }}">
    <style type="text/css">
        #preview, .img, img
        {
            width:100px;
            height:100px;
        }
        .amap-indoor-map .label-canvas {
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

        @keyframes amap-indrm-loader {
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
    <style type="text/css">@charset "UTF-8";
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
    <meta name="_token" content="{{ csrf_token() }}"/>
    <title>吃货-开店申请</title>
    <meta name="description" content="吃货-开店申请">
    <meta id="viewport" name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="//static2.ele.me/eleme/desktop/media/img/favicon-32x32.png" type="image/x-icon">
    <base href="/">
    <link href="{{ asset('css/app.73972d6.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.feb75eb.css') }}" rel="stylesheet" type="text/css">
    {{--<script src="{{ asset('js/jquery-3.2.1.min.js') }}}" type="text/javascript"></script>--}}
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
    <script src="{{ asset('js/jquery-3.2.1.js') }}"></script>

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
            <form name="storeForm" id="storeFormID" novalidate="" action="{{ url('merchant/register') }}" method="post"
                  enctype = "multipart/form-data" class="store-form form-horizontal ng-invalid ng-invalid-require ng-invalid-required ng-valid-maxlength ng-valid-pattern ng-valid-door-pic-input ng-valid-store-pic-input ng-submitted ng-dirty ng-valid-parse"
                  style="" onsubmit="return doSubmit()">
                {{ csrf_field() }}
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
                {{--从分类表遍历出来--}}
                <div class="form-group flex">
                <label class="control-label"> <b class="required">*</b>门店分类 </label>
                    <div class="control-content">
                        <div id="categories">
                            <div  class=""  name="categories">
                                <select style="width:100px;"  id="mid">
                                    <option>店铺分类</option>
                                    @foreach($mids as $mid)
                                        <option  style="width:150px;" value="{{$mid->id}}">{{$mid->title}}</option>
                                    @endforeach
                                </select>
                                <select id="sid" name="typeid"></select>
                            {{--<ul>--}}
                                {{--@foreach($mids as $mid)--}}
                                {{--<li class="tips" ng-show="!selectedItems.length">{{ $mid->title }}</li>--}}
                                {{--@endforeach--}}
                            {{--</ul>--}}
                            <div class="select-content ng-hide" ng-show="showContent" style="">
                            <!-- ngRepeat: item in items -->
                                <div ng-repeat="item in items" class="clearfix ng-scope">
                                <span class="select-nav ng-binding">异国料理</span>
                                <div class="select-sub-content">
                                <!-- ngRepeat: sons in item.sons track by $id(sons) -->
                                <label ng-repeat="sons in item.sons track by $id(sons)" ng-class="{'active': sons.checked}" class="ng-scope">
                                <input type="checkbox" style="display:none" ng-model="sons.checked" ng-change="onCheckChange(sons)" class="ng-pristine ng-untouched ng-valid ng-empty">
                                <span class="item-label ng-binding">披萨意面</span>
                                </label>
                                <!-- end ngRepeat: sons in item.sons track by $id(sons) -->
                                <label ng-repeat="sons in item.sons track by $id(sons)"
                                ng-class="{'active': sons.checked}" class="ng-scope">
                                <input type="checkbox" name="type" style="display:none" ng-model="sons.checked"
                                ng-change="onCheckChange(sons)"
                                class="ng-pristine ng-untouched ng-valid ng-empty">
                                <span class="item-label ng-binding">日韩料理</span>
                                </label>
                                <!-- end ngRepeat: sons in item.sons track by $id(sons) -->
                                <!-- end ngRepeat: sons in item.sons track by $id(sons) -->
                                </div>
                                </div><!-- end ngRepeat: item in items --> </div>
                        </div>
                    </div>
                    </div>
                </div>
                {{--城市级联--}}
                {{--<div class="form-group flex">--}}
                {{--<label class="control-label"> <b class="required">*</b>城市 </label>--}}
                {{--<div class="control-content city-group"><span> <div--}}
                {{--class="city-select ui-select-container ui-select-bootstrap dropdown ng-touched ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required"--}}
                {{--ng-class="{open: $select.open}" name="province"--}}
                {{--ng-model="form.pcd_region.province_id"--}}
                {{--ng-change="methods.provinceChange($select.selected)" style=""><div--}}
                {{--class="ui-select-match ng-scope"--}}
                {{--ng-hide="$select.open &amp;&amp; $select.searchEnabled"--}}
                {{--ng-disabled="$select.disabled" ng-class="{'btn-default-focus':$select.focus}"--}}
                {{--placeholder="-省-" style=""><span tabindex="-1"--}}
                {{--class="btn btn-default form-control ui-select-toggle"--}}
                {{--aria-label="Select box activate"--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--ng-click="$select.activate()"--}}
                {{--style="outline: 0;"><span--}}
                {{--ng-show="$select.isEmpty()"--}}
                {{--class="ui-select-placeholder text-muted ng-binding ng-hide"--}}
                {{--style="">-省-</span> <span ng-hide="$select.isEmpty()"--}}
                {{--class="ui-select-match-text pull-left"--}}
                {{--ng-class="{'ui-select-allow-clear': $select.allowClear &amp;&amp; !$select.isEmpty()}"--}}
                {{--ng-transclude="" style=""><span--}}
                {{--class="ng-binding ng-scope">北京市</span></span> <i--}}
                {{--class="caret pull-right" ng-click="$select.toggle($event)"></i> <a--}}
                {{--ng-show="$select.allowClear &amp;&amp; !$select.isEmpty() &amp;&amp; ($select.disabled !== true)"--}}
                {{--aria-label="Select box clear" style="margin-right: 10px"--}}
                {{--ng-click="$select.clear($event)"--}}
                {{--class="btn btn-xs btn-link pull-right ng-hide"><i--}}
                {{--class="glyphicon glyphicon-remove"--}}
                {{--aria-hidden="true"></i></a></span></div><input type="search"--}}
                {{--autocomplete="off"--}}
                {{--tabindex="-1"--}}
                {{--aria-expanded="true"--}}
                {{--aria-label="Select box"--}}
                {{--aria-owns="ui-select-choices-0"--}}
                {{--aria-activedescendant="ui-select-choices-row-0-2"--}}
                {{--class="form-control ui-select-search ng-pristine ng-valid ng-empty ng-touched ng-hide"--}}
                {{--placeholder="-省-"--}}
                {{--ng-model="$select.search"--}}
                {{--ng-show="$select.searchEnabled &amp;&amp; $select.open"--}}
                {{--style="width: 10px;"><ul--}}
                {{--class="ui-select-choices ui-select-choices-content ui-select-dropdown dropdown-menu ng-scope ng-hide"--}}
                {{--role="listbox" ng-show="$select.open &amp;&amp; $select.items.length > 0"--}}
                {{--repeat="item.id as item in data.provinces | filter: { name: $select.search }"--}}
                {{--style="opacity: 0;"><li class="ui-select-choices-group"--}}
                {{--id="ui-select-choices-0"><div class="divider ng-hide"--}}
                {{--ng-show="$select.isGrouped &amp;&amp; $index > 0"></div><div--}}
                {{--ng-show="$select.isGrouped"--}}
                {{--class="ui-select-choices-group-label dropdown-header ng-binding ng-hide"--}}
                {{--ng-bind="$group.name"></div></li></ul><div--}}
                {{--class="ui-select-no-choice"></div><ui-select-single></ui-select-single><input--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--class="ui-select-focusser ui-select-offscreen ng-scope" type="text"--}}
                {{--id="focusser-0" aria-label="Select box focus" aria-haspopup="true"--}}
                {{--role="button"></div> <small class="red ng-hide"--}}
                {{--ng-show="storeForm.province.$invalid &amp;&amp; (storeForm.province.$dirty || storeForm.$submitted)"--}}
                {{--style=""> 省份不能为空 </small> </span>--}}
                {{--<span> <div class="city-select ui-select-container ui-select-bootstrap dropdown ng-touched ng-not-empty ng-dirty ng-valid-parse ng-valid ng-valid-required"--}}
                {{--ng-class="{open: $select.open}" name="city" ng-model="form.pcd_region.city_id"--}}
                {{--ng-change="methods.cityChange($select.selected)" style=""><div--}}
                {{--class="ui-select-match ng-scope"--}}
                {{--ng-hide="$select.open &amp;&amp; $select.searchEnabled"--}}
                {{--ng-disabled="$select.disabled" ng-class="{'btn-default-focus':$select.focus}"--}}
                {{--placeholder="-市-" style=""><span tabindex="-1"--}}
                {{--class="btn btn-default form-control ui-select-toggle"--}}
                {{--aria-label="Select box activate"--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--ng-click="$select.activate()"--}}
                {{--style="outline: 0;"><span--}}
                {{--ng-show="$select.isEmpty()"--}}
                {{--class="ui-select-placeholder text-muted ng-binding ng-hide"--}}
                {{--style="">-市-</span> <span ng-hide="$select.isEmpty()"--}}
                {{--class="ui-select-match-text pull-left"--}}
                {{--ng-class="{'ui-select-allow-clear': $select.allowClear &amp;&amp; !$select.isEmpty()}"--}}
                {{--ng-transclude="" style=""><span--}}
                {{--class="ng-binding ng-scope">北京市</span></span> <i--}}
                {{--class="caret pull-right" ng-click="$select.toggle($event)"></i> <a--}}
                {{--ng-show="$select.allowClear &amp;&amp; !$select.isEmpty() &amp;&amp; ($select.disabled !== true)"--}}
                {{--aria-label="Select box clear" style="margin-right: 10px"--}}
                {{--ng-click="$select.clear($event)"--}}
                {{--class="btn btn-xs btn-link pull-right ng-hide"><i--}}
                {{--class="glyphicon glyphicon-remove"--}}
                {{--aria-hidden="true"></i></a></span></div><input type="search"--}}
                {{--autocomplete="off"--}}
                {{--tabindex="-1"--}}
                {{--aria-expanded="true"--}}
                {{--aria-label="Select box"--}}
                {{--aria-owns="ui-select-choices-1"--}}
                {{--aria-activedescendant="ui-select-choices-row-1-0"--}}
                {{--class="form-control ui-select-search ng-pristine ng-valid ng-empty ng-touched ng-hide"--}}
                {{--placeholder="-市-"--}}
                {{--ng-model="$select.search"--}}
                {{--ng-show="$select.searchEnabled &amp;&amp; $select.open"--}}
                {{--style="width: 10px;"><ul--}}
                {{--class="ui-select-choices ui-select-choices-content ui-select-dropdown dropdown-menu ng-scope ng-hide"--}}
                {{--role="listbox" ng-show="$select.open &amp;&amp; $select.items.length > 0"--}}
                {{--repeat="item.id as item in data.cities | filter: { name: $select.search }"--}}
                {{--style="opacity: 0;"><li class="ui-select-choices-group"--}}
                {{--id="ui-select-choices-1"><div class="divider ng-hide"--}}
                {{--ng-show="$select.isGrouped &amp;&amp; $index > 0"></div><div--}}
                {{--ng-show="$select.isGrouped"--}}
                {{--class="ui-select-choices-group-label dropdown-header ng-binding ng-hide"--}}
                {{--ng-bind="$group.name"></div><!-- ngRepeat: item in $select.items -->--}}
                {{--<!-- ngIf: $select.open -->--}}
                {{--<!-- end ngRepeat: item in $select.items --></li></ul><div--}}
                {{--class="ui-select-no-choice"></div><ui-select-single></ui-select-single><input--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--class="ui-select-focusser ui-select-offscreen ng-scope" type="text"--}}
                {{--id="focusser-1" aria-label="Select box focus" aria-haspopup="true"--}}
                {{--role="button"></div> <small class="red ng-hide"--}}
                {{--ng-show="storeForm.city.$invalid &amp;&amp; (storeForm.city.$dirty || storeForm.$submitted)"--}}
                {{--style=""> 城市不能为空 </small> </span>--}}
                {{--<span> <div class="city-select ui-select-container ui-select-bootstrap dropdown ng-touched ng-not-empty ng-valid ng-valid-required"--}}
                {{--ng-class="{open: $select.open}" name="district"--}}
                {{--ng-model="form.pcd_region.district_id"--}}
                {{--ng-change="methods.districtChange($select.selected)" style=""><div--}}
                {{--class="ui-select-match ng-scope"--}}
                {{--ng-hide="$select.open &amp;&amp; $select.searchEnabled"--}}
                {{--ng-disabled="$select.disabled" ng-class="{'btn-default-focus':$select.focus}"--}}
                {{--placeholder="-区/县-" style=""><span tabindex="-1"--}}
                {{--class="btn btn-default form-control ui-select-toggle"--}}
                {{--aria-label="Select box activate"--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--ng-click="$select.activate()"--}}
                {{--style="outline: 0;"><span--}}
                {{--ng-show="$select.isEmpty()"--}}
                {{--class="ui-select-placeholder text-muted ng-binding ng-hide" style="">-区/县-</span> <span--}}
                {{--ng-hide="$select.isEmpty()" class="ui-select-match-text pull-left"--}}
                {{--ng-class="{'ui-select-allow-clear': $select.allowClear &amp;&amp; !$select.isEmpty()}"--}}
                {{--ng-transclude="" style=""><span--}}
                {{--class="ng-binding ng-scope">昌平区</span></span> <i--}}
                {{--class="caret pull-right" ng-click="$select.toggle($event)"></i> <a--}}
                {{--ng-show="$select.allowClear &amp;&amp; !$select.isEmpty() &amp;&amp; ($select.disabled !== true)"--}}
                {{--aria-label="Select box clear" style="margin-right: 10px"--}}
                {{--ng-click="$select.clear($event)"--}}
                {{--class="btn btn-xs btn-link pull-right ng-hide"><i--}}
                {{--class="glyphicon glyphicon-remove"--}}
                {{--aria-hidden="true"></i></a></span></div><input type="search"--}}
                {{--autocomplete="off"--}}
                {{--tabindex="-1"--}}
                {{--aria-expanded="true"--}}
                {{--aria-label="Select box"--}}
                {{--aria-owns="ui-select-choices-2"--}}
                {{--aria-activedescendant="ui-select-choices-row-2-0"--}}
                {{--class="form-control ui-select-search ng-pristine ng-valid ng-empty ng-touched ng-hide"--}}
                {{--placeholder="-区/县-"--}}
                {{--ng-model="$select.search"--}}
                {{--ng-show="$select.searchEnabled &amp;&amp; $select.open"--}}
                {{--style="width: 10px;"><ul--}}
                {{--class="ui-select-choices ui-select-choices-content ui-select-dropdown dropdown-menu ng-scope ng-hide"--}}
                {{--role="listbox" ng-show="$select.open &amp;&amp; $select.items.length > 0"--}}
                {{--repeat="item.id as item in data.districts | filter: { name: $select.search }"--}}
                {{--style="opacity: 0;"><li class="ui-select-choices-group"--}}
                {{--id="ui-select-choices-2"><div class="divider ng-hide"--}}
                {{--ng-show="$select.isGrouped &amp;&amp; $index > 0"></div><div--}}
                {{--ng-show="$select.isGrouped"--}}
                {{--class="ui-select-choices-group-label dropdown-header ng-binding ng-hide"--}}
                {{--ng-bind="$group.name"></div></li></ul><div--}}
                {{--class="ui-select-no-choice"></div><ui-select-single></ui-select-single><input--}}
                {{--ng-disabled="$select.disabled"--}}
                {{--class="ui-select-focusser ui-select-offscreen ng-scope" type="text"--}}
                {{--id="focusser-2" aria-label="Select box focus" aria-haspopup="true"--}}
                {{--role="button"></div> <small class="red ng-hide"--}}
                {{--ng-show="storeForm.district.$invalid &amp;&amp; (storeForm.district.$dirty || storeForm.$submitted)"--}}
                {{--style=""> 区/县不能为空 </small> </span></div>--}}
                {{--</div>--}}
                {{--详细地址--}}
                {{--<div class="form-group flex">--}}
                {{--<label class="control-label"> <b class="required">*</b>详细地址 </label>--}}
                {{--<div class="form-inline"><input type="text" name="address" onblur ="checkaddress"--}}
                {{--class="form-control address-detail mr-10 ng-pristine ng-empty ng-invalid ng-invalid-required ng-valid-maxlength ng-touched"--}}
                {{--ng-model="form.address_info.address" placeholder="详细至门牌号，请与执照地址一致"--}}
                {{--maxlength="255" required="" style="">--}}
                    {{--<div id="div_address"></div>--}}
                {{--<button type="button" class="btn btn-primary loca-btn" ng-click="methods.searchPlace()"> 去定位--}}
                {{--</button>--}}
                {{--<br>--}}
                {{--<small class="red"--}}
                {{--ng-show="storeForm.address.$invalid &amp;&amp; (storeForm.address.$dirty || storeForm.$submitted || storeForm.address._searched)"--}}
                {{--style=""> 详细地址不能为空--}}
                {{--</small>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--地图定位--}}
                {{--<div class="form-group flex">--}}
                {{--<div class="control-label"></div>--}}
                {{--<div class="control-content">--}}
                {{--<div class="amap-position-pick flex ng-isolate-scope" points="data.searchResults"--}}
                {{--area="data.area" position="form.address_info">--}}
                {{--<div id="search-results" ng-show="points" class="ng-hide">--}}
                {{--<div class="count">请选择门店位置</div>--}}
                {{--<ul ng-show="points.length" class="ng-hide"> <!-- ngRepeat: result in points --> </ul>--}}
                {{--<p class="empty" ng-show="!points.length"> 未搜索到您输入的地址，请重新输入地址或者直接在右侧地图中<span--}}
                {{--class="blue">标记位置</span>！ </p></div>--}}
                {{--<div id="map-container" class="amap-container"--}}
                {{--style="position: relative; background: rgb(252, 249, 242); cursor: url(&quot;https://webapi.amap.com/theme/v1.3/openhand.cur&quot;), default;">--}}
                {{--<object style="display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; pointer-events: none; z-index: -1;"--}}
                {{--type="text/html" data="about:blank"></object>--}}
                {{--<div class="amap-maps">--}}
                {{--<div class="amap-drags">--}}
                {{--<div class="amap-layers" style="transform: translateZ(0px);">--}}
                {{--<canvas class="amap-layer" width="798" height="498"--}}
                {{--style="position: absolute; z-index: 0; top: 0px; left: 0px; height: 498px; width: 798px;"></canvas>--}}
                {{--<canvas class="amap-labels" draggable="false"--}}
                {{--style="position: absolute; z-index: 99; height: 498px; width: 798px; top: 0px; left: 0px;"--}}
                {{--width="798" height="498"></canvas>--}}
                {{--<div class="amap-markers"--}}
                {{--style="position: absolute; z-index: 120; top: 249px; left: 399px;">--}}
                {{--<div class="amap-marker"--}}
                {{--style="top: -35px; left: 32px; z-index: 100; transform: rotate(0deg); transform-origin: 9px 31px 0px; display: block;">--}}
                {{--<div class="amap-marker-content" style="opacity: 1;"><i--}}
                {{--class="amap-marker-custom selected"></i></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<canvas class="amap-vectors" width="798" height="498"--}}
                {{--style="position: absolute; z-index: 110; top: 0px; left: 0px;"></canvas>--}}
                {{--</div>--}}
                {{--<div class="amap-overlays"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div style="display: none;">--}}
                {{--<div class="amap-info" style="position: absolute; left: 296px; top: 245px;">--}}
                {{--<div style="position: absolute; bottom: 20px; left: 15px;">--}}
                {{--<div>--}}
                {{--<div class="amap-info-window">--}}
                {{--<div class="main">--}}
                {{--<div class="title">--}}
                {{--是否将该位置设置成门店位置?--}}
                {{--</div>--}}
                {{--<div class="content">--}}

                {{--<h6>北京市昌平区城北街道清真寺胡同酒厂宿舍</h6>--}}
                {{--<p>北京市昌平区城北街道清真寺胡同酒厂宿舍</p>--}}
                {{--<button class="btn btn-primary btn-sm"--}}
                {{--onclick="markPosition()" type="button">确定--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="amap-info-sharp"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="amap-controls">--}}
                {{--<div class="amap-toolbar" style="left: 20px; top: 60px; visibility: visible;">--}}
                {{--<div class="amap-pancontrol" style="position: relative; display: block;">--}}
                {{--<div class="amap-pan-left"></div>--}}
                {{--<div class="amap-pan-top"></div>--}}
                {{--<div class="amap-pan-right"></div>--}}
                {{--<div class="amap-pan-bottom"></div>--}}
                {{--</div>--}}
                {{--<div class="amap-locate"--}}
                {{--style="position: relative; left: 17px; display: block;"></div>--}}
                {{--<div class="amap-zoomcontrol" style="position: relative; left: 14px;">--}}
                {{--<div class="amap-zoom-plus"></div>--}}
                {{--<div class="amap-zoom-ruler" style="display: block;">--}}
                {{--<div class="amap-zoom-mask" style="height: 73px;"></div>--}}
                {{--<div class="amap-zoom-cursor" style="top: 73px;"></div>--}}
                {{--<div class="amap-zoom-labels" style="display: none;">--}}
                {{--<div class="amap-zoom-label-street"></div>--}}
                {{--<div class="amap-zoom-label-city"></div>--}}
                {{--<div class="amap-zoom-label-province"></div>--}}
                {{--<div class="amap-zoom-label-country"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="amap-zoom-minus"></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<div class="amap-indoormap-floorbar-control can-scroll can-scroll-up"--}}
                {{--title="西单商场(西单北大街店)" style="display: none;">--}}
                {{--<div class="panel-box">--}}
                {{--<div class="select-dock" style="top: 98px;"></div>--}}
                {{--<div class="floor-btn floor-nav floor-plus">+</div>--}}
                {{--<div class="floor-list-box">--}}
                {{--<ul class="floor-list" style="margin-top: -43px;">--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">F5</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">F4</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">F3</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">F2</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item selected">--}}
                {{--<div class="floor-btn floor-nonas">F1</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">B1</div>--}}
                {{--</li>--}}
                {{--<li class="floor-list-item">--}}
                {{--<div class="floor-btn floor-nonas">B2</div>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="floor-btn floor-nav floor-minus">-</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<a class="amap-logo" href="http://gaode.com" target="_blank"><img--}}
                {{--src="https://webapi.amap.com/theme/v1.3/autonavi.png"></a>--}}
                {{--<div class="amap-copyright" style="display: none;"><!--v1.3.28--> ? 2017 AutoNavi <span--}}
                {{--class="amap-mcode">- GS(2016)710号</span></div>--}}
                {{--</div>--}}
                {{--</div>--}}
                {{--<small class="red ng-hide"--}}
                {{--ng-show="!form.address_info.longitude &amp;&amp; storeForm.$submitted" style="">--}}
                {{--请点击[去定位]，并在地图上选择准确的地址--}}
                {{--</small>--}}
                {{--</div>--}}
                {{--</div>--}}

                {{--照片--}}
                <div class="form-group flex"><label class="control-label">
                        <b class="required">*</b>照片 </label>
                    <div class="control-content">
                        <div class="picture-item ng-isolate-scope" name="" desc=""
                             src="assets/ex-front.png">
                            <div class="name ng-binding">营业执照照片</div>
                            <ng-transclude class="img-container">
                                <div class="img-flow ng-scope ng-isolate-scope ng-empty ng-invalid ng-invalid-required ng-valid-door-pic-input"
                                     name="doorPicInput" ng-model="form.door_pic" mobile="18851457819">
                                    <div id="preview" ></div>
                                    <input type="file" accept="image/*"  onchange="preview(this)" id="inputPassword3" name="logoname">
                                    <p class="tip" ng-hide="ngModel || isUploadStatus === 1">
                                        点击上传 </p>
                                </div>
                            </ng-transclude>
                            <div class="desc ng-binding"> 营业执照可以加速审核喔！</div>
                            <div class="example"><span>示例</span>
                                <div class="directive-image-preview ng-isolate-scope" src="assets/ex-front.png">
                                    <img class="d-thumbnail" ng-src="assets/ex-front.png" alt="thumbnail"
                                         src="{{ asset('images/ex_licen.png') }}">
                            </div>
                        </div>
                    </div>

                        <div class="picture-item ng-isolate-scope" name="门脸照" desc="一张真实美观的门脸照可以提升店铺形象"
                             src="assets/ex-front.png">
                            <div class="name ng-binding">店铺照片</div>
                            <ng-transclude class="img-container">
                                <div class="img-flow ng-scope ng-isolate-scope ng-empty ng-invalid ng-invalid-required ng-valid-door-pic-input"
                                     name="doorPicInput" ng-model="form.door_pic" mobile="18851457819">
                                    <div id="preview1" ></div>
                                    <input type="file" accept="image/*" onchange="preview1(this)" id="inputPassword3" name="picname">
                                    <p class="tip" ng-hide="ngModel || isUploadStatus === 1">点击上传 </p>
                                </div>
                            </ng-transclude>
                            <div class="desc ng-binding"> 一张真实美观的门脸照可以提升店铺形象</div>
                            <div class="example"><span>示例</span>
                                <div class="directive-image-preview ng-isolate-scope" src="assets/ex-front.png">
                                    <img class="d-thumbnail" ng-src="assets/ex-front.png" alt="thumbnail"
                                         src="{{ asset('images/ex-front.png') }}">
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
<script type="text/javascript" src="{{ asset('js/register.js') }}"></script>
</body>
</html>