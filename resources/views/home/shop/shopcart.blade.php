<script>
    function togglecart(ob){
        if($(ob).hasClass("focus")){
            $(ob).removeClass("focus");
            $(ob).parent().parent().parent().attr("style","transform: translate3d(0px, 0px, 0px);");
        }else{
            $(ob).addClass("focus");
            $(ob).parent().parent().parent().attr("style","transform: translate3d(-295px, 0px, 0px);");
        }
    }

    function addShopcart(e,m){
        var foodid = e.getAttribute('foodid');
        $(select).parent().parent().parent().parent().parent().parent().remove();
        $.ajax({
            url:"/addtocart/"+ {{ $default_cart }} + "/" + foodid,
            type:"get",
            data:"m=" + m,
            datatype:"json",
            success:function(data){
                var data = $.parseJSON(data);
                var select = "div[foodid='" + foodid + "']";
                if(data.num<=0 && data.status==1){
                    $aps = "<div ng-if=\"!loading &amp;&amp; !pieces\" class=\"sidebarcart-notice ng-scope\"><i class=\"icon-history\"></i><h3>购物车空空如也</h3><p>快去订餐吧，总有你心仪的美食</p></div>"
                    $(select).parent().append($aps);
                    $(select).parent().parent().parent().parent().parent().parent().remove();
                }else if(data.status==1){
                    var select_2 = select + " input";
                    $(select_2).val(data.num);
                    $(select).parent().children("div.itemtotal").html("¥"+(data.num*data.price));
                }else if(data.status==0){
                    var item = "<div foodid=\""+data.id+"\" ng-repeat=\"item in shopCart.vm.groups[shopCart.currentGroupIndex]\" class=\"shop-cartbasket-tablerow ng-scope\" entityid=\"547033283\"><div class=\"cell itemname ng-binding\" ng-bind=\"item.name\" title=\""+ data.title +"\">"+ data.title +"</div><div class=\"cell itemquantity\"><button onclick=\"addShopcart(this,-1)\" ng-click=\"shopCart.subEntity(item, $event)\"  foodid='"+ data.id +"'  >-</button><input ng-model=\"item.quantity\" ng-blur=\"shopCart.updateFromInput(item, item.quantity)\" class=\"ng-pristine ng-valid\" value=\"" + data.num + "\"><button foodid='"+ data.id +"' onclick=\"addShopcart(this,1)\" ng-click=\"shopCart.addEntity(item, $event)\">+</button></div><div class=\"cell itemtotal ng-binding\" ng-bind=\"'¥' + ((item.price * item.quantity).toFixed(2) | number)\">￥"+ data.price * data.num +"</div></div>";
                    $("#emptycart").remove();
                    $("#shopbasket").append(item);
                }
            },
            error:function(){
                alert("失败了");
            }
        });
    }

