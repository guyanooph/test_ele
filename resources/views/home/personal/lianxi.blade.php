 @extends("home.index")
  @section("content")


<a href="" class="about-item-hd">
<i class="icon-user"></i>关于我们<i class="arrow icon-uniE02D" ng-class="{true: 'icon-uniE02C', false: 'icon-uniE02D'}[tab === 'about']"></i></a>

<div class="about-item-bd">
<br/><h2>联系我们</h2>
<dl><dt class="contact-tel">全国统一客服服务热线：</dt>
<dd><strong>10105757</strong></dd>
<br/><dt>客户服务：</dt><dd>
<a href="mailto:tousu@ele.me">tousu@ele.me</a></dd>
<br/><dt>商业合作：</dt>
<dd><a href="mailto:marketing_coop@ele.me">marketing_coop@ele.me</a></dd>
<br/><dt>加入我们：</dt><dd><a href="mailto:hr@ele.me">hr@ele.me</a></dd>
<br/><dt>友情链接：</dt><dd><a href="mailto:feedback@ele.me">feedback@ele.me</a></dd>
<br/><dt>媒体合作：</dt><dd><a href="mailto:pr@ele.me">pr@ele.me</a></dd></dl>
<dl><dt>地址：</dt><dd>上海市普陀区金沙江路1518弄近铁城市广场401室</dd><dt>公司：</dt><dd>上海拉扎斯信息科技有限公司</dd><dt>电话：</dt><dd>(021) 8024-1717</dd></dl><dl class="follows">
<dt>关注我们：</dt><dd><a class="weibo" href="http://e.weibo.com/elemeorder" target="_blank">
<img src="http://static10.elemecdn.com/images/forward/follow_weibo.png"></a><a class="renren" href="http://page.renren.com/elemeorder" target="_blank"><img src="http://static10.elemecdn.com/images/forward/follow_renren.png"></a></dd>
<dt>微信号：</dt><dd>饿了么网上订餐(elemeorder)</dd></dl>
</div>

    @endsection 