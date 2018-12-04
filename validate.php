<?php

	session_start();
	require_once("functions.php");

	$id = $_GET['id'];
	$code = $_GET['code'];

	$out = "Your account is now active. Login <a href='login.php'>here</a>.";
	if (isset($id) && isset($code)) {

		$sql = "SELECT * FROM Users WHERE username = '$id'";
		$entries = ft_run_sql($sql);

		if ($entries[0]['refcode'] == $code) {

			$sql = "UPDATE Users SET confirmed='1' WHERE username='$_GET[id]'";
			ft_run_sql_noreturn($sql);
		}
		else {
			$out = "Invalid link.";
		}
	}
	else {
		header("location: index.php");
	}

?>

<html lang="en">

<?php ft_printhead("Email Verification"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container">
			<h2>Account Validation</h2>
			<p><?php echo($out) ?></p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>
