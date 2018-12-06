<?php

	session_start();
	require_once("functions.php");

?>

<html lang="en">

<?php ft_printhead("Change Password"); ?>

<body>
	<div id="mainContent">

		<?php ft_printheader(); ?><div class="twelve columns">

		<div class="container">
			<h2>Change Password</h2>
			<form action="checkPassUpdate.php" method="POST">
				<table>
					<tr><td>Email: </td><td><input type="text" name="email"></td></tr>
				</table>
				<br>
				<input type="submit" name="okay">
			</form>
			<p>Don't have an account? Register <a href="register.php">here</a>.</p>
		</div>

		</div><?php ft_printfooter(); ?>

	</div>
</body>
</html>