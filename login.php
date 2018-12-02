<?php

	session_start();
	require_once("functions.php");

?>

<html lang="en">

<?php ft_printhead("Login"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?>

		<div class="container">
			<h2>Login</h2>
			<form action="checkLogin.php" method="POST">
				<table>
					<tr><td>Username: </td><td><input type="text" name="username"></td></tr>
					<tr><td>Password: </td><td><input type="password" name="passwrd"></td></tr>
				</table>
				<br>
				<input type="submit" name="okay">
			</form>
			<p>Don't have an account? Register <a href="register.php">here</a>.</p>
		</div>

		<?php ft_printfooter(); ?>

	</div>
</body>
</html>