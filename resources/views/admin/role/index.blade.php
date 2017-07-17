@extends('admin.base')
    @section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">角色信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 角色管理</h3>&nbsp;&nbsp; 
                  <button class="btn btn-sm btn-primary" onclick="window.location='{{ URL('admin/role/create') }}'">添加</button>
                  <div class="box-tools">
                    <form action="{{url('admin/stu')}}" method="get">
                    <div class="input-group" style="width: 150px;">
                      <input type="text" name="name" class="form-control input-sm pull-right" placeholder="角色"/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                    </form>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>ID</th>
                      <th>角色名称</th>
                      <th>状态</th>
                      
                      <th>登录时间</th>
                      <th>修改时间</th>
                      <th>添加时间</th>
                      <th>操作</th>
                    </tr>
                    @foreach($list as $v)
                    <tr>
                      <td>{{$v->id}}</td>
                      <td>{{$v->role}}</td>
                      <td>@if($v->status==1) 启用 @else 禁用 @endif</td>
                     
                      <td>  </td>
                      <td>{{$v->updated_at}}</td>

                      <td>{{$v->created_at}}</td>
                      <td><button onclick="doDel({{$v->id}})" class="btn btn-xs btn-danger">删除</button> 
                      <button onclick="window.location='{{URL('admin/role/edit')}}/{{$v->id}}'" class="btn btn-xs btn-primary">编辑</button>
                      <!-- <button class="btn btn-xs btn-success" onclick="window.location='{{URL('admin/role/loadNode')}}/{{$v->id}}'">分配节点</button>-->
                       <button class="btn btn-xs btn-success" onclick="loadNode('{{$v->id}}','{{$v->role}}')">分配节点</button>
                      </td>
                    
                    </tr>
                    @endforeach
                  
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 {{ $list->links() }}
                </div>
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           <!-- 此处填充 -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
          <button type="button" onclick="saveNode()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    @endsection
    
    
    @section("myscript")

      <script type="text/javascript">
      //删除操作
            function doDel(id){
                if(confirm('确定要删除吗？')){
                    $("#mydeleteform").attr("action","/admin/role/destroy/"+id).submit(); 
                }
            }
      //加载节点
      function loadNode(rid,name){
        $("#exampleModalLabel").html(name+"的操作节点管理");
        $("#exampleModal").modal("show");
        $.ajax({
            url:"{{URL('admin/role/loadNode')}}/"+rid,
            type:"get",
            dataType:"html",
            async:true,
            success:function(data){
              $('#exampleModal .modal-body').html(data);
            },
        });
      }

      //保存节点信息
      function saveNode(){
          //alert('ok');
          $.ajax({
          url:"{{URL('admin/role/saveNode')}}",
          type:"post",
          dataType:"text",
          data:$("#nodelistform").serialize(),
          async:true,
          success:function(data){
            $('#exampleModal').modal('hide');
            Modal.alert({msg:data,titel:'信息提示',btnok:'确定',btncl:'取消'});
           //alert(data);
          },
        error:function(){
              return "error";
        }
        });
      }

      </script>
    @endsection