
    <!-- form start -->
    <form action="{{url('merchant/foodtype/store')}}" method="post" id="myaddform" class="form-horizontal">
      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
	  @foreach($list as $v)
      <input type="hidden" name="shopid" value="{{$v->shopid}}">
	  @endforeach
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">父类别名：</label>
          <div class="col-sm-4">
            <select name="pid">
                <option value="0">根类别</option>
					@foreach($list as $v)
                    <option value="{{$v->id}}">{{$v->title}}</option>
					@endforeach
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">类别名称：</label>
          <div class="col-sm-4">
            <input type="text" class="form-control" id="inputPassword3" placeholder="类别名称" name="title">
          </div>
        </div>
      </div><!-- /.box-body -->
    </form>
			