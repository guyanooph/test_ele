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
					<!-- /.box-header -->
					<!-- form start -->
					<form class="form-horizontal" action="{{URL('merchant/order/update')}}/{{ $order->id }}" method="post">
						<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
						<div class="box-body">
							<div class="form-group">
								<label for="inputEmail3" class="col-sm-2 control-label">订单号</label>
								<div class="col-sm-4">
									<input type="text" name="id" readonly class="form-control" placeholder="订单号" value="{{ $order->id }}">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">当前状态</label>
								<div class="col-sm-4">
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio1" {{ $order->status }} value="1"> 未发货
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" {{ $order->status }} value="2"> 正在配送
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" {{ $order->status }} value="3"> 已收货
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" id="inlineRadio2" {{ $order->status }} value="4"> 已评论
								</label>

								</div>
							</div>
							<div class="form-group">
								<label for="inputEmail3" readonly class="col-sm-2 control-label">备注</label>
								<div class="col-sm-4">
									<input type="text" name="remark" class="form-control" placeholder="备注" value="{{ $order->remark }}">
								</div>
							</div>	
						</div><!-- /.box-body -->
						<div class="box-footer">
							<div class="col-sm-offset-2 col-sm-1">
								<button type="submit" class="btn btn-primary">添加</button>
							</div>
							<div class="col-sm-1">
								<button type="submit" class="btn btn-primary">重置</button>
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