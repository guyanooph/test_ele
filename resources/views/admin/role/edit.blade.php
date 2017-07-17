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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 修改角色信息</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/role')}}/{{ $list->id }}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
                  <input type="hidden" name="_method" value="put">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">角色名称：</label>
                      <div class="col-sm-4">
                        <input type="text" name="role" value="{{ $list->role }}" class="form-control" id="inputEmail3" placeholder="角色名称">
                      </div>
                    </div>
                   
                <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">当前状态：</label>
                     <div class="col-sm-6">
                        <label class="radio-inline">
                          <input type="radio" name="status" id="inlineRadio1" @if($list->status==1) checked @endif value="1"> 启用
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="status" id="inlineRadio2" @if($list->status==0) checked @endif value="0"> 禁用
                        </label>
                    </div>
         
                  </div><!-- /.box-body -->
                  <div class="box-footer">
            <div class="col-sm-offset-2 col-sm-1">
            <button type="submit" class="btn btn-primary">确认修改</button>
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