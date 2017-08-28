    <?php $__env->startSection('content'); ?>
           <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>序号</th>
                      <th>活动名称</th>
                      <th>活动状态</th>
                      <th>浏览总数</th>
                       <th>投票总数</th>
                      <th>作品数量</th>
                      <th>宣传图片</th>
                      <th>宣传视频</th>
                      <th>活动规则</th>
                    </tr>
                    <tr>
                      <td><?php echo e($act_details->id); ?></td>
                      <td><?php echo e($act_details->name); ?></td>
                      <td><?php if($act_details->status == 1): ?>活动未开始<?php elseif($act_details->status==2): ?>活动中<?php else: ?>活动已结束<?php endif; ?></td>
                      <td>浏览总数</td>
                      <td>投票总数</td>
                      <td>作品数量</td>
                      <td><img src="http://oslsovx4q.bkt.clouddn.com/upload/image<?php echo e($act_details->picname); ?>" width="50px" height="50px"></td>
                      <td><iframe src="<?php echo e($act_details->viedo); ?>" style="border: 0;width: 160px;height: 90px;"></iframe></td>
                      <td><?php echo e($act_details->rule); ?></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
                <h3><strong>活动数据</strong></h3>
                <table class="table table-bordered">
                  <tr>
                      <th>序号</th>
                      <th>作品名称</th>
                      <th>作品类型</th>
                      <th>作者姓名</th>
                      <th>手机号码</th>
                      <th>作品状态</th>
                      <th>得票数</th>
                      <th>上传时间</th>
                    </tr>
                    <?php $__currentLoopData = $works; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($v->id); ?></td>
                      <td><?php echo e($v->name); ?></td>
                      <td><?php if($v->type ==1): ?>视频<?php elseif($v->type==2): ?>图片<?php else: ?>作文<?php endif; ?></td>
                      <td><?php echo e($v->author); ?></td>
                      <td><?php echo e($v->iphone); ?></td>
                      <td><?php if($v->status==1): ?>未审核<?php else: ?>已通过<?php endif; ?></td>
                      <td><?php echo e($v->tickets); ?></td>
                      <td><?php echo e($v->create_time); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
<?php $__env->stopSection(); ?>    
<?php echo $__env->make('admin.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>