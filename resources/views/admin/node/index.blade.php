@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            
           权限管理
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">节点信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i>节点管理</h3>

               					<!--弹框添加-->
					
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					 添加
					</button>

					<!-- Modal -->
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">添加节点</h4>
					      </div>
					      <div class="modal-body">
					        <!--表单添加-->
					         <form action="{{URL('admin/node')}}" id="form" method="post" class="form-horizontal" onsubmit="doCreate()">
			                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
			                  <div class="box-body">
			                    <div class="form-group">
			                      <label for="inputEmail3" class="col-sm-2 control-label">节点名称：</label>
			                      <div class="col-sm-4">
			                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="节点名称">
			                      </div>
			                    </div>
			                    <div class="form-group">
			                      <label for="inputEmail3" class="col-sm-2 control-label">请求方式：</label>
			                      <div class="col-sm-4">
			                        <input type="text" name="method" class="form-control" id="inputEmail3" placeholder="请求方式">
			                      </div>
			                    </div>
			                    <div class="form-group">
			                      <label for="inputEmail3" class="col-sm-2 control-label">请求地址</label>
			                      <div class="col-sm-4">
			                        <input type="text" name="url" class="form-control" id="inputEmail3" placeholder="请求地址">
			                      </div>
			                    </div>
			                   
							   
			               <div class="form-group">
			                      <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
			                     <div class="col-sm-4">
			                        <label class="radio-inline">
			                          <input type="radio" name="state" id="inlineRadio1" value="1"> 启用
			                        </label>
			                        <label class="radio-inline">
			                          <input type="radio" name="state" id="inlineRadio2" value="0"> 禁用
			                        </label>
			                    </div>
							 
			                  </div>
			               
			               
					     
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					        <button type="submit" class="btn btn-primary" >保存</button>
					      </div>
						 </form>

					    </div>
					  </div>
					</div>
                </div><!-- /.box-header -->

           
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>节点名称</th>
                      <th>请求方式</th>
                      <th>请求地址</th>
                      <th>状态</th>
                      <th>添加时间</th>
                      <th>最后修改时间</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->name }}</td>
                            <td>{{ $vo->method }}</td>
                            <td>{{ $vo->url }}</td>
                            <td>{{ $vo->state }}</td>
                            <td>{{ $vo->created_at}}</td>
                            <td>{{ $vo->updated_at}}</td>
                            <td><button class="btn btn-xs btn-danger" onclick="doDel({{ $vo->id }})">删除</button>                                      
                            <button type="button" onclick="doEdit('{{$vo->id}}')" class="btn  btn-xs btn-primary"> 修改 </button>
                            <!-- <button type="button" class="btn btn-xs btn-danger" onclick="window.location='{{url('admin/node/edit')}}/{{$vo->id}}'">修改</button>-->
                             </td>
                        </tr>
                    @endforeach

                    
                  </table>
                  <script type="text/javascript">
                    
                        </script>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  {!! $list->render() !!}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
    <form action="/node/" method="post" name="myform" style="display:none;">
            <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
            <input type="hidden" name="_method" value="delete"/>
           
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
    <script type="text/javascript">
      //节点删除

        function doDel(id){
            Modal.confirm({msg: "是否删除信息？"}).on(function(e){
                if(e){
                   var form = document.myform;
                    form.action = "{{URL('/admin/node')}}/"+id;
                    form.submit(); 
                }
              });
        }

       //ajax加载修改表单
     function doEdit(id){
      $("#exampleModalLabel").html("节点修改");
      $("#exampleModal").modal("show");
        $.ajax({
            url:"{{url('admin/node/edit')}}/"+id,
            type:'get',
            dataType:"html",
            async:true,
            success:function(data){
           
              $("#exampleModal .modal-body").html(data);

            },
        });
      }
     
       
      //ajax执行节点保存
      function saveNode(){
         $.ajax({
              url:"{{URL("admin/node")}}/"+id,
              type:"post",
              data:$("#saveform").serialize(),
              async:true,
              success:function(data){
                $("#exampleModal").modal('hide');
                Modal.alert({msg:data,title:'信息提示',btnok:'确定',btncl:"取消"});
              },
          });
      }           
    </script>
    @endsection