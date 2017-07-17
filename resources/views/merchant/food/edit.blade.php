@extends('merchant.base')


@section('content')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <i class="fa fa-calendar"></i>
			商家菜单种类管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">浏览种类</a></li>
            <li class="active">编辑信息</li>
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
                  <h3 class="box-title"><i class="fa fa-plus"></i>编辑菜单种类</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" action="{{URL('merchant/food/update')}}/{{ $type->id }}" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <input type="hidden" name="_method" value="put">
                  <input type="hidden" name="picname" value="{{$type->picname}}">
                  <div class="box-body">
				  <div class="form-group">
					  <label for="inputEmail3" class="col-sm-2 control-label">菜类别：</label>
					  <div class="col-sm-4">
						<select name="typeid">
							<option value="$this->shu">{{$type->typeid}}</option>
							@foreach($info as $v)
								<option value="{{$v->id}}">{{$v->title}}</option>
							@endforeach
						</select>
					  </div>
					</div>
					</div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">菜名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="title" class="form-control" value="{{ $type->title }}">
                      </div>
                    </div>
				  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">图片：</label>
                      <div class="col-sm-4" style="flont:left;">
                        <input type="file" onchange="preview(this)" class="form-control" name="picnew" value=""> 
                      </div> <div id="preview" class="col-sm-3 control-label" ><img src='http://osltbib18.bkt.clouddn.com/wang/image_{{$type->picname}}'/></div>
                    </div>
                  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">介绍：</label>
                      <div class="col-sm-4">
                        <input type="text" name="descr" class="form-control" value="{{ $type->descr }}">
                      </div>
                    </div>
				  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">价格：</label>
                      <div class="col-sm-4">
                        <input type="number" name="price" class="form-control" value="{{ $type->price }}">
                      </div>
                    </div>
				  </div>
				  <div class="box-body">
                    <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
                      <div class="col-sm-4">
                        <input type="radio" name="stutas" {{ ($type['stutas'] == 1)? "checked": "" }} value="1">在售  &nbsp; &nbsp; 
                        <input type="radio" name="stutas" {{ ($type['stutas'] == 2)? "checked": "" }} value="2">售完   &nbsp;&nbsp;
						<input type="radio" name="stutas" {{ ($type['stutas'] == 3)? "checked": "" }} value="3">下架
                      </div>
                    </div>
				  </div>
				  <!-- /.box-body -->
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">保存</button>
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
  