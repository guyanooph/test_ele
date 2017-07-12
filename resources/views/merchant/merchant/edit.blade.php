@extends('merchant.base')


@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			营业信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">营业信息管理</a></li>
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
					<h3 class="box-title"><i class="fa fa-plus"></i> 修改商家信息页面</h3>
			    </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ URL('/merchant/merchant/update') }}/{{ $merchant->shopid }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">

                  <div class="box-body">  
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家名称：</label>
                      <div class="col-sm-4">
                        <input type="text" name="shopname" class="form-control" id="inputEmail3" readonly value="{{ $merchant->shopname }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">服务评价：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" readonly name="rate" value="{{ $merchant->rate }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片：</label>
                      <div class="col-sm-4" style="flont:left;">
                        <input type="file" onchange="preview(this)" class="form-control" name="logo" value=""> 
                      </div> <div id="preview" class="col-sm-3 control-label" ><img src=''/></div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">地址：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3"  name="address" value="{{ $merchant->address }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">商家电话：</label>
						<div class="col-sm-4">
                         <input type="text" class="form-control" id="inputPassword3"  name="phone" value="{{ $merchant->phone }}">
                      </div>
                    </div>

					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家介绍：</label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" id="inputPassword3"  name="desc" value="{{ $merchant->desc }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家承诺：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" name="commit" value="{{ $merchant->commit }}">
                      </div>
                    </div>
       
                  </div><!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
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
  