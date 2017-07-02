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
            <li><a href="#">营业信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 营业信息管理</h3>
                  <div class="box-tools">
                    <form action="{{url('merchant/merchantopen')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="商家"/>
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
                      <th style="width:60px">Id号</th>
                      <th>商家Id</th>
                      <th>商家名称</th>
                      <th>营业时间</th>
					  <th>结束时间</th>
                      <th>起送价</th>
					  <th>配送方式</th>
					  <th>配送费</th>
					  <th>总销量</th>
					  <th>状态</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach ($list as $merchantopen)
					   <tr>
					       <td>{{ $merchantopen->id }}</td>
						   <td>{{ $merchantopen->shopid }}</td>
						   <td>{{ $merchantopen->name }}</td>
						   <td>{{ $merchantopen->opentime }}</td>
						   <td>{{ $merchantopen->overtime }}</td>
						   <td>{{ $merchantopen->givemoney }}</td>
						   <td>@if ($merchantopen->method=="0")自营快送 @else ($merchantopen->method=="1")蜂鸟快送 @endif</td>
						   <td>{{ $merchantopen->money }}</td>
						   <td>{{ $merchantopen->num }}</td>
						   <td>@if ($merchantopen->state=="0")营业 @else ($merchantopen->state=="1")歇业 @endif</td>
						   <td><button class="btn btn-xs btn-primary" onclick="window.location='{{ URL('/merchant/merchantopen') }}/{{ $merchantopen->id }}/edit'">编辑</button> 
                            <button class="btn btn-xs btn-danger" onclick="javascript:doDel({{ $merchantopen->id }})">删除</button></td>
                       </tr>
                   @endforeach
                  </table>
                </div><!-- /.box-body -->
               
              </div><!-- /.box -->

             
              
            </div><!-- /.col onclick="/merchantopen/{{ $merchantopen->id }}/edit"-->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="{{url('merchant/merchantopen')}}" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    @endsection
    
    
    @section("myscript")
      <script type="text/javascript">
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","{{url('merchant/merchantopen')}}/"+id).submit(); 
                }
            }
      </script>
    @endsection