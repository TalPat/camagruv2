<?php

	session_start();
	require_once("functions.php");

	$id = $_SESSION['id'];

	if ($id != "") {
		$user = ft_run_sql("SELECT * FROM users WHERE id='$id'");
		$notify = $user[0]['notify'];
		if ($notify == '1')
			$notify = 0;
		else
			$notify = 1;
		ft_run_sql_noreturn("UPDATE users SET notify='$notify' WHERE id='$id'");
		header("location: user.php");
	}
	else {
		header("location: index.php");
	}

?>