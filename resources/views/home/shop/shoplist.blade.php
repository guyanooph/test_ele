@extends("home.base")
@section("content")

<!-- ngView:  -->
<div ng-view="" role="main" class="ng-scope">
	<div class="container clearfix ng-scope">
		<div class="location" ng-style="{visibility: geohash ? '' : 'hidden'}" role="navigation" location="">
			<span>当前位置:</span> <span class="location-current"><a class="inherit ng-binding" ng-href="/place/wx4sp1s1gff"
			                                                     ubt-click="401" ng-bind="place.name || place.address"
			                                                     href="/?address={{ $location['address'] }}&position={{ $location['position'] }}">{{ $location['address'] }}</a></span>
			<span class="location-change location-hashistory"
			      ng-class="{ 'location-hashistory': user.username &amp;&amp; userPlaces &amp;&amp; userPlaces.length > 0 }"><a
						ng-href="/home" ubt-click="400" hardjump="" href="/home">[切换地址]</a></span> <span ng-transclude=""></span>
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
				<a onclick="loadChildType(this)" typeid="0" class="excavator-filter-item ng-binding ng-scope focus"
                    href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">全部商家</a>
                @foreach($type as $item)
				<a onclick="loadChildType(this)" typeid="{{ "f".$item['id'] }}" class="excavator-filter-item ng-binding ng-scope" href="javascript:" ng-repeat="category in rstCategories"
				    ng-class="{'focus': clickedCategory === category.id &amp;&amp; (!clickedCategory || clickedCategory < 0) , 'active': activeCategory === category.id, 'premium': category.id === -10001 &amp;&amp; !pumStream}"
				    ng-bind="category.name" ng-click="changeCategory(category)" ubt-click="380">{{ $item['title'] }}</a>
                @endforeach
					
				<div id="childtype" ng-show="subCategories" class="excavator-filter-subbox ng-hide">
				</div>
                <script>
                    var typedata = "aa";
                    $.ajax({
                        url:"/getmertype",
                        type:"get",
                        datatype:"json",
                        async:false,
                        success:function(data){
                            typedata = $.parseJSON(data);
                        },
                        error:function(){
                            alert("error");
                        }
                    });
                    
                    function loadChildType(ob){
                        if($(ob).index() == 1){
                            $(ob).addClass("focus");
                            $(ob).parent().children("div").children("a").removeClass("focus");
                            reloadShopList($(ob).attr("typeid"));
                            return;
                        }
                        $(ob).parent().children("a:first").removeClass("focus");
                        $(ob).siblings("a.active").removeClass("active");
                        $(ob).addClass('active');
                        $("#childtype").children().remove();
                        var ind = $(ob).index();
                        var str = "<a onclick=\"reloadShopList('"+$(ob).attr("typeid")+"')\" typeid=\"" + $(ob).attr("typeid") + "\" class=\"excavator-filter-item ng-binding ng-scope focus\" href=\"javascript:\" ng-repeat=\"subitem in subCategories\" ng-class=\"{'focus': clickedCategory === subitem.id}\" ng-bind=\"subitem.name\" ng-click=\"changeCategory(subitem)\">全部</a>";
                        $("#childtype").append(str);
                        for(var i in typedata[ind-2].sid){
                            str = "<a onclick=\"reloadShopList(" + typedata[ind-2].sid[i].id + ")\" typeid=\"" + typedata[ind-2].sid[i].id + "\" class=\"excavator-filter-item ng-binding ng-scope\" href=\"javascript:\" ng-repeat=\"subitem in subCategories\" ng-class=\"{'focus': clickedCategory === subitem.id}\" ng-bind=\"subitem.name\" ng-click=\"changeCategory(subitem)\">"+ typedata[ind-2].sid[i].title +"</a>";
                            $("#childtype").append(str);
                        };
                        $("#childtype").removeClass("ng-hide");

                        reloadShopList($(ob).attr("typeid"));
                    }


                    function reloadShopList(typeid){
                        $("#shoplistbody").remove();
                        $("#loading").removeClass("ng-hide");
                        $.ajax({
                            url:"/shoplist",
                            type:"POST",
                            data:"typeid="+typeid,
                            datatype:"json",
                            headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' },
                            success:function(data){
                                var str = "<div id=\"shoplistbody\" class=\"clearfix\" data=\"filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])\" style=\"height: " + Math.ceil(data.length/4)*138 + "px\">";
                                for(var i in data){
                                    str += "<a href=\"/shoplist/" + data[i].shopid + "\" data-rst-id=\"1230868\" data-bidding=\"{'core':{'index':4,'target':{'restaurantId':1230868,'weight':170,'probability':170000.078125},'come_from':1,'next':{'restaurantId':147689928,'weight':100,'probability':100000.125}}}\" target=\"_blank\" class=\"rstblock\"><div class=\"rstblock-logo\"><img src=\"http://oslsovx4q.bkt.clouddn.com/upload/image" + data[i].logo + "?imageMogr2/thumbnail/70x70\" width=\"70\" height=\"70\" alt=\""+ data[i].shopname +"\" class=\"rstblock-logo-icon\"><span class=\"rstblock-left-timeout\">" + data[i].service_time + " 分钟</span></div><div class=\"rstblock-content\"><div class=\"rstblock-title\">" + data[i].shopname + "</div><div class=\"starrating icon-star\"><span class=\"icon-star\" style=\"width:96%;\"></span></div><span class=\"rstblock-monthsales\">月售" + data[i].month_num + "单</span><div class=\"rstblock-cost\">配送费¥" + data[i].money + "</div><div class=\"rstblock-activity\"><i style=\"background:#fff;color:#999999;border:1px solid;padding:0;\">票</i></div></div></a>";
                                }
                                str += "</div>";
                                $("#shoplistcontainer").prepend(str);
                                if(!data.length){
                                    $("#nothing").remove("ng-hide")
                                    $("#loading").addClass("ng-hide");
                                }else{
                                    $("#loading").addClass("ng-hide");
                                }
                            },
                            error:function(){
                                alert("error");
                            }
                        });
                    }
                </script>
			</div>
		</div>
		<div id="shoplistcontainer" class="place-rstbox clearfix">
			<div id="shoplistbody" class="clearfix"
			     data="filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])"
			     style="height: 840px;">
				 @foreach( $list as $vo)
				 <a href="/shoplist/{{$vo->shopid}}" data-rst-id="" data-bidding="" target="_blank"
			                               class="rstblock">
					<div class="rstblock-logo">
					<img src="{{ QINIU_PREFIX }}{{$vo->logo }}?imageMogr2/thumbnail/70x70"
					width="70" height="70" alt="{{ $vo->shopname }}" class="rstblock-logo-icon"><span>{{ $vo->service_time }}分钟</span>
					</div>
					<div class="rstblock-content">
						<div class="rstblock-title">{{ $vo->shopname }}</div>
						<div class="starrating icon-star"><span class="icon-star" style="width:{{ ($vo->rate/5)*100 }}%;"></span></div>
						<span class="rstblock-monthsales">月售{{ $vo->month_num }}单</span>
						<div class="rstblock-cost">配送费¥{{ $vo->money }}</div>
						<div class="rstblock-cost">起送价¥{{ $vo->givemoney }}</div>
						<div class="rstblock-activity"><i style="background:#57A9FF;">准</i><i
									style="background:#fff;color:#999999;border:1px solid;padding:0;">保</i></div>
					</div>
				  </a>
				 @endforeach
				</div>
				
				
				
				
				
			<div id="loading" class="loading ng-binding ng-isolate-scope ng-hide" ng-show="rstStream.status === 'LOADING'" loading=""
			     content="正在载入更多商家..." type="normal"><!-- ngIf: type==='profile' --> <!-- ngIf: type==='normal' --><img
						ng-if="type==='normal'" class="normal ng-scope"
						src="{{asset('images/jiazai.gif')}}" alt="正在加载">
				<!-- end ngIf: type==='normal' -->正在载入更多商家...
			</div>
			<div id="fetchMoreRst" ng-show="rstStream.status === 'NEED_USER_ACTION'" class="ng-hide">点击加载更多商家...</div>
			<div id="#nothing" class="place-rstbox-nodata ng-hide"
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
