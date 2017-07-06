    <?php $__env->startSection('content'); ?>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            信息输出表
            <small>preview of simple tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">类别信息</a></li>
            <li class="active">列表</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><i class="fa fa-th"></i> 类别信息管理</h3>
                  <button class="btn btn-primary" onclick="loadAdd()">添加类别信息</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width:60px">id号</th>
                      <th>菜类名称</th>
                      <th>父类ID</th>
                      <th>路径</th>
                      <th style="width: 100px">操作</th>
                    </tr>
                    <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->id); ?></td>
                      <td><?php echo e($v->title); ?></td>
                      <td><?php echo e($v->pid); ?></td>
                      <td><?php echo e($v->path); ?></td>
<<<<<<< HEAD
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/foodtype/edit')); ?>/<?php echo e($v->id); ?>'">编辑</button> <button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> </td>
=======
<<<<<<< HEAD
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/foodtype/edit')); ?>/<?php echo e($v->id); ?>'">编辑</button> <button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> </td>
=======
<<<<<<< HEAD
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/foodtype')); ?>/<?php echo e($v->id); ?>/edit'">编辑</button> <button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> </td>
=======
                      <td><button class="btn btn-xs btn-primary" onclick="window.location='<?php echo e(URL('/merchant/foodtype/edit')); ?>/<?php echo e($v->id); ?>'">编辑</button> <button onclick="doDel(<?php echo e($v->id); ?>)" class="btn btn-xs btn-danger">删除</button> </td>
>>>>>>> 7b11977032ff4e070b7021d221aea79c05833193
>>>>>>> 5010fc82fee2d6f1543703b56517af92d70c0bd9
>>>>>>> 66676d8a4698d36036499d225ff7ac8f94215ff4
                      
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                   
                  </table>
                </div><!-- /.box-body -->
                
              </div><!-- /.box -->

              
              
            </div><!-- /.col -->
            
          </div><!-- /.row -->
         
        </section><!-- /.content -->
        <form action="" style="display:none;" id="mydeleteform" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="_method" value="DELETE">
        </form>
    <?php $__env->stopSection(); ?>
    
    
    <?php $__env->startSection("myscript"); ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="exampleModalLabel">New message</h4>
          </div>
          <div class="modal-body">
           
			<!-- 添加商品类别 -->

					
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            <button type="button" onclick="saveType()" class="btn btn-primary">保存</button>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function doDel(id){
            Modal.confirm({msg:'是否删除此类别？'}).on(function (e){
                if(e){
                    var form = document.getElementById("mydeleteform");
<<<<<<< HEAD
                    form.action = "<?php echo e(URL('/merchant/foodtype/destroy')); ?>/"+id;
=======
<<<<<<< HEAD
                    form.action = "<?php echo e(URL('/merchant/foodtype/destroy')); ?>/"+id;
=======
<<<<<<< HEAD
                    form.action = "<?php echo e(URL('/merchant/foodtype')); ?>/"+id;
=======
                    form.action = "<?php echo e(URL('/merchant/foodtype/destroy')); ?>/"+id;
>>>>>>> 7b11977032ff4e070b7021d221aea79c05833193
>>>>>>> 5010fc82fee2d6f1543703b56517af92d70c0bd9
>>>>>>> 66676d8a4698d36036499d225ff7ac8f94215ff4
                    form.submit(); 
                }
            });
        }
        
        //加载添加表单
        function loadAdd(){
            $("#exampleModalLabel").html("添加商品类别");
            $("#exampleModal").modal("show");
            
            $.ajax({
                url:"<?php echo e(URL('merchant/foodtype/create')); ?>",
                type:"get",
                dataType:"html",
                async:true,
                success:function(data){
                  $("#exampleModal .modal-body").html(data);   
                },
             });
            
        }
        
        //保存类别信息
        function saveType(){
            $("#myaddform").submit();
            /*
            $.ajax({
                url:"<?php echo e(url('merchant/foodtype')); ?>",
                type:"post",
                dataType:"html",
                data:$("#myaddform").serialize() ,
                async:true,
                success:function(data){
                    $('#exampleModal').modal('hide');
                    Modal.alert({msg:data,title: ' 信息提示',btnok: '确定',btncl:'取消'});
                    $("div.content-wrapper").html(data);
                },
             });
            */
        }
            
    </script>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('merchant.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>