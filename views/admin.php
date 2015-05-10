<?php
include_once 'db/db_connect.php';
include_once 'db/functions.php';
 
sec_session_start();
?>

<!DOCTYPE html>
<html lang="en">
<?php include_once "header.php";?>
<link rel="stylesheet" href="css/admin-styles.css">
<script src="js/admin.js"></script>
<script src="js/add-post.js"></script>
<script src="js/admin-manage-posts.js"></script>
<script src="js/admin-twitter.js"></script>
<script src="js/admin-sponsor.js"></script>
<script src="js/admin-images.js"></script>
<script src="js/spin.min.js"></script>
<body>

        <?php if (login_check($mysqli) == true) : ?>
			<?php include 'navbar-admin.php';?>
			<div class="col-xs-12 col-sm-3 col-md-2 admin-panel">
				<div class="admin-option active" id="admin-add-post">
					<img src="images/admin/add-icon.png" ><span> Add Post </span> 
				</div>
				<div class="admin-option" id="admin-manage-posts">
					<img src="images/admin/edit-icon.png"><span> Manage Posts </span> 
				</div>
				<div class="admin-option" id="admin-twitter">
					<img src="images/admin/twitter-icon.png"><span> Twitter </span> 
				</div>
				<div class="admin-option" id="admin-sponsors">
					<img src="images/admin/sponsor-icon.png"><span> Sponsors </span> 
				</div>
				<div class="admin-option" id="admin-images">
					<img src="images/admin/image-icon.png"><span> Images </span> 
				</div>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 admin-console" id="admin-console">
				
			</div>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="admin-login.php">login</a>.
            </p>
        <?php endif; ?>
</body>
</html>