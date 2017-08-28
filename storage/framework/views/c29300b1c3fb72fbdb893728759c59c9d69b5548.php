    <?php $__env->startSection('content'); ?>
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
               <form action="<?php echo e(url('admin/user')); ?>" method="post" class="form-horizontal"  enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                   <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">类型:</label>
                       <div class="col-sm-4">
                           <select style="width:100px;"  id="role" name="role">
                               <option>账号类型</option>
                               <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <option  style="width:150px;" value="<?php echo e($role->id); ?>"><?php echo e($role->name); ?></option>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           </select>
                       </div>
                   </div>

                   <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">地方选择:</label>
                       <div class="col-sm-4">
                          <div id="fid" class="form-inline">
                           <script type="text/javascript">
                              function loadDistrict(upid){
                                  $.ajax({
                                      url:"<?php echo e(URL('/admin/district')); ?>/"+upid,
                                      type:"get",
                                      dataType:"json",
                                      async:true,
                                      success:function(data){
                                          //alert(data);
                                          if(data.length<1){
                                              return;
                                          }
                                          var select = "<select name=\"cityid\">";
                                          select += "<option>-地方管理员请选择-</option>";
                                          for(var i=0;i<data.length;i++){
                                              select += "<option value='"+data[i].id+"'>";
                                              select += data[i].name;
                                              select += "</option>";
                                          }
                                          select +="</select>";
                                          //添加
                                          //$("#fid").append(select);
                                          $(select).change(function(){
                                              $(this).nextAll("select").remove();
                                              var id = $(this).find("option:selected").val();
                                              loadDistrict(id);
                                          }).appendTo("#fid");
                                      },
                                      error:function(data){
                                          alert("error");
                                      },
                                  });
                              }

                              loadDistrict(0);

                        </script>
                        </div>  
                       </div>
                   </div>

                   <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">账号：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="姓名">
                      </div>
                    </div>
                   
				      	<div class="form-group"  enctype="multipart/form-data">
                      <label for="inputPassword3" class="col-sm-2 control-label">密码：</label>
                      <div class="col-sm-4">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="密码" name="password">
                      </div>
                    </div>
                <div class="form-group"  enctype="multipart/form-data">
                      <label for="inputPassword3" class="col-sm-2 control-label">重复密码：</label>
                      <div class="col-sm-4">
                        <input type="password" name="password2" class="form-control" id="inputPassword3" placeholder="密码" name="password">
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
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>