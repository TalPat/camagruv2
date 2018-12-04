<?php

	session_start();
	require_once("functions.php");

	$username = $_POST['username'];
	$passwrd = $_POST['passwrd'];
	
	
	$out = "Incorrect username or password";
	if ($username != "" && $passwrd != "" && isset($_POST[okay])) {

		$sql = "SELECT * FROM Users WHERE username = '".$username."' AND confirmed = '1'";
		$entries = ft_run_sql($sql);

		// try {
		// 	$stmt = $conn->prepare($sql);
		// 	$stmt->execute();
		// 	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		// 	$vals = $stmt->fetchAll();
		// }
		// catch(PDOException $e) {
		// 	$out = "Error:".$e;
		// }
		if (count($entries) < 1)
			$out = "invalid username";
		else {
			if (hash("whirlpool", $passwrd) != $entries[0]['passwd'])
				$out = "Invalid password";
			else {
				$_SESSION['user'] = $_POST['username'];
				$_SESSION['id'] = $entries[0]['id'];
				header("location: user.php");
			}
		}
	}
	else {
		$out = "Bad Inputs";
	}

?>

<html lang="en">

<?php ft_printhead("Bad Login"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container">
			<h2>Unable to Log In</h2>
			<p><?php echo($out) ?></p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>
