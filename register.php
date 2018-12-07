<?php

	session_start();
	require_once("functions.php");

?>

<html lang="en">

<?php ft_printhead("Register"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container primary">
			<h2>Register</h2>
			<form action="checkRegister.php" method="POST">
				<table>
					<tr><td>Username: </td><td><input type="text" name="username" required></td></tr>
					<tr><td>Email: </td><td><input type="text" name="email" required></td></tr>
					<tr><td>First Name: </td><td><input type="text" name="firstname" required></td></tr>
					<tr><td>Last Name: </td><td><input type="text" name="lastname" required></td></tr>
					<tr><td>Password: </td><td><input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" name="passwrd" required></td></tr>
				</table>
				<br>
				<input type="submit" name="okay">
			</form>
			<p>Already have an account? Log in <a href="login.php">here</a>.</p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>