<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'db.php';

	$post_id = $_POST["post_id"];
		
	remove_post($mysqli, $post_id);
	echo $post_id;
?>