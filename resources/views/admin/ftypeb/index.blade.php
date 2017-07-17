@extends('admin.base')


@section('content')
<!-- Content Header (Page header) -->
    <section class="content-header">
          <h1>
            管理员信息
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">管理信息</a></li>
           
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border" id="aa">
                  <h3 class="box-title"><i class="fa fa-th"></i> 商家分类信息管理</h3>
                
					
           			<script type="text/javascript">
           				function doCreate(){
           					$.ajax({
           						url:"{{ URL('admin/ftype')}}",
           						type:'get',
           						data:$("#form").serialize(),
           						async:true,
           						dataType:"json",
           						success:function(data){
           							alert(data);
           						},

           					});

           					return false;
           				}
           			</script>

                <div class="box-body">
                  <table class="table table-bordered" id="ajax">
                    <tr>
                      <th >id号</th>
                      <th>分类名称</th>
                        <th>父类id</th>
                        <th>父类名称</th>
                      <th>添加时间</th>

                      <th>操作</th>
                    </tr>
                    @foreach($list as $vo)
                        <tr>
                            <td>{{ $vo->id }}</td>
                            <td>{{ $vo->title }}</td>
                            <td>{{ $vo->mid }}</td>
                            <td>{{ $vo->status }}</td>
                            <td>{{$vo->created_at }}</td>
                            
                            <td><button class="btn btn-xs btn-danger" data-target="#myModal" onclick="doDel({{ $vo->id }})">删除</button> 
                            
                              
                     {{--<button class="btn btn-xs btn-primary" data-toggle="modal"  onclick="doEdit()">编辑</button>--}}
                     <script type="text/javascript">
                        function doEdit(mid){
                         // alert(mid);
                                      $.ajax({
                                        url:'{{URL('admin/ftypeb/doEdit')}}',
                                        type:'get',
                                        dataType:'text',
                                        async:true,
                                        success:function(data){
                                           //alert(data);
                                        },
                                      });
                        }
                     </script>
                             
          <!--弹框添加-->
          <!-- Modal -->
          <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="myModalLabel">编辑子分类</h4>
                </div>
                <div class="modal-body">
                  <!--表单添加-->
                   <form action="" id="editform" method="post" class="form-horizontal" onsubmit="doCreate()">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="box-body">
                           <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">父类名：</label>
                          <div class="col-sm-4">
                            <input type="text" name="title" value="" readonly class="form-control" id="inputEmail3" placeholder="商家父类名">
                          </div>
                        </div>
                         
                           <div class="box-body">
                           <div class="form-group">
                          <label for="inputEmail3" class="col-sm-2 control-label">子类名：</label>
                          <div class="col-sm-4">
                            <input type="text" name="title" value="{{ $vo->title }}" readonly class="form-control" id="inputEmail3" placeholder="商家子分类名">
                          </div>
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





                      </td>
                      </tr>
                     
                    @endforeach
                    
                  </table>
					


                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                 {{ $list->links()}}
                </div>
              </div><!-- /.box -->

            </div><!-- /.col --> 
          </div><!-- /.row -->
        </section><!-- /.content -->
        
    @endsection
    
    @section('myscript')
   <form action="" style="display:none;" method="post" id="qmyform">
      <input type="hidden" name="_token" value="{{ csrf_token()}} ">
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
          刚刚
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveNode()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>


    <script type="text/javascript">
    //删除操作

            //删除操作
            function doDel(id){
                if(confirm('确定要删除吗？')){

                    $("#qmyform").attr("action","{{URL('admin/ftypeb/destroy')}}/"+id).submit(); 
                }
            }
        






  /*   function doDel(id){
     	if(window.confirm("确定要删除吗？")){
     		//alert("删除成功");
     		$.ajax({
     			url:"admin/ftype/destroy",
     			type:"post",
     			data:"id="+id,
     			dataType:"json",
     			success:function(data){
     				alert("D");
     			}
     		});
     	}else{
     		alert("删除失败");
     	}
     }
      
*/
</script>
    @endsection