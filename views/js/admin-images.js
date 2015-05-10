$(document).ready(function(){
	$("body").on("click", ".admin-add-image-btn", function() {
		add_new_image($("#sponsor-image").attr("src"));
	});
	$("body").on("click", ".admin-delete-image-btn", function()  {
		delete_image($(this).parent().parent().attr("id"));
	});
});

function add_new_image(image){
	var target = document.getElementById('admin-console');
	var spinner = new Spinner(opts).spin(target);
	
	$.ajax({type:"post",
			url:"db/db-add-image.php",
			data:{"image":image},
			success:function(data){
				console.log(data);
				spinner.stop()
				var id = JSON.parse(data);
				$(".admin-sponsor-image-container").append('<div class="col-lg-3 col-md-4 col-sm-6 admin-sponsor-info" id="' + id.image_id + '">\
															<div class="admin-sponsor-image" >\
																<img class="center-block" src="' + image + '" id="sponsor-image-id-' + id.image_id + '">\
																<div class="admin-upload-image-caption text-center" onclick="document.getElementById(\'image-upload-update-' + id.imageid + '\').click(); return false;"><span class="glyphicon glyphicon-camera" ></span> Upload New Image</div>\
																<input class="btn btn-info hidden" type="file" name="image-upload-update" id="image-upload-update-' + id.image_id +  '" onchange="add_image(false, \'#image-upload-update-' + id.image_id + '\', \'#sponsor-image-id-' + id.image_id +  '\' )" ></input>\
															</div>\
															<div class="col-sm-12 no-padding">\
																<button type="submit" class="pull-right facebook-btn facebook-btn-white admin-delete-image-btn">Delete</button>\
															</div>\
														</div>');
			}
	});
}

function delete_image(id){
	console.log("HER");
	var target = document.getElementById('admin-console');
	var spinner = new Spinner(opts).spin(target);
	console.log("remove" + id)
	$.ajax({type: "post",
			url: "db/db-delete-image.php",
			data: {"image_id": id},
			success: function(data){
				console.log(data);
				spinner.stop();
				$("#" + id).remove();
				display_confirmation("admin-console", "<span class='glyphicon glyphicon-ok'></span> Image Deleted");
			}
	});

}