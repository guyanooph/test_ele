				<form action="{{url('admin/ftype/stroeEr')}}" method="post" class="form-horizontal">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" name="id" value="{{$vo}}">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">商家父类名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="role" value="{{$title}}" class="form-control" id="inputEmail3" placeholder="商家父类名">
                      </div>
                    </div>
                   <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">子类名：</label>
                      <div class="col-sm-4">
                        <input type="text" name="role" class="form-control" id="inputEmail3" placeholder="商家子类名">
                      </div>
                    </div>
                  <div class="box-footer">
				    <div class="col-sm-offset-2 col-sm-1">
						<button type="submit" class="btn btn-primary">添加</button>
                    </div>
					<div class="col-sm-1">
						<button type="reset" class="btn btn-primary">重置</button>
					</div>
                  </div><!-- /.box-footer -->
                </form>