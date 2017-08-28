@extends('admin.base')
    @section('content')
           <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>序号</th>
                      <th>活动名称</th>
                      <th>活动状态</th>
                      <th>浏览总数</th>
                       <th>投票总数</th>
                      <th>作品数量</th>
                      <th>宣传图片</th>
                      <th>宣传视频</th>
                      <th>活动规则</th>
                    </tr>
                    <tr>
                      <td>{{$act_details->id}}</td>
                      <td>{{$act_details->name}}</td>
                      <td>@if($act_details->status == 1)活动未开始@elseif($act_details->status==2)活动中@else活动已结束@endif</td>
                      <td>浏览总数</td>
                      <td>投票总数</td>
                      <td>作品数量</td>
                      <td><img src="http://oslsovx4q.bkt.clouddn.com/upload/image{{$act_details->picname}}" width="50px" height="50px"></td>
                      <td><iframe src="{{ $act_details->viedo}}" style="border: 0;width: 160px;height: 90px;"></iframe></td>
                      <td>{{ $act_details->rule}}</td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
                <h3><strong>活动数据</strong></h3>
                <table class="table table-bordered">
                  <tr>
                      <th>序号</th>
                      <th>作品名称</th>
                      <th>作品类型</th>
                      <th>作者姓名</th>
                      <th>手机号码</th>
                      <th>作品状态</th>
                      <th>得票数</th>
                      <th>上传时间</th>
                    </tr>
                    @foreach($works as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->name}}</td>
                      <td>@if($v->type ==1)视频@elseif($v->type==2)图片@else作文@endif</td>
                      <td>{{$v->author}}</td>
                      <td>{{$v->iphone}}</td>
                      <td>@if($v->status==1)未审核@else已通过@endif</td>
                      <td>{{$v->tickets}}</td>
                      <td>{{ $v->create_time}}</td>
                    </tr>
                    @endforeach
                </table>
@endsection    