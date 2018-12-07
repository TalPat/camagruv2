<?php

	session_start();
	require_once("functions.php");

	$username = $_GET['id'];
	$code = $_GET['code'];

?>

<html lang="en">

<?php ft_printhead("Change Password"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<h2>New Password</h2>
			<form action="checkUpdate.php" method="POST">
				<table>
					<tr><td>New Password: </td><td><input type="password" name="passwrd"></td></tr>
				</table>
				<br>
				<input type="hidden" value=<?php echo "'$username'"?> name="username" />
				<input type="hidden" value=<?php echo "'$code'"?> name="code" />
				<input type="submit" name="okay">
			</form>
			<p>Don't have an account? Register <a href="register.php">here</a>.</p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>