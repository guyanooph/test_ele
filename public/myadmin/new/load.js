


function load(url){
	$.ajax({
			url:url,
			type:get,
			dabaType:"html",
			 headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content');
			    }
			success:function(data){
				alert(data);
			},

	});
}