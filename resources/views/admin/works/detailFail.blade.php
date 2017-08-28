

@extends('admin.base')
@section('content')

    <ul class="list-group">
        <li class="list-group-item">序号: {{$list->id}}</li>
        <li class="list-group-item">作品名称: {{$list->name}}</li>
        <li class="list-group-item">作品内容: {{$list->content}}</li>
        <li class="list-group-item">作品类型: @if($list->type==1)图片@elseif($list->type==2)视频@else作文@endif</li>
        <li class="list-group-item">作者姓名: {{$list->author}}</li>
        <li class="list-group-item">手机号码: {{$list->iphone}}</li>
        <li class="list-group-item">上传时间: {{$list->create_time}}</li>
        <li class="list-group-item">所属城市: {{$list->cityid}}</li>
        <li class="list-group-item">所属活动: {{$list->actid}}</li>
        <li class="list-group-item">排名: {{$list->rank}}</li>
        <li class="list-group-item">得票数: {{$list->tickets}}</li>
         <li class="list-group-item">作品状态: {{$list->status}}</li>
        <li class="list-group-item">
            <button onclick="window.location='{{URL('admin/shop/checkCom')}}/{{$list->id}}/{{2}}'" class="btn btn-ms btn-danger">审核未通过作品改为审核通过</button></li>

    </ul>
@endsection