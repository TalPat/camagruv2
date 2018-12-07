<?php

	require_once('./config/database.php');

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "password";
	$dbname = "camaguru";
	
	function	ft_printheader()
	{
			if (ft_signedincheck())
			$logstat = '<p>Logged in as '.$_SESSION['user'].'<br><a href="user.php">My Profile</a> <a href="logout.php">Logout</a></p>';
		else
			$logstat = '<a href="login.php">Login</a></p>';
			'</p> <a href="logout.php">Logout</a>';
		print(
				'<div class="header twelve columns" style="margin: 0px; margin-bottom: 20px; background-color: #dddddd">
				<div>
					<h1 style="float: left">Camagru</h1>
				</div>
				<div class="login" style="text-align: right;">
					'.$logstat.'
					<div class="menu">
						<a href="index.php">Home</a>
						<a href="gallery.php">Gallery</a>
					</div>
				</div>
			</div>'
		);
	}

	function	ft_printfooter()
	{
		print(
			'<div class="footer twelve columns" style="background-color: #dddddd; width: 100%; position: relative; bottom: 0; text-align: center;">'.
			'<p style="margin-top: 10px;">TPATTER Camagru</p>'.
			'</div>'
		);
	}

	function	ft_printhead($title)
	{
		print(
			'<head>
				<title>'.$title.'</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="skeleton.css">
			</head>'
		);
	}

	function	ft_signedincheck()
	{
		if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
			return (TRUE);
		}
		else {
			return (FALSE);
		}
	}

	function	ft_run_sql($sql) {
		$conn = ft_connect_database();
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			return($stmt->fetchAll());
		}
		catch(PDOException $e) {
			echo $e;
			return("Error");
		}
		$conn = null;
	}

	function	ft_run_sql_noreturn($sql) {
		$conn = ft_connect_database();
		try {
			$stmt = $conn->prepare($sql);
			$stmt->execute();
		}
		catch(PDOException $e) {
			echo $e;
			return("Error");
		}
		$conn = null;
	}

	function	ft_checklogin() {
		if (!isset($_SESSION[user]))
			header("location: index.php");
	}

?>