@extends("home.index")
 @section("content")
 <div class="profile-panel" role="main"><!-- ngIf: pageTitleVisible -->
	<h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope"><span ng-bind="pageTitle" class="ng-binding">地址管理</span> <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted"></span></h3>
	<!-- end ngIf: pageTitleVisible -->
	<div class="profile-panelcontent" ng-transclude="">
		<div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入地址..." ng-show="addressLoading"><!-- ngIf: type==='profile' -->
			<img ng-if="type==='profile'" src="//faas.elemecdn.com/desktop/media/img/profile-loading.4984fa.gif" alt="正在加载" class="ng-scope"><!-- end ngIf: type==='profile' --> <!-- ngIf: type==='normal' -->正在载入地址...
		</div>
		<div class="desktop-addresslist clearfix ng-scope" ng-hide="addressLoading"><!-- ngRepeat: address in userAddresses -->
		
			@foreach( $address as $item )
			<div aid="{{ $item->id }}" class="desktop-addressblock ng-scope" ng-repeat="address in userAddresses">
				<div class="desktop-addressblock-buttons">
					<button onclick="editAddress(this)" class="desktop-addressblock-button" ng-click="editAddress(address)">修改</button> 
					<button onclick="delAddress(this)" class="desktop-addressblock-button" ng-click="showMask = true">删除</button>
				</div>
				<div id="{{$item->id}}_name_sex" class="desktop-addressblock-name ng-binding">{{ $item->name }} <span class="ng-binding">{{ ["","先生","女士"][$item->sex] }}</span></div>
				<div id="{{$item->id}}_address_details" class="desktop-addressblock-address ng-binding" ng-bind="address.address + ' ' + address.address_detail">{{ $item->address }}</div>
				<div id="{{$item->id}}_address_phone" class="desktop-addressblock-mobile ng-binding" ng-bind="address.phone">{{ $item->phone }}</div>
				<div class="desktop-addressblock-mask ng-hide" ng-show="showMask"></div><!-- ngIf: !address.st_geohash || !address.address -->
				<div class="desktop-addressblock-removebuttons ng-hide" ng-show="showMask">
					<p>确定删除收货地址?</p>
					<button onclick="doDel(this)" class="confirmdelete" ng-click="removeAddress(address)">确定</button> 
					<button onclick="cancel(this)" class="canceldelete" ng-click="showMask = false">取消</button>
				</div>
			</div><!-- end ngRepeat: address in userAddresses --><!-- end ngRepeat: address in userAddresses -->
			@endforeach
			
			<button onclick="addAddress(this)" class="desktop-addressblock desktop-addressblock-addblock" ng-click="addAddress()"><i class="icon-plus"></i>添加新地址</button>
		</div>
	</div>
</div>

