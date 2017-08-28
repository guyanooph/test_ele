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
                  <h3 class="box-title"><i class="fa fa-plus"></i> 系统管理员添加活动</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form action="{{url('admin/act')}}" method="post" class="form-horizontal"  enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <div class="form-group">
                       <label for="inputEmail3" class="col-sm-2 control-label">活动所属地:</label>
                       <div class="col-sm-4">
                          <div id="fid" class="form-inline">
                           <script type="text/javascript">
                              function loadDistrict(upid){
                                  $.ajax({
                                      url:"{{URL('/admin/district')}}/"+upid,
                                      type:"get",
                                      dataType:"json",
                                      async:true,
                                      success:function(data){
                                          //alert(data);
                                          if(data.length<1){
                                              return;
                                          }
                                          var select = "<select name=\"cityid\">";
                                          select += "<option>-活动所属地-</option>";
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
                      <label for="inputEmail3" class="col-sm-2 control-label">活动名称：</label>
                      <div class="col-sm-4">
                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="活动名称">
                      </div>
                    </div>
                   

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动图片：</label>
                      <div class="col-sm-4">
                        <input type="file" name="picname" class="form-control" id="inputEmail3" placeholder="活动图片">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">宣传视频：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="3" placeholder="请输入宣传视频地址" name="viedo"></textarea>
                      </div>
                    </div>

                     <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动介绍：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入200字以内的活动介绍" name="introduce"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动规则：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入活动规则" name="rule"></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">奖品设置：</label>
                      <div class="col-sm-4">
                        <textarea cols="30" rows="5" placeholder="请输入活动规则" name="prize"></textarea>
                      </div>
                    </div>
 
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动开始时间：</label>
                      <div class="col-sm-4">
                      <div class="am-input-group date form_datetime-2">
                        <input size="16" type="text" name="start_time" value="2015-02-14 14:45" class="am-form-field" placeholder="开始时间">
                        <span class="am-input-group-label add-on"><i class="icon-th am-icon-calendar"></i></span>
                      </div>
                  <script>
                    $(function() {
                      $('.form_datetime-2').datetimepicker({
                          format: 'yyyy-mm-dd hh:ii',
                          autoclose: true,
                          todayBtn: true,
                          pickerPosition: 'bottom-left'
                      });
                    })
                  </script>
                </div>
                </div>


              <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">活动结束时间：</label>
                      <div class="col-sm-4">
                        <div class="am-input-group date form_datetime-2">
                        <input size="16" name="end_time" type="text" value="2015-02-14 14:45" class="am-form-field" placeholder="结束时间">
                          <span class="am-input-group-label add-on"><i class="icon-th am-icon-calendar"></i></span>
                        </div>

                        <script>
                          $(function() {
                            $('.form_datetime-2').datetimepicker({
                                format: 'yyyy-mm-dd hh:ii',
                                autoclose: true,
                                todayBtn: true,
                                pickerPosition: 'bottom-left'
                            });
                          })
                        </script>
                      </div>
              </div>
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