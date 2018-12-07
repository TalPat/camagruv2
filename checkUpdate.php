<?php

	session_start();
	require_once("functions.php");

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$code = filter_var($_POST['code'], FILTER_SANITIZE_STRING);
	$passwrd = filter_var($_POST['passwrd'], FILTER_SANITIZE_STRING);
	$passwrd = hash("whirlpool",$passwrd);

	if ($passwrd != "" && isset($_POST['okay']) && $username != "" && $code != "") {
		if (count(ft_run_sql("SELECT * FROM USERS WHERE username='$username' AND refcode='$code'")) > 0) {
			ft_run_sql_noreturn("UPDATE Users SET passwd='$passwrd' WHERE username='$username' AND refcode='$code'");
			$out = "Successfully updated password.";
		}
		else
			$out = "Invalid refcode or username.";
	}
	else {
		$out = "Bad Inputs";
		// echo $username;
		// echo $email;
	}

?>

<html lang="en">

<?php ft_printhead("Mail Sent"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<h2>Update Password</h2>
			<p><?php echo($out) ?></p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>