</script>
<div class="sidebar" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar">
    <div class="sidebar-tabs">
        <div class="toolbar-tabs-middle">
            <a class="toolbar-btn icon-order toolbar-close" href="/personal/order" hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order"><!-- ngIf: sidebarCount.uncompletedOrder > 0 --></a>
            <div class="toolbar-separator"></div>
            <a onclick="togglecart(this)" class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum" href="JavaScript:" template="cart" ng-class="{'focus': (activeTemplate === 'cart' &amp;&amp; isSidebarOpen), 'toolbar-cartbtn-shownum': foodCount.count}" ubt-click="390">购物车<!-- ngIf: foodCount.count --><i class="toolbar-cartnum ng-binding ng-scope" ng-if="foodCount.count" ng-bind="foodCount.count">1</i><!-- end ngIf: foodCount.count --></a>
            <div class="toolbar-separator"></div>
            <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:" template="message" ng-class="{'focus': (activeTemplate === 'message' &amp;&amp; isSidebarOpen), 'toolbar-open': user, 'modal-hide': user}" tooltip="我的信息" tooltip-placement="left" ubt-click="392"><!-- ngIf: messageCount.count --></a>
        </div>
        <div class="toolbar-tabs-bottom">
            <div class="toolbar-btn icon-QR-code">
                <div class="dropbox toolbar-tabs-dropbox">
                    <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank">
                        <img src="//faas.elemecdn.com/desktop/media/img/appqc.95e532.png" alt="下载手机应用">
                        <p>下载手机应用</p>
                        <p class="icon-QR-code-bonus">即可参加分享红包活动</p>
                    </a>
                </div>
            </div>
            <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部" href="JavaScript:" tooltip-placement="left" style="visibility: hidden;"></a>
        </div>
    </div>
    <div class="sidebar-content"><!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+ activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' -->



        <div ng-include="activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+ activeTemplate + '/sidebar-'+ activeTemplate + '.html') : ''" class="ng-scope">
            <div ng-controller="sidebarCartCtrl" class="ng-scope">
                <div class="sidebarcart-caption">
                    <a ng-href="/shop/156021886" ng-bind="cart.restaurant_info.name || '购物车'" ubt-click="394" class="ng-binding" href="/shop/156021886">购物车</a>
                    <span class="icon-angle-double-right" ng-click="toggleSidebar()"></span>
                </div><!-- ngIf: loading --><!-- ngIf: pieces -->



                @if(!empty($shopcart[$default_cart]))
                <div ng-if="pieces" class="sidebarcart ng-scope"><!-- ngRepeat: basket in cart --><!-- ngIf: basket.length -->
                    <dl ng-if="basket.length" ng-repeat="basket in cart" class="ng-scope">
                        <dt>
                            <span ng-bind="$index + 1 + '号购物车'" class="ng-binding">1号购物车</span> <!-- ngIf: basket.length -->
                            <a ng-if="basket.length" ng-click="clearGroup($index, $event)" href="JavaScript:" class="sidebarcart-clear ng-scope">[清空]</a><!-- end ngIf: basket.length -->
                        </dt><!-- ngRepeat: item in basket -->
                        <dd ng-repeat="item in basket" class="ng-scope">
                            <ul>
                                @foreach($shopcart[$default_cart]['shopcart'] as $k=>$item)
                                <li class="clearfix">
                                    <div class="sidebarcart-name ng-binding" ng-bind="item.name" title="{{ $item['food']->title }}">{{ $item['food']->title }}</div>
                                    <div class="sidebarcart-quantity">
                                        <span onclick="addShopcart(this,-1)" foodid="{{ $k }}" ng-click="update(item, item.quantity - 1, $parent.$index, $event)">-</span>
                                        <input ng-model="item.quantity" ng-change="update(item, item.quantity, $parent.$index)" class="ng-pristine ng-valid">
                                        <span onclick="addShopcart(this, 1)" foodid="{{ $k }}" ng-click="update(item, item.quantity + 1, $parent.$index)">+</span>
                                    </div>
                                    <div class="sidebarcart-price ng-binding" ng-bind="item.price * item.quantity">{{ $item['food']->price * $item['num'] }}</div>
                                </li>
                                @endforeach
                            </ul>
                        </dd><!-- end ngRepeat: item in basket -->
                    </dl><!-- end ngIf: basket.length --><!-- end ngRepeat: basket in cart --><!-- ngIf: cart.extra -->
                </div><!-- end ngIf: pieces -->
                <div class="sidebarcart-summary" ng-show="pieces">
                    <p>共 <span class="color-stress ng-binding" ng-bind="pieces">1</span> 份，总计 <span class="color-stress ng-binding" ng-bind="total">18</span></p>
                    <button ng-click="settle()" class="sidebarcart-submit ng-binding" ng-class="{ 'sidebarcart-hasagio': submitButton.disabled }" ng-bind="submitButton.text" ubt-click="391">去结算</button>
                </div><!-- ngIf: !loading && !pieces -->
                @else
                @endif




            </div>
        </div>





    </div>
</div>
