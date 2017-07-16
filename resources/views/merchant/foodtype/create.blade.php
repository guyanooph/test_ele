
    <!-- form start -->
    <form action="{{url('merchant/foodtype/store')}}" method="post" id="myaddform" class="form-horizontal">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
      <input type="hidden" name="shopid" value="{{session('merchantname')->shopid}}">
      <div class="box-body">
        
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">类别名称：</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="类别名称" name="title">
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>
			