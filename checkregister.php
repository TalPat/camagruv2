<?php

	session_start();
	include_once("functions.php");

	$username = $_POST['username'];
	$email = $_POST['email'];
	$passwrd = $_POST['passwrd'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];

	if ($username != "" && $email != "" && $passwrd != "" && $firstname != "" && $lastname != "" && isset($_POST['okay'])) {
		$entries = ft_run_sql("SELECT * FROM USERS WHERE username = '".$username."' OR email = '".$email."'");
		if ($entries != "Error" && count($entries) < 1) {
			$refcode = hash("whirlpool",rand(0, 999999));
			ft_run_sql("INSERT INTO Users (username, email, passwd, firstname, lastname, confirmed, refcode) VALUES ('$username', '$email', '".hash("whirlpool",$passwrd)."', '$firstname', '$lastname', '0', '$refcode')");
			if (mail($_POST['email'], "Do not reply", "Thank you for registering with Camagru. Click on the link to activate your account <br>http://localhost:8080/camagru/validate.php?id=$_POST[username]&code=".$refcode.", From: tpatter@student.wethinkcode.co.za"))
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

		<?php ft_printheader(); ?>

		<div class="container">
			<h2>Registration to Camagru</h2>
			<p><?php echo($out) ?></p>
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
</html>
