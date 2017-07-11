<div class="container">
    <div class="row">
        <div class="col-sm-8 col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading font-size" >购物车<span style="color: #ff0099;">列表</span></div>
                <div class="panel-body ul-list">
                    <table class="table table-striped">
                        <tr>
                            <th>#</th>
                            <th>标题</th>
                            <th>数量</th>
                            <th>价格</th>
                            <th>操作</th>
                        </tr>
                        @if($cart_items == '')
                            <tr>
                                <td>没有商品！</td>
                            </tr>
                        @else
                        @foreach($cart_items as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v['product']->title}}</td>
                            <td>
                                <input type="text" size="2" name="count" value="{{$v->count}}" onchange="cart(this,{{$v->product_id}})"/>
                            </td>
                            <td>10</td>
                            <td>
                                <a href="javascript:void(0);" onclick="delcart({{$v->product_id}})">删除</a>
                            </td>
                        </tr>
                            @endforeach
                            @endif
                    </table>
                </div>
            </div>
        </div>
    <script>
    // 异步添加购物车
    function cart(obj,aid){
        var count = $(obj).val();
        if(aid ==""){return false;}
        $.ajax({
            type:"POST",
            url:'{{url('add_cart')}}',
            dataType: 'json',
            data:{aid:aid,count:count,_token:"{{csrf_token()}}"},
            success:function(msg){
                alert(msg);
            }
        });
    }
    // 异步删除购物车商品
    function delcart(id){
        if(id != ''){
            if(!confirm('您确认要删除吗?')){return false;}
            $.ajax({
                type:"POST",
                url : '{{url('delcart')}}',
                dataType: 'json',
                data:{id:id,_token:"{{csrf_token()}}"},
                success:function(msg){
                    if(msg.status == 1){
                        alert(msg.msg);
                        window.location.reload();
                    }else{
                        alert(msg.msg);
                    }
                }
            });
        }
    }

</script>