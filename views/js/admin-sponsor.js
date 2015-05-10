$(document).ready(function(){
	$("body").on("click", ".admin-add-sponsor-btn", function() {
		add_sponsor();
	});
	$("body").on("click", ".admin-save-sponsor-btn", function() {
		update_sponsor($(this).parent().parent().attr("id"), $(this).parent().siblings(".admin-sponsor-image").children("img").attr("src"), $(this).parent().siblings(".admin-sponsor-link").children("input").val());
	});
	$("body").on("click", ".admin-delete-sponsor-btn", function() {
		delete_sponsor($(this).parent().parent().attr("id"));
	});
});

//Adds medical image to database and displays it to Radiologist
function add_image(new_image, id, image_src_id) {
	if (typeof imageNumber == "undefined") {
		imageNumber = 1;
	}
	
    var file    = $(id)[0].files[0];
	
	//Check if file is image
	var re = /(?:\.([^.]+))?$/;	
	var ext = re.exec(file.name);
	if (ext[1] != 'jpg' 	&& 
		ext[1] != 'jpeg'	&& 
		ext[1] != 'gif' 	&& 
		ext[1] != 'png' 	&& 
		ext[1] != 'bmp' 	&& 
		ext[1] != 'dicom' 	){
		alert("Not an image or image is too large");
		return;
	}
      
	  var reader  = new FileReader();

       reader.onloadend = function () {	   
		   //Append New Image
		   if (new_image){
			   $(".admin-add-image").html('<div class="col-sm-12 admin-sponsor-upload-image">\
																<div class="admin-sponsor-image">\
																	<img class="center-block" id="sponsor-image" src="' + reader.result + '">\
																	<div class="admin-upload-image-caption text-center"><span class="glyphicon glyphicon-camera"></span> Upload New Image</div>\
																</div>\
															</div>');
			}			
			else {
				$(image_src_id).attr("src", reader.result);
			}
			imageNumber += 1;
	   }

       if (file) {
           reader.readAsDataURL(file); //reads the data as a URL
       } else {
           $("#img-" + imageNumber).attr("src", "");
       }
}

function add_sponsor(){
	var sponsor_link = $("#sponsor-link").val();
	var sponsor_image = $("#sponsor-image").attr("src");
	
	var target = document.getElementById('admin-console');
	var spinner = new Spinner(opts).spin(target);
	
	$.ajax({type:"post",
			url:"db/db-add-sponsor.php",
			data:{"sponsor_link":sponsor_link, "sponsor_image":sponsor_image},
			success:function(data){
				spinner.stop()
				var id = JSON.parse(data);
				console.log(id.sponsor_id);
				$(".admin-sponsor-image-container").append('<div class="col-lg-3 col-md-4 col-sm-6 admin-sponsor-info" id="' + id.sponsor_id + '">\
															<div class="admin-sponsor-image" >\
																<img class="center-block" src="' + sponsor_image + '" id="sponsor-image-id-' + id.sponsor_id + '">\
																<div class="admin-upload-image-caption text-center" onclick="document.getElementById(\'image-upload-update-' + id.sponsor_id + '\').click(); return false;"><span class="glyphicon glyphicon-camera" ></span> Upload New Image</div>\
																<input class="btn btn-info hidden" type="file" name="image-upload-update" id="image-upload-update-' + id.sponsor_id +  '" onchange="add_image(false, \'#image-upload-update-' + id.sponsor_id + '\', \'#sponsor-image-id-' + id.sponsor_id +  '\' )" ></input>\
															</div>\
															<div class="col-sm-12 no-padding admin-sponsor-link">\
																<input class="form-control" value="' + sponsor_link + '"></input>\
															</div>\
															<div class="col-sm-12 no-padding">\
																<button type="submit" class="pull-right facebook-btn admin-save-sponsor-btn">Save</button>\
																<button type="submit" class="pull-right facebook-btn facebook-btn-white admin-delete-sponsor-btn">Delete</button>\
															</div>\
														</div>');
			}
	});
}

function update_sponsor(id, image, link) {
	
	var target = document.getElementById('admin-console');
	var spinner = new Spinner(opts).spin(target);
	console.log(image);
	$.ajax({type: "post",
			url: "db/db-update-sponsor.php",
			data: {"sponsor_id": id, "sponsor_image": image, "sponsor_link": link},
			success: function(data){
				console.log(data);
				spinner.stop();
				display_confirmation("admin-console", "<span class='glyphicon glyphicon-ok'></span> Sponsor Updated");
			}
	});
}

function delete_sponsor(id){
	console.log("HER");
	var target = document.getElementById('admin-console');
	var spinner = new Spinner(opts).spin(target);
	console.log("remove" + id)
	$.ajax({type: "post",
			url: "db/db-delete-sponsor.php",
			data: {"sponsor_id": id},
			success: function(data){
				console.log(data);
				spinner.stop();
				$("#" + id).remove();
				display_confirmation("admin-console", "<span class='glyphicon glyphicon-ok'></span> Sponsor Deleted");
			}
	});
}