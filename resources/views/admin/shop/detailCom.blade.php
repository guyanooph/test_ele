@extends('admin.base')
@section('content')

    <ul class="list-group">
        <li><h1>商家注册信息</h1> </li>

        <li class="list-group-item">商家表信息id: {{$list->id}}</li>
        <li class="list-group-item">店面账户: {{$list->mername}}</li>
        <li class="list-group-item">商铺名称: {{$list->shoptitle}}</li>
        <li class="list-group-item">店面照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image{{ $list->picname}}"></li>
        <li class="list-group-item">logo照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image{{ $list->logoname}}"></li>
        <li class="list-group-item">店面分类: {{$list->typeid}}</li>
        <li class="list-group-item">商铺所有者姓名: {{$list->username}}</li>
        <li class="list-group-item">身份证: {{$list->identity}}</li>
        <li class="list-group-item">电话: {{$list->phone}}</li>
        <li class="list-group-item">城市: {{$list->city}}</li>
        <li class="list-group-item">经纬度: {{$list->longitude_latitude}}</li>
        <li class="list-group-item">详细地址: {{$list->address}}</li>
        <li class="list-group-item">状态:待审核</li>
        <li class="list-group-item">注册时间: {{$list->register_time}}</li>
        <li class="list-group-item">注册时的ip: {{$list->first_ip}}</li>
        <li><h1>商家店铺信息</h1> </li>
        <li class="list-group-item">商家名字: {{$merchant->shopname}}</li>
        <li class="list-group-item">logo照片: <img src="http://oslsovx4q.bkt.clouddn.com/upload/image{{ $merchant->logo}}"></li>
        <li class="list-group-item">服务评分: {{$merchant->rate}}</li>
        <li class="list-group-item">商家地址: {{$merchant->address}}</li>
        <li class="list-group-item">电话: {{$merchant->phone}}</li>
        <li class="list-group-item">商家介绍公告: {{$merchant->desc}}</li>
        <li class="list-group-item">平均配送时间:{{$merchant->service_time}}</li>
        <li class="list-group-item">配送费: </li>
        <li class="list-group-item">服务: </li>
        <li class="list-group-item">月销量: </li>
        <li class="list-group-item">营业时间: </li>
        <li class="list-group-item">起送价: </li>
        <li class="list-group-item">配送方式: </li>
        <li class="list-group-item">状态: </li>
        <li class="list-group-item">总销量: </li>

        <li class="list-group-item"><button onclick="window.location='{{URL('admin/shop/checkCom')}}/{{$list->id}}/{{4}}'"class="btn btn-ms btn-primary">商家有违规行为，封号</button>


    </ul>
@endsection