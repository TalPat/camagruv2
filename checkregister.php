<?php

	session_start();
	require_once("functions.php");

	$username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
	$passwrd = filter_var($_POST['passwrd'], FILTER_SANITIZE_STRING);
	$firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
	$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_STRING);

	if ($username != "" && $email != "" && $passwrd != "" && $firstname != "" && $lastname != "" && isset($_POST['okay'])) {
		$entries = ft_run_sql("SELECT * FROM USERS WHERE username = '".$username."' OR email = '".$email."'");
		if ($entries != "Error" && count($entries) < 1) {
			$refcode = hash("whirlpool",rand(0, 999999));
			ft_run_sql_noreturn("INSERT INTO Users (username, email, passwd, firstname, lastname, confirmed, refcode, notify) VALUES ('$username', '$email', '".hash("whirlpool",$passwrd)."', '$firstname', '$lastname', '0', '$refcode', '1')");
			if (mail($email, "Do not reply", "Thank you for registering with Camagru. Click on the link to activate your account <br>http://localhost:8080/validate.php?id=filter_var($_POST[username]&code=".$refcode.", From: tpatter@student.wethinkcode.co.za"))
					$out = "A verification email has been sent, click the link in the email to validate your account.";
			else
				$out = "Failed to send verification mail";
		}
		else {
			$out = "Username or email already in use.";
		}
	}
	else {
		$out = "Bad Inputs";
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
