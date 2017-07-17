@extends('merchant.base')
@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="/merchant"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
				@if(session('msg'))
				<p style="color:red">{{session('msg')}}</p>
				@else
				@endif	
                  <h3 class="box-title"><i class="fa fa-th"></i> 用户评价浏览</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>ID</th>
                      <th>商家id</th>
                      <th>用户id</th>
                      <th>订单id</th>
					  <th>是否匿名</th>
					  <th>评论内容</th>
					  <th>评星</th>
					  <th>回复内容</th>
					  <th>订单送达时间</th>
					  <th>是否可见</th>
					  <th>评论创建时间</th>
                      <th style="width: 50px">操作</th>
                    </tr>
                    @foreach($eva as $list)
                        <tr> 
						    <td>{{ $list->id }}</td>
						    <td>{{ $list->shopid }}</td>
                            <td>{{ $list->userid }}</td>
                            <td>{{ $list->orderid }}</td>
							<td>{{ $list->anonymous }}</td>
							<td>{{ $list->content }}</td>
							<td>{{ $list->shopg_rate }}</td>
							<td>{{ $list->shop_content }}</td>
							<td>{{ $list->service_time }}</td>
							<td>{{ $list->status }}</td>
							<td>{{ $list->create_time }}</td>
                            <td>
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/merchant/evaluate/edit/')}}/{{ $list->id }}'">编辑</button> 
                            </td>							   
							</tr>
                    @endforeach
                    
                  </table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="{{URL('merchant/order')}}" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('merchant/order/destroy')}}/"+id;
                    form.submit(); 
                }
              });
        }
    </script>
    @endsection