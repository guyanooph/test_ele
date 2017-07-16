@extends('merchant.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			菜单信息管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">菜单信息管理</a></li>
            <li class="active">添加菜单信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加菜单信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('merchant/food/store')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				  <input type="hidden" name="shopid" value="{{ session('merchantname')->shopid }}">
                  <div class="box-body">
					<div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">菜类别：</label>
					  <div class="col-sm-4">
						<select name="typeid">
								@foreach($list as $v)
								<option value="{{$v->id}}">{{$v->title}}</option>
								@endforeach
						</select>
					  </div>
					</div>
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">菜名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="菜名">
                      </div>
                    </div>
					
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片：</label>
                      <div class="col-sm-4" style="flont:left;">
                        <input type="file" onchange="preview(this)" class="form-control" id="inputPassword3" placeholder="图片" name="picname"> 
                      </div> <div id="preview" class="col-sm-3 control-label" ></div>
                    </div>
					<div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">介绍：</label>
                      <div class="col-sm-4">
                        <input type="text" name="descr" class="form-control" id="inputEmail3" placeholder="介绍">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">价格：</label>
                      <div class="col-sm-4">
                        <input type="number" class="form-control" id="inputPassword3" placeholder="价格" name="price">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
                      <div class="col-sm-4">
                        <input type="radio"  name="stutas" value="1">在售  &nbsp; &nbsp; 
                        <input type="radio"  name="stutas" value="2">售完   &nbsp;&nbsp;
						<input type="radio"  name="stutas" value="3">下架
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
              </div><!-- /.box -->
       
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
    @endsection