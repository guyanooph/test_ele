@extends("home.base")
@section("content")

<!-- ngView:  -->
<div ng-view="" role="main" class="ng-scope">
	<div class="container clearfix ng-scope">
		<div class="location" ng-style="{visibility: geohash ? '' : 'hidden'}" role="navigation" location="">
			<span>当前位置:</span> <span class="location-current"><a class="inherit ng-binding" ng-href="/place/wx4sp1s1gff"
			                                                     ubt-click="401" ng-bind="place.name || place.address"
			                                                     href="/place/wx4sp1s1gff">昌平区回龙观云趣园一区(龙禧二街北160米)</a></span>
			<span class="location-change location-hashistory"
			      ng-class="{ 'location-hashistory': user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length > 0 }"><a
						ng-href="/home" ubt-click="400" hardjump="" href="/home">[切换地址]</a><ul
						class="dropbox location-dropbox" ubt-visit="398"><li class="arrow"></li>
					<!-- ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo: 4 --><li
							ng-repeat="userPlace in userPlaces | filter:filterPlace | limitTo: 4" class="ng-scope"><a
								class="inherit ng-binding"
								ng-href="/place/wx4sp1s1mpy0?latitude=40.086621&amp;longitude=116.328958"
								ng-bind="userPlace.name" ubt-click="399"
								href="/place/wx4sp1s1mpy0?latitude=40.086621&amp;longitude=116.328958">昌平区回龙观云趣园一区(龙禧二街北160米)</a></li>
					<!-- end ngRepeat: userPlace in userPlaces | filter:filterPlace | limitTo: 4 --><li
							class="changelocation"><a ng-href="/home" hardjump="" href="/home">修改收货地址<span
									class="icon-location"></span></a></li></ul></span> <span ng-transclude=""></span>
		</div>
		<div class="place-search" role="search" search-input=""><label
					for="globalsearch">搜索商家或美食</label><input id="globalsearch"
		                                                     class="place-search-input ng-pristine ng-valid"
		                                                     ng-model="searchText" autocomplete=""
		                                                     placeholder="搜索商家,美食...">
			<div class="searchbox">
				<div class="searchbox-list searchbox-rstlist ng-hide"
				     ng-show="searchRestaurants &amp;&amp; searchRestaurants.length > 0"
				     ng-class="{ 'show-separator': searchFoods &amp;&amp; searchFoods.length > 0 }">
					<ul>
						<!-- ngRepeat: restaurant in searchRestaurants | orderBy: [ '-is_opening', 'order_lead_time' ] | limitTo: 5 --></ul>
				</div>
				<div class="searchbox-list searchbox-foodlist ng-hide"
				     ng-show="searchFoods &amp;&amp; searchFoods.length > 0">
					<ul><!-- ngRepeat: food in searchFoods  | limitTo: 5 --></ul>
				</div>
			</div>
		</div>
	</div><!-- ngIf: activities -->
	<div class="place-tab clearfix container ng-scope">
		<div class="place-fetchtakeout ng-isolate-scope" show-fetch-takeout-dialog=""><img
					src="//faas.elemecdn.com/desktop/media/img/takeout.408a87.png" alt="谁去拿外卖"></div>
	</div>
	<div ng-show="!recentBoughtOnly" class="container ng-scope">
		<div class="excavator container"><!-- ngIf: rstCategories.length -->
			<div class="excavator-filter ng-scope" ng-if="rstCategories.length"><span class="excavator-filter-name">商家分类:</span>
				<a class="excavator-filter-item ng-binding ng-scope active"
                    href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">全部商家</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">美食</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">快餐便当</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">特色菜系</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">异国料理</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">小吃夜宵</a>
				<a class="excavator-filter-item ng-binding ng-scope"
				    href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">甜品饮品</a>
				<a class="excavator-filter-item ng-binding ng-scope"
				    href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">果蔬生鲜</a>
				<a class="excavator-filter-item ng-binding ng-scope"
				    href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">鲜花蛋糕</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">商店超市</a>
				<a class="excavator-filter-item ng-binding ng-scope" href="javascript:"
				    ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">早餐</a>
			    <a class="excavator-filter-item ng-binding ng-scope"
				    href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name"
				    ng-click="changeCategory(category)" ubt-click="380">正餐优选</a>
					
				<div ng-show="subCategories" class="excavator-filter-subbox ng-hide">
				</div>
			</div>
		</div>
		<div class="place-rstbox clearfix">
			<div class="clearfix"
			     data="filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])"
			     style="height: 840px;">
				 @foreach( $list as $vo)
				 <a href="/shoplist/{{$vo->id}}" data-rst-id="" data-bidding="" target="_blank"
			                               class="rstblock">
					<div class="rstblock-logo">
					<img src="//fuss10.elemecdn.com/8/38/68c554160c254ba06eef15bb963ebpng.png?imageMogr2/thumbnail/70x70"
					width="70" height="70" alt="{{ $vo->shopname }}" class="rstblock-logo-icon"><span>{{ $vo->service_time }}分钟</span>
					</div>
					<div class="rstblock-content">
						<div class="rstblock-title">{{ $vo->shopname }}</div>
						<div class="starrating icon-star"><span class="icon-star" style="width:100%;"></span></div>
						<span class="rstblock-monthsales">月售{{ $vo->month_num }}单</span>
						<div class="rstblock-cost">配送费¥{{ 5 }}</div>
						<div class="rstblock-cost">起送价¥{{ $vo->givemoney }}</div>
						<div class="rstblock-activity"><i style="background:#57A9FF;">准</i><i
									style="background:#fff;color:#999999;border:1px solid;padding:0;">保</i></div>
					</div>
				  </a>
				 @endforeach
				</div>
				
				
				
				
				
			<div class="loading ng-binding ng-isolate-scope" ng-show="rstStream.status === 'LOADING'" loading=""
			     content="正在载入更多商家..." type="normal"><!-- ngIf: type==='profile' --> <!-- ngIf: type==='normal' --><img
						ng-if="type==='normal'" class="normal ng-scope"
						src="{{asset('images/jiazai.gif')}}" alt="正在加载">
				<!-- end ngIf: type==='normal' -->正在载入更多商家...
			</div>
			<div id="fetchMoreRst" ng-show="rstStream.status === 'NEED_USER_ACTION'" class="ng-hide">点击加载更多商家...</div>
			<div class="place-rstbox-nodata ng-hide"
			     ng-show="rstStream.status === 'COMPLETE' &amp;&amp; !filteredRestaurants.length"><img class="nodata"
			                                                                                           width="100"
			                                                                                           src="//faas.elemecdn.com/desktop/media/img/icon-restaurant.b3a359.png"
			                                                                                           alt="找不到商家">
				<div class="typo-small">附近没有找到符合条件的商家，换个筛选条件试试吧</div>
			</div>
		</div>
	</div>
</div>


@endsection