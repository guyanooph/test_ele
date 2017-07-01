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
                  <h3 class="box-title"><i class="fa fa-th"></i> 操作订单信息管理</h3>
                  <button class="btn btn-primary" onclick="window.location='{{URL('merchant/order/')}}'">添加订单信息</button
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:20px">id号</th>
                      <th>订单号</th>
                      <th>用户id</th>
                      <th>商家id</th>
                      <th>商家名称</th>
                      <th>商家电话</th>
                      <th>商品数量</th>
					  <th>订单创建时间</th>
					  <th>送（收）货地址</th>
					  <th>金额</th>
					  <th>订单状态</th>
					  <th>订单描述</th>
					  <th>订单结束时间</th>
					  <th>配送费</th>
					  <th>餐盒费</th>
					  <th>送达时间</th>
					  <th>使用红包id</th>
					  <th>支付方式</th>
					  <th>配送方式</th>
					  <th>发票信息</th>
					  <th>备注</th>
                      <th style="width: 80px">操作</th>
                    </tr>
                    @foreach($table as $order)
                        <tr>
                            <td>{{ $order->id }}</td> 
                            <td>{{ $order->orderid }}</td>
                            <td>{{ $order->userid }}</td>
                            <td>{{ $order->shopid }}</td>
                            <td>{{ $order->goods_num }}</td>
							<td>{{ $order->create_time }}</td>
							<td>{{ $order->addressid }}</td>
							<td>{{ $order->amount }}</td>
							<td>{{ $order->status }}</td>
							<td>{{ $order->order_description }}</td>
							<td>{{ $order->over_times }}</td>
							<td>{{ $order->delivery_fee }}</td>
							<td>{{ $order->lunch_box_fee }}</td>
							<td>{{ $order->service_time }}</td>
							<td>{{ $order->packet_id }}</td>
							<td>{{ $order->pay }}</td>
							<td>{{ $order->distribution }}</td>
							<td>{{ $order->invoice_info }}</td>
							<td>{{ $order->remark }}</td>
                            <td>
                               <button class="btn btn-xs btn-primary" onclick="window.location='{{URL('/merchant/order')}}/{{ $order->id }}/edit'">编辑</button> </td>
                               <button class="btn btn-xs btn-danger" onclick="doDel({{ $order->id }})">删除</button>
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
    <form action="{{URL('merchant/order/')}}" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
    </form>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/merchant/order')}}/"+id;
                    form.submit(); 
                }
              });
        }
    </script>
    @endsection