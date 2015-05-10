<?php
include_once 'db_connect.php';
include_once 'functions.php';
include_once 'db.php';

	$sponsor_id = $_POST["sponsor_id"];
		
	delete_sponsor($mysqli, $sponsor_id);
	echo $sponsor_id;
?>