<script>

    var mytime = null;

	function editAddress(ob){
		$.ajax({
			url:"/personal/address/edit/" + $(ob).parent().parent().attr("aid"),
			data:"get",
			datatype:"json",
			success:function(data){
				data = $.parseJSON(data);
				
				var str = "<div id=\"background\" style=\"position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0.5; background: rgb(0, 0, 0); z-index: 1008;\"></div><div id=\"edit_page\" class=\"addressdialog\" style=\"z-index: 1009; left: 245px; top: 0px;\"><div onclick=\"cancel()\" class=\"addressdialog-close\"></div><div id=\"edit_address\" addressid=\""+data.id+"\" class=\"addressdialog-header\">编辑地址</div><div class=\"addressdialog-content\"><div class=\"addressform\"><div><div class=\"addressformfield\"><label>姓名</label><input id=\"name\" placeholder=\"请输入您的姓名\" value=\"" + data.name + "\"><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield sexfield\"><label>性别</label><div id=\"sex\"><input id=\"sexfield-1-male\" name=\"sex\" type=\"radio\" value=\"1\" "+["","checked",""][data.sex]+"><label for=\"sexfield-1-male\">先生</label><input id=\"sexfield-1-female\" type=\"radio\" name=\"sex\" value=\"2\" "+["","","checked"][data.sex]+"><label for=\"sexfield-1-female\">女士</label></div><div class=\"addressformfield-hint\"><span></span></div></div><div id=\"address\" lati_long=\"" + data.longitude+","+data.latitude + "\" address=\"" + data.address + "\" class=\"addressformfield addressfield\"><label>位置</label><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAgCAYAAAAIXrg4AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NEY1MDlBODBGODkyMTFFNEIzMTNFRUIwMEQ2M0U5MzMiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NEY1MDlBODFGODkyMTFFNEIzMTNFRUIwMEQ2M0U5MzMiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0RjUwOUE3RUY4OTIxMUU0QjMxM0VFQjAwRDYzRTkzMyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0RjUwOUE3RkY4OTIxMUU0QjMxM0VFQjAwRDYzRTkzMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiMwn/YAAAMuSURBVHjanJZ9aM1RGMd/9+easItZXuY1YkUtpFCkVuKPyfKauzZKFCtmrIg/5G1NWltJVqaQl7iul6jRTfxhm5fyXgvDsibk5U5uUXOv77O+vzpOv3Pv796nPvf87vmd8zzn95znPOfxRSIRK4mMAqvAfDAD5IE4+AzegjvgAmg3KfAZDEwC+6i8j5VcxGAY7ADv9Ze2y4R14BkIgr8gBEpoNBv0AxPYJ4p7wErwApTqyvza/13gIJ+vgG2gw2URHeQ8DdeA5eA0GAFq3b6ghMrlkyvBMoNyXcT/K0AV/x/m1/9nQDazgc9bQb2VvtTSAz5wFIxVDewFAbrliDYxC2wC90AU/AQtYDPfqVJDHTn8kt4oGo62kwMmgw/KhNHgBphuWLUEQxHoUvpk5a8YDPk2d15WcllT3hdco/J2RoqsbDB9/hpMA01U5ogs9iK9E5SfBXwR1la3AcwE78AscElxkYydDdpAAdiozb3OttCmEpGH2iAnpneCHy7uiXJTLZf4f8y2QPYgobikRxkUAwPolqhhDwaCX+A36K9mCIZ7r59i7BxkUJLIIGSz2Xbb3CyRiS4RYil75CaFbF9q/VPYvhEDt/hniTbonBLbOS7Kh4BDfD6rvXN0NdsMKZH12sE5Dp4w1zxg6giQYh62qYykBi2BOpsesqnkLnN9UBn4BywGT3kAwwxR4SrdIG5cxE12RJLeeM5rdlJFnZJN1Qz7kfFeAe4zIGJ8ruD56NSiZzefq9ULR160Ulk5OGZlJmvBSfCcN2DcVkKxku1+kJuB8oCzat4jcf0+aGXk5CrRkY7UM+1LTrttujLF8ldemwvTUF7EOd1gS7I7+QtdJXtywqOrhoJGPldpqdv10j/DS2MMOEVjxqqEykfy3mj0UlU4h66Ln749iQH52qXgE+dYXg18B2UsW6QQmOMyZh7TiETeGhZjng1YrNr2MH1I9TZMeZfHPknxB4CxPLRTbGA1r8RxvNGySIghGWHBYBR/CgMJ5qdHrE/ruKi5vKed6i9jAxZju5gHsVzpk5T8LdVk2+NBalNWK6xmX0rxp3Fam1hsSYly0+ukfwIMANgIvXWVNn37AAAAAElFTkSuQmCC\"><input id=\"position_search\" placeholder=\"请输入小区、大厦或学校\" value=\"" + data.address + "\" onclick=\"run()\" ><div class=\"address-suggestlist\"><ul></ul></div><div class=\"addressformfield-hint\"><span></span></div><div class=\"addressform-tip\" style=\"display: none;\"><p><span>没找到你的地址？</span><a style=\"display: none;\">去地图看看吧！</a></p><p>请尝试只输入小区、大厦或学校看看。</p><div class=\"arrow\"></div></div></div><div address_details=\"" + data.address_details + "\" class=\"addressformfield\"><label>详细地址</label><input id=\"address_details\" placeholder=\"单元、门牌号\" value=\"" + data.address_details + " \"><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield phonefield\"><label>手机号</label><input id=\"phone\" placeholder=\"请输入您的手机号\" value=\"" + data.phone + "\"><button>添加更多电话</button><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield phonebkfield\" style=\"display: none;\"><label></label><input placeholder=\"固话、手机短号\"><button>删除</button><div class=\"addressformfield-hint\"><span></span></div></div></div><div class=\"addressform-buttons\"><button onclick=\"dosubmit()\" >保存</button><button onclick=\"cancel()\" >取消</button></div></div></div></div>";
				$("body").append(str);
			},
			error:function(){
				alert("error");
			}
		});
		
	};
	
	
	
	function run(){
	$(function () {
        var key_1 = "";
        var key_2 = "";
        if(mytime==null){
        mytime = setInterval(function(){
            key_2 = $("#position_search").val();
            if(key_2 === key_1){
               // 
            }else if(key_2 === ""){
                $("div.address-suggestlist").attr("style","display:none");
            }else if(key_2 !== ""){
                //alert($("#current_address").attr("city"));
				//var url = "http://restapi.amap.com/v3/place/text?key=b24b6f5004d3b68d10bf4a0364db7a4f&keywords=" + key_2 + "&city=" + $("#current_address").attr("city");
                $.ajax({
                    url:"http://restapi.amap.com/v3/place/text?key=b24b6f5004d3b68d10bf4a0364db7a4f&keywords=" + key_2 + "&city=" + $("#current_address").attr("city"),
                    dataType:"json",
                    success:function(data){
                        $("div.address-suggestlist ul").remove();
                        var str = "<ul>";
						var n=0;
                        for(var i=0;i<data.pois.length;i++){
                            str += "<li onclick=\"select(this)\" lati_long=\"" + data.pois[i].location + "\"><div class=\"name\">"+ data.pois[i].name +"</div><div class=\"address\">"+ data.pois[i].address +"</div></li>";
                        }
                        str += "</ul>";
                        $("div.address-suggestlist").append(str);
						$("div.address-suggestlist").attr("style","display:block");
                    },
                });
                key_1 = key_2;
            }
        }, 33);
        }
        
    });
	}
	
	function select(ob) {
		$(ob).parent().parent().parent().attr("lati_long",$(ob).attr("lati_long"));
		$(ob).parent().parent().parent().attr("address",$(ob).children(".address").html());
        $("#position_search").val($(ob).children(".name").html());
        $("div.address-suggestlist").attr("style","display:none");
        clearInterval(mytime);
        mytime = null;
    }
   
    function cancel(){
        $("#background").remove();
        $("#edit_page").remove();
       
    }
 
    function dosubmit(){
        var name = $("#name").val();
        var sex = $("#sex input[name='sex']:checked").val();
        var address = $("#address").attr("address");
        var lati_long = $("#address").attr("lati_long");
        var phone = $("#phone").val();
        var address_details = $("#address_details").val();
        var url = "/personal/updateaddress/" + $("#edit_address").attr("addressid");
        var params = {name:name,sex:sex,address:address,address_details:address_details,phone:phone,lati_long:lati_long};
        var address_form = document.createElement("form");
        document.body.appendChild(address_form);
        address_form.action = url;
        address_form.method = "POST";
        address_form.display = "none";
        for(var i in params){
            var input = document.createElement("input");
            input.value = params[i];
            input.type = "text";
            input.name = i;
            address_form.appendChild(input);
        }
        var crsf = document.createElement("input");
        crsf.name = "_token";
        crsf.value = "{{ csrf_token() }}";
        crsf.type = "hidden";
        address_form.appendChild(crsf);
        $.ajax({
            url:url,
            type:"POST",
            data:$(address_form).serialize(),
            datatype:"json",
            success:function(data){
                if(data!=0){
                    var id = $("#edit_address").attr("addressid");
                    var name_sex = "#" + id + "_name_sex";
                    var address_detailss = "#" +  id + "_address_details";
                    var address_phone = "#" +  id + "_address_phone";
                    $(name_sex).html( name + "<span class=\"ng-binding\">"+ ['','先生','女士'][sex] +"</span>")
                    $(address_detailss).html(address+" "+address_details);
                    $(address_phone).html(phone);
                    $("#background").remove();
                    $("#edit_page").remove();
                }else{
                    alert("修改失败");
                }
            },
            error:function(){
                alert("error");
            }
        });
    }

    function delAddress(ob){
        var id = $(ob).parent().parent().attr("aid");
        var url = "/personal/deladdress/" + id;
        $.ajax({
            url:url,
            type:"get",
            datatype:"json",
            success:function(data){
                alert("删除成功");                
                
            },
            error:function(){
                alert("删除失败");
            }
        });
    }

    function addAddress(ob){
        var str = "<div id=\"background\" style=\"position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; opacity: 0.5; background: rgb(0, 0, 0); z-index: 1008;\"></div><div id=\"edit_page\" class=\"addressdialog\" style=\"z-index: 1009; left: 245px; top: 0px;\"><div onclick=\"cancel()\" class=\"addressdialog-close\"></div><div id=\"edit_address\" addressid=\"\" class=\"addressdialog-header\">添加新地址</div><div class=\"addressdialog-content\"><div class=\"addressform\"><div><div class=\"addressformfield\"><label>姓名</label><input id=\"name\" placeholder=\"请输入您的姓名\" value=\"\"><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield sexfield\"><label>性别</label><div id=\"sex\"><input id=\"sexfield-1-male\" name=\"sex\" type=\"radio\" checked value=\"1\"><label for=\"sexfield-1-male\">先生</label><input id=\"sexfield-1-female\" type=\"radio\" name=\"sex\" value=\"2\"><label for=\"sexfield-1-female\">女士</label></div><div class=\"addressformfield-hint\"><span></span></div></div><div id=\"address\" lati_long=\"\" address=\"\" class=\"addressformfield addressfield\"><label>位置</label><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAgCAYAAAAIXrg4AAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDIxIDc5LjE1NTc3MiwgMjAxNC8wMS8xMy0xOTo0NDowMCAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTQgKE1hY2ludG9zaCkiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NEY1MDlBODBGODkyMTFFNEIzMTNFRUIwMEQ2M0U5MzMiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NEY1MDlBODFGODkyMTFFNEIzMTNFRUIwMEQ2M0U5MzMiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDo0RjUwOUE3RUY4OTIxMUU0QjMxM0VFQjAwRDYzRTkzMyIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDo0RjUwOUE3RkY4OTIxMUU0QjMxM0VFQjAwRDYzRTkzMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PiMwn/YAAAMuSURBVHjanJZ9aM1RGMd/9+easItZXuY1YkUtpFCkVuKPyfKauzZKFCtmrIg/5G1NWltJVqaQl7iul6jRTfxhm5fyXgvDsibk5U5uUXOv77O+vzpOv3Pv796nPvf87vmd8zzn95znPOfxRSIRK4mMAqvAfDAD5IE4+AzegjvgAmg3KfAZDEwC+6i8j5VcxGAY7ADv9Ze2y4R14BkIgr8gBEpoNBv0AxPYJ4p7wErwApTqyvza/13gIJ+vgG2gw2URHeQ8DdeA5eA0GAFq3b6ghMrlkyvBMoNyXcT/K0AV/x/m1/9nQDazgc9bQb2VvtTSAz5wFIxVDewFAbrliDYxC2wC90AU/AQtYDPfqVJDHTn8kt4oGo62kwMmgw/KhNHgBphuWLUEQxHoUvpk5a8YDPk2d15WcllT3hdco/J2RoqsbDB9/hpMA01U5ogs9iK9E5SfBXwR1la3AcwE78AscElxkYydDdpAAdiozb3OttCmEpGH2iAnpneCHy7uiXJTLZf4f8y2QPYgobikRxkUAwPolqhhDwaCX+A36K9mCIZ7r59i7BxkUJLIIGSz2Xbb3CyRiS4RYil75CaFbF9q/VPYvhEDt/hniTbonBLbOS7Kh4BDfD6rvXN0NdsMKZH12sE5Dp4w1zxg6giQYh62qYykBi2BOpsesqnkLnN9UBn4BywGT3kAwwxR4SrdIG5cxE12RJLeeM5rdlJFnZJN1Qz7kfFeAe4zIGJ8ruD56NSiZzefq9ULR160Ulk5OGZlJmvBSfCcN2DcVkKxku1+kJuB8oCzat4jcf0+aGXk5CrRkY7UM+1LTrttujLF8ldemwvTUF7EOd1gS7I7+QtdJXtywqOrhoJGPldpqdv10j/DS2MMOEVjxqqEykfy3mj0UlU4h66Ln749iQH52qXgE+dYXg18B2UsW6QQmOMyZh7TiETeGhZjng1YrNr2MH1I9TZMeZfHPknxB4CxPLRTbGA1r8RxvNGySIghGWHBYBR/CgMJ5qdHrE/ruKi5vKed6i9jAxZju5gHsVzpk5T8LdVk2+NBalNWK6xmX0rxp3Fam1hsSYly0+ukfwIMANgIvXWVNn37AAAAAElFTkSuQmCC\"><input id=\"position_search\" placeholder=\"请输入小区、大厦或学校\" value=\"\" onclick=\"run()\" ><div class=\"address-suggestlist\"><ul></ul></div><div class=\"addressformfield-hint\"><span></span></div><div class=\"addressform-tip\" style=\"display: none;\"><p><span>没找到你的地址？</span><a style=\"display: none;\">去地图看看吧！</a></p><p>请尝试只输入小区、大厦或学校看看。</p><div class=\"arrow\"></div></div></div><div address_details=\"\" class=\"addressformfield\"><label>详细地址</label><input id=\"address_details\" placeholder=\"单元、门牌号\" value=\"\"><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield phonefield\"><label>手机号</label><input id=\"phone\" placeholder=\"请输入您的手机号\" value=\"\"><button>添加更多电话</button><div class=\"addressformfield-hint\"><span></span></div></div><div class=\"addressformfield phonebkfield\" style=\"display: none;\"><label></label><input placeholder=\"固话、手机短号\"><button>删除</button><div class=\"addressformfield-hint\"><span></span></div></div></div><div class=\"addressform-buttons\"><button onclick=\"doAddAddress()\" >保存</button><button onclick=\"cancel()\" >取消</button></div></div></div></div>";
        $("body").append(str);
    }

    function doAddAddress(){
        var name = $("#name").val();
        var sex = $("#sex input[name='sex']:checked").val();
        var address = $("#address").attr("address");
        var lati_long = $("#address").attr("lati_long");
        var phone = $("#phone").val();
        var address_details = $("#address_details").val();
        var url = "/personal/addaddress";
        var params = {name:name,sex:sex,address:address,address_details:address_details,phone:phone,lati_long:lati_long};
        alert(params);
        var address_form = document.createElement("form");
        document.body.appendChild(address_form);
        address_form.action = url;
        address_form.method = "POST";
        address_form.display = "none";
        for(var i in params){
            var input = document.createElement("input");
            input.value = params[i];
            input.type = "text";
            input.name = i;
            address_form.appendChild(input);
        }
        var crsf = document.createElement("input");
        crsf.name = "_token";
        crsf.value = "{{ csrf_token() }}";
        crsf.type = "hidden";
        address_form.appendChild(crsf);
        $.ajax({
            url:url,
            type:"POST",
            data:$(address_form).serialize(),
            datatype:"json",
            success:function(data){
                if(data!=0){
                    alert("成功");
                    
                    $("#background").remove();
                    $("#edit_page").remove();
                }else{
                    alert("修改失败");
                }
            },
            error:function(){
                alert("error");
            }
        });
       
    }
</script>

 @endsection 
