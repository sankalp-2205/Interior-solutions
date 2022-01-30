<?php
	session_start();
	
	include ('dbconn.php');
	
	$topic = addslashes($_POST['topic']);
	$content = nl2br(addslashes($_POST['content']));
	$cid = $_GET['cid'];
	$scid = $_GET['scid'];
	$city = $_POST['city'];
	$contact = $_POST['phone'];
	
	$insert = mysqli_query($con, "INSERT INTO topics (`category_id`, `subcategory_id`, `author`, `title`, `content`,`city`,`contact`, `date_posted`) 
								  VALUES ('".$cid."', '".$scid."', '".$_SESSION['username']."', '".$topic."', '".$content."', '".$city."' ,'".$contact."' , NOW());");
								  
	if ($insert) {
		header("Location: /topics.php?cid=".$cid."&scid=".$scid."");
	}
?>