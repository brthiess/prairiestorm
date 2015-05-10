<?php
/*
This file contains all of the functions for basic db management
*/


/******************
Blog Post Functions
*******************/

//Adds the specified post and returns its id
function add_post($mysqli, $title, $content, $post_date, $draft){
		$stmt = $mysqli->prepare("INSERT INTO post (title, content, post_date, draft) VALUES (?, ?, ?, ?)");
		$stmt->bind_param('sssi', $title, $content, $post_date, $draft);
		$stmt->execute();
		return $mysqli->insert_id;
}

function remove_post($mysqli, $id){
	$stmt = $mysqli->prepare("DELETE FROM post WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
}

//Updates the post and returns its id
function update_post($mysqli, $id, $title, $content, $post_date, $draft){
	
	$stmt = $mysqli->prepare("UPDATE post SET content = ?, 
											  post_date = ?,
											  title = ?,
											  draft = ?
										WHERE id = ?");
		$stmt->bind_param('sssii',$content, $post_date, $title, $draft, $id);
		$stmt->execute();
		return $id;		
}

function get_post($mysqli, $id){
	$stmt = $mysqli->prepare("SELECT * FROM post WHERE id = ?");
	$stmt->bind_param("s",$id);
	$stmt->execute();
	return $stmt->mysqli_fetch_all();
}

function get_all_posts($mysqli){
	$stmt = $mysqli->prepare("SELECT * FROM post");
	$stmt->execute();
	
	$results = array();
	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_NUM))
        {
			array_push($results, $row);
        }
	return $results;
}

function add_twitter_account($mysqli, $username){
	$stmt = $mysqli->prepare("INSERT INTO twitter_accounts (username) VALUES(?)" );
	$stmt->bind_param("s", $username);
	$stmt->execute();
}

function remove_twitter_account($mysqli, $username){
	$stmt = $mysqli->prepare("DELETE FROM twitter_accounts WHERE username = ?");
	$stmt->bind_param('s', $username);
	$stmt->execute();
}

function get_twitter_accounts($mysqli){
	$stmt = $mysqli->prepare("SELECT * FROM twitter_accounts");
	$stmt->execute();
	
	$results = array();
	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_NUM))
        {
			array_push($results, $row);
        }
	return $results;
}

function add_sponsor($mysqli, $sponsor_image, $sponsor_link){
		$stmt = $mysqli->prepare("INSERT INTO sponsors (image, link) VALUES (?, ?)");
		$stmt->bind_param('ss', $sponsor_image, $sponsor_link);
		$stmt->execute();
		return $mysqli->insert_id;
}

function update_sponsor($mysqli, $sponsor_id, $sponsor_image, $sponsor_link){
	echo $sponsor_link;
	echo $sponsor_image;
	echo $sponsor_id;
	$stmt = $mysqli->prepare("UPDATE sponsors SET image = ?, 
											  link = ?
										WHERE id = ?");
		$stmt->bind_param('ssi', $sponsor_image, $sponsor_link, $sponsor_id);
		$stmt->execute();
}

function get_all_sponsors($mysqli){
	$stmt = $mysqli->prepare("SELECT * FROM sponsors");
	$stmt->execute();
	
	$results = array();
	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_NUM))
        {
			array_push($results, $row);
        }
	return $results;
}

function delete_sponsor($mysqli, $id){
	$stmt = $mysqli->prepare("DELETE FROM sponsors WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
}


function add_image($mysqli, $image){
		$stmt = $mysqli->prepare("INSERT INTO image (image) VALUES (?)");
		$stmt->bind_param('s', $image);
		$stmt->execute();
		return $mysqli->insert_id;
}


function get_all_images($mysqli){
	$stmt = $mysqli->prepare("SELECT * FROM image");
	$stmt->execute();
	
	$results = array();
	$result = $stmt->get_result();
	while ($row = $result->fetch_array(MYSQLI_NUM))
        {
			array_push($results, $row);
        }
	return $results;
}

function delete_image($mysqli, $id){
	$stmt = $mysqli->prepare("DELETE FROM image WHERE id = ?");
	$stmt->bind_param('i', $id);
	$stmt->execute();
}


?>