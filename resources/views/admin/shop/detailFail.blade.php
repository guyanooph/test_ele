@extends('admin.base')
@section('content')

    <ul class="list-group">
        <li class="list-group-item">id: {{$list->id}}</li>
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
        <li class="list-group-item">
            <button onclick="window.location='{{URL('admin/shop/checkFail')}}/{{$list->id}}/{{2}}'"class="btn btn-ms btn-primary">信息完整，通过审核</button>
    </ul>
@endsection