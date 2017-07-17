@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-plus"></i> 添加管理员信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form action="{{url('admin/user')}}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">姓名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="姓名">
                      </div>
                    </div>
                   
				      	<div class="form-group"  enctype="multipart/form-data">
                      <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
                      <div class="col-sm-4">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
                      </div>
                    </div>
				            <div class="form-group"  enctype="multipart/form-data">
                      <label for="inputPassword3" class="col-sm-2 control-label">手机号：</label>
                      <div class="col-sm-4">
                        <input type="phone" class="form-control" id="inputPassword3" placeholder="手机号" name="phone">
                      </div>
                    </div>
                 <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">头像：</label>
                      <div class="col-sm-4">
                        <input type="file" class="form-control" name="picname">
                      </div>
                    </div>

                  </div>
                   <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">角色：</label>
                       <div class="col-sm-4">
                           <select style="width:100px;"  id="role" name="role">
                               <option>角色</option>
                               @foreach($roles as $role)
                                   <option  style="width:150px;" value="{{$role->id}}">{{$role->role}}</option>
                               @endforeach
                           </select>
                       </div>
                   </div>
                   <!-- /.box-body -->
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