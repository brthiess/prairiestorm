<?php
include_once 'db/db_connect.php';
include_once 'db/functions.php';
 
sec_session_start();
if (login_check($mysqli) == true) : ?>
	<div class="col-sm-12 admin-sponsor-container">
		<div class="col-md-6 col-md-offset-3">
			<div class="col-sm-12 admin-add-sponsor-container">
				<h2 class="text-center">Sponsor Manager</h2>
				<p class="admin-twitter-description text-center">Add or remove sponsor images and links from your website (2mb Max)</p>
				<div class="admin-add-image text-center" onclick="document.getElementById('image-upload').click(); return false;">
					<p><span class="glyphicon glyphicon-plus"></span> Upload Sponsor Photo</p>
				</div>
				<input class="btn btn-info hidden" type="file" name="image-upload" id="image-upload" onchange="add_image(true, '#image-upload')" ></input>
					
				<input class="top-buffer-small form-control" name="sponsor-link" id="sponsor-link" placeholder="Sponsor Website"></input>
				<button type="submit" class="center-block top-buffer-small btn btn-info admin-add-sponsor-btn">Add Sponsor</button>
			</div>
		</div>	
		<div class="col-sm-12 admin-sponsor-image-container">
			<?php include 'db/db-get-all-sponsors.php';
			foreach($sponsors as $s){
				echo '<div class="col-lg-3 col-md-4 col-sm-6 admin-sponsor-info" id="' . $s[0] . '">
						<div class="admin-sponsor-image" >
							<img class="center-block" src="' . $s[1] . '" id="sponsor-image-id-' . $s[0] . '">
							<div class="admin-upload-image-caption text-center" onclick="document.getElementById(\'image-upload-update-' . $s[0] . '\').click(); return false;"><span class="glyphicon glyphicon-camera" ></span> Upload New Image</div>
							<input class="btn btn-info hidden" type="file" name="image-upload-update" id="image-upload-update-' . $s[0] . '" onchange="add_image(false, \'#image-upload-update-' . $s[0] . '\', \'#sponsor-image-id-' . $s[0] . '\' )" ></input>
						</div>
						<div class="col-sm-12 no-padding admin-sponsor-link">
							<input class="form-control" value="' . $s[2] . '"></input>
						</div>
						<div class="col-sm-12 no-padding">
							<button type="submit" class="pull-right facebook-btn admin-save-sponsor-btn">Save</button>
							<button type="submit" class="pull-right facebook-btn facebook-btn-white admin-delete-sponsor-btn">Delete</button>
						</div>
					</div>';
			}
			?>
			
		</div>		
	</div>
<?php else : ?>
	<p>
    <span class="error">You are not authorized to access this page.</span> Please <a href="admin-login.php">login</a>.
    </p>
<?php endif; ?>