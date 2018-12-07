<?php

	session_start();
	require_once("functions.php");

	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$username = ft_run_sql("SELECT * FROM users WHERE email='$email'")[0]['username'];

	if ($email != "" && isset($_POST['okay']) && $username != "") {
		
		$refcode = hash("whirlpool",rand(0, 999999));
		ft_run_sql_noreturn("UPDATE Users SET refcode='$refcode' WHERE email='$email'");
		if (mail($email, "Do not reply", "Click on the link to change your password <br>http://localhost:8080/updatepassword.php?id=$username&code=".$refcode.", From: tpatter@student.wethinkcode.co.za"))
			$out = "A verification email has been sent, click the link in the email to update your password.";
		else
			$out = "Failed to send verification mail";
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
			<h2>Registration to Camagru</h2>
			<p><?php echo($out) ?></p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>
