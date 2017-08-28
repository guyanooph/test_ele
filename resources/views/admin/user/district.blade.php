<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>jQuery实例</title>
    <style>
        select{margin:5px;}
    </style>
    <script type="text/javascript" src="{{asset('myadmin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
</head>
<body>
<h2>jQuery实例--城市级联信息加载</h2>
<h4><a href="{{url('/admin')}}">返回首页</a></h4>
<form id="fid" class="form-inline">

</form>
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
                var select = "<select class=\"form-control\">";
                select += "<option>-请选择-</option>";
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
</body>
</html>
