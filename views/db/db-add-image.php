<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'db.php';

	$image = $_POST["image"];

	$id = array("image_id" => add_image($mysqli, $image));
	echo json_encode($id);

?>
