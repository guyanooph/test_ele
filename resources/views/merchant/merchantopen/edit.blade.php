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
					<h3 class="box-title"><i class="fa fa-plus"></i> 修改营业信息页面</h3>
			    </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{ URL('/merchant/merchantopen/update') }}/{{ $merchantopen->shopid }}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">

                  <div class="box-body">  
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">营业时间：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3" name="opentime" value="{{ $merchantopen->opentime }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">结束时间：</label>
                      <div class="col-sm-4">
                       <input type="text" class="form-control" id="inputPassword3"  name="closetime" value="{{ $merchantopen->closetime }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">起送价：</label>
                      <div class="col-sm-4">
                        <input type="text" class="form-control" id="inputPassword3"  name="givemoney" value="{{ $merchantopen->givemoney }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">配送方式：</label>
                      <div class="col-sm-4">
                        <label class="radio-inline">
                           <input type="radio"  name="method" {{ ($merchantopen->method == 1)?"checked":"" }} value="1">自营快送  &nbsp; &nbsp;
                        </label>
                        <label class="radio-inline">
                           <input type="radio"  name="method" {{ ($merchantopen->method == 2)?"checked":"" }} value="2">蜂鸟快送 
                        </label>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">配送费：</label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" id="inputPassword3"  name="money" value="{{ $merchantopen->money }}">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">餐盒费：</label>
                      <div class="col-sm-4">
                         <input type="text" class="form-control" id="inputPassword3"  name="lunch_box_fee" value="{{ $merchantopen->lunch_box_fee }}">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">当前状态</label>
                      <div class="col-sm-4">
                        <label class="radio-inline">
                           <input type="radio"  name="status" {{ ($merchantopen->status == 1)?"checked":"" }} value="1">营业  &nbsp; &nbsp;
                        </label>
                        <label class="radio-inline">
                           <input type="radio"  name="status" {{ ($merchantopen->status == 2)?"checked":"" }} value="2">歇业 
                        </label>
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
  
