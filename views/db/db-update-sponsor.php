<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'db.php';

	$sponsor_id = $_POST["sponsor_id"];
	$sponsor_image = $_POST["sponsor_image"];
	$sponsor_link = $_POST["sponsor_link"];
	


	update_sponsor($mysqli, $sponsor_id, $sponsor_image, $sponsor_link);

?>