  <h4 class="modal-title" id="myModalLabel">修改节点</h4>
                                      </div>
                                      <div class="modal-body">
                                        <!--表单添加-->
                                         <form action="" id="saveform" method="post" class="form-horizontal" onsubmit="doCreate()">
                                              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                              <input type="hidden" name="_method" value="put">
                                              <div class="box-body">
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">节点名称：</label>
                                                  <div class="col-sm-4">
                                                    <input type="text" name="name" class="form-control" value="{{$vo->name}}" id="inputEmail3" placeholder="节点名称">
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">请求方式：</label>
                                                  <div class="col-sm-4">
                                                    <input type="text" name="method" value="{{$vo->method}}" class="form-control" id="inputEmail3" placeholder="请求方式">
                                                  </div>
                                                </div>
                                                <div class="form-group">
                                                  <label for="inputEmail3" class="col-sm-2 control-label">请求地址</label>
                                                  <div class="col-sm-4">
                                                    <input type="text" name="url" value="{{$vo->url}}" class="form-control" id="inputEmail3" placeholder="请求地址">
                                                  </div>
                                                </div>
                                               
                                       
                                           <div class="form-group">
                                                  <label for="inputPassword3" class="col-sm-2 control-label">状态：</label>
                                                 <div class="col-sm-4">
                                                    <label class="radio-inline">
                                                      <input type="radio" name="state" id="inlineRadio1" @if($vo->state==1) checked @endif value="1"> 启用
                                                    </label>
                                                    <label class="radio-inline">
                                                      <input type="radio" name="state" id="inlineRadio2" @if($vo->state==0) checked @endif value="0"> 禁用
                                                    </label>
                                                </div>
                                     
                                              </div>
                                           
                                           
                                     
                                      </div>
                                   
                                   </form>