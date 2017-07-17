@extends('merchant.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">菜单信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 菜单信息管理</h3>
                  <div class="box-tools">
                    <form action="{{url('merchant/food')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="title" class="form-control input-sm pull-right" placeholder="菜名"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
				   <table class="table table-bordered">
                    <tr>
                      <th>id号</th>
                      <th>菜品类别</th>
                      <th>菜名</th>
                      <th>菜图片</th>
                      <th>菜介绍</th>
                      <th>菜价格</th>
                      <th>月销量</th>
                      <th>菜评分</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->typename}}</td>
                      <td>{{$v->title}}</td>
                      <td><img style="width:50px;height:50px;" src='http://osltbib18.bkt.clouddn.com/wang/image_{{$v->picname}}'/></td>
                      <td>{{$v->descr}}</td>
                      <td>{{$v->price}}</td>
                      <td>{{$v->num}}</td>
                      <td>{{$v->foodrate}}</td>
                      <td>@if($v->stutas == 1)在售 @elseif ($v->stutas == 2)售完 @elseif ($v->stutas == 3)下架 @endif</td>
                      <td>{{$v->create_time}}</td>
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/merchant/food/edit')}}/{{ $v->id }}'">编辑</button> <button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button> </td>
                      
                    </tr>
                    @endforeach
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 {!! $list->appends($params)->render() !!}
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    @endsection
    
    
    @section("myscript")
      <script type="text/javascript">
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","{{url('merchant/food/destroy')}}/"+id).submit(); 
                }
            }
      </script>
    @endsection