@extends('admin.base')
@section('content')

    <ul class="list-group">
        <li class="list-group-item">id: {{$list->id}}</li>
        <li class="list-group-item">店面账户: {{$list->mername}}</li>
        <li class="list-group-item">商铺名称: {{$list->shoptitle}}</li>
        <li class="list-group-item">店面照片: {{$list->picname}}</li>
        <li class="list-group-item">执照照片: {{$list->license}}</li>
        <li class="list-group-item">logo照片: {{$list->logoname}}</li>
        <li class="list-group-item">店面分类: {{$list->typeid}}</li>
        <li class="list-group-item">商铺所有者姓名: {{$list->username}}</li>
        <li class="list-group-item">身份证: {{$list->identity}}</li>
        <li class="list-group-item">电话: {{$list->phone}}</li>
        <li class="list-group-item">城市: {{$list->city}}</li>
        <li class="list-group-item">经纬度: {{$list->longitude_latitude}}</li>
        <li class="list-group-item">详细地址: {{$list->address}}</li>
        <li class="list-group-item">状态: @if($list->state=="1") 待审核 @elseif($list->state=="2") 审核通过 @elseif($list->state=="3") 未通过审核 @endif</li>
        <li class="list-group-item">注册时间: {{$list->register_time}}</li>
        <li class="list-group-item">注册时的ip: {{$list->first_ip}}</li>
        <li class="list-group-item"><button onclick='window.location=""' class="btn btn-ms btn-danger">注册信息不合法，不通过</button> {{$list->first_ip}}</li>
    </ul>
@endsection