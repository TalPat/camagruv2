<?php

	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "password";
	$dbname = "camaguru";
	
	function ft_printheader()
	{
			if ($ft_signedincheck())
			$logstat = '<p>Logged in as '.$_SESSION[user].'<br><a href="user.php">My Profile</a> <a href="logout.php">Logout</a></p>';
		else
			$logstat = '<a href="login.php">Login</a></p>';
			'</p> <a href="logout.php">Logout</a>';
		print(
				'<div class="header" style="height: 75px;">
				<div>
					<a href="index.php"><img src="../Img/logo.png" alt=""></a>
					</div>
				<div class="menu" style="float: left">
					<a href="index.php">Home</a>
					<a href="gallery.php">Gallery</a>
					<a href="Users.php">Users</a>
				</div>
				<div class="login" style="float :right; text-align: right;">
					'.$logstat.'
				</div>
			</div>'
		);
	}

	function ft_printfooter()
	{
		print(
			'<div class="footer">
				</div>'
		);
	}

	function ft_printhead($title)
	{
		print(
			'<head>
				<title>'.$title.'</title>
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<link rel="stylesheet" type="text/css" href="skeleton.css">
			</head>'
		);
	}

	function ft_signedincheck()
	{
		if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
			return (TRUE);
		}
		else {
			return (FALSE);
		}
	}

?>