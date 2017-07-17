@extends('admin.base')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            商家操作
            <small>preview of simple tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> 首页</a></li>
            <li><a href="#">待审核信息</a></li>
            <li class="active">列表</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="fa fa-th"></i> 审核已通过商家管理</h3>&nbsp;&nbsp;
                        <div class="box-tools">
                            <form action="{{url('admin/stu')}}" method="get">
                                <div class="input-group" style="width: 150px;">
                                    <input type="text" name="name" class="form-control input-sm pull-right" placeholder="管理员账号"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width:60px">商家ID</th>
                                <th>商家账户</th>
                                <th>商家店铺名称</th>
                                <th>商铺所有者姓名</th>
                                <th>店面分类</th>
                                <th>所在城市</th>
                                <th>注册时间</th>
                                <th style="width: 100px">操作</th>
                            </tr>
                            @foreach($list as $v)
                                <tr>
                                    <td>{{$v->id}}</td>
                                    <td>{{$v->mername}}</td>
                                    <td>{{$v->shoptitle}}</td>
                                    <td>{{$v->username}}</td>
                                    <td>{{$v->typeid}}</td>
                                    <td>{{$v->city}}</td>
                                    <td>{{$v->register_time}}</td>
                                    <td><button onclick='window.location="{{url('admin/shop/detailCom')}}/{{$v->id}}"' class="btn btn-xs btn-danger">详情</button></td>
                                </tr>
                            @endforeach
                        </table>
                    </div><!-- /.box-body -->
                    <div class="box-footer clearfix">
                        {{ $list->links() }}
                    </div>
                </div><!-- /.box -->



            </div><!-- /.col -->

        </div><!-- /.row -->

    </section><!-- /.content -->

@endsection