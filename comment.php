<?php

	session_start();
	require_once("functions.php");

	$comment = $_POST['comment'];
	$id = $_SESSION['id'];
	$imageid = $_POST['imageid'];

	if ($comment != "" && isset($_POST['okay']) && $id != "") {
		ft_run_sql_noreturn("INSERT INTO comments (comment, authorid, imageid) VALUES ('$comment', '$id', '$imageid')");
		// echo $comment;
		// echo $id;
		// echo $imageid;
		$imgEntry = ft_run_sql("SELECT * FROM images WHERE id='$imageid'");
		$uploaderid = $imgEntry[0]['userid'];
		$uploaderEntry = ft_run_sql("SELECT * FROM users WHERE id='$uploaderid'");
		if ($uploaderEntry[0]['notify']== '1') {
			mail($uploaderEntry[0]['email'], "Do not reply", "Your image has gotten a comment!, From: tpatter@student.wethinkcode.co.za");
		}
		header("location: image.php?imageid=".$imageid);
	}
	else {
		header("location: index.php");
	}

?>
