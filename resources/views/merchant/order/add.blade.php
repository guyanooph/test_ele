@extends('merchant.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				<i class="fa fa-calendar"></i>
				订单信息管理
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
				<li><a href="#">信息管理</a></li>
				<li class="active">添加信息</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<!-- right column -->
				<div class="col-md-12">
				<!-- Horizontal Form -->
				<div class="box box-primary">
					<div class="box-header with-border">
					<h3 class="box-title"><i class="fa fa-plus"></i> 添加操作订单信息页面</h3>
					</div><!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" action="{{URL('merchant/order')}}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单号：</label>
								<div class="col-sm-4">
									<input type="text" name="orderid" class="form-control" placeholder="订单号">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">用户id：</label>
								<div class="col-sm-4">
									<input type="text" name="userid" class="form-control" placeholder="用户id">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">商家id：</label>
								<div class="col-sm-4">
									<input type="text" name="shopid" class="form-control" placeholder="商家id">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">商家名称：</label>
								<div class="col-sm-4">
									<input type="name" name="shop_name" class="form-control" placeholder="商家名称">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">商家电话：</label>
								<div class="col-sm-4">
									<input type="number" name="shop_phone" class="form-control" placeholder="商家电话">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">商品数量：</label>
								<div class="col-sm-4">
									<input type="text" name="goods_num" class="form-control" placeholder="商品数量">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单创建时间：</label>
								<div class="col-sm-4">
									<input type="text" name="create_time" class="form-control" placeholder="订单创建时间">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">送（收）货地址：</label>
								<div class="col-sm-4">
									<input type="text" name="addressid" class="form-control" placeholder="送货地址">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">金额：</label>
								<div class="col-sm-4">
									<input type="text" name="amount" class="form-control" placeholder="金额">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">当前状态：</label>
								<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio1" value="0"> 已发货
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" value="1"> 正在配送
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" value="1"> 未配送
								</label>
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单描述：</label>
								<div class="col-sm-4">
									<input type="text" name="order_description" class="form-control" placeholder="订单描述">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单结束时间：</label>
								<div class="col-sm-4">
									<input type="text" name="over_time" class="form-control" placeholder="订单结束时间">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">配送费：</label>
								<div class="col-sm-4">
									<input type="text" name="delivery_fee" class="form-control" placeholder="配送费">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">餐盒费：</label>
								<div class="col-sm-4">
									<input type="text" name="lunch_box_fee" class="form-control" placeholder="餐盒费">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">送达时间：</label>
								<div class="col-sm-4">
									<input type="text" name="service_time" class="form-control" placeholder="送达时间">
								</div>
							</div>
					        <div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">使用红包id：</label>
								<div class="col-sm-4">
									<input type="text" name="packet_id" class="form-control" placeholder="使用红包id">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">支付方式：</label>
								<div class="col-sm-4">
									<input type="text" name="pay" class="form-control" placeholder="支付方式">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">配送方式：</label>
								<div class="col-sm-4">
									<input type="text" name="distribution" class="form-control" placeholder="配送方式">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">发票信息：</label>
								<div class="col-sm-4">
									<input type="text" name="invoice_info" class="form-control" placeholder="发票信息">
								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">备注：</label>
								<div class="col-sm-4">
									<input type="text" name="remark" class="form-control" placeholder="备注">
								</div>
							</div>	
						</div><!-- /.box-body -->
						<div class="box-footer">
							<div class="col-sm-offset-2 col-sm-1">
								<button type="submit" class="btn btn-primary">添加</button>
							</div>
							<div class="col-sm-1">
								<button type="reset" class="btn btn-primary">重置</button>
							</div>
						</div><!-- /.box-footer -->
					</form>
				<div class="row"><div class="col-sm-12">&nbsp;</div></div>
				<div class="row"><div class="col-sm-12">
                <br/>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                </div></div>
				</div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
        
    @endsection