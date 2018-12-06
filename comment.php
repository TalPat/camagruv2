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
		header("location: image.php?imageid=".$imageid);
	}
	else {
		header("location: index.php");
	}

?>
