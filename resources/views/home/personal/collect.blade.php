 @extends("home.index")
  @section("content")
  
  <!-- 个人收藏 ： 可配送商家 和 不可配送商家 ( 超出当前区域 ) -->
  
  
	  <div class="profile-panel" role="main">
	  <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
	  <span ng-bind="pageTitle" class="ng-binding">我的收藏</span>
	  <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span>
	  </h3>
	  
	  <div class="profile-panelcontent" ng-transclude="">
	  <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入商家信息..." ng-show="favorLoading">
	  <img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope">正在载入商家信息...
	  </div>
	  
	  
	    <!--  当前区域可配送的商家   -->
	  <div class="favor-restaurants ng-scope" ng-show="!favorLoading">
	  <h4 class="favor-title">当前区域共有
	  <span ng-bind="inRegionFavors.length || 0" class="ng-binding">{{ count($collect[0]) }}</span>家可配送商家</h4>
	  
	  <div class="clearfix">
      @if(count($collect[0])>0)
      @foreach($collect[0] as $shop)
	  <div class="favor-rstblock" ng-class="{'outofregion':outofregion}" favor-rst-block="" ng-repeat="restaurant in inRegionFavors">
	  <div class="favor-rstblock-header">
	  <div class="favor-rstblock-headerbg" ng-style="{'background-image': 'url(' + backgroundUrl + ')'}" style="background-image: url(&quot;//faas.elemecdn.com/desktop/media/img/favor-rst-bg1.804470.jpg&quot;);"></div>
	  <a class="favor-rstblock-name ng-binding" ng-bind="restaurant.name" ng-href="/shop/497788" title="前往{{ $shop['shop']['shopname'] }}" href="/shoplist/{{ $shop['shopid'] }}">{{ $shop['shop']['shopname'] }}</a>
	  </div>
	  
	 <a ng-href="/shoplist/{{ $shop['shopid'] }}" title="前往{{ $shop['shop']['shopname'] }}" href="/shop/497788">
	 <img ng-src="{{ QINIU_PREFIX }}{{ $shop['shop']['logo'] }}?imageMogr2/thumbnail/78x78" class="favor-rstblock-logo" alt="商家 LOGO" src="{{ QINIU_PREFIX }}{{ $shop['shop']['logo'] }}?imageMogr2/thumbnail/78x78">
	 </a>
	  
	  <div class="favor-rstblock-starrating icon-star">
	  <span class="icon-star" ng-style="{ width: (restaurant.rating * 20) + '%' }" style="width: {{ $shop['shop']['rate']/5*100 }}%;">
	  </span>
	  </div>
	  
	  <span class="favor-rstblock-monthsales ng-binding" ng-bind="'月售' + restaurant.recent_order_num + '单'">月售{{ $shop['shop']['month_num'] }}单</span>
	  
	  <div class="favor-rstblock-content">
	  <div class="favor-rstblock-item">
	  <p>起送价</p>
	  <p class="value icon-yen ng-binding" ng-bind="restaurant.float_minimum_order_amount">{{ $shop['shop']['givemoney'] }}</p>
	  </div>
	  
	  <div class="favor-rstblock-item">
	  <p>送餐时间</p>
	  <p class="value time ng-binding" ng-bind="restaurant.order_lead_time_text ||  0">{{ $shop['shop']['service_time'] }}</p></div>
	  </div>
	  
	  
	  <div class="favor-rstblock-activity">
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="background-color: rgb(87, 169, 255); border: 1px solid rgb(87, 169, 255);">准</i>
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">保</i>
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">票</i>
	  
	  <i class="favor-rstblock-cancel icon-trash" ng-click="showRemoveMask($index)"></i>
	  
	  </div>
	</div><!-- end ngRepeat: restaurant in inRegionFavors --><!-- ngIf: !inRegionFavors.length -->
    @endforeach
    @else
    <div class="nodata ng-isolate-scope" ng-if="!inRegionFavors.length" nodatatip="" content="暂无可配送商家"><p class="nodata-container ng-binding" ng-bind-html="content | toTrusted">暂无可配送商家</p></div>
    @endif
   </div>
 </div>
	  
	  
	  
	  
	    <!--  当前区域不可配送商家 （ 超出配送范围 ） -->
	  <div class="favor-restaurants ng-scope" ng-show="!favorLoading">
	  <h4 class="favor-title">当前区域不可配送的商家</h4>
	  <div class="clearfix">

      @foreach($collect[1] as $shop)
	  <div class="favor-rstblock outofregion" ng-class="{'outofregion':outofregion}" favor-rst-block="" ng-repeat="restaurant in inRegionFavors">
	  <div class="favor-rstblock-header">
	  <div class="favor-rstblock-headerbg" ng-style="{'background-image': 'url(' + backgroundUrl + ')'}" style="background-image: url(&quot;//faas.elemecdn.com/desktop/media/img/favor-rst-bg1.804470.jpg&quot;);"></div>
	  <a class="favor-rstblock-name ng-binding" ng-bind="restaurant.name" ng-href="/shop/497788" title="前往{{ $shop['shop']['shopname'] }}" href="/shoplist/{{ $shop['shopid'] }}">{{ $shop['shop']['shopname'] }}</a>
	  </div>
	  
	 <a ng-href="/shoplist/{{ $shop['shopid'] }}" title="前往{{ $shop['shop']['shopname'] }}" href="/shop/497788">
	 <img ng-src="{{ QINIU_PREFIX }}{{ $shop['shop']['logo'] }}?imageMogr2/thumbnail/78x78" class="favor-rstblock-logo" alt="商家 LOGO" src="{{ QINIU_PREFIX }}{{ $shop['shop']['logo'] }}?imageMogr2/thumbnail/78x78">
	 </a>
	  
	  <div class="favor-rstblock-starrating icon-star">
	  <span class="icon-star" ng-style="{ width: (restaurant.rating * 20) + '%' }" style="width: {{ $shop['shop']['rate']/5*100 }}%;">
	  </span>
	  </div>
	  
	  <span class="favor-rstblock-monthsales ng-binding" ng-bind="'月售' + restaurant.recent_order_num + '单'">月售{{ $shop['shop']['month_num'] }}单</span>
	  
	  <div class="favor-rstblock-content">
	  <div class="favor-rstblock-item">
	  <p>起送价</p>
	  <p class="value icon-yen ng-binding" ng-bind="restaurant.float_minimum_order_amount">{{ $shop['shop']['givemoney'] }}</p>
	  </div>
	  
	  <div class="favor-rstblock-item">
	  <p>送餐时间</p>
	  <p class="value time ng-binding" ng-bind="restaurant.order_lead_time_text ||  0">{{ $shop['shop']['service_time'] }}</p></div>
	  </div>
	  
	  
	  <div class="favor-rstblock-activity">
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="background-color: rgb(87, 169, 255); border: 1px solid rgb(87, 169, 255);">准</i>
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">保</i>
	  <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name" class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon="" name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">票</i>
	  
	  <i class="favor-rstblock-cancel icon-trash" ng-click="showRemoveMask($index)"></i>
	  
	  </div>
	</div><!-- end ngRepeat: restaurant in inRegionFavors --><!-- ngIf: !inRegionFavors.length -->
    @endforeach

</div>
	</div>
  </div>
</div>
  
    @endsection 
	
	
	
	
	
