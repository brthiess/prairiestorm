<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'db.php';

	$image_id = $_POST["image_id"];
		
	delete_image($mysqli, $image_id);
	echo $image_id;
?>