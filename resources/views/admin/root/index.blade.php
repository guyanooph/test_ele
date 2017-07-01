@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            欢迎回来，超级管理员
            <small>preview of simple tables</small>
          </h1>
        
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i>我的信息</h3>
                  <div class="box-tools">
                   
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">ID</th>
                      <th>账号</th>
                      <th>密码</th>
                      <th>角色</th>
                      <th>登录时间</th>
                      <th>创建时间时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                  
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->name}}</td>
                      <td>{{$v->password}}</td>
                      <td>{{$v->role}}</td>
                      <td>{{$v->logtime}}</td>
                      <td>{{$v->addtime}}</td>
                     
                    </tr>
              
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
       
    @endsection
    